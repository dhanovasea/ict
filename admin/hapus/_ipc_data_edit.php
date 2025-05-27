<?php 
// mengaktifkan session
if(!isset($_SESSION))
{ session_start(); } 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}

include_once '../include/koneksi.php';
// Check if form is submitted for user update, then redirect to homepage after update


	$ipx=substr($_GET["d"],1,strlen($_GET["d"]));
	$query = mysqli_query($koneksi, "SELECT * FROM IPC where ip='$ipx'");
        while ($data = mysqli_fetch_assoc($query)) 
          {

?>

	<div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT / IP Address /</span> Edit Data</h4>
	      <div class="col-md-12">
                  <div class="card mb-8">                    
                    <div class="card-body"> 
		    <form name="update_ip" method="post" action="ipc_data_edit_simpan.php">
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="ip2"
                          placeholder="IP Address"
                          aria-describedby="floatingInputHelp"
			  Value="<?php echo $ipx; ?>"
			  disabled
                        />
                        <label for="floatingInput">IP Address</label>
			<div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="host"
			  name="host"
                          placeholder="Nama Perangkat ex. Arif PC"
                          aria-describedby="floatingInputHelp"
			  value="<?php echo $data['Host']; ?>"
                        />
                        <label for="floatingInput">Host</label>                      
		        <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="lokasi"
			  name="lokasi"
                          placeholder="Lokasi IP, Ex. R. IT"
                          aria-describedby="floatingInputHelp"
			  value="<?php echo $data['Lokasi']; ?>"
                        />
                        <label for="floatingInput">Lokasi</label> 
			<div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="level"
			  name="level"
                          placeholder="Akademik / Non Akademik"
                          aria-describedby="floatingInputHelp"
			  value="<?php echo $data['Level']; ?>"
                        />
                        <label for="floatingInput">Level</label>                    
                      </div>
		      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="mac"
			  name="mac"
                          placeholder="Mac Address ex. 00:00:00:00:00:00"
                          aria-describedby="floatingInputHelp"
			  value="<?php echo $data['Mac']; ?>"
                        />
                        <label for="floatingInput">Mac Address</label> 
			<div id="floatingInputHelp" class="form-text">&nbsp;</div>                       
                      </div>
		      <div class="form-floating">                        
			<!--<button type="button" class="btn btn-sm rounded-pill btn-outline-success btn-block">Simpan</button>  -->
			<button type="submit" class="btn btn-sm rounded-pill btn-outline-primary btn-block">Simpan</button>
                      </div> <input type="hidden" name="ip" value="<?php echo  $ipx; ?>">
		    </form>
                    </div>
                  </div>
                </div>
	     </div>
<?php } ?>
