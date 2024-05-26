<?php 

require_once "App/init.php";

$komik1 = new Komik("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000, 100);
$game1 = new Game("Persona 5 Royal", "Daiki Ito", "Atlus", 700000, 101);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $komik1 );
$cetakProduk->tambahProduk( $game1 );

echo $cetakProduk->cetak();
?>