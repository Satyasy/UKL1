<?php
session_start();
if (!isset($_SESSION["login"]) ) {
    header("Location:../Register/login.php");
    exit;
}

require ('../service/database.php');
$ulasan = query("SELECT 
ulasan.id_ulasan,
pengguna.username,
COALESCE(wisata.nama, kuliner.nama) AS nama,
COALESCE(wisata.gambar, kuliner.gambar) AS gambar,
ulasan.id_wisata,
ulasan.id_kuliner,
ulasan.rating,
ulasan.komentar 
FROM 
ulasan 
INNER JOIN 
pengguna ON ulasan.id_pengguna = pengguna.id_pengguna
LEFT JOIN 
wisata ON ulasan.id_wisata = wisata.id_wisata
LEFT JOIN 
kuliner ON ulasan.id_kuliner = kuliner.id_kuliner;
");


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--ICONs-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <!--Fonts Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sedan+SC&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Ulasan</title>
    <link rel="stylesheet" href="/dist/style.css">
</head>

<?php include "../layout/superheader.php" ?>

<body>
    <div class="container">
        <h2> Daftar Ulasan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Id Ulasan</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Id Kuliner</th>
                    <th>Id Wisata</th>
                    <th>Rating</th>
                    <th>Ulasan</th>
                </tr>
            </thead>

            <tbody>

                <?php $i = 1; ?>
                <?php foreach ($ulasan as $row): ?>
                    <tr>
                        <td><?= "$i"; ?></td>
                        <td><?= $row["username"]; ?></td>
                        <td> <?= $row["id_ulasan"]; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><img src="/img/upload/<?= $row["gambar"]; ?>"></td>
                        <td><?= $row["id_kuliner"]; ?></td>
                        <td><?= $row["id_wisata"]; ?></td>
                        <td><?= $row["rating"]; ?></td>
                        <td><?= $row["komentar"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
<?php require_once "../layout/footer.php" ?>