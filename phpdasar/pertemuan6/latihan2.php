<?php 
// $mahasiswa = ["Ryan Hangralim", "2208561030", "Teknik Informatika", "hangralim.2208561030@student.unud.ac.id"];

// Array Associative
/* definisinya sama seperti array numerik, kecuali keynya adalah string yang kita buat sendiri*/

$mahasiswa = [
    ["nama" => "Ryan Hangralim", 
    "nim" => "2208561030", 
    "jurusan" => "Teknik Informatika",
    "email" => "hangralim.2208561030@student.unud.ac.id",
    "gambar" => "img/gambar1.png"
    ],
    [
    "nama" => "Hangralim Ryan", 
    "nim" => "2208561003", 
    "jurusan" => "Teknik Informatika",
    "email" => "2208561030@student.unud.ac.id",
    "gambar" => "img/gambar2.png"
    ]];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs): ?>
    <ul>
        <li>Nama: <?= $mhs["nama"]; ?></li>
        <li>NIM: <?= $mhs["nim"]; ?></li>
        <li>Jurusan: <?= $mhs["jurusan"]; ?></li>
        <li>Email: <?= $mhs["email"]; ?></li>
        <li>
            <img src="<?= $mhs['gambar']; ?>"
        </li>
    </ul>
    <?php endforeach; ?>
</body>
</html>