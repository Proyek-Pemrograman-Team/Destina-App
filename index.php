<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'user') {
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Destina</title>
  <link rel="stylesheet" href="style1.css" />
</head>

<body>
  <header>
  <div class="logo">
    <a href="index.php">
      <img src="Asset/Logo.png" alt="Logo Home">
    </a>
  </div>

  <!-- Form pencarian wisata -->
  <form id="searchForm">
    <input
      type="text"
      name="search"
      placeholder="Cari nama wisata..."
      class="search-bar"
    />
  </form>

  <nav>
    <div class="profile">
      <a href="php/logout.php" class="register-link">Logout</a>
    </div>
  </nav>
</header>

  <main>
    <div class="bg-main">
      <section class="hero">
        <div class="hero-text">
          <div class="hero-title">
            <h1>Temukan Destinasi Impianmu di Sekitar Daerahmu!</h1>
          </div>
          <form id="filterForm">
            <div class="filter-dropdowns">
              <h3 class="filter-title">Filter Wisata</h3>
              <div class="row">
                <select name="provinsi" class="filter-select">
                  <option value="">Provinsi</option>
                  <option value="DIY">DIY</option>
                  <option value="Jawa Tengah">Jawa Tengah</option>
                  <option value="Jawa Timur">Jawa Timur</option>
                  <option value="Jawa Barat">Jawa Barat</option>
                </select>
                <select name="kategori" class="filter-select">
                  <option value="">Kategori</option>
                  <option value="Pegunungan">Pegunungan</option>
                  <option value="Pantai">Pantai</option>
                  <option value="Sejarah & Budaya">Sejarah & Budaya</option>
                </select>
              </div>
              <button type="submit" class="filter-search">Cari</button>
            </div>
          </form>
        </div>
        <div class="hero-image-container">
          <img src="Asset/Borobudur.png" alt="Hero" class="hero-image" />
        </div>
      </section>

      <section class="destinations">
        <div class="section-heading">
          <h2>Destinasi:</h2>
        </div>
        <div class="cards" id="wisata-container">
          <!-- Data wisata akan dimuat oleh JavaScript -->
        </div>
      </section>
    </div>
  </main>

  <footer>
    <div class="footer-logo">
      <img src="Asset/Logo.png" alt="Destina Logo">
    </div>
    <div class="footer-col">
      <h4>About Us</h4>
      <p>Destina adalah aplikasi pencari tempat wisata berbasis web atau mobile yang memudahkan pengguna dalam menemukan informasi wisata lokal berdasarkan lokasi dan kategori tertentu.</p>
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
        <a href="#"><img src="Asset/WA.png" alt="WA"></a>
        <a href="#"><img src="Asset/IG.png" alt="IG"></a>
      </div>
    </div>
  </footer>

  <script>
    const container = document.getElementById("wisata-container");

    function loadWisata(params = '') {
      fetch("php/search_filter.php" + (params ? '?' + params : ''))
        .then(response => response.json())
        .then(data => {
          container.innerHTML = '';

          if (data.length === 0) {
            container.innerHTML = '<p>Tidak ada hasil ditemukan.</p>';
            return;
          }

          data.forEach(wisata => {
            const card = document.createElement("button");
            card.className = "card";
            card.onclick = () => window.location.href = `detail/detail.php?id=${wisata.id}`;
            card.innerHTML = `
              <img src="php/uploads/${wisata.foto}" alt="${wisata.nama}">
              <h3>${wisata.nama}</h3>
              <p>${wisata.deskripsi.substring(0, 80)}...</p>
            `;
            container.appendChild(card);
          });
        })
        .catch(error => {
          console.error("Gagal memuat data wisata:", error);
          container.innerHTML = '<p>Terjadi kesalahan saat memuat data.</p>';
        });
    }

    // Muat data pertama kali
    loadWisata();

    const filterForm = document.getElementById('filterForm');
    if (filterForm) {
      filterForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const params = new URLSearchParams(formData).toString();
        loadWisata(params);
      });
    }

    const searchForm = document.getElementById("searchForm");
    if (searchForm) {
      searchForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        const params = new URLSearchParams(formData).toString();
        loadWisata(params); // Fungsi ini sudah ada sebelumnya
      });
    }

  </script>
</body>

</html>
