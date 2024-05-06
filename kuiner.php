
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
    <title>Kuliner dan Oleh-Oleh</title>
</head>
<body>
<?php include "./layout/header.php" ?>
    <!-- Home Section -->
    <section class="home-kuliner">
    <div class="home-text">
        <h2> Temukan Kuliner dan Oleh-Oleh <br> yang anda inginkan! </h2>
        

    </div>
    </section>
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

</body>
</html>