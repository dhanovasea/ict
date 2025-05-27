<?php 
// mengaktifkan session
if(!isset($_SESSION))
{ session_start(); } 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../../index.php?pesan=belum_login");
}

include_once '../include/koneksi.php';
// Check if form is submitted for user update, then redirect to homepage after update

	$ipx=substr($_GET["d"],1,strlen($_GET["d"]));
	$query = mysqli_query($koneksi, "SELECT * FROM TahunAjaran where id='$ipx'");
	if (substr($_GET['d'],0,1) == 'E') { 
		$query = mysqli_query($koneksi, "SELECT * FROM IPC_CCTV where ip='$ipx'");
		}
	else if (substr($_GET['d'],0,1) == 'F') { 		
		$query = mysqli_query($koneksi, "SELECT * FROM IPJ_CCTV where ip='$ipx'");
		}	
		
    while ($data = mysqli_fetch_assoc($query)) 
          {
?>

	<div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT / IP Address CCTV /</span> Edit Data</h4>
	      <div class="col-md-12">
                  <div class="card mb-8">                    
                    <div class="card-body"> 
					<form name="update_ip" method="post" action="cctv/ip_data_edit_simpan.php">
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
                          placeholder="Nama Perangkat ex. Cam IT / NVR Gedung 1"
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
                          placeholder="Lokasi IP Cam/NVR, Ex. R. IT"
                          aria-describedby="floatingInputHelp"
						  value="<?php echo $data['Lokasi']; ?>"
                        />
                        <label for="floatingInput">Lokasi</label> 
						<div class="form-floating">
						<select class="form-select" id="level" name="level" aria-label="Default select example">
						  <?php if ($data['Level']=="1") { ?>"
                          <option value="NULL">Level</option>
                          <option selected value="1">TK</option>
                          <option value="2">SD</option>
						  <option value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } else if ($data['Level']=="2") { ?>"
						  <option value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option selected value="2">SD</option>
						  <option value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } else if ($data['Level']=="3") { ?>"
						  <option value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option value="2">SD</option>
						  <option selected value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } else if ($data['Level']=="4") { ?>"
						  <option value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option value="2">SD</option>
						  <option value="3">SNC</option>
						  <option selected value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } else if ($data['Level']=="5") { ?>"
						  <option value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option value="2">SD</option>
						  <option value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option selected value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } else if ($data['Level']=="6") { ?>"
						  <option value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option value="2">SD</option>
						  <option value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option selected value="6">Staff</option>
						  <option value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } else if ($data['Level']=="7") { ?>"
						  <option value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option value="2">SD</option>
						  <option value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option selected value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } else if ($data['Level']=="8") { ?>"
						  <option value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option value="2">SD</option>
						  <option value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option value="7">IT</option>
						  <option selected value="8">Lain-lain</option>
						  <?php } else { ?>"
						  <option selected value="NULL">Level</option>
                          <option value="1">TK</option>
                          <option value="2">SD</option>
						  <option value="3">SNC</option>
						  <option value="4">SMP</option>
						  <option value="5">SMA</option>
						  <option value="6">Staff</option>
						  <option value="7">IT</option>
						  <option value="8">Lain-lain</option>
						  <?php } ; ?>"
                        </select>
						
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
                      </div>
					  <div class="form-floating">                        
						<select class="form-select" id="type" name="type" aria-label="Default select example">
						  <?php if ($data['Type']=="1") { ?>"
                          <option value="0">Kategori (type)</option>
                          <option selected value="1">DVR/NVR</option>
                          <option value="2">Camera CCTV</option>
						  <option value="3">Lain-lain</option>
						  <?php } else if ($data['Type']=="2") { ?>"
						  <option value="0">Kategori (type)</option>
                          <option value="1">DVR/NVR</option>
                          <option selected value="2">Camera CCTV</option>
						  <option value="6">Lain-lain</option>
						  <?php } else if ($data['Type']=="3") { ?>"
						  <option value="0">Kategori (type)</option>
                          <option value="1">DVR/NVR</option>
                          <option value="2">Camera CCTV</option>
						  <option value="3">Lain-lain</option>
						  
						  <?php } else { ?>"
						  <option selected value="0">Kategori (type)</option>
                          <option value="1">DVR/NVR</option>
                          <option value="2">Camera CCTV</option>
						  <option value="3">Lain-lain</option>
						  <?php } ; ?>"
                        </select>
                        <label for="floatingInput">Kategori (Type)</label>  
                      </div>
					  <div class="form-floating">                        
						<select class="form-select" id="status" name="status" aria-label="Default select example">
						  <?php if ($data['Status']=="1") { ?>"
                          <option value="NULL">Status</option>
                          <option selected value="1">Aktif</option>
                          <option value="0">Non Aktif</option>
						  <?php } else if ($data['Status']=="0") { ?>"
						  <option value="NULL">Status</option>
                          <option value="1">Aktif</option>
                          <option selected value="0">Non Aktif</option>
						  <?php } else { ?>"
						  <option selected value="NULL">Status</option>
                          <option value="1">Aktif</option>
                          <option value="0">Non Aktif</option>
						  <?php } ; ?>"
                        </select>
                        <label for="floatingInput">Status</label>  
						<div id="floatingInputHelp" class="form-text">&nbsp;</div> 
                      </div>
				<div class="form-floating">                        
				<!--<button type="button" class="btn btn-sm rounded-pill btn-outline-success btn-block">Simpan</button>  -->
				<button type="submit" class="btn btn-sm rounded-pill btn-outline-primary btn-block">Simpan</button>
				</div> 
				<input type="hidden" name="ip" value="<?php echo  $ipx; ?>">
				<input type="hidden" name="code" value="<?php echo  substr($_GET['d'],0,1); ?>">
		    </form>
                    </div>
                  </div>
                </div> 
	     </div>
<?php } ?>
