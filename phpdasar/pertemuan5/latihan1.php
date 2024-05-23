<?php 
// array : variabel yang dapat menyimpan banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda

//membuat array
$hari_kerja = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"];

//menampilkan array
// var_dump($hari_kerja);
// echo "<br>";
// print_r($hari_kerja);
// echo "<br>";
// echo $hari_kerja[0];

//menambah elemen baru pada array
$hari_kerja[] = "Sabtu";
var_dump($hari_kerja);
?>