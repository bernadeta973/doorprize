<?php

$conn = mysqli_connect("localhost","root","","baru");


function query($query){
    global $conn;
    $result = mysqli_query($conn , $query);
    $rows = [];
    while($row = mysqli_fetch_assoc ($result) ){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data ){
    global $conn;
    $nama = htmlspecialchars ($data["nama"]);
    $alamat = htmlspecialchars ($data["alamat"]);
    $meta = htmlspecialchars ($data["meta"]);
    $ikut = htmlspecialchars ($data["ikut"]);
    $id_event = htmlspecialchars ($data["id_event"]);

    $query = "INSERT INTO users
            VALUES
            ('','$nama','$alamat','$meta','$ikut','$id_event')
            ";
    mysqli_query($conn , $query);
    return mysqli_affected_rows($conn);

}
function hapus ($user_id){
    global $conn;
    mysqli_query($conn , "DELETE FROM  users WHERE user_id=$user_id");
    return mysqli_affected_rows($conn);
}


function ubah ($data){
    global $conn;
    $id=$data["user_id"];
    $nama = htmlspecialchars ($data["nama"]);
    $alamat = htmlspecialchars ($data["alamat"]);
    $meta = htmlspecialchars ($data["meta"]);
    $ikut = htmlspecialchars ($data["ikut"]);
    $id_event = htmlspecialchars ($data["id_event"]);

    $query = "UPDATE users SET
                nama = '$nama',
                alamat ='$alamat',
                meta ='$meta',
                ikut ='$ikut',
                id_event='$id_event'
                WHERE user_id=$id
                ";

    mysqli_query($conn , $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM users WHERE 
                nama LIKE'%$keyword%' OR
                alamat LIKE'%$keyword%' OR
                meta LIKE'%$keyword%' OR
                ikut LIKE'%$keyword%'
                ";
                return query($query);
}

function registrasi($data){
    global $conn;

    $name = $data["name"];
    $username = strtolower(stripslashes($data["username"])) ;
    $email = $data["email"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);


    $result = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");
    if (mysqli_fetch_assoc($result)){
        echo "<script>
                alert('username sudah terdaftar')
                </script>";
                return false;
    }


    //cek konfirmasi password
    if( $password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
             </script>";
             return false;
    }
        $password = password_hash($password, PASSWORD_DEFAULT);
       mysqli_query($conn, "INSERT INTO user VALUES('','$name','$username','$email','$password','')");
       return mysqli_affected_rows($conn);

}







function save($data){
    global $conn;

    $firstname = $data["firstname"];
    $lastname = $data["lastname"];
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);



    //cek konfirmasi password
    if( $password !== $password2){
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
             </script>";
             return false;
    }
        $password = password_hash($password, PASSWORD_DEFAULT);
       mysqli_query($conn, " INSERT INTO profil VALUES('','$firstname','$lastname','$password')");
       return mysqli_affected_rows($conn);


}
















function tambahev($data){
    global $conn;
     
    $category= htmlspecialchars($data["category"]);
    $event = htmlspecialchars($data["event"]);
    $tempat = htmlspecialchars($data["tempat"]);
    $date = htmlspecialchars($data["date"]);
    $time = htmlspecialchars($data["time"]);
  
    //upload gambar
    $photo = uploadev();
    if( !$photo){
      return false;
    }
  
    $query = "INSERT INTO event
                VALUES
              ('', '$category', '$event', '$tempat', '$date', '$time', '$photo')
              ";
    mysqli_query($conn, $query);
  
    return mysqli_affected_rows($conn);
  }
  
  function uploadev(){
  
      $namafile = $_FILES['photo']['name'];
      $ukuranFile = $_FILES['photo']['size'];
      $error = $_FILES['photo']['error'];
      $tmpName = $_FILES['photo']['tmp_name'];
  
      //cek apakah tidak ada gambar yang diupload
      if( $error === 4){
          echo "<script>
                  alert('pilih gambar terlebih dahulu');
               </script>";
          return false;
      }
  
      //cek apakah yang diupload adalah gambar
      $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
      $ekstensiGambar = explode('.', $namafile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
          echo "<script>
                  alert('yang anda upload bukan gambar!');
               </script>";
          return false;
      }
  
      //cek jika ukurannya terlalu besar
      if( $ukuranFile > 1000000){
          echo "<script>
                  alert('ukuran gambar terlalu besar!');
               </script>";
          return false;
      }
       
      //lolos pengecekan, gambar siap diupload
      //generate nama gambar baru
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;
     
  
      move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
  
      return $namaFileBaru;
  }
  
  function hapusev($id_event){
      global $conn;
      mysqli_query($conn, "DELETE FROM event WHERE id_event = $id_event");
      return mysqli_affected_rows($conn);
  }
  
  function ubahev($data){
      global $conn;
      
      $id_event = $data["id_event"];
      $category= htmlspecialchars($data["category"]);
      $event = htmlspecialchars($data["event"]);
      $tempat = htmlspecialchars($data["tempat"]);
      $date = htmlspecialchars($data["date"]);
      $time = htmlspecialchars($data["time"]);
      $photoLama = htmlspecialchars($data["photoLama"]);
  
      //cek apakah user pilih gambar baru atau tidak
      if( $_FILES['photo']['error']=== 4){
          $photo = $photoLama;
      } else {
          $photo = uploadev();
      }
     
  
    
      $query = "UPDATE event SET
      
                  category = '$category',
                  event = '$event',
                  tempat = '$tempat',
                  date = '$date',
                  time = '$time'
                  WHERE id_event = $id_event
               ";
  
      mysqli_query($conn, $query);
    
      return mysqli_affected_rows($conn);
  }

?>
