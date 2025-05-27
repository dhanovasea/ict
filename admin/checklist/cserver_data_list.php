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
$result = mysqli_query($koneksi, 'SELECT * FROM Ckserver');

?>

	     <div class="card">
                <h5 class="card-header">Data IP Address 192.168.1.0/24</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Server</th>
                        <th>Update <br/> Windows</th>
                        <th>Update <br/> Antivirus</th>
                        <th>Update <br/> Security</th>
                        <th>Storage <br/> Capasity</th>
												<th>Network <br/> Access</th>
												<th>Website <br/> Access</th>
												<th>System <br/> Log</th>
												<th>Restart</th>
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
                      echo "<td>".$user_data['tanggal']."</td>";
                  if ($user_data['komserver'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['komserver']."</td>"; }
			            if ($user_data['upwind'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['updwind']."</td>"; }
			            if ($user_data['upant'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['upant']."</td>"; }
			            if ($user_data['upsct'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['upsct']."</td>"; }
                  if ($user_data['storage'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['storage']."</td>"; }
                  if ($user_data['netacs'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['netacs']."</td>"; }
                  if ($user_data['webacs'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['webacs']."</td>"; }
                  if ($user_data['syslog'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['syslog']."</td>"; }
                  if ($user_data['restart'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['restart']."</td>"; }
			            if ($user_data['Status'] == NULL) { 
				        echo "<td><span class='badge bg-label-warning me-1'>Null</span></td>"; }
                      	else if ($user_data['Status'] == "---") { echo "<td>".$user_data['Status']."</td>"; }
			            else  { echo "<td><span class='badge bg-label-success me-1'>".$user_data['Status']."</span></td>"; }
                        echo "<td>
				
				<a class='dropdown-item' href='ip.php?d=E$user_data[tanggal]'><i class='bx bx-edit-alt me-1'></i> Edit</a> "; ?>
			<?php
			echo "</td>                       
                      </tr>"; $no=$no+1;
		      }
    		      ?>                      
                    </tbody>
                  </table>
                </div>
              </div>



			
	