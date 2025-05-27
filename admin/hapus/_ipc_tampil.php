<?php 
include '../include/koneksi.php';
 
// mengaktifkan session
if(!isset($_SESSION)) { session_start(); }
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}

?>

<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT / </span>IP Address</h4>

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                
		<!-- Basic with Icons -->
		

	     <div class="col-xl-12">                 
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ip-list"
                          aria-controls="navs-pills-justified-home"
                          aria-selected="true"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> IP Address List
                          <!--<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>-->
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ip-aktif"
                          aria-controls="navs-pills-justified-profile"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> IP Address Aktif
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ip-kosong"
                          aria-controls="navs-pills-justified-messages"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> IP Address Kosong
                        </button>
                      </li>
		               <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ip-server"
                          aria-controls="navs-pills-justified-messages"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> IP Address Server
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ip-dvr"
                          aria-controls="navs-pills-justified-messages"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> IP Address DVR/NVR
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="ip-list" role="tabpanel">
			            <?php include "ipc_data_list.php"; ?>
                      </div>
                      <div class="tab-pane fade" id="ip-aktif" role="tabpanel">
			            <?php include "ipc_data_aktif.php"; ?>
                      </div>
                      <div class="tab-pane fade" id="ip-kosong" role="tabpanel">                        
			            <?php include "ipc_data_kosong.php"; ?>
                      </div>
		              <div class="tab-pane fade" id="ip-server" role="tabpanel">                        
			            <?php include "ipc_data_server.php"; ?>
                      </div>
                      <div class="tab-pane fade" id="ip-dvr" role="tabpanel">                        
			            <?php include "ipc_data_dvr.php"; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                
                </div>
              </div>
            </div>