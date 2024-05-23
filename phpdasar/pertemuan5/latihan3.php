<?php 
$mahasiswa = [["Ryan Hangralim", "2208561030", "Teknik Informatika", "hangralim.2208561030@student.unud.ac.id"], ["Hangralim Ryan", "2208561003", "Teknik Informatika", "2208561030@unud.ac.id"]];
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
    <?php foreach($mahasiswa as $mhs) : ?>
    <ul>
        <?php foreach($mhs as $data_mhs) : ?>
            <li>
                <?= $data_mhs ?>
            </li>
            <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
</body>
</html>