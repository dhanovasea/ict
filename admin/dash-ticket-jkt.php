<?php 
ob_start();
// mengaktifkan session
if(!isset($_SESSION))
{
session_start();  
} 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}

include '../include/koneksi_ticket2.php';
$result = mysqli_query($koneksi, 'SELECT * FROM hesk_tickets WHERE status <> 3 ORDER BY id DESC LIMIT 5');
?>

	     <div class="card">				
				<h5 class="card-header">Data Ticketing SGM Jakarta</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>No Tiket <br> Tanggal <br> Pelapor</th>      
						<th>Subject Laporan</th> 
						<th>Laporan</th> 
                      </tr>
                    </thead>
				  <tbody>
				  <?php
				  $no=1;  
    		      while($user_data = mysqli_fetch_array($result)) {                       
                      echo "<tr>";
                      echo "<th scope='row'>".$no."".$user_data['id']."s".$user_data['status']."</th>";                      
			            	
						if ($user_data['trackid'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['trackid']."<br>".$user_data['dt']."<br>".$user_data['name']."</td>"; }
						
						if ($user_data['subject'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['subject']."</td>"; }
						if ($user_data['message'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['message']."</td>"; }
			            //if ($user_data['Status'] == 0) { 
				        //echo "<td><span class='badge bg-label-warning me-1'>Disable</span></td>"; }
                      	//else if ($user_data['Status'] == "---") { echo "<td>".$user_data['Status']."</td>"; }
			            //else  { echo "<td><span class='badge bg-label-success me-1'>".$user_data['Status']."</span></td>"; }
                        //echo "<td>	";
						//echo "<a class='dropdown-item' href='tahunajaran.php?ed=E$user_data[id]'><i class='bx bx-edit-alt me-1'></i> Edit</a> ";
						//echo "</td>                  
						echo "</tr>"; $no=$no+1;
				  } 
				  ?>                      
                  </tbody>
                  </table>
                </div>
              </div>