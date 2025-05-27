<?php
// mengaktifkan session
if(!isset($_SESSION))
{ session_start(); } 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../../index.php?pesan=belum_login");
}

include "../include/koneksi.php";
// Check if form is submitted for user update, then redirect to homepage after update


	//$ipx=substr($_GET["d"],1,strlen($_GET["d"]));
	//$query = mysqli_query($koneksi, "SELECT * FROM Ckserver where tanggal='$ipx'");
    //    while ($data = mysqli_fetch_assoc($query)) 
         // {

?>

	<div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT / Checklist /</span> Router</h4>
	      <div class="col-md-12">
                  <div class="card mb-8">                    
                    <div class="card-body"> 
		    <form name="update_ip" method="post" action="cserver_data_simpan.php.php?sim='0'">
                      <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Tanggal"
                          aria-describedby="floatingInputHelp"
						  value="<?php echo date('d-M-Y');?>"
						  disabled
                        />
                        <label for="floatingInput">Tanggal</label>
                      </div>

			          <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
			                    name="server"
                          placeholder="Webserver"
                          aria-describedby="floatingInputHelp"
                        />
                        <label for="floatingInput">Router Cibubur</label>
                      </div>

		             
						
						<div lass="card mb-8">
						
						<div class="input-group">
                        <div class="input-group-text">
                          <input
                            class="form-check-input mt-0"
                            type="checkbox"
                            value=""
                            aria-label="Checkbox for following text input"
                          />
                        <!--</div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Komputer Server" disabled />
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
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Storage Capasity" disabled />
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
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Network Akses" disabled />
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
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Website Akses" disabled />
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
                          />-->
                        </div>
                        <input type="text" class="form-control" aria-label="Text input with checkbox" value="Restart" disabled />
                      </div>
					  </div>
					  <div class="form-floating">
                        <input
                          type="text"
                          class="form-control"
			                    name="ket"
                          placeholder="Keterangan"
                          aria-describedby="floatingInputHelp"
                        />
                        <label for="floatingInput">Keterangan</label>
                      </div>
							
                       
						

			            <div id="floatingInputHelp" class="form-text">&nbsp;</div>                       
                      
		                <div class="form-floating">                        
      			             <!--<button type="button" class="btn btn-sm rounded-pill btn-outline-success btn-block">Simpan</button>  -->
      			             <button type="submit" class="btn btn-sm rounded-pill btn-outline-primary btn-block">Simpan</button>
						
					    </div>

                      <input type="hidden" name="tanggal" value="<?php //echo  $ipx; ?>">
		    </form>
                    </div>
                  </div>
        </div>
	</div>
<?php //} ?>