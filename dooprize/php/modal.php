<?php
include 'koneksi.php';  
?>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<!-- Modal Structure -->
  <div id="modal-peserta" class="modal modal-fixed-footer">
    <div class="modal-content">
            <h3>Daftar Peserta Arisan</h3>
            
                  
            <?php
              $sql = "SELECT*FROM users ORDER BY nama ASC";
              $query = $conn->query($sql);
              if ($query->num_rows > 0) {
                  while ($data = $query->fetch_assoc()) {
                  $nama = $data['nama'];
                  $alamat=$data['alamat'];
                  $kelas = $data['meta'];
                  $ikut = $data['ikut'];
                  $id = $data['user_id'];
                    echo '
                    <ul class="collection" style="margin: 0.5rem 4em 1rem 0"> 
                    
                      <li class="collection-item avatar">
                      <input id="idUser" value="'.$id.'" type="hidden"/>
                        <i class="material-icons circle green">perm_identity</i>
                        <span class="title" id="namaUser">'.$nama.'</span><br>
                        <span class="title" id="alamatUser">'.$alamat.'</span>
                        <p id="kelasUser">'.$kelas.'</p>
                        <p>Ikut : <span id="ikutUser">'.$ikut.'</span></p>
                         <div class="secondary-content"><a href="#modal-edit" class="editButton"><i class="material-icons">mode_edit</i></a> <a href="#!" class="delButton"><i class="material-icons">
						 </i></a></div>
                      </li>
                    </ul>';
                }
              } else {
                echo "<blockquote>
                        Belum ada Peserta terdaftar, Silahkan tambahkan Peserta baru.
                      </blockquote>";
              }
            ?>
          </div>
			<div class="modal-footer">
			  <a class="waves-effect waves-light btn-large modal-action modal-close"><i class="material-icons left">not_interested</i>CLOSE</a>
			</div>
		  </div>


		  


<!-- Modal Structure -->
<div id="modal-hadiah" class="modal modal-fixed-footer">
    <div class="modal-content">
            <h3>HADIAH</h3>
            
                  
          </div>
			<div class="modal-footer">
			  <a class="waves-effect waves-light btn-large modal-action modal-close"><i class="material-icons left">not_interested</i>CLOSE</a>
			</div>
		  </div>








		  
		  

  
<!-- Modal Structure -->
  <div id="modal-pemenang" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h3>Daftar Pemenang Arisan</h3>
    
	<?php
              $sql = "SELECT u.nama, u.alamat, u.user_id, u.meta, u.ikut FROM users u, winers w where u.user_id = w.user_id ORDER BY nama ASC";
              $query = $conn->query($sql);
              if ($query->num_rows > 0) {
                  while ($data = $query->fetch_assoc()) {
                  $nama = $data['nama'];
                  $alamat = $data['alamat'];
                  $kelas = $data['meta'];
                  $ikut = $data['ikut'];
                  $id = $data['user_id'];
                    echo '
                    <ul class="collection" style="margin: 0.5rem 4em 1rem 0"> 
                    
                      <li class="collection-item avatar">
                      <input id="idUser" value="'.$id.'" type="hidden"/>
                        <i class="material-icons circle green">perm_identity</i>
                        <span class="title" id="namaUser">'.$nama.'</span><br>
                        <span class="title" id="alamatUser">'.$alamat.'</span>
                        <p id="kelasUser">'.$kelas.'</p>
                        <p>Ikut : <span id="ikutUser">'.$ikut.'</span></p>
                         <div class="secondary-content"><a href="#modal-edit" class="editButton"><i class="material-icons">mode_edit</i></a> <a href="#!" class="delButton"><i class="material-icons">delete</i></a></div>
                      </li>
                    </ul>';
                }
              } else {
                echo "<blockquote>
                        Belum ada Peserta terdaftar, Silahkan tambahkan Peserta baru.
                      </blockquote>";
              }
            ?>
            
	</div>
    <div class="modal-footer">
      <a class="waves-effect waves-light btn-large modal-action modal-close"><i class="material-icons left">not_interested</i>CLOSE</a>
    </div>
  </div>
  
<!-- Modal Structure -->
  <div id="modal-edit" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Edit data peserta</h4>
      <div class="row">
        <form class="col s12">
        <input type="hidden" id="userID"/>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">account_circle</i>
              <input type="text" class="validate" id="inputNama" placeholder="Nama Peserta">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <i class="material-icons prefix">business</i>
              <input id="inputKelas" type="text" class="validate" placeholder="Kelas">
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
            <i class="material-icons prefix">replay_10</i>
             <input id="inputIkut" type="number" maxlength="" class="validate" placeholder="Jumlah ikut">
            </div>
          </div>
        </form>
      </div>
          
    </div>
    <div class="modal-footer">
      <a class="waves-effect waves-light btn-large modal-action modal-close""><i class="material-icons left">not_interested</i>Batal</a>
      <a class="waves-effect waves-light btn-large" id="saveButton"><i class="material-icons left">done</i>Simpan Perubahan</a>
    </div>
  </div>
  
  <!-- Modal Structure -->
  <div id="modal-filter" class="modal modal-fixed-footer">
    <div class="modal-content">
        <form metod="post" action="validation">
		      <div class="input-field col s12">
            <div class="panel-heading">
              <h4 class="panel-title">
                Pilih Kategori
              </h4>
              <select name="filter" id="filterTamu">
                <option value="all">All</option>
                <option value="input">input</option>
              </select>
             
              <input type="button" value="Submit" id="submitFilter"/>
            </div>
          </div>
        </form>
    </div>
    <div class="modal-footer">
      <a class="waves-effect waves-light btn-large modal-action modal-close"><i class="material-icons left"></i>Batal</a>
    </div>
  </div>
  
  

  </div>
  <!-- Modal Structure -->
<div id="mylogin" class="modal modal-fixed-footer">
	<div class="modal-content">
  <h3>Reset</h3>
<?php
$namaServer = "localhost";
$namaUser = "root";
$password = "";
$namadb = "undian";

// membuat koneksi
$conn = new mysqli($namaServer, $namaUser, $password, $namadb);

// Check koneksi
if ($conn->connect_error) {
    die("Koneksi Error: " . $conn->connect_error);
}

$sql = "DELETE FROM winers where id=18";

if ($conn->query($sql) === TRUE) {
    echo "RESET BERHASIL";
} else {
    echo "Error mendelete record: " . $conn->error;
}

$conn->close();
?>
	</div>
	<div class="modal-footer">
      <a class="waves-effect waves-light btn-large modal-action modal-close""><i class="material-icons left">not_interested</i>CLOSE</a>
    </div>
</div>	

  <script src="js/myjs.js"></script>
