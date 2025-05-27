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


	$idx=substr($_GET["s"],1,strlen($_GET["s"]));
	$query = mysqli_query($koneksi, "SELECT * FROM SERVERC where id='$idx'");
        while ($data = mysqli_fetch_assoc($query)) 
          {

?>

	<div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT / Checklist /</span> Server</h4>
	      <div class="col-md-12">
                  <div class="card mb-8">                    
                    <div class="card-body"> 
                    <form name="update_ip" method="post" action="cserver_data_simpan.php">
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="ip2"
                          placeholder="12-02-2022"
                          aria-describedby="floatingInputHelp"
                          Value="<?php echo date('d F Y'); ?>"
			              disabled
                        />
                        <label for="floatingInput">Tanggal</label>
                      </div>

                        <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          id="host"
                          name="server"
                          placeholder="Nama Perangkat ex. Arif PC"
                          aria-describedby="floatingInputHelp"
                          value="<?php echo $data['server']; ?>"
                          disabled
                        />
                        <label for="floatingInput">Komputer Server</label>
                        </div>

		                <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Update Windows" disabled />
                        </div>

			            <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Update Antivirus" disabled />
                        </div>

		                <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Update Security" disabled />
                        </div>

                      <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Storage Capacity" disabled />
                        </div>

                      <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Network Access" disabled />
                        </div>

                      <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Website Access" disabled />
                        </div>

                      <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="System Log" disabled />
                        </div>

                      <div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Restart" disabled />
                        </div>
			                <div id="floatingInputHelp" class="form-text">&nbsp;</div>                       
                      
		                  <div class="form-floating">                        
      			             <!--<button type="button" class="btn btn-sm rounded-pill btn-outline-success btn-block">Simpan</button>  -->
      			             <button type="submit" class="btn btn-sm rounded-pill btn-outline-primary btn-block">Simpan</button>
                      </div> 

                      <input type="hidden" name="tanggal" value="<?php echo  $idx; ?>">
		    </form>
                    </div>
                  </div>
        </div>
	</div>
<?php } ?>
