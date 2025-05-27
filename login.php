<?php 
ob_start();
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include "include/koneksi.php";
 
// menangkap data yang dikirim dari form
$username = $_POST['email-username'];
$password = md5($_POST['password']);
 
// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from user_admin where username='$username' and password='$password'");

while($user_data = mysqli_fetch_array($data)) {
	$hakakses = $user_data['hak_akses'];
}
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$qry = mysqli_fetch_array($data);
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	$_SESSION['hak_akses'] = $hakakses;
	header("location:admin/dashboard.php");
}else{
	header("location:index.php?pesan=gagal");
}
?>