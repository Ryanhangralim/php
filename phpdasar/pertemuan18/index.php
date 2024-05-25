<?php 
session_start();

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

require 'functions.php';

// konfigurasi pagination
$jumlah_data_per_halaman = 5;
$jumlah_data = count(query("SELECT * FROM anime"));
$jumlah_halaman = ceil($jumlah_data/$jumlah_data_per_halaman);
$active_page =  (isset($_GET["page"])) ? $_GET["page"] : 1;
$awal_data = ( $jumlah_data_per_halaman * $active_page) - $jumlah_data_per_halaman;

$anime_list = query("SELECT * FROM anime LIMIT $awal_data, $jumlah_data_per_halaman");

//tombol cari ditekan
if (isset($_POST["cari"])){
    $anime_list = cari($_POST["keyword"]);
}

$urut = $awal_data+1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
    <a href="logout.php">Logout</a>

    <h1>Daftar Anime</h1>

    <a href="tambah.php">Tambah data anime</a>
    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword", size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari!</button>

    </form>
    <br><br>

    <!-- navigasi -->
    <?php if($active_page > 1):?>
        <a href="?page=<?= $active_page - 1;?>">&laquo;</a>
        <?php endif;?>
    <?php for($i = 1; $i <= $jumlah_halaman; $i++):?>
        <?php if($i == $active_page):?>
            <b><a href="?page=<?=$i;?>" style="color: red"><?= $i;?></a></b>
            <?php else:?>
                <a href="?page=<?=$i;?>"><?= $i;?></a>
                <?php endif?>
                <?php endfor;?>                
    <?php if($active_page < $jumlah_halaman):?>
        <a href="?page=<?= $active_page + 1;?>">&raquo;;</a>
        <?php endif;?>
    <br>

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
                <a href="ubah.php?id=<?= $anime_data["id"]; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $anime_data["id"]; ?>" onclick="return confirm('Apakah anda ingin menghapus data?')">Hapus</a>
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