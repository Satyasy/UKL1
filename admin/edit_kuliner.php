<?php
//import koneksi
include ('../service/database.php');


// Dapatkan id_kuliner dari URL
$id_kuliner = $_GET["id"];

// Query database
$klr = query("SELECT * FROM kuliner WHERE id_kuliner = $id_kuliner")[0];

if (isset($_POST["submit"])) {


    //Mengabill data update

    $nama = htmlspecialchars($_POST["nama"]);
    $gambar = isset($_POST["gambar"]) ? htmlspecialchars($_POST["gambar"]) : '';
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $kategori = htmlspecialchars($_POST["kategori"]);
    $fasilitas = htmlspecialchars($_POST["fasilitas"]);
    $gambarLama = htmlspecialchars($_POST["gambarLama"]);

    //cek pemilihan gambar baru 
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $klr = "UPDATE kuliner SET 
           nama = '$nama',
           gambar = '$gambar',
           deskripsi = '$deskripsi',
           harga = '$harga',
           lokasi = '$lokasi',
           kategori = '$kategori',
           fasilitas = '$fasilitas'
           WHERE id_kuliner = $id_kuliner
           ";

    mysqli_query($db, $klr);

    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
        alert('Data berhasil diedit!');
        document.location.href = 'kuliner-admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diedit!');
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
    <h2>Edit Data kuliner</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_kuliner?" value="<?= $klr['id_kuliner']; ?>">
        <input type="hidden" name="gambarLama" value="<?= $klr['gambar']; ?>">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" value="<?= $klr['nama']; ?>" required><br>
        <label for="gambar">Gambar:</label><br>
        <img src="/img/upload/<?= $klr['gambar']; ?>" width="150" height="100"
            style="margin-left: -80%; margin-bottom: 10px;">
        <input type="file" name="gambar" id="gambar"><br>
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi" id="deskrisi" required><?= $klr['deskripsi']; ?></textarea><br>
        <label for="hrg">Harga Rata-rata:</label><br>
        <input step="0.01" min="0" type="number" name="harga" id="hrg" value="<?= $klr['harga']; ?>" required><br>
        <label for="">Kategori:</label><br>
        <select name="kategori" id="kategori" required>
            <option value="Makanan" <?= ($klr['kategori'] == 'Makanan') ? 'selected' : ''; ?>>Makanan</option>
            <option value="Minuman" <?= ($klr['kategori'] == 'Minuman') ? 'selected' : ''; ?>>Minuman</option>
        </select><br><br>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" name="lokasi" id="lokasi" value="<?= $klr['lokasi']; ?>" required><br><br>
        <label for="fasilitas">Fasilitas:</label><br>
        <input type="text" name="fasilitas" id="fasilitas" value="<?= $klr['fasilitas']; ?>" required><br><br>

        <button type="submit" name="submit">Simpan Perubahan!</button>
    </form>
</body>

</html>