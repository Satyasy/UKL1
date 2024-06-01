<?php
session_start();
require 'service/database.php';

if (!isset($_SESSION['login'])) {
    header("Location: Register/login.php");
    exit;
}

$product_id = isset($_GET['id_wisata']) ? $_GET['id_wisata'] : (isset($_GET['id_kuliner']) ? $_GET['id_kuliner'] : null);

if (!$product_id) {
    header("Location: index.php");
    exit;
}

$sql = isset($_GET['id_wisata']) ?
    "SELECT w.*, COALESCE(AVG(u.rating), 0) AS average_rating
     FROM wisata w
     LEFT JOIN ulasan u ON w.id_wisata = u.id_wisata
     WHERE w.id_wisata = $product_id" :
    "SELECT k.*, COALESCE(AVG(u.rating), 0) AS average_rating
     FROM kuliner k
     LEFT JOIN ulasan u ON k.id_kuliner = u.id_kuliner
     WHERE k.id_kuliner = $product_id";

$result = $db->query($sql);

if ($result->num_rows === 0) {
    echo "Product not found!";
    exit;
}

$product = $result->fetch_assoc();

$count = isset($product_id) ? "SELECT COUNT(rating) FROM ulasan WHERE id_wisata = '$product_id' OR id_kuliner = '$product_id'" : null;

$count_result = $db->query($count);

// ambil the count of ratings
$count_row = $count_result->fetch_assoc();
$total_ratings = $count_row['COUNT(rating)'];

$ratings_sql = isset($_GET['id_wisata']) ?
    "SELECT p.username, u.waktu, u.komentar, CONCAT(u.rating, '/', 5) AS rating_per_max
     FROM ulasan u
     INNER JOIN pengguna p ON u.id_pengguna = p.id_pengguna
     INNER JOIN (SELECT id_pengguna, MAX(rating) AS max_rating FROM ulasan GROUP BY id_pengguna) AS max_rating
     ON u.id_pengguna = max_rating.id_pengguna
     WHERE u.id_wisata = $product_id" :
    "SELECT 
    pengguna.username, 
    ulasan.komentar,
    CONCAT(ulasan.rating, '/', max_rating.max_rating) AS rating_per_max
FROM 
    ulasan 
INNER JOIN 
    pengguna 
ON 
    ulasan.id_pengguna = pengguna.id_pengguna
INNER JOIN 
    (SELECT 
         id_pengguna, 
         MAX(rating) AS max_rating 
     FROM 
         ulasan 
     GROUP BY 
         id_pengguna) AS max_rating 
ON 
    ulasan.id_pengguna = max_rating.id_pengguna
    WHERE k.id_kuliner = $product_id OR w.id_wisata = $product_id 
    ;
";

$ratings_result = $db->query($ratings_sql);

$usernames = [];
while ($rating = $ratings_result->fetch_assoc()) {
    $usernames[] = htmlspecialchars($rating['username']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ICONs -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../dist/style.css" />
    <title><?= htmlspecialchars($product['nama'] ?? 'Produk') ?></title>
</head>

<body>

    <section class="page">
        <div class="product-page">
            <div class="product-box">
                <div class="img-product">
                    <img src="./img/upload/<?= htmlspecialchars($product['gambar'] ?? '') ?>">
                </div>
                <div class="rate-product">
                    <?php
                    $rating = round($product['average_rating']);
                    for ($i = 1; $i <= $rating; $i++): ?>
                        <span><i class="ri-star-fill"></i></span> <!-- Menggunakan ikon bintang penuh -->
                    <?php endfor;
                    for ($i = $rating + 1; $i <= 5; $i++): ?>
                        <span><i class="ri-star-line"></i></span> <!--  ikon bintang kosong -->
                    <?php endfor; ?>
                    <br>
                    <p style="text-transform: capitalize; margin-top: 5px;">
                        <?= htmlspecialchars($rating) ?> / 5 dari <?= htmlspecialchars($total_ratings)?> Ulasan
                    </p>
                    <br>
                    <h3>Ulasan Pengguna</h3>
                    <div class="ratings-list">
                        <?php
                        $counter = 0;
                        foreach ($ratings_result as $row) {
                            if ($counter >= 4) {
                                break;
                            }
                            ?>
                            <div class="rating-item">
                                <h4>User:<span> <?= htmlspecialchars($row['username'] ?? 'N/A') ?></span></h4>
                                <p style="font-size: 20px; font-weight: 400;">Rating:
                                    <?= htmlspecialchars($row['rating_per_max'] ?? 'N/A') ?></p><br>
                                    <p style="font-size: 18px;"><?= $row['komentar'] ?></p>
                                    <p style="font-style: italic; font-size:15px; text-align:end; margin-top: 10px;" ><?= htmlspecialchars($row['waktu']) ?></p>
                                </div>
                                <?php
                            $counter++;
                        }
                        ?>
                    </div>
                </div>
                <a href="ulasan.php?<?= isset($_GET['id_wisata']) ? 'id_wisata=' . $product_id : 'id_kuliner=' . $product_id ?>&id_pengguna=<?= $_SESSION['id_pengguna'] ?>"
                    class="btn" style="margin-top:5vh;">Berikan Ulasan Anda!</a>
            </div>
            <div class="product-box">
                <div class="text-product">
                    <h2><?= htmlspecialchars($product['nama'] ?? 'Produk') ?></h2> <br>
                    <h4>Fasilitas:</h4>
                    <ul>
                        <?php if (strpos($product['fasilitas'], 'Restoran') !== false): ?>
                            <li><i class="ri-restaurant-line"></i>Restaurant</li>
                        <?php endif; ?>
                        <?php if (strpos($product['fasilitas'], 'Penginapan') !== false): ?>
                            <li><i class="ri-hotel-line"></i>Penginapan</li>
                        <?php endif; ?>
                        <?php if (strpos($product['fasilitas'], 'Pemandian') !== false): ?>
                            <li><i class="bx bx-swim"></i>Pemandian</li>
                        <?php endif; ?>
                        <?php if (strpos($product['fasilitas'], 'Wifi') !== false): ?>
                            <li><i class="ri-wifi-line"></i>Wi-Fi</li>
                        <?php endif; ?>
                        <li><i class="ri-map-2-fill"></i>Lokasi:
                            <?= htmlspecialchars($product['lokasi'] ?? 'N/A') ?>
                        </li>
                        <li><i class="ri-timer-2-line"></i>Jam buka:
                            <?= htmlspecialchars($product['jam_buka'] ?? 'N/A') ?> -
                            <?= htmlspecialchars($product['jam_tutup'] ?? 'N/A') ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-desk">
            <h2>Deskripsi</h2>
            <p>
                <?= nl2br(htmlspecialchars($product['deskripsi'] ?? 'Tidak ada deskripsi.')) ?>
            </p>
            <button class="btn" onclick="window.history.back();">Kembali</button>
        </div>

    </section>

</body>

</html>