<?php
include '../php/config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM wisata WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data wisata tidak ditemukan.";
    exit;
}
?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destina - <?= htmlspecialchars($data['nama']) ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="detail-bromo.css">
    </head>
    <body>

    <header>
        <div class="logo">
        <a href="../index.php"><img src="../Asset/Logo.png" alt="Logo Home"></a>
        </div>
        <input type="text" placeholder="Search" class="search-bar"/>
        <nav>
        <div class="profile">
            <a href="../php/logout.php" class="register-link">Logout</a>
        </div>
        </nav>
    </header>

    <div class="container">
        <div class="title"><?= htmlspecialchars($data['nama']) ?></div>

        <div class="location">
        <a href="<?= htmlspecialchars($data['gmap_link']) ?>" target="_blank"><?= htmlspecialchars($data['gmap_link']) ?></a>
        </div>

        <div class="images">
        <div class="img-main">
            <img src="../php/uploads/<?= htmlspecialchars($data['foto']) ?>" alt="<?= $data['nama'] ?>">
        </div>
        <div class="img-secondary">
            <img src="../php/uploads/<?= htmlspecialchars($data['foto']) ?>" alt="<?= $data['nama'] ?>">
            <img src="../php/uploads/<?= htmlspecialchars($data['foto']) ?>" alt="<?= $data['nama'] ?>">
            <img src="../php/uploads/<?= htmlspecialchars($data['foto']) ?>" alt="<?= $data['nama'] ?>">
            <img src="../php/uploads/<?= htmlspecialchars($data['foto']) ?>" alt="<?= $data['nama'] ?>">
        </div>
        </div>

        <div class="desc">
        <?= nl2br(htmlspecialchars($data['deskripsi'])) ?>
        </div>

        <div class="rating">
        4,5 (2.655 ulasan)
        <span class="stars">★★★★★</span>
        </div>

        <div class="info-boxes">
        <div class="box">
            <strong>Jadwal</strong><br>
            <?= htmlspecialchars($data['jam_buka']) ?>
        </div>
        <div class="box">
            <strong>Fasilitas</strong><br>
            <?= htmlspecialchars($data['fasilitas']) ?>
        </div>
        <div class="box">
            <strong>Harga Tiket</strong><br>
            Rp <?= number_format($data['harga']) ?>
        </div>
        </div>
    </div>

    <div class="bg-main">
        <div class="review-boxes">
        <div class="review">
            <strong>Heri Bengkel</strong>
            <p>Tempatnya keren banget, sunrise-nya wajib lihat! <a href="#">Selengkapnya</a></p>
        </div>
        <div class="review">
            <strong>Mamat Tahu Walik</strong>
            <p>Pengalaman luar biasa dengan pemandu ramah. <a href="#">Selengkapnya</a></p>
        </div>
        <div class="review">
            <strong>Edi Galon</strong>
            <p>Wajib datang pagi-pagi biar nggak ramai banget. <a href="#">Selengkapnya</a></p>
        </div>
        <div class="rev-btn">
            <a href="#"><img src="bromo/next.png" alt=""></a>
        </div>
        </div>
    </div>

    <footer>
        <div class="footer-logo"><img src="../Asset/Logo.png" alt="Destina Logo"></div>
        <div class="footer-col">
        <h4>About Us</h4>
        <p>Destina adalah aplikasi pencari tempat wisata yang memudahkan pengguna menemukan wisata lokal terbaik.</p>
        </div>
        <div class="footer-col">
        <h4>Help</h4>
        <ul>
            <li><a href="#">Peringatan Risiko</a></li>
            <li><a href="#">Layanan Pengaduan</a></li>
        </ul>
        </div>
        <div class="footer-col-social">
        <h4>Contact Us</h4>
        <div class="social-icons">
            <a href="#"><img src="../Asset/WA.png" alt="WA"></a>
            <a href="#"><img src="../Asset/IG.png" alt="IG"></a>
        </div>
        </div>
    </footer>

    </body>
    </html>
