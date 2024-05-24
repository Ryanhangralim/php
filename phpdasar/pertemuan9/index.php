<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel / query data
$result = mysqli_query($conn, "SELECT * FROM anime");
// if( !$result ){
//     echo mysqli_error($conn);
// }

// ambil data (fetch) dari object result
// mysqli_fetch_row() : Mengembalikan array numerik
// mysqli_fetch_assoc() : Mengembalikan array asosiatif
// mysqli_fetch_array() :  Mengembalikan array numerik dan array asosiatif
// mysqli_fetch_object() : Mengembalikan objek

// $anime = mysqli_fetch_object($result);
$anime_list = [];

while ($anime = mysqli_fetch_assoc($result)){
    $anime_list[] = $anime;
}

// var_dump($anime_list)

$urut = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
    <h1>Daftar Anime</h1>

    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Tipe</th>
            <th>Jumlah Episode</th>
            <th>Tahun Rilis</th>
        </tr>

        <?php foreach($anime_list as $anime_data):?>
        <tr>
            <td><?= $urut?></td>
            <td>
                <a href="">Ubah</a> |
                <a href="">Hapus</a>
            </td>
            <td><img src="img/<?= $anime_data["image"]; ?>" alt=""  width="50"></td>
            <td><?= $anime_data["title"];?></td>
            <td><?= $anime_data["type"];?></td>
            <td><?= $anime_data["episode"];?></td>
            <td><?= $anime_data["released_year"];?></td>
        </tr>
        <?php
        $urut++; 
        endforeach;?>

    </table>
</body>
</html>