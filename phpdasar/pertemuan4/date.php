<?php 
// Date : Untuk menampilkan tanggal dengan format tertentu
    // echo date("l, d-M-Y");

// Time : Detik yang berlalu sejak 1 januari 1970
    // echo time();

// echo date("l d-M-Y", time()-60*60*24*100);

//mktime : membuat sendiri detik yang beralalu
//parameters : jam, menit, detik, bulan, tanggal, tahun
// $birth_second = mktime(0,0,0,2,23,2005);
// echo date("l d-M-Y", $birth_second);

//strtotime 
// $birth_second = strtotime("23 feb 2005");
// echo date("l d-M-Y", $birth_second);

//string functions : strlen(), strcmp(), explode(), htmlspecialchars()
//utility : var_dump(), isset(), empty(), die(), sleep()
?>