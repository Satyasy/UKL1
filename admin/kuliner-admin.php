<?php
    require ('../service/database.php');
    $kuliner = query("SELECT * FROM kuliner");
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sedan+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Kuliner</title>
    <link rel="stylesheet" href="/dist/style.css">
</head>

<?php include "../layout/superheader.php" ?>

<body>
    <div class="container">
        <h2> Daftar Kuliner</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Id Kuliner</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Jam Buka</th>
                    <th>Jam Tutup</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                
                <?php $i = 1; ?>
                <?php foreach ($kuliner as $row): ?>
                    <tr>
                        <td><?= "$i"; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><img src="/img/ <?= $row["gambar"]; ?>"></td>
                        <td> <?= $row["id_kuliner"]; ?></td>
                        <td><?= $row["deskripsi"]; ?></td>
                        <td><?= $row["harga"]; ?></td>
                        <td><?= $row["jam_buka"]; ?></td>
                        <td><?= $row["jam_tutup"]; ?></td>
                        <td><?= $row["kategori"]; ?></td>
                        <td><?= $row["lokasi"]; ?></td>
                        <td>
                            <a href="" class="btn" style=" margin:5px; padding:8px; ">Edit</a>
                            <a href="" class="btn" style=" margin:5px; padding:8px;">Delete</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="btn">
            Tambah
        </div>
    </div>
</body>

</html>