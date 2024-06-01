<?php
session_start();
require ('service/database.php');

if (!isset($_SESSION["login"])) {
  header("Location:Register/login.php");
  exit;
}

// Query to get wisata details along with their average ratings
$sql = "SELECT w.nama, w.id_wisata, w.gambar, w.jam_buka, w.jam_tutup, w.biaya_masuk, 
               COALESCE(AVG(u.rating), 0) AS average_rating
        FROM wisata w
        LEFT JOIN ulasan u ON w.id_wisata = u.id_wisata
        GROUP BY w.id_wisata, w.nama, w.gambar, w.jam_buka, w.jam_tutup, w.biaya_masuk";
$result = $db->query($sql);

// Kumpulkan data 
$wisata = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $wisata[] = $row;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=0.75" />
  <!--ICONs-->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

  <!--Fonts Google-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

  <title>Destinasi</title>
  <link rel="stylesheet" href="/dist/style.css" />
</head>
<body>
  <?php require "./layout/header.php" ?>
  <!-- Home Section -->
  <section class="home-destinasi">
    <div class="home-text">
      <h1>Pilihlah Wisata dan Destinasi <br />yang ingin anda tuju!</h1>
    </div>
  </section>

  <!-- Destinasi Section -->
  <section class="budaya">
    <div class="budaya-text">
      <h5>Banyuwangi</h5>
      <h2>Banyuwangi memiliki segudang budaya yang unik dan indah.</h2>
      <p>
        Sering dijuluki sebagai kota dengan segudang budaya, Banyuwangi memang
        memiliki budaya yang begitu banyak, yang begitu terkenal adalah
        tariannya yaitu Tari Gandrung yang sudah lama menjadi ikonik Kabupaten
        Banyuwangi,
      </p>
      <a href="#" class="btn">Cari Destinasi!</a>
    </div>
    <div class="budaya-img">
      <img src="img/c1.jpeg" />
    </div>
  </section>

  <!-- Search Destinasi -->
  <section class="cari-dest">
    <form>
      <h2>Ketik Apa yang anda cari dibawah</h2>
      <div class="search">
        <span class="material-symbols-outlined"> search </span>
        <input type="search" class="search-input" id="find" placeholder="Masukkan nama Kuliner atau Oleh-oleh" onkeyup="search()" />
      </div>
      <div class="product-list">
        <?php foreach ($wisata as $row): ?>
          <div class="product">
            <img src="/img/upload/<?= $row['gambar']; ?>" />
            <h3><?= $row['nama']; ?></h3>
            <p class="jam">Jam Operasional: <span><?= $row['jam_buka']; ?> - <?= $row['jam_tutup']; ?></span></p>
            <p class="jam">Biaya Masuk: <span>Rp.<?= $row['biaya_masuk']; ?></span></p>
            <div class="rating">
              <?php
              $rating = round($row['average_rating']);
              for ($i = 1; $i <= $rating; $i++): ?>
                <span><i class="ri-star-fill"></i></span>
              <?php endfor;
              for ($i = $rating + 1; $i <= 5; $i++): ?>
                <span><i class="ri-star-line"></i></span> <!-- Menggunakan ikon bintang kosong -->
              <?php endfor; ?>
              <br />
              <p style="text-transform: capitalize; margin-top: 5px; margin-bottom:20px;">
                        <?= $rating ?> / 5 dari beberapa ulasan.
                    </p>
              <button class="btn btn-rate"><a href="product.php?id_wisata=<?= $row['id_wisata']; ?>">Selengkapnya</a></button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </form>
  </section>

  <?php include "../UKL/layout/footer.php" ?>
  <script src="js/script.js"></script>
</body>
</html>
