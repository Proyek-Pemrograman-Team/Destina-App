<?php
include 'config.php';

// Ambil data filter dari query string
$search   = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$provinsi = isset($_GET['provinsi']) ? mysqli_real_escape_string($conn, $_GET['provinsi']) : '';
$kategori = isset($_GET['kategori']) ? mysqli_real_escape_string($conn, $_GET['kategori']) : '';

// Mulai query dasar
$sql = "SELECT * FROM wisata WHERE 1=1";

// Filter berdasarkan nama
if (!empty($search)) {
    $sql .= " AND nama LIKE '%$search%'";
}

// Filter provinsi
if (!empty($provinsi)) {
    $sql .= " AND provinsi = '$provinsi'";
}

// Filter kategori
if (!empty($kategori)) {
    $sql .= " AND kategori = '$kategori'";
}

$result = mysqli_query($conn, $sql);
$data = [];

// Ambil hasil dan masukkan ke array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Kembalikan hasil dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
