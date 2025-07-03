<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = $_POST['nama'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    // Validasi konfirmasi password
    if ($password !== $confirm) {
        echo "<script>alert('Password tidak cocok!'); window.location.href='../register.html';</script>";
        exit;
    }

    // Role otomatis diset user
    $role = 'user';

    // Simpan ke database (tanpa password hash)
    $insert = mysqli_query($conn, "INSERT INTO users (nama, email, password, role) VALUES ('$nama', '$email', '$password', '$role')");

    if ($insert) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../login.html';</script>";
    } else {
        echo "<script>alert('Registrasi gagal! Mungkin email sudah terdaftar.'); window.location.href='../register.html';</script>";
    }
}
?>
