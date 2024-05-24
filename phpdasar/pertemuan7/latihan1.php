<?php 
// variable scope /lingkup variabel
// $x = 10;

// function tampilX(){
//     global $x;
//     echo $x;
// }

// tampilX();

// superglobal variable : variable global milik php. tipe : Array Asosiatif
/* $_GET, $_POST, $_REQUEST, $_SESSION, $_COOKIE, $_SERVER, $_ENV*/
// echo $_SERVER["SERVER_NAME"]

// $_GET
// $_GET["nama"] = "Ryan Hangralim";
// $_GET["nim"] = "2208561030";
// var_dump($_GET);
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
    <title>GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach($mahasiswa as $mhs) :?>
            <li>
                <a href='latihan2.php?nama=<?= $mhs["nama"];?>&nim=<?= $mhs["nim"];?>&jurusan=<?= $mhs["jurusan"];?>&email=<?= $mhs["email"];?>&gambar=<?= $mhs["gambar"];?>'><?= $mhs["nama"];?></a>
            </li>
            <?php endforeach;?>
    </ul>
</body>
</html>