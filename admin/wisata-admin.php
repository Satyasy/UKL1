<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../Register/login.php");
    exit;
}

require ('../service/database.php');
$wisata = query("SELECT * FROM wisata");



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--ICONs-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

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
    <title>Tabel Wisata</title>
</head>

<?php include "../layout/superheader.php" ?>

<body>
    <div class="container">
            <h2> Daftar Wisata</h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Gambar</th>
                        <th>Id Wisata</th>
                        <th>Deskripsi</th>
                        <th>Biaya Masuk</th>
                        <th>Jam Buka</th>
                        <th>Jam Tutup</th>
                        <th>Lokasi</th>
                        <th>Fasilitas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($wisata as $row): ?>
                        <tr >
                            <td><?= $i; ?></td>
                            <td><?= $row["nama"]; ?></td>
                            <td><img src="/img/upload/<?= $row["gambar"]; ?>"></td>
                            <td> <?= $row["id_wisata"]; ?></td>
                            <td><?= htmlspecialchars($row["deskripsi"]); ?></td>
                            <td>Rp.<?= $row["biaya_masuk"]; ?></td>
                            <td><?= $row["jam_buka"]; ?></td>
                            <td><?= $row["jam_tutup"]; ?></td>
                            <td><?= $row["lokasi"]; ?></td>
                            <td><?= $row["fasilitas"]; ?></td>
                            <td>
                                <a href="edit_wisata.php? id= <?= $row["id_wisata"]; ?>" class="btn"
                                    style=" margin:5px; padding:10px; ">Edit</a>
                                <a href="hapus_wisata.php? id= <?= $row["id_wisata"]; ?>"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn"
                                    style=" margin:5px; padding:8px;">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="btn-group"><a href="tambahkan_wisata.php" class="btn" style="margin:20px;">
                    Tambah Wisata
                </a>
            </div>

    </div>
    <script src="../js/script.js"></script>
</body>
<?php include "../layout/footer.php" ?>

</html>