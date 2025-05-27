<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
	}
include '../include/koneksi.php';
$result = mysqli_query($koneksi, 'SELECT * FROM user_admin');
?>
<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
.;
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT /</span> Ganti Password</h4>

              <div class="row">
                <div class="col-md-12">
                  
                  <div class="card mb-4">
                    
                    <!-- Account -->
                    
                    <hr class="my-0" />
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST">
                        <div class="row">
                          <div class="mb-3 col-md-12">
                            <label for="firstName" class="form-label">Password Lama</label>
                            <input
                              class="form-control"
                              type="text"
                              id="pwlama"
                              name="pwlama"
                              autofocus
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Password Baru</label>
                            <input 
                              class="form-control" 
                              type="text" 
                              name="pwbaru1" 
                              id="pwbaru1" 
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Password Baru</label>
                            <input
                              class="form-control"
                              type="text"
                              id="pwbaru2"
                              name="pwbaru2"
                            />
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" name="ubah" class="btn btn-primary me-2">Rubah Password</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>

                      <?php
                        if (isset($_POST['ubah'])) {
                          $pwlama=$_POST['pwlama'];
                          $pwbaru1=$_POST['pwbaru1'];
                          $pwbaru2=$_POST['pwbaru2'];
                          echo $pwlama.' '.$pwbaru1.' '.$pwbaru2;

                          if ((empty($pwbaru1)) || (empty($pwbaru2))) {
                            echo "Password tidak boleh kosong";
                          }else{
                            $pwlama=md5($_POST['pwlama']);
                            
                            //pemanggilan password dari database
                            
                            $passdb=md5("welly3");
                            $pwbaru1=md5($_POST['pwbaru1']);
                            $pwbaru2=md5($_POST['pwbaru2']);
                              if($pwbaru1 != $pwbaru2){
                                echo "Password baru tidak sama";
                              }elseif($pwbaru1 == $pwbaru2){
                                
                                //proses update ke database
                                
                                echo "Proses berhasil tersimpan</br>";
                                echo "Password baru ".$pwbaru2;
                              }
                          }
                        }
                      ?>
                    </div>
                    <!-- /Account -->
                  </div>
                  
              </div>
            </div>
      </div>
      </div>
            <!-- / Content -->