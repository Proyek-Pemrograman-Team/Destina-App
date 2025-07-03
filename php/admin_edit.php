<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Bersihkan input
    $id         = intval($_POST['id']);
    $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
    $provinsi   = mysqli_real_escape_string($conn, $_POST['provinsi']);
    $kategori   = mysqli_real_escape_string($conn, $_POST['kategori']);
    $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $gmap       = mysqli_real_escape_string($conn, $_POST['gmap_link']);
    $jam_buka   = mysqli_real_escape_string($conn, $_POST['jam_buka']);
    $harga      = mysqli_real_escape_string($conn, $_POST['harga']);
    $fasilitas  = mysqli_real_escape_string($conn, $_POST['fasilitas']);

    // Cek apakah user mengunggah gambar baru
    if (!empty($_FILES['foto']['name'])) {
        $foto_name = basename($_FILES['foto']['name']);
        $tmp_name  = $_FILES['foto']['tmp_name'];
        $upload_dir = "uploads/" . $foto_name;

        // Simpan file baru
        if (move_uploaded_file($tmp_name, $upload_dir)) {
            $query = "UPDATE wisata SET 
                        nama='$nama',
                        provinsi='$provinsi',
                        kategori='$kategori',
                        deskripsi='$deskripsi',
                        foto='$foto_name',
                        gmap_link='$gmap',
                        jam_buka='$jam_buka',
                        harga='$harga',
                        fasilitas='$fasilitas'
                        WHERE id=$id";
        } else {
            echo "<script>alert('Gagal mengunggah gambar baru'); window.history.back();</script>";
            exit;
        }
    } else {
        // Update tanpa mengubah gambar
        $query = "UPDATE wisata SET 
                    nama='$nama',
                    provinsi='$provinsi',
                    kategori='$kategori',
                    deskripsi='$deskripsi',
                    gmap_link='$gmap',
                    jam_buka='$jam_buka',
                    harga='$harga',
                    fasilitas='$fasilitas'
                    WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../Admin/data.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data: " . mysqli_error($conn) . "'); window.history.back();</script>";
    }
}
?>
