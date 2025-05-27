<?php
// mengaktifkan session
if(!isset($_SESSION))
{ session_start(); } 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}


// include database connection file
include_once '../include/koneksi.php';
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE users SET name='$name',email='$email',mobile='$mobile' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['ipx'];
 
// Fetech user data based on id
$result = mysqli_query($koneksi, "SELECT * FROM ipc WHERE IP=$id");
 
while($ip_data = mysqli_fetch_array($result))
{
	$ip = $ip_data['IP'];
	$host = $ip_data['Host'];
	$lokasi = $ip_data['Lokasi'];
	$level = $ip_data['Level'];
	$mac = $ip_data['Mac'];
	$status = $ip_data['Status'];
}
?>

	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>IP Address</td>
				<td><input type="text" name="ip" value=<?php echo $ip;?>></td>
			</tr>
			<tr> 
				<td>Host</td>
				<td><input type="text" name="host" value=<?php echo $host;?>></td>
			</tr>
			<tr> 
				<td>Lokasi</td>
				<td><input type="text" name="lokasi" value=<?php echo $lokasi;?>></td>
			</tr>
			<tr> 
				<td>Lokasi</td>
				<td><input type="text" name="lokasi" value=<?php echo $lokasi;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['ipx'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>


		<div class="card mb-4">
                    <h5 class="card-header">HTML5 Inputs</h5>
                    <div class="card-body">
                      <div class="mb-3 row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">IP Address</label>
                        <div class="col-md-10">
                          <input class="form-control" type="ip" value=<?php echo $ip;?> id="html5-text-input" />
                        </div>
                      </div>
                      
                    </div>


	</form>
