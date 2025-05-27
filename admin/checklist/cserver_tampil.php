<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Portal IT /</span> Checklist</h4>                   

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
                          data-bs-target="#CServer"
                          aria-controls="navs-pills-justified-home"
                          aria-selected="true"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> Server
                          <!--<span class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">3</span>-->
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link btn-sm"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#CRouter"
                          aria-controls="navs-pills-justified-profile"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> Router
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
                          <i class="tf-icons bx bx-sitemap"></i> 
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
                          <i class="tf-icons bx bx-sitemap"></i> 
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
                          <i class="tf-icons bx bx-sitemap"></i> 
                        </button>
                      </li>
					  <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#ip-printer"
                          aria-controls="navs-pills-justified-messages"
                          aria-selected="false"
                        >
                          <i class="tf-icons bx bx-sitemap"></i> 
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="CServer" role="tabpanel">
						<?php include "server_list.php"; ?>
                      </div>
                      <div class="tab-pane fade" id="CRouter" role="tabpanel">
						<?php include "crouter_form.php"; ?>
                      </div>
                      <div class="tab-pane fade" id="ip-kosong" role="tabpanel">                        
						<?php //include "ip_data_kosong.php"; ?>
                      </div>
					  <div class="tab-pane fade" id="ip-server" role="tabpanel">                        
						<?php //include "ip_data_server.php"; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

                
                </div>
              </div>
            </div>