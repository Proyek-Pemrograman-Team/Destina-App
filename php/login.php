<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil input dari form login
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Cari user berdasarkan email
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if ($query && mysqli_num_rows($query) > 0) {
        $user = mysqli_fetch_assoc($query);

        // COCOKKAN langsung (tanpa hash)
        if ($password === $user['password']) {
            // Login berhasil
            $_SESSION['id']    = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role']  = $user['role'];

            // Redirect sesuai role
            if ($user['role'] === 'admin') {
                header("Location: ../Admin/data.php");
            } else {
                header("Location: ../index.php");
            }
            exit();
        }
    }

    // Jika gagal login
    echo "<script>
            alert('Email atau Password salah!');
            window.location.href='../login.html';
        </script>";
}
?>
