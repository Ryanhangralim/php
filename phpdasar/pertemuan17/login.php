<?php 
session_start();

// cek jika sudah pernah login
if ( isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'functions.php';

if(isset($_POST["login"])){
    
    if( login($_POST) === 0){
        //set session
        $_SESSION["login"] = true;

        header("Location: index.php");
        exit;
    } elseif(login($_POST) === 1){
        $error = "Password Salah";
    } else{
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
            <button type="submit" name="login">Login!</button>
        </li>       
    </form>
    <a href="registrasi.php">Buat akun</a>

</body>
</html>