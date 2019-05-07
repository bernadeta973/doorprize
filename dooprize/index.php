<?php
  include './php/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Arisan Online</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/lucky.js"></script>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="dist/sweetalert.min.js"></script>
  <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  <script src="js/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#thisModal").show().load("./php/modal.php");
    $( "#kocok" ).click(function() {     
        $("#pemenang").hide(); // Hide elemen #pemenang
        $("#loader").show(function(){ // Jalankan animasi loading
          setTimeout(function(){ // Delay 3 detik
              $("#loader").fadeOut("slow").hide(); // Tutup animasi loading
              $("#pemenang").show().load("./php/random.php"); // Show element #pemenang
              // Load kontent dalam modal
                  $("#thisModal").show().load("./php/modal.php");
          }, 3000); // Waktu delay
        });
      });
    
  });
  
</script>

  <style>
    .secondary-content > a {
        color: #800000;
    }
    .modal .modal-footer {
      height: 80px;
    }
    .modal .modal-footer .btn, .modal .modal-footer .btn-large, .modal .modal-footer .btn-flat {
      margin: 6px 2px;
	  font: Times New Roman;
    }
    /* Button*/
    #reset {
      cursor: pointer;
    }

    /* Sweet */
    .sweet-alert .sa-icon.sa-custom {
      width: 200px !important;
      height: 200px !important;
    }
    /*modal */
    .modal .modal-content {
        padding: 6px 24px;
    }
    .container {
      color: #800000;
    }
	.modal-dialog {
	
	}
	.row center {
		color: #CCCC33;
	}
	.modal {
		font-family:"times new roman";
	}
  </style>
</head>
<body>

        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <h4><a href="#home" class="navbar-brand page-scroll"><font color="brown">LOKAPASS</font></a></h4>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                   <li data-toggle="modal" data-target="#mydaftar"><a href="index.php"><h4><font color="maroon"><span class="glyphicon glyphicon-home"></span> Dashboard </font></h4> </a></li>
                   <li><a class="modal-trigger" href="#modal-hadiah"><h4><font color="maroon"><span class="glyphicon glyphicon-usd"></span> Hadiah  </font></h4></a></li>
                   <li><a class="modal-trigger" href="#kocok2"><h4><font color="maroon"><span class="glyphicon glyphicon-repeat"></span> Try Again </font></h4></a></li>
                   <li><a class="modal-trigger" href="#modal-pemenang"><h4><font color="maroon"><span class="glyphicon glyphicon-glass"></span> Winner  </font></h4></a></li>
                   <li><a class="modal-trigger" href="#modal-peserta"><h4><font color="maroon"><i class="material-icons left"></i>Peserta</font></h4></a></li>
                   <li><a class="modal-trigger" href="#modal-filter"><h4><font color="maroon"><span class="glyphicon glyphicon-filter"></span> Filter  </font></h4></a></li>
                   <li data-toggle="modal" data-target="#mylogin"><a href="#"><h4><font color="maroon"><span class="glyphicon glyphicon-refresh"></span> Reset  </font></h4></a></li>

                </ul>
            </div>
        </div>
    


  <div class="container">
<div class="section"></div>
<div class="section"></div>
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
      <h1 class="header center maroon-text">Arisan Online</h1>
      
      <br />
      <div class="row center">

        <div class="preloader-wrapper big active" id="loader" style="display:none">
          
          <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

                <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                    <div class="circle"></div>
                  </div><div class="gap-patch">
                    <div class="circle"></div>
                  </div><div class="circle-clipper right">
                    <div class="circle"></div>
                  </div>
                </div>

        </div>
        <h3 class="header col s12 light" id="pemenang">klik "START" untuk memulai !</h3><br>
      
      </div>
      <div class="section"></div>
      <div class="row center" id="kocok2">
        <a  class="btn-large waves-effect waves-light yellow" id="kocok"><i class="material-icons left">loop</i>START</a>
      </div>
      <br><br>
      
    </div>
  </div>


  </div>

 <div id="thisModal"></div>
          



 








  <!--  Scripts-->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>
    <script src="script2.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/myjs.js"></script>
  </body>
</html>
