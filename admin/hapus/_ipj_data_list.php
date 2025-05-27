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
$result = mysqli_query($koneksi, 'SELECT * FROM IPJ');

?>

	     <div class="card">
                <h5 class="card-header">Data IP Address 192.168.2.0/24</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>IP Address</th>
                        <th>Host</th>
                        <th>Location</th>
			<th>Level</th>
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
			            if ($user_data['Level'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['Level']."</td>"; }
			            if ($user_data['Mac'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['Mac']."</td>"; }
			            if ($user_data['Status'] == NULL) { 
				        echo "<td><span class='badge bg-label-warning me-1'>Null</span></td>"; }
                      	else if ($user_data['Status'] == "---") { echo "<td>".$user_data['Status']."</td>"; }
			            else  { echo "<td><span class='badge bg-label-success me-1'>".$user_data['Status']."</span></td>"; }
                        echo "<td>
				
				<a class='dropdown-item' href='ip.php?d=F$user_data[IP]'><i class='bx bx-edit-alt me-1'></i> Edit</a> "; ?>
			<?php
			echo "</td>                       
                      </tr>"; $no=$no+1;
		      }
    		      ?>                      
                    </tbody>
                  </table>
                </div>
              </div>



			
	