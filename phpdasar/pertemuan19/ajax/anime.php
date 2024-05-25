<?php 
require '../functions.php';
$keyword = $_GET["keyword"];
$query = "SELECT * FROM anime WHERE title LIKE '%$keyword%' OR
type LIKE '%$keyword%' OR
episode LIKE '%$keyword%' OR
released_year LIKE '%$keyword%'";

$anime_list = query($query);

$urut = 1;
?>
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