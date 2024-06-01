<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../Register/login.php");
    exit;
}

//import koneksi
require ('../service/database.php');

if (isset($_POST["submit"])) {

    //Mengambil data insertp
    $nama = htmlspecialchars($_POST["nama"]);
    $deskripsi = $_POST["deskripsi"];
    $biaya_masuk = htmlspecialchars($_POST["biaya_masuk"]);
    $jam_buka = htmlspecialchars($_POST["jam_buka"]);
    $jam_tutup = htmlspecialchars($_POST["jam_tutup"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);

    // Mengambil nilai checkbox dan menggabungkannya menjadi string
    $fasilitas = isset($_POST["fasilitas"]) ? implode(', ', $_POST["fasilitas"]) : '';

    //Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    //QUERY INSERT SEQUEL
    $sql = "INSERT INTO wisata (gambar, nama, deskripsi, biaya_masuk, jam_buka, jam_tutup, lokasi, fasilitas) 
            VALUES ('$gambar', '$nama', '$deskripsi', '$biaya_masuk', '$jam_buka', '$jam_tutup', '$lokasi', '$fasilitas')";

    $result = mysqli_query($db, $sql);

    if ($result) {
        if (mysqli_affected_rows($db) > 0) {
            echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'wisata-admin.php';
        </script>";
        } else {
            echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'wisata-admin.php';
        </script>";
        }
    } else {
        echo "Error: " . mysqli_error($db);
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>SuperUser View</title>
    <link rel="stylesheet" href="style-admin.css">
</head>

<body>
    <h2>Tambahkan Wisata</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br>
        <label for="gambar">Gambar:</label><br>
        <input type="file" name="gambar" id="gambar" required><br>
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi" id="deskripsi" required></textarea><br>
        <label for="biaya_masuk">Biaya Masuk:</label><br>
        <input step="0.01" min="0" type="number" name="biaya_masuk" id="biaya_masuk" required><br>
        <label for="jam_buka">Jam Buka:</label><br>
        <input type="time" name="jam_buka" id="jam_buka" required><br><br>
        <label for="jam_tutup">Jam Tutup:</label><br>
        <input type="time" name="jam_tutup" id="jam_tutup" required><br><br>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" name="lokasi" id="lokasi" required><br><br>

        <label for="fasilitas">Fasilitas:</label><br>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <input type="checkbox" name="fasilitas[]" value="Restoran" id="fasilitas_restoran">
                <label for="fasilitas_restoran">Restoran</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="fasilitas[]" value="Penginapan" id="fasilitas_penginapan">
                <label for="fasilitas_penginapan">Penginapan</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="fasilitas[]" value="Pemandian" id="fasilitas_pemandian">
                <label for="fasilitas_pemandian">Pemandian</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="fasilitas[]" value="Wifi" id="fasilitas_wifi">
                <label for="fasilitas_wifi">Wifi</label>
            </div>
        </div>

        <br>
        <button type="submit" name="submit">Submit</button>
    </form>


</body>

</html>