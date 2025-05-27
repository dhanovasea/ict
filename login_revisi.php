<?php
// start the session
session_start();

// include the database connection
include "include/koneksi.php";

// get the user input from the form
$username = $_POST['email-username'];
$password = $_POST['password'];

// hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// prepare a statement to select the user from the database
$stmt = $koneksi->prepare("SELECT * FROM user_admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// check if the user exists
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $stored_password = $row["password"];
    $hak_akses = $row["hak_akses"];

    // verify the password
    if (password_verify($password, $stored_password)) {
        // set session variables
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        $_SESSION['hak_akses'] = $hak_akses;

        // redirect to the dashboard
        header("location: admin/dashboard.php");
        exit();
    } else {
        // password doesn't match
        header("location: index.php?pesan=gagal");
        exit();
    }
} else {
    // user doesn't exist
    header("location: index.php?pesan=gagal");
    exit();
}
?>
