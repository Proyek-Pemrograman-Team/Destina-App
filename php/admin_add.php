<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama       = $_POST['nama'];
    $provinsi   = $_POST['provinsi'];
    $kategori   = $_POST['kategori'];
    $deskripsi  = $_POST['deskripsi'];
    $gmap       = $_POST['alamat'];
    $jam_buka   = $_POST['jam'];
    $harga      = $_POST['harga'];
    $fasilitas  = $_POST['fasilitas'];

    // Upload gambar
    $foto_name = $_FILES['foto']['name'];
    $tmp_name  = $_FILES['foto']['tmp_name'];
    $upload_dir = "uploads/" . basename($foto_name);

    if (move_uploaded_file($tmp_name, $upload_dir)) {
        $query = "INSERT INTO wisata (nama, provinsi, kategori, deskripsi, foto, gmap_link, jam_buka, harga, fasilitas)
                    VALUES ('$nama', '$provinsi', '$kategori', '$deskripsi', '$foto_name', '$gmap', '$jam_buka', '$harga', '$fasilitas')";
        
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!');window.location='../Admin/data.php';</script>";
        } else {
            echo "Gagal menyimpan ke database: " . mysqli_error($conn);
        }
    } else {
        echo "Upload gambar gagal.";
    }
}
?>
