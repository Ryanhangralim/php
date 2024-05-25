<?php 
session_start();

require 'functions.php';

//cek cookie

if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
    $id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    // ambil username berdasarkan id
    $result = query("SELECT username FROM user WHERE id = '$id'");

    //cek cookie and username
    if( $key === hash("sha256", $result["username"])){
        $_SESSION["login"] = true;
    }
}

// if (isset($_COOKIE["login"])){
//     if($_COOKIE["login"] == 'true'){
//         $_SESSION["login"] = true;
//     }
// }

// cek jika sudah pernah login
if ( isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}


if(isset($_POST["login"])){
    //result[0]:query result, result[1]:result code
    $result = login($_POST);
    $row = $result[0];
    $return_code = $result[1];
    if( $return_code === 0){
        //set session
        $_SESSION["login"] = true;

        //cek remember me
        if(isset($_POST["remember"])){
            //buat cookie
            setcookie('id', $row['id'], time()+60);
            setcookie('key', hash('sha256', $row["username"]), time()+60);
        }

        header("Location: index.php");
        exit;
    } elseif( $return_code === 1){
        $error = "Password Salah";
    } elseif( $return_code === 2){
        $error = "Username Belum Terdaftar";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    
    <h1>Halaman Login</h1>
    <?php if (isset($error)):?>
        <p style="color:red; font-style: italic;">Error : <?= $error;?></p>
        <?php endif;?>

    <form action="" method="post">
        <li>
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required>
        </li> 
        <li>
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember Me</label>
        </li>
        <li>
            <button type="submit" name="login">Login!</button>
        </li>       
    </form>
    <a href="registrasi.php">Buat akun</a>

</body>
</html>