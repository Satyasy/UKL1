 <?php
session_start();
if(isset($_POST['Logout'])){
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet" />

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

    <!---Fitur Section-->
    <!-- <section class="feature">
        <div class="feature-content">
            <div class="row">
                <div class="row-img">
                    <img src="img/nap1.jpg" />
                </div>
                <h4> </h4>
            </div>
            <div class="row">
                <div class="row-img">
                    <img src="img/nap2.jpg" />
                </div>
                <h4>Taman Nasional Baluran</h4>
            </div>
            <div class="row">
                <div class="row-img">
                    <img src="img/nap3.jpg" />
                </div>
                <h4>Taman Nasional Baluran</h4>
            </div>
            <div class="row">
                <div class="row-img">
                    <img src="img/nap4.jpg" />
                </div>
                <h4>Taman Nasional Baluran</h4>
            </div>
            <div class="row">
                <div class="row-img">
                    <img src="img/nap5.jpg" />
                </div>
                <h4>Taman Nasional Baluran</h4>
            </div>
    </section> -->

    <!-- Prei Section design -->
    <section class="prei">
        <div class="prei-img">
            <img src="./img/h1.jpg" />
        </div>
        <div class="prei-text">
            <h5>Pantai Pancur</h5>
            <h2>Tahu nggak sih?</h2>
            <p>
                Nama Pantai Pancur berasal dari adanya aliran sungai kecil berair
                tawar yang langsung bertemu dengan air laut. Aliran sungai ini cukup
                unik karena menyerupai air terjun kecil sehingga disebut pancur yang
                jika diartikan berarti air mancur atau pancuran.
                Lokasi aliran sungai mirip airr terjun ini berada di samping tangga
                yang menuju pantai.
            </p>
            <a href="#" class="btn">Detail</a>
        </div>
    </section>

    <!-- Tour Section Design -->
    <section class="tour">
        <div class="center-text">

            <h2>Paling Seru!</h2>
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

    <!-- Culture section design -->
    <section class="budaya">
        <div class="budaya-text">
            <h5>Budaya Banyuwangi</h5>
            <h2>Banyuwangi memiliki segudang budaya yang unik dan indah.</h2>
            <p>Sering dijuluki sebagai kota dengan segudang budaya, Banyuwangi memang memiliki
                budaya yang begitu banyak, yang begitu terkenal adalah tariannya yaitu
                Tari Gandrung yang sudah lama menjadi ikonik Kabupaten Banyuwangi,
            </p>
            <a href="#" class="btn">Baca lagi</a>
        </div>

        <div class="budaya-img">
            <img src="img/c1.jpeg">
        </div>
    </section>

    <!-- Berita Section Settings -->
    <!-- <section class="berita">
        <div class="berita-content">
            <div class="berita-text">
                <h2>Ingin yang lain?</h2>
                <p>Mari kita temukan Objek Wisata yang seru!</p>
            </div>
            <form action="">
                <input type="email" placeholder="Masukkan emailmu" required>
                <input type="submit" value="Mulai" class="btn">
            </form>
        </div>
    </section> -->


    <?php include "layout/footer.php" ?>
    <!--Js Script-->
    <script src="js/script.js"></script>
</body>

</html>