<?php 

// //harus menjadi variabel global
// define('NAMA', 'Ryan Hangralim');

// echo NAMA;
// echo "<br>";

// //bisa dimasukkan ke dalam class
// const UMUR = 19;
// echo UMUR;
// echo "<br>";

// class Coba{
//     const NAMA = "Ryan";
// }

// echo Coba::NAMA;

echo __FILE__;
echo "<br>";
echo __DIR__;
echo "<br>";

function coba(){
    return __FUNCTION__;
}

echo coba();
echo "<br>";

class CobaConstant{
    public $kelas = __CLASS__;
}

$obj1 = new CobaConstant;
echo $obj1->kelas;
echo "<br>";
?>