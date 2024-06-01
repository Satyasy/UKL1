<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../Register/login.php");
    exit;
}

//import koneksi
require ('../service/database.php');

if (isset($_POST["submit"])) {

    //Mengambil data insert
    $nama = htmlspecialchars($_POST["nama"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $kategori = htmlspecialchars($_POST["kategori"]);
    //ambil nilai checkbox
    $fasilitas = isset($_POST["fasilitas"]) ? implode(', ', $_POST["fasilitas"]) : '';

    //Upload Gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    //QUERY INSERT SEQUEL
    $sql = "INSERT INTO kuliner (gambar, nama, deskripsi, harga, lokasi, kategori, fasilitas) 
            VALUES ('$gambar', '$nama', '$deskripsi', '$harga', '$lokasi', '$kategori', '$fasilitas')";

    mysqli_query($db, $sql);

    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'kuliner-admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'kuliner-admin.php';
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
    <h2>Tambahkan kuliner</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br>
        <label for="gambar">Gambar:</label><br>
        <input type="file" name="gambar" id="gambar" required><br>
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi" id="deskrisi" id="deskripsi" required></textarea><br>
        <label for="hrg">Harga Rata-rata</label><br>
        <input type="number" name="harga" id="hrg" required><br>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" name="lokasi" id="lokasi" required><br><br>
        <label>Kategori:</label><br>
        <select name="kategori" id="kategori" required>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
        </select><br><br>
        <label for="fasilitas">Fasilitas:</label><br>
        <div class="checkbox-group">
            <div class="checkbox-item">
                <input type="checkbox" name="fasilitas[]" value="Restoran" id="fasilitas_restoran">
                <label for="fasilitas_restoran">Restoran</label>
            </div>
            <div class="checkbox-item">
                <input type="checkbox" name="fasilitas[]" value="Wifi" id="fasilitas_wifi">
                <label for="fasilitas_wifi">Wifi</label>
            </div>
        </div>

        <br>
        <button type="submit" name="submit">Submit!</button>
    </form>
</body>

</html>