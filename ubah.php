<?php
session_start();
if(!isset ($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
require 'koneksi.php';

$id = $_GET["user_id"];
$users = query("SELECT * FROM users WHERE user_id = $id")[0];



if (isset($_POST["submit"])){

    if (ubah ($_POST) > 0 ){
        echo "
              <script>
                alert('DATA BERHASIL DIUBAH');
                document.location.href = '1.php';
              </script>
        ";
    }else{
        echo "
        <script>
        alert('DATA GAGAL DIUBAH');
        document.location.href = '1.php';
      </script>
        ";
    }
}


?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> Tambah data</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown notifications-menu">
            
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- Profile Image -->
      <br>
      <img class="profile-user-img img-responsive img-circle" src="dist/img/user2-160x160.jpg" alt="User profile picture">
      <!-- Akhir Profile -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header"><center> demo.appsintune@gmail.com</center> </li>
        <li class="active treeview">

            <br>
            <li class="active"><a href="index.php"><i class="fa  fa-home"></i><span> Home</span></a></li>
            <li class="active"><a href="event.php"><i class="fa fa-calendar"></i><span> Event</span> </a></li>
            <li class="active"><a href="profile.php"><i class="fa fa-male"></i> <span> Profile</span></a></li>
            <li class="active"><a href="guest.php"><i class="fa fa-group"></i> <span> Guest</span></a></li>
          
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Data User
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="event.php"><i class=""></i> Event</a></li>
        <li><a href="ubah.php"><i class=""></i> ubah data user</a></li>
      </ol>
    </section>
    
    <br>
    <!-- Event -->
    <div class="row margin-bottom">
      <div class="col-sm-6">
        <img class="img-responsive" src="ubah.png">
      </div>

    <!--col-->  <h1>Ubah data user</h1>
        <form action="" method="post">
            <input type="hidden" name="user_id" value="<?= $users["user_id"];?>">
           <ul>
    
               <li>
                   <label for="nama">NAMA :</label><br>
                   <input type="text" name="nama" id="nama" required
                   value="<?= $users ["nama"];?>">
               </li><br>
               <li>
                   <label for="alamat">ALAMAT :</label><br>
                   <input type="text" name="alamat" id="alamat" required
                   value="<?= $users ["alamat"];?>">
               </li><br>
               <li>
                   <label for="meta">KETERANGAN :</label><br>
                   <input type="text" name="meta" id="meta" required
                   value="<?= $users ["meta"];?>">
               </li><br>
              
              <li>
                   <label for="ikut">IKUT :</label><br>
                   <input type="text" name="ikut" id="ikut"
                   value="<?= $users ["ikut"];?>">
               </li><br>
               
                   <input type="hidden" name="id_event" id="id_event"
                   value="<?= $users ["id_event"];?>">
               <br><br>
               <li>
                  <button type="submit" name="submit">UBAH</button>
              </li>
           </ul> 
        </form>


    <!--/col--> 

    </div>
    <!-- Akhir Event -->

</section>
<!-- /.content -->
</div>

<!-- /.tab-pane -->
</div>
</aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>




  





   