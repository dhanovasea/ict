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
$result = mysqli_query($koneksi, 'SELECT * FROM TahunAjaran');
?>

	     <div class="card">				
				<h5 class="card-header">Data Tahun Ajaran</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr class="text-nowrap">
                        <th>#</th>
                        <th>TAHUN AJARAN</th>
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
			            if ($user_data['TA'] == NULL) { echo "<td>Null</td>"; }
                      	else { echo "<td>".$user_data['TA']."</td>"; }			            
			            if ($user_data['Status'] == 0) { 
				        echo "<td><span class='badge bg-label-warning me-1'>Disable</span></td>"; }
                      	else if ($user_data['Status'] == "---") { echo "<td>".$user_data['Status']."</td>"; }
			            else  { echo "<td><span class='badge bg-label-success me-1'>".$user_data['Status']."</span></td>"; }
                        echo "<td>	";
						echo "<a class='dropdown-item' href='tahunajaran.php?ed=E$user_data[id]'><i class='bx bx-edit-alt me-1'></i> Edit</a> ";
						echo "</td>                       
						</tr>"; $no=$no+1;
				  }
				  ?>                      
                  </tbody>
                  </table>
                </div>
              </div>



			
	