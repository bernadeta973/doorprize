<?php
require 'koneksi.php';

$id_event = $_GET["id_event"];

if(hapusev($id_event) > 0){
        echo "
          <script>
            alert('DATA BERHASIL DIHAPUS!');
            document.location.href = 'event.php';
          </script>
        ";
      } else {
        echo "
          <script>
            alert('DATA GAGAL DIHAPUS!');
            document.location.href = 'event.php';
          </script>
        ";
      }


?>