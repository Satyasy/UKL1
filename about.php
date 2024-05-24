<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:Register/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.75" />
    <!--ICONs-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <!--Fonts Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- -CSS--->
    <link rel="stylesheet" href="/dist/style.css" />
    <title>Tentang Kami</title>
</head>

<body>
    <?php include "./layout/header.php" ?>

    <section class="about-home">
        <div class="about-text">
            <img src="../" alt="" srcset="">
            <h1><span>Halo,saya adalah Revano!</span> <br>
                Seorang siswa di SMK Telkom Sidoarjoo!</h1>
            <p>
                Website ini adalah project yang ditugaskan untuk memenuhi Ujian Kenaikan Level 1 (UKL) yang akan
                berlangsung.
                Dibawah ini adalah informasi mengenai identitas saya atau developer website ini.
            </p>
        </div>
        <div class="about">
            <h1>Profil</h1>
            <div class="about1">
                <div class="content">
                    <img src="./img/profil.jpeg" alt="" srcset="">
                </div>
                <div class="content">
                    <h2>
                        <span>Nama:</span> Revano Satya Pandega <br>
                        <span>Alamat:</span> Glenmore, Kab.Banyuwangi <br>
                        <span>Kelas:</span> X SIJA 1 <br>
                        <span>TTL:</span> Banyuwangi, 15 April 2007 (17th) <br>
                        <span>Email:</span> revanosatya123@gmail.com<br>
                    </h2>

                    <h3>Sosial Media</h3>
                    <a href="https://www.instagram.com/restyand_" target="blank"><i class="ri-instagram-fill"></i></a>
                    <a href="https://github.com/Satyasy" target="blank"><i class="ri-github-fill"></i></a>
                    <a href="https://wa.me/qr/ASSKVXFU5IDMA1" target="blank"><i class="ri-whatsapp-line"></i></a>
                </div>
            </div>
        </div>
    </section>
    <?php include "./layout/footer.php" ?>
</body>

</html>