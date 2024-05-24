<?php 
//check apakah ada data atau tidak di $_GET
if( !isset($_GET["nama"]) || !isset($_GET["nim"]) || !isset($_GET["email"]) || !isset($_GET["jurusan"]) || !isset($_GET["nim"]) || !isset($_GET["gambar"])){
    // redirect
    header("Location: latihan1.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mahasiswa</title>
</head>
<body>
    <ul>
        <li><img src="<?= $_GET['gambar']?>" alt="gambar"></li>
        <li>Nama : <?= $_GET["nama"];?></li>
        <li>NIM : <?= $_GET["nim"];?></li>
        <li>Email : <?= $_GET["email"];?></li>
        <li>Jurusan : <?= $_GET["jurusan"];?></li>
    </ul>

    <a href="latihan1.php">Kembali ke daftar mahasiswa</a>
</body>
</html>