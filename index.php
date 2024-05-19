<?php
session_start();
if (isset($_POST['Logout'])) {
    session_unset();
    header('Location:index.php');
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

    <!-- -CSS--->
    <link rel="stylesheet" href="/dist/style.css" />
    <title>Travo</title>
</head>

<body>
    <?php include "./layout/header.php" ?>
    <!--Home Section-->
    <section class="home">
        <div class="home-text">
            <h2 style="font-size: 28px;
            font-weight:600 ;
            margin-bottom: 10px;
            color: var(--text-color);">Selamat datang</h2>
            <h5>Mari Berpetualang!</h5>
            <h1>
                Petualangan lebih asik<br />
                dengan TRAVO
            </h1>

            <p>
                Banyuwangi adalah sebuah Kebupaten paling ujung timur yang ada di
                pulau jawa. <br />
                Kota ini juga disebut sebagai tempat dengan banyak Wisata dan Budaya.
            </p>
            <a class="btn">Mulai Sekarang!</a>
        </div>
    </section>

    <!-- Section Informasi -->
    <section class="infor">
        <div class="infor-text">
            <h2> Apa Yang Ada di Travo?</h2>
            <p>Travo Menyediakan berbagai Informasi Tentang Travel dan Oleh-Oleh <br>
                Yang anda butuhkan ketika anda menikmati waktu liburan anda!
            </p>
        </div>

        <div class="info-box">
            <div class="step-box">
                <h2><i class="ri-verified-badge-fill"></i></h2>
                <h5>Informasi yang terpecaya dan valid!</h5>
            </div>
            <div class="step-box">
                <h2><i class="ri-map-2-line"></i></h2>
                <h5>Cari Lokasi Wisata yang ingin dituju!</h5>
            </div>
            <div class="step-box">
                <h2><i class="ri-restaurant-2-fill"></i></h2>
                <h5>Temukan Kuliner dan Oleh-oleh disekitar objek Wisata!</h5>
            </div>
            <div class="step-box">
                <h2><i class="ri-emotion-happy-line"></i></h2>
                <h5>Tampilan user yang friendly dan nyaman!</h5>
            </div>
        </div>
    </section>

    <section class="intro">
        <div class="infor-text">
            <h2>wisata Paling Diminati saat ini!</h2>
        </div>
        <div class="intro-box">
            <div class="step-box">
                <img src="/img/nap1.jpg" alt="" srcset="">
                <h3>Lorem, ipsum dolor.</h3>
            </div>
            <div class="step-box">
                <img src="/img/nap5.jpg" alt="" srcset="">
                <h3>Lorem, ipsum dolor.</h3>
            </div>
            <div class="step-box">
                <img src="/img/nap3.jpg" alt="" srcset="">
                <h3>Lorem, ipsum dolor.</h3>
            </div>
            <div class="step-box">
                <img src="/img/nap4.jpg" alt="" srcset="">
                <h3>Lorem, ipsum dolor.</h3>
            </div>
        </div>
        <a class="btn" href="/destinasi.php">Selengkapnya</a>
    </section>

    <!-- Prei Section design -->
    <section class="prei">
        <div class="prei-img">
            <img src="./img/h1.jpg" />
        </div>
        <div class="prei-text">
            <h5>Makanan Serabi</h5>
            <h2>Tahu nggak sih?</h2>
            <p>
                Serabi adalah jajanan tradisional yang berasal dari Indonesia yang diperkirakan sudah dikenal sejak zaman 
                Kerajaan Mataram. Makanan ini beberapa kali disebut dalam Serat Centhini yang ditulis para pujangga Keraton Surakarta pada tahun 1814 hingga tahun
                 1823 atas perintah Pakubuwana V.
            </p>
            <a href="kuiner.php" class="btn">Detail</a>
        </div>
    </section>



    <?php include "layout/footer.php" ?>
    <!--Js Script-->
    <script src="js/script.js"></script>
</body>

</html>