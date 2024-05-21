<?php
//import koneksi
include ('../service/database.php');


// Dapatkan id_wisata dari URL
$id_wisata = $_GET["id"];

// Query database
$wst = query("SELECT * FROM wisata WHERE id_wisata = $id_wisata")[0];

if (isset($_POST["submit"])) {


    //Mengabill data update

    $nama = htmlspecialchars($_POST["nama"]);
    $gambar = htmlspecialchars($_POST["gambar"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $biaya_masuk = htmlspecialchars($_POST["biaya_masuk"]);
    $jam_buka = htmlspecialchars($_POST["jam_buka"]);
    $jam_tutup = htmlspecialchars($_POST["jam_tutup"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $fasilitas = htmlspecialchars($_POST["fasilitas"]);


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
    <title>Edit Data Wisata</title>
    <link rel="stylesheet" href="style-admin.css">
</head>

<body>
    <h2>Edit Data Wisata</h2>
    <form method="POST" action="">
        <input type="hidden" name="id_wisata?" value="<?= $wst['id_wisata']; ?>">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" value="<?= $wst['nama']; ?>" required><br>
        <label for="gambar">Gambar:</label><br>
        <input type="text" name="gambar" id="gambar" value="<?= $wst['gambar']; ?>" required><br>
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