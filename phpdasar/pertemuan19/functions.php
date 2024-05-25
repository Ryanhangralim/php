<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

function tambah($data){
    global $conn;
    // ambil data dari setiap elemen dalam form
    $title = htmlspecialchars($data["title"]);
    $type = htmlspecialchars($data["type"]);
    $episode = htmlspecialchars($data["episode"]);
    $released_year = htmlspecialchars($data["released_year"]);

    // upload gambar
    $image = upload();
    if ( !$image ){
        return false;
    }

    // query insert data
    $query = "INSERT INTO anime
    VALUES
    ('', '$title', '$type', '$episode', '$released_year', '$image')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES['image']['name'];
    $ukuranFile = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek apakah ada gambar yang diupload
    if( $error === 4){
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $namaGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($namaGambar));

    if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                alert('File yang anda upload bukan gambar!');
            </script>";
    }

    //cek jika ukuran terlalu besar
    if ($ukuranFile > 1000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
    }

    //lolos pengecekan, gambar siap diupload
    //generate nama gambar baru
    $namaFileBaru = $namaGambar[0];
    $namaFileBaru .= "_";
    $namaFileBaru .= uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function hapus($id){
    global $conn;
    
    $query = "DELETE FROM anime WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    // ambil data dari setiap elemen dalam form
    $id = htmlspecialchars($data["id"]);
    $title = htmlspecialchars($data["title"]);
    $type = htmlspecialchars($data["type"]);
    $episode = htmlspecialchars($data["episode"]);
    $released_year = htmlspecialchars($data["released_year"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    //cek apakah user pilih gambar baru atau tidak
    if($_FILES["image"]["error"] === 4){
        $image = $gambarLama;
    } else{
        $image = upload();
    }

    // query insert data
    $query = "UPDATE anime
    SET title = '$title', type = '$type', episode = '$episode', released_year = '$released_year', image = '$image' WHERE id = '$id'";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM anime WHERE title LIKE '%$keyword%' OR
    type LIKE '%$keyword%' OR
    episode LIKE '%$keyword%' OR
    released_year LIKE '%$keyword%'";
    return query($query);
}

function registrasi($data){
    global $conn;

    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username';");
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username sudah terdafatar!');
            </script>";
            return false;
    }

    //cek konfirmasi password
    if( $password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password');");

    return mysqli_affected_rows($conn);
}

function login($data){
    global $conn;

    $username = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    
    //cek apakah username ada di database
    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username';");

    //cek username
    if(mysqli_num_rows($result) === 1){
        //menampung result
        $return_result = [];
        
        //cek password
        $row = mysqli_fetch_assoc($result);

        //menambahkan hasil row ke array return
        $return_result[] = $row;

        //cek apakah password sesuai dengan user
        if(password_verify($password, $row["password"])){
            //jika password sama
            $return_result[] = 0;
            return $return_result;
        } else{
            $return_result[] = 1;
            return $return_result;
        }
    } else{
        $return_result[] = 2;
        return $return_result;
    }

}

?>