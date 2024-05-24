<?php 
require 'functions.php';

$anime_list = query("SELECT * FROM anime");


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

    <a href="tambah.php">Tambah data anime</a>
    <br><br>

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
                <a href="hapus.php?id=<?= $anime_data["id"]; ?>">Hapus</a>
            </td>
            <td><img src="img/<?= $anime_data["image"]; ?>" alt=""  width="50"></td>
            <td><?= $anime_data["title"];?></td>
            <td><?= $anime_data["type"];?></td>
            <td><?= $anime_data["episode"];?></td>
            <td><?= $anime_data["released_year"];?></td>
        </tr>
        <?php $urut++; ?>
        <?php endforeach;?>

    </table>
</body>
</html>