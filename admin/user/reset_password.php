<?php
// Include file koneksi database (perbaiki jalur)
include '../../include/koneksi.php';
session_start();

// Validasi sesi dan hak akses
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || !isset($_SESSION['hak_akses']) || $_SESSION['hak_akses'] !== 'admin') {
    header("Location: ../../index.php?pesan=belum_login");
    exit();
}

// Ambil ID pengguna
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../user.php?pesan=invalid_id");
    exit();
}
$id = (int)$_GET['id'];

// Ambil data pengguna
$stmt = mysqli_prepare($koneksi, "SELECT username FROM user_admin WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    header("Location: ../user.php?pesan=user_not_found");
    exit();
}

// Proses reset kata sandi
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validasi input
    if (empty($password) || empty($confirm_password)) {
        $message = '<div class="alert alert-danger">Semua kolom harus diisi.</div>';
    } elseif ($password !== $confirm_password) {
        $message = '<div class="alert alert-danger">Kata sandi tidak cocok.</div>';
    } else {
        $hashed_password = md5($password); // TODO: Ganti dengan password_hash() untuk bcrypt
        $stmt = mysqli_prepare($koneksi, "UPDATE user_admin SET password = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "si", $hashed_password, $id);
        if (mysqli_stmt_execute($stmt)) {
            header("Location: ../user.php?pesan=reset_success");
            exit();
        } else {
            $message = '<div class="alert alert-danger">Gagal mereset kata sandi: ' . mysqli_error($koneksi) . '</div>';
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Reset Kata Sandi | Portal IT Sekolah Global Mandiri</title>
    <meta name="description" content="Halaman untuk mereset kata sandi pengguna admin" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include '../menu.php'; ?>
            <div class="layout-page">
                <?php include '../header.php'; ?>
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Reset Kata Sandi</h4>
                        <div class="card">
                            <div class="card-body">
                                <?php echo $message; ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" value="<?php echo htmlspecialchars($user['username']); ?>" disabled />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Kata Sandi Baru</label>
                                        <input type="password" class="form-control" name="password" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Konfirmasi Kata Sandi</label>
                                        <input type="password" class="form-control" name="confirm_password" required />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="../user.php" class="btn btn-secondary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php include '../footer.php'; ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>