<?php
// Include file koneksi database
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
$stmt = mysqli_prepare($koneksi, "SELECT username, hak_akses FROM user_admin WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user) {
    header("Location: ../user.php?pesan=user_not_found");
    exit();
}

// Proses edit pengguna
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $hak_akses = $_POST['hak_akses'];

    // Validasi input
    if (empty($username) || empty($hak_akses)) {
        $message = '<div class="alert alert-danger">Semua kolom harus diisi.</div>';
    } else {
        // Cek apakah username sudah ada (kecuali untuk pengguna ini)
        $stmt_check = mysqli_prepare($koneksi, "SELECT id FROM user_admin WHERE username = ? AND id != ?");
        mysqli_stmt_bind_param($stmt_check, "si", $username, $id);
        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);
        
        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            $message = '<div class="alert alert-danger">Username sudah digunakan.</div>';
        } else {
            // Update pengguna
            $stmt = mysqli_prepare($koneksi, "UPDATE user_admin SET username = ?, hak_akses = ? WHERE id = ?");
            mysqli_stmt_bind_param($stmt, "ssi", $username, $hak_akses, $id);
            if (mysqli_stmt_execute($stmt)) {
                // Perbarui sesi jika pengguna yang diedit adalah pengguna yang sedang login
                if ($_SESSION['username'] === $user['username']) {
                    $_SESSION['hak_akses'] = $hak_akses;
                }
                header("Location: ../user.php?pesan=edit_success");
                exit();
            } else {
                $message = '<div class="alert alert-danger">Gagal mengedit pengguna: ' . mysqli_error($koneksi) . '</div>';
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_stmt_close($stmt_check);
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Edit Pengguna | Portal IT Sekolah Global Mandiri</title>
    <meta name="description" content="Halaman untuk mengedit profil pengguna admin" />
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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">User /</span> Edit Pengguna</h4>
                        <div class="card">
                            <div class="card-body">
                                <?php echo $message; ?>
                                <form method="POST">
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hak Akses</label>
                                        <select class="form-control" name="hak_akses" required>
                                            <option value="admin" <?php echo $user['hak_akses'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                            <option value="cibubur" <?php echo $user['hak_akses'] === 'cibubur' ? 'selected' : ''; ?>>Cibubur</option>
                                            <option value="jakarta" <?php echo $user['hak_akses'] === 'jakarta' ? 'selected' : ''; ?>>Jakarta</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="../user.php" class="btn btn-secondary">Kembali</a>
                                    <a href="reset_password.php?id=<?php echo $id; ?>" class="btn btn-warning">Reset Password</a>
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