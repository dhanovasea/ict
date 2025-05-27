<?php
if(!isset($_SESSION))
{ session_start(); } 
 
// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php?pesan=belum_login");
}

include '../include/koneksi.php';

$sim = $_POST['sim'];

if($sim='1'){
    echo "Simpan Baru";

}else($sim='2'){
    echo "Simpan Edit";
    /*
    $ipx = $_POST['tanggal'];
    $serverx = $_POST['server'];
    $upwinx = $_POST['upwin'];
    $upantx = $_POST['upant'];
    $upsctx = $_POST['upsct'];
    $storagex = $_POST['storage'];
    $netacsx = $_POST['netacs'];
    $webascx = $_POST['webasc'];
    $syslogx = $_POST['syslog'];
    $restartx = $_POST['restart'];

    //query update
    $query = "UPDATE Ckserver SET komserver='$serverx', upwin='$upwinx', upant='$upantx', upsct='$upsctx', storage='$storagex', netacs='$netacsx', webacs='$webacsx', syslog='$syslogx', restart='$restartx' WHERE tanggal='$ipx'";

    if (mysqli_query($koneksi,$query)) {
     # credirect ke page index
     header("location:ip.php?k=cibubur"); 
    }
    else{
     echo "ERROR, data gagal diupdate". mysqli_error($koneksi); 
    }
    echo $query;
    //mysql_close($host);
    */
}
?>
