<?php
$host = "localhost";
$user = "root";
$pass = ""; // kosong jika pakai XAMPP
$db   = "wisata_app";

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
