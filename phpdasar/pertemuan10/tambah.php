<?php 
require 'functions.php';
//koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    } else{
        echo "<script>
                alert('data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data anime</title>
</head>
<body>
    <h1>Tambah data anime</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" required>
            </li>
            <li>
                <label for="type">Type : </label>
                <input type="text" name="type" id="type" required>
            </li>
            <li>
                <label for="episode">Episode : </label>
                <input type="number" name="episode" id="episode" required>
            </li>
            <li>
                <label for="released_year">Released year : </label>
                <input type="text" name="released_year" id="released_year" required>
            </li>
            <li>
                <label for="image">Gambar : </label>
                <input type="text" name="image" id="image" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>

    </form>
</body>
</html>