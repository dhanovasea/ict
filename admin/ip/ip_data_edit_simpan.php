<?php
if(!isset($_SESSION))
{ session_start(); } 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../../index.php?pesan=belum_login");
}

include '../../include/koneksi.php';
if (isset($_POST['ip']) AND isset($_POST['host']) AND isset($_POST['lokasi']) AND isset($_POST['level']) AND isset($_POST['mac']) AND isset($_POST['code'])) {
$ipx = $_POST['ip'];
$hostx = $_POST['host'];
$lokasix = $_POST['lokasi'];
$levelx = $_POST['level'];
$macx = $_POST['mac'];
$statusx = $_POST['status'];
$typex = $_POST['type'];
$codex = $_POST['code'];
}

//query update
//$query = "UPDATE IPC SET Host='$hostx', Lokasi='$lokasix', Level='$levelx', Mac='$macx' WHERE IP='$ipx'";
if ($codex == 'E') { 
		$query = "UPDATE IPC SET Host='$hostx', Lokasi='$lokasix', Level='$levelx', Mac='$macx', Type='$typex',Status='$statusx' WHERE IP='$ipx'";
		}
else if ($codex == 'F') { 		
		$query = "UPDATE IPJ SET Host='$hostx', Lokasi='$lokasix', Level='$levelx', Mac='$macx', Type='$typex', Status='$statusx' WHERE IP='$ipx'";
		}	

if (mysqli_query($koneksi,$query)) {
 # credirect ke page index
 //header("location:ip.php?k=cibubur"); 
 if ($codex == 'E') { 
		header("location:../ip.php?k=cibubur"); 
		}
 else if ($codex == 'F') { 		
		header("location:../ip.php?k=jakarta"); 
		}	
 
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($koneksi); 
}
echo $query."/".$codex;
//mysql_close($host);
?>
