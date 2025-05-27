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

	$idx=substr($_GET["ed"],1,strlen($_GET["ed"]));
	if (substr($_GET['ed'],0,1) == 'E') { 
		$query = mysqli_query($koneksi, "SELECT * FROM TahunAjaran where id='$idx'");
		}
	else if (substr($_GET['d'],0,1) == 'F') { 		
		$query = mysqli_query($koneksi, "SELECT * FROM IPJ where ip='$ipx'");
		}
	//$query = mysqli_query($koneksi, "SELECT * FROM TahunAjaran where id='$id'");	
    while ($data = mysqli_fetch_assoc($query)) 
          {

?>

	<div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT / IP Address /</span> Edit Data</h4>
	      <div class="col-md-12">
                  <div class="card mb-8">                    
                    <div class="card-body"> 
		    <form name="update_ip" method="post" action="tahunajaran/ta_data_edit_simpan.php">
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="idx"
                          placeholder="ID"
                          aria-describedby="floatingInputHelp"
						  Value="<?php echo $idx; ?>"
						  disabled
                        />
                        <label for="floatingInput">ID</label>
					  <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="ta"
						  name="ta"
                          placeholder="2021/2022"
                          aria-describedby="floatingInputHelp"
						  value="<?php echo $data['TA']; ?>"
                        />
                        <label for="floatingInput">Tahun Ajaran</label>                      
						<div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="status"
						  name="status"
                          placeholder="2022/2023"
                          aria-describedby="floatingInputHelp"
						  value="<?php echo $data['Status']; ?>"
                        />
                        <label for="floatingInput">Status</label> 
						                      
				<!--<button type="button" class="btn btn-sm rounded-pill btn-outline-success btn-block">Simpan</button>  -->
				<button type="submit" class="btn btn-sm rounded-pill btn-outline-primary btn-block">Simpan</button>
				</div> 
				<input type="hidden" name="ip" value="<?php echo  $idx; ?>">
				<input type="hidden" name="code" value="<?php echo  substr($_GET['ed'],0,1); ?>">
		    </form>
                    </div>
                  </div>
                </div> 
	     </div>
<?php } ?>
