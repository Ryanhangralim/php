<?php
// Pertemuan 2 - PHP Dasar
// Sintaks PHP

// Standar Output
// echo, print, print_r (melihat isi array), var_dump (melihat isi variabel)


// Penulisan sintaks PHP
// 1. PHP dalam HTML
// 2. HTML dalam PHP

// Variabel dan tipe data
// Variabel : Tidak boleh diawali dengan angka, tapi boleh mengandung angka
// $nama = "Ryan Hangralim";
// echo "Halo, nama saya $nama";
// echo 'Halo, nama saya $nama';

// Operator : aritmatika -> + - $ / %
// $x = 10;
// $y = 23;
// echo $x + $y;

// concatenation
// $nama_depan = "Ryan";
// $nama_belakang = "Hangralim";

// echo $nama_depan . " " . $nama_belakang;
// echo "$nama_depan $nama_belakang";

// Assignment -> =, +=, -=, *=, /=, %=, .=
// $nama_lengkap = "Ryan";
// $nama_lengkap .= " Hangralim";
// echo $nama_lengkap;

// Perbandingan
// <, >, <=, >=, ==, !=
// var_dump(1 == "1");

// identitas
// ===, !==
// var_dump(1 === "1")

// Logika
// &&, ||, !
$x = 10;
var_dump($x < 20 && $x % 2 == 0)
?>
