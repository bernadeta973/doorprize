<?php 
session_start();
if(isset ($_SESSION["login"])){
    header("Location: index.php");
    exit;
  }
require 'koneksi.php';

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result=mysqli_query($conn , "SELECT *FROM  user WHERE username='$username'");
    if (mysqli_num_rows($result)=== 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            $_SESSION["login"]=true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login lokapass</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        

        <h4>Masuk ke Locapass</h4>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
        <?php if(isset($error)):?>
        <P style="color:red; font-style: italic">username atau password anda salah</P>
        <?php endif;?>
        <form action="" method="post">

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" id="Username atau email" />
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" id="Password" />
            </div>

            <button type="submit" class="btn btn-success btn-block" name="login">Login</button>

        </form>
            
        </div>

        <div class="col-md-6">
            <!-- isi dengan sesuatu di sini -->
        </div>

    </div>
</div>
    
</body>
</html>
