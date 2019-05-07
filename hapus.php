<?php
session_start();
if(!isset ($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
require 'koneksi.php';
$user_id = $_GET["user_id"];
if( hapus ($user_id) > 0){
    echo "
    <script>
      alert('DATA BERHASIL DI HAPUS');
      document.location.href = '1.php';
    </script>
    ";
    }else{
    echo "
    <script>
    alert('DATA GAGAL DI HAPUS');
    document.location.href = '1.php';
    </script>
    ";
}
?>