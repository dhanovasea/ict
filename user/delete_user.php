<?php
// Include file koneksi database (perbaiki jalur)
include '../../include/koneksi.php';
session_start();

// Validasi sesi dan hak akses
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || !isset($_SESSION['hak_akses']) || $_SESSION['hak_akses'] !== 'admin') {
    header("Location: ../../index.php?pesan=belum_login");
    exit();
}

// Validasi ID
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../user.php?pesan=invalid_id");
    exit();
}
$id = (int)$_GET['id'];

// Cek apakah pengguna ada
$stmt_check = mysqli_prepare($koneksi, "SELECT id FROM user_admin WHERE id = ?");
mysqli_stmt_bind_param($stmt_check, "i", $id);
mysqli_stmt_execute($stmt_check);
mysqli_stmt_store_result($stmt_check);

if (mysqli_stmt_num_rows($stmt_check) === 0) {
    header("Location: ../user.php?pesan=user_not_found");
    exit();
}
mysqli_stmt_close($stmt_check);

// Hapus pengguna
$stmt = mysqli_prepare($koneksi, "DELETE FROM user_admin WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
if (mysqli_stmt_execute($stmt)) {
    header("Location: ../user.php?pesan=delete_success");
} else {
    header("Location: ../user.php?pesan=delete_failed");
}
mysqli_stmt_close($stmt);
exit();
?>