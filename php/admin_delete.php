<?php
include 'config.php';

if (!isset($_GET['id'])) {
  echo "ID tidak ditemukan.";
  exit;
}

$id = intval($_GET['id']);

// Ambil nama file gambar dulu
$get = mysqli_query($conn, "SELECT foto FROM wisata WHERE id = $id");
$data = mysqli_fetch_assoc($get);

if ($data) {
    $foto = $data['foto'];
    $filepath = "uploads/" . $foto;

  // Hapus data dari database
    $delete = mysqli_query($conn, "DELETE FROM wisata WHERE id = $id");

    if ($delete) {
    // Jika ada file gambar, hapus juga
    if (file_exists($filepath)) {
        unlink($filepath);
    }
    header("Location: ../Admin/data.php");
    } else {
        echo "Gagal menghapus data dari database.";
    }
} else {
    echo "Data tidak ditemukan.";
}
?>
