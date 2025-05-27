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

if (($_GET['k'] == 'cibubur') AND (($_SESSION['hak_akses'] == "cibubur") OR ($_SESSION['hak_akses'] == "admin"))) 
	{ $result = mysqli_query($koneksi, 'SELECT * FROM IPC where Status="1"');}

else if (($_GET['k'] == 'jakarta') AND (($_SESSION['hak_akses'] == "jakarta") OR ($_SESSION['hak_akses'] == "admin"))) 
	{ $result = mysqli_query($koneksi, 'SELECT * FROM IPJ where Status="1"');}

?>

	     <div class="card">
                <?php
				if ($_GET['k'] == 'cibubur') 
					{ ?><h5 class="card-header">Data IP Address 192.168.1.0/24</h5>
					<?php } else if ($_GET['k'] == 'jakarta') {?> <h5 class="card-header">Data IP Address 192.168.2.0/24</h5><?php  }
				?>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>IP Address</th>
                        <th>Host</th>
                        <th>Location</th>
						<th>Mac Address</th>
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
                      echo "<td>".$user_data['IP']."</td>";
			            if ($user_data['Host'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['Host']."</td>"; }
			            if ($user_data['Lokasi'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['Lokasi']."</td>"; } 
			            if ($user_data['Mac'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['Mac']."</td>"; }
			            if ($user_data['Status'] == NULL) { 
				        echo "<td><span class='badge bg-label-warning me-1'>Null</span></td>"; }
                      	else if ($user_data['Status'] == "---") { echo "<td>".$user_data['Status']."</td>"; }
						else if ($user_data['Status'] == "1") { echo "<td><span class='badge bg-label-success me-1'>Aktif</span></td>"; }
						else if ($user_data['Status'] == "0") { echo "<td><span class='badge bg-label-warning me-1'>Non Aktif</span></td>"; }
			            else  { echo "<td><span class='badge bg-label-warning me-1'>".$user_data['Status']."</span></td>"; }
                        echo "<td>";
				
				
				if ($_GET['k'] == 'cibubur') 
					{ echo "<a class='dropdown-item' href='ip.php?d=E$user_data[IP]'><i class='bx bx-edit-alt me-1'></i> Edit</a>  <a class='dropdown-item' href='ip.php?d=R$user_data[IP]'><i class='bx bx-edit-alt me-1'></i> Reset</a>"; }
				else if ($_GET['k'] == 'jakarta') { echo "<a class='dropdown-item' href='ip.php?d=F$user_data[IP]'><i class='bx bx-edit-alt me-1'></i> Edit</a>  <a class='dropdown-item' href='ip.php?d=R$user_data[IP]'><i class='bx bx-edit-alt me-1'></i> Reset</a> "; }
			
			echo "</td>                       
                      </tr>"; $no=$no+1;
		      }
    		      ?>                      
                    </tbody>
                  </table>
                </div>
              </div>



			
	