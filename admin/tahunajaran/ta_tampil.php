<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT / Master Data /</span> Tahun Ajaran</h4>                   

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
                          class="nav-link active btn-sm"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ta-list"
                          aria-controls="navs-pills-justified-home"
                          aria-selected="true"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> Tahun Ajaran
                          <!--<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>-->
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active btn-sm"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ta-tambah"
                          aria-controls="navs-pills-justified-home"
                          aria-selected="true"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> Tambah Tahun ajaran
                          <!--<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>-->
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="ta-list" role="tabpanel">
						<?php include "ta_data_list.php"; ?>
                      </div>
                      <div class="tab-pane fade" id="ta-tambah" role="tabpanel">
						<?php include "ta_data_tambah.php"; ?>
                      </div>
                      <div class="tab-pane fade" id="ip-kosong" role="tabpanel">                        
						<?php include "ip_data_kosong.php"; ?>
                      </div>
					  <div class="tab-pane fade" id="ip-server" role="tabpanel">                        
						<?php include "ip_data_server.php"; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                
                </div>
              </div>
            </div>