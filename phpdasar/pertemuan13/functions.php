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
    $image = htmlspecialchars($data["image"]);

    // query insert data
    $query = "INSERT INTO anime
    VALUES
    ('', '$title', '$type', '$episode', '$released_year', '$image')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
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
    $image = htmlspecialchars($data["image"]);

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

?>