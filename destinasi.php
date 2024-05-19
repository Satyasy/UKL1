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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />


    <title>Destinasi</title>
    <link rel="stylesheet" href="/dist/style.css">
</head>

<body>
    <?php include "./layout/header.php" ?>
    <!-- Home Section -->
    <section class="home-destinasi">
        <div class="home-text">
            <h1> Pilihlah Wisata dan Destinasi <br>yang ingin anda tuju! </h1>
        </div>
    </section>

    <!-- Destinasi Section -->
    <section class="budaya">
        <div class="budaya-text">
            <h5>Banyuwangi</h5>
            <h2>Banyuwangi memiliki segudang budaya yang unik dan indah.</h2>
            <p>Sering dijuluki sebagai kota dengan segudang budaya, Banyuwangi memang memiliki
                budaya yang begitu banyak, yang begitu terkenal adalah tariannya yaitu
                Tari Gandrung yang sudah lama menjadi ikonik Kabupaten Banyuwangi,
            </p>
            <a href="#" class="btn">Cari Destinasi!</a>
        </div>
        <div class="budaya-img">
            <img src="img/c1.jpeg">
        </div>
    </section>


    <!-- Search Destinasi -->
    <section class="cari-dest">
        <form>
            <h2>Ketik Apa yang anda cari dibawah</h2>
            <div class="search">
                <span class="material-symbols-outlined">
                    search
                </span>
                <input type="search" class="search-input" id="find" placeholder="Masukkan nama kuliner atau oleh-oleh" onkeyup="search()" />
            </div>
            <div class="product-list">
                <div class="product">
                    <a href="#" >
                        <img src="./img/h1.jpg" />
                        <h3>Martabak</h3>
                    </a>
                </div>
                <div class="product">
                    <img src="./img/h1.jpg" />
                    <h3>Serabi</h3>
                </div>
                <div class="product">
                    <img src="./img/h1.jpg" />
                    <h3>Lontong</h3>
                </div>
                <div class="product">
                    <img src="./img/h1.jpg" />
                    <h3>Pukis</h3>
                </div>
                <div class="product">
                    <img src="./img/h1.jpg" />
                    <h3>Lemper</h3>
                </div>
                <div class="product">
                    <img src="./img/h1.jpg" />
                    <h3>Onde-onde</h3>
                </div>
                <div class="product">
                    <img src="./img/h1.jpg" />
                    <h3>Terang-Bulan</h3>
                </div>
            </div>
        </form>
    </section>

    <?php include "../UKL/layout/footer.php" ?>
    <script src="js/script.js"></script>
</body>


</html>