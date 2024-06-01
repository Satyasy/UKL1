<?php
session_start();
require ('service/database.php');

if (!isset($_SESSION["login"])) {
    header("Location:Register/login.php");
    exit;
}

$sql = "SELECT k.nama, k.id_kuliner, k.gambar, k.harga, k.kategori, COALESCE(AVG(u.rating), 0) AS average_rating
        FROM kuliner k
        LEFT JOIN ulasan u ON k.id_kuliner = u.id_kuliner
        GROUP BY k.id_kuliner, k.nama, k.gambar, k.harga, k.kategori";
$result = $db->query($sql);

//Kumpulkan Data
$kuliner = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $kuliner[] = $row;
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- -CSS--->
    <link rel="stylesheet" href="/dist/style.css" />
    <title>Kuliner dan Oleh-Oleh</title>
</head>

<body>
    <?php include "./layout/header.php" ?>
    <!-- Home Section -->
    <section class="home-kuliner">
        <div class="home-text2">
            <h1> Temukan Kuliner dan Oleh-Oleh <br> Yang Anda Inginkan! </h1>
        </div>
    </section>

    <!-- Tour Section Design -->
    <section class="tour">
        <div class="center-text">

            <h2>Paling Nikmat!</h2>
        </div>

        <div class="tour-content">

            <?php
            // Define a counter variable
            $counter = 0;
            foreach ($kuliner as $row):
                // Break the loop if counter reaches 4
                if ($counter >= 4)
                    break;
                ?>
                <div class="tour-content">
                    <div class="box">
                        <img src="/img/upload/<?= htmlspecialchars($row['gambar']); ?>" />
                        <h6><?= htmlspecialchars($row['nama']); ?></h6>
                    </div>
                </div>
                <?php
                // Increment the counter
                $counter++;
            endforeach;
            ?>

        </div>

        <div class="center-btn">
            <a href="#find" class="btn">Ayo Jalan</a>
        </div>
    </section>


    <!-- Search Kuliner -->
    <section class="form">
        <form>
            <h2>Ketik Apa yang anda cari dibawah</h2>
            <div class="search">
                <span class="material-symbols-outlined">
                    search
                </span>
                <input type="search" class="search-input" id="find" placeholder="Masukkan nama kuliner atau oleh-oleh"
                    onkeyup="search()" />
            </div>
            <div class="product-list">
                <?php foreach ($kuliner as $row): ?>
                    <div class="product">
                        <img src="/img/upload/<?= $row['gambar']; ?>" />
                        <h3><?= $row['nama']; ?></h3>
                        <p class="jam">Harga Rata-rata: <span>Rp. <?= $row['harga']; ?></span></p>
                        <p class="jam">kategori: <span><?= $row['kategori']; ?></span></p>
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
                                <?= htmlspecialchars($rating) ?> / 5 dari beberapa ulasan.
                            </p>
                            <button class="btn btn-rate"><a
                                    href="product.php?id_kuliner=<?= htmlspecialchars($row['id_kuliner']); ?>">Selengkapnya</a></button>
                        </div>
                    </div>
                <?php endforeach; ?>
        </form>
    </section>

    <?php include "../UKL/layout/footer.php" ?>
    <script src="js/script.js"></script>
</body>

</html>