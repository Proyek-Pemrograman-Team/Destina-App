<?php
include '../php/config.php';

if (!isset($_GET['id'])) {
    echo "ID wisata tidak ditemukan.";
    exit();
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM wisata WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data wisata tidak ditemukan.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Wisata</title>
    <link rel="stylesheet" href="../style.css"> <!-- sudah disesuaikan -->
</head>

<body>
    <header>
        <div class="logo">
        <a href="../index.html"><img src="../Asset/Logo.png" alt="Logo Home"></a>
        </div>
    </header>

    <main>
        <div class="detail-container">
            <h1><?= htmlspecialchars($data['nama']) ?></h1>
            <img src="../php/uploads/<?= htmlspecialchars($data['foto']) ?>" alt="<?= htmlspecialchars($data['nama']) ?>" width="400" style="border-radius: 10px;">
            <p><strong>Deskripsi:</strong> <?= nl2br(htmlspecialchars($data['deskripsi'])) ?></p>
            <p><strong>Fasilitas:</strong> <?= htmlspecialchars($data['fasilitas']) ?></p>
            <p><strong>Jam Buka:</strong> <?= htmlspecialchars($data['jam_buka']) ?></p>
            <p><strong>Harga Masuk:</strong> Rp <?= number_format($data['harga']) ?></p>
            <p><strong>Alamat (Google Maps):</strong> <a href="<?= htmlspecialchars($data['gmap_link']) ?>" target="_blank">Lihat Lokasi</a></p>
        </div>
    </main>

    <footer>
        <p>&copy; <?= date("Y") ?> Destina. All rights reserved.</p>
    </footer>
</body>
</html>
