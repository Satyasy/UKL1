


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
            <div class="box">
                <img src="./img/t1.jpg">
                <h6>Pulau Merah</h6>
                <h4>Lorem, ipsum dolor.</h4>
            </div>

            <div class="box">
                <img src="./img/t2.jpg">
                <h6>Kawah Ijen</h6>
                <h4>Lorem, ipsum dolor.</h4>
            </div>

            <div class="box">
                <img src="./img/t3.jpg">
                <h6>Taman Gandrung</h6>
                <h4>Lorem, ipsum dolor.</h4>
            </div>
        </div>

        <div class="center-btn">
            <a href="#" class="btn">Ayo Jalan</a>
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
            <input type="search" class="search-input" id="find" placeholder="Masukkan nama kuliner atau oleh-oleh" onkeyup="search()" />
        </div>
        <div class="product-list">
            <div class="product">
                <img src="./img/h1.jpg" />
                <h3>Martabak</h3>
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