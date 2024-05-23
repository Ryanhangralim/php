<?php 

function get_time(){
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $time =  date("H", time());

    if($time > 19 && $time < 4){
        $time_of_day = "Malam";
    }
    elseif ($time >= 4 && $time < 12){
        $time_of_day = "Pagi";
    }
    elseif ($time >=12 && $time < 3){
        $time_of_day = "Siang";
    }
    else{
        $time_of_day = "Sore";
    }
    return $time_of_day;
}

function get_message($waktu = null, $nama = "Admin"){
    if($waktu == null){
        $waktu = get_time();
    }
    return "Selamat $waktu, $nama!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<body>
    <h1><?= get_message(null, "Ryan") ?></h1>
</body>
</html>