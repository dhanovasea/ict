<?php
// Include file koneksi database
include '../include/koneksi.php';

// Aktifkan sesi
session_start();

// Validasi sesi dan hak akses
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || !isset($_SESSION['hak_akses']) || $_SESSION['hak_akses'] !== 'admin') {
    header("Location: ../index.php?pesan=belum_login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    
    <!-- Judul halaman -->
    <title>Manajemen Pengguna | Portal IT Sekolah Global Mandiri</title>
    
    <meta name="description" content="Halaman untuk mengelola pengguna sistem admin" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <script src="../assets/js/config.js"></script>
</head>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <?php include 'menu.php'; ?>
            <!-- / Menu -->

            <!-- Layout page -->
            <div class="layout-page">
                <!-- Navbar -->
                <?php include 'header.php'; ?>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Tampilkan User</h4>
                        
                        <!-- Notifikasi -->
                        <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] === 'add_success') {
                                echo '<div class="alert alert-success">Pengguna berhasil ditambahkan.</div>';
                            } elseif ($_GET['pesan'] === 'edit_success') {
                                echo '<div class="alert alert-success">Pengguna berhasil diedit.</div>';
                            } elseif ($_GET['pesan'] === 'delete_success') {
                                echo '<div class="alert alert-success">Pengguna berhasil dihapus.</div>';
                            } elseif ($_GET['pesan'] === 'reset_success') {
                                echo '<div class="alert alert-success">Kata sandi berhasil direset.</div>';
                            } elseif ($_GET['pesan'] === 'invalid_id') {
                                echo '<div class="alert alert-danger">ID pengguna tidak valid.</div>';
                            } elseif ($_GET['pesan'] === 'user_not_found') {
                                echo '<div class="alert alert-danger">Pengguna tidak ditemukan.</div>';
                            } elseif ($_GET['pesan'] === 'delete_failed') {
                                echo '<div class="alert alert-danger">Gagal menghapus pengguna.</div>';
                            }
                        }
                        ?>

                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Data User</h5>
                                <a href="user/add_user.php" class="btn btn-primary">Tambah User</a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Username</th>
                                            <th>Hak Akses</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Query untuk mengambil data pengguna
                                        $stmt = mysqli_prepare($koneksi, "SELECT id, username, hak_akses FROM user_admin");
                                        if ($stmt === false) {
                                            die("Error preparing statement: " . mysqli_error($koneksi));
                                        }
                                        mysqli_stmt_execute($stmt);
                                        $result = mysqli_stmt_get_result($stmt);
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            // Status default 'Active' karena tidak ada kolom status
                                            $status = 'Active';
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                                <td><?php echo htmlspecialchars($row['hak_akses']); ?></td>
                                                <td><span class="badge bg-label-success"><?php echo $status; ?></span></td>
                                                <td>
                                                    <a href="user/edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <a href="user/delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Delete</a>
                                                    <a href="user/reset_password.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Reset Password</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        mysqli_stmt_close($stmt);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <?php include 'footer.php'; ?>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- GitHub Buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>