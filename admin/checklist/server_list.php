<?php 
// mengaktifkan session
if(!isset($_SESSION))
{
session_start();
} 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}

include_once '../include/koneksi.php';

if ($_GET['k'] == 'cibubur') { $result = mysqli_query($koneksi, 'SELECT * FROM SERVERC WHERE kategori="PC"');}
else if ($_GET['k'] == 'jakarta') { $result = mysqli_query($koneksi, 'SELECT * FROM IPJ');}
?>

	     <div class="card">
				<?php
				if ($_GET['k'] == 'cibubur') 
					{ ?><h5 class="card-header">Data Server SGM Cibubur</h5>
					<?php } else if ($_GET['k'] == 'jakarta') {?> <h5 class="card-header">Data Server SGM Jakarta</h5><?php  }
				?>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>IP Address</th>
                        <th>Host</th>
                        <th>Location</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>                      
                      </tr>
                    </thead>
		    <tbody>
		    <?php
		    $no=1;  
    		    while($user_data = mysqli_fetch_array($result)) {                      
                      echo "<tr>";
                      echo "<th scope='row'>".$no."</th>";
                      echo "<td>".$user_data['ip']."</td>";
			            if ($user_data['server'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['server']."</td>"; }
			            if ($user_data['kategori'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['kategori']."</td>"; }			            
			            if ($user_data['kategori'] == NULL) { 
				        echo "<td><span class='badge bg-label-warning me-1'>Null</span></td>"; }
                      	else if ($user_data['kategori'] == "---") { echo "<td>".$user_data['kategori']."</td>"; }
			            else  { echo "<td><span class='badge bg-label-success me-1'>".$user_data['kategori']."</span></td>"; }
                        echo "<td>	";
						
				if ($_GET['k'] == 'cibubur') 
					{ echo "<a class='dropdown-item' href='checklist.php?s=E$user_data[id]'><i class='bx bx-edit-alt me-1'></i> Check List</a> "; }
				else if ($_GET['k'] == 'jakarta') { echo "<a class='dropdown-item' href='checklist.php?d=F$user_data[id]'><i class='bx bx-edit-alt me-1'></i> Check List</a> "; }
			
			echo "</td>                       
                      </tr>"; $no=$no+1;
		      }
    		      ?>                      
                    </tbody>
                  </table>
                </div>
              </div>



			
	