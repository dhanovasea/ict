<?php
if(!isset($_SESSION))
{ session_start(); } 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}

include '../include/koneksi.php';

$ipx = $_POST['ip'];
$hostx = $_POST['host'];
$lokasix = $_POST['lokasi'];
$levelx = $_POST['level'];
$macx = $_POST['mac'];

//query update
$query = "UPDATE IPC SET Host='$hostx', Lokasi='$lokasix', Level='$levelx', Mac='$macx' WHERE IP='$ipx'";

if (mysqli_query($koneksi,$query)) {
 # credirect ke page index
 header("location:ip.php?k=cibubur"); 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi); 
}
echo $query;
//mysql_close($host);
?>
