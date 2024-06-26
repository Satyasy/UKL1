<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../Register/login.php");
    exit;
}
//import koneksi
include ('../service/database.php');

// Dapatkan id_wisata dari URL
$id_wisata = $_GET["id"];

// Query database
$wst = query("SELECT * FROM wisata WHERE id_wisata = $id_wisata")[0];

if (isset($_POST["submit"])) {

    //Mengambil data update
    $nama = htmlspecialchars($_POST["nama"]);
    $gambar = isset($_POST["gambar"]) ? htmlspecialchars($_POST["gambar"]) : '';
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $biaya_masuk = htmlspecialchars($_POST["biaya_masuk"]);
    $jam_buka = htmlspecialchars($_POST["jam_buka"]);
    $jam_tutup = htmlspecialchars($_POST["jam_tutup"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $fasilitas = htmlspecialchars($_POST["fasilitas"]);
    $gambarLama = htmlspecialchars($_POST["gambarLama"]);

    //cek pemilihan gambar baru
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $wst = "UPDATE wisata SET 
           nama = '$nama',
           gambar = '$gambar',
           deskripsi = '$deskripsi',
           biaya_masuk = '$biaya_masuk',
           jam_buka = '$jam_buka',
           jam_tutup = '$jam_tutup',
           lokasi = '$lokasi',
           fasilitas = '$fasilitas'
           WHERE id_wisata = $id_wisata
           ";

    mysqli_query($db, $wst);
    
    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
        alert('Data berhasil diedit!');
        document.location.href = 'wisata-admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diedit!');
        document.location.href = 'wisata-admin.php';
        </script>";
    }

    return mysqli_affected_rows($db);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>SuperUser View</title>
    <link rel="stylesheet" href="style-admin.css">
</head>
<body>
    <h2>Edit Data Wisata</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_wisata?" value="<?= $wst["id_wisata"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $wst["gambar"]; ?>">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" value="<?= $wst['nama']; ?>" required><br>
        <label for="gambar">Gambar:</label><br>
        <img src="/img/upload/<?= $wst['gambar']; ?>" width="150" height="100"
            style="margin-left: -80%; margin-bottom: 10px;">
        <input type="file" name="gambar" id="gambar"><br>
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi" id="deskrisi" required><?= $wst['deskripsi']; ?></textarea><br>
        <label for="biaya_masuk">Biaya Masuk:</label><br>
        <input step="0.01" min="0" type="number" name="biaya_masuk" id="biaya_masuk" value="<?= $wst['biaya_masuk']; ?>"
            required><br>
        <label for="jam_buka">Jam Buka:</label><br>
        <input type="time" name="jam_buka" id="jam_buka" value="<?= $wst['jam_buka']; ?>" required><br><br>
        <label for="jam_tutup">Jam Tutup:</label><br>
        <input type="time" name="jam_tutup" id="jam_tutup" value="<?= $wst['jam_tutup']; ?>" required><br><br>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" name="lokasi" id="lokasi" value="<?= $wst['lokasi']; ?>" required><br><br>
        <label for="fasilitas">Fasilitas:</label><br>
        <input type="text" name="fasilitas" id="fasilitas" value="<?= $wst['fasilitas']; ?>" required><br><br>

        <button type="submit" name="submit">Simpan Perubahan!</button>
    </form>
</body>

</html>