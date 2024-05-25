<?php 
require 'functions.php';
//koneksi ke DBMS
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

$id = $_GET["id"];

$selected_anime = query("SELECT * FROM anime WHERE id = '$id'")[0];

// cek apakah tombol submit sudah ditekan
if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "<script>
                alert('data berhasil diupdate!');
                document.location.href = 'index.php';
            </script>";
    } else{
        echo "<script>
                alert('data gagal diupdate!');
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
    <title>Update data anime</title>
</head>
<body>
    <h1>Update data anime</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="id">ID : </label>
                <input type="hidden" name="id" id="id" value="<?= $selected_anime['id']; ?>">
                <input type="hidden" name="gambarLama" value="<?= $selected_anime['image']; ?>">
            </li>
            <li>
                <label for="title">Title : </label>
                <input type="text" name="title" id="title" value="<?= $selected_anime['title']; ?>" required>
            </li>
            <li>
                <label for="type">Type : </label>
                <input type="text" name="type" id="type" value="<?= $selected_anime['type']; ?>" required>
            </li>
            <li>
                <label for="episode">Episode : </label>
                <input type="number" name="episode" id="episode" value="<?= $selected_anime['episode']; ?>" required>
            </li>
            <li>
                <label for="released_year">Released year : </label>
                <input type="text" name="released_year" id="released_year"value="<?= $selected_anime['released_year']; ?>"  required>
            </li>
            <li>
                <label for="image">Gambar : </label> <br>
                <img src="img/<?= $selected_anime['image']; ?>" width="40px"> <br>
                <input type="file" name="image" id="image" >
            </li>
            <li>
                <button type="submit" name="submit">Update data</button>
            </li>
        </ul>

    </form>
</body>
</html>