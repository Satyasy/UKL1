<?php
//import koneksi
require ('../service/database.php');



if (isset($_POST["submit"])) {


    //Mengabill data insert
    $nama = htmlspecialchars($_POST["nama"]);
    $deskripsi = htmlspecialchars($_POST["deskripsi"]);
    $biaya_masuk = htmlspecialchars($_POST["biaya_masuk"]);
    $jam_buka = htmlspecialchars($_POST["jam_buka"]);
    $jam_tutup = htmlspecialchars($_POST["jam_tutup"]);
    $lokasi = htmlspecialchars($_POST["lokasi"]);
    $fasilitas = htmlspecialchars($_POST["fasilitas"]);

    
    //Upload Gambar
        $gambar = upload();
        if (!$gambar) {
            return false;
        }



    //QUERY INSERT SEQUEL
    $sql = "INSERT INTO wisata 
    VALUES 
    ('0','$gambar','$nama','$deskripsi','$biaya_masuk','$jam_buka','$jam_tutup','$lokasi','$fasilitas')";
    

    mysqli_query($db, $sql);

    // if(mysqli_affected_rows($db) > 0) {

    //     echo "<script>
    //     alert('Data berhasil ditambahkan!');
    //     document.location.href = 'wisata-admin.php';
    //     </script>";
    // } else {

    //     echo "<script>
    //     alert('Data gagal ditambahkan!');
    //     document.location.href = 'wisata-admin.php';
    //     </script>";
    // }
    return mysqli_affected_rows($db);
}


?>




<!DOCTYPE html>
<html>

<head>
    <title>SuperUser View</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>

    <link rel="stylesheet" href="style-admin.css">
</head>

<body>
    <h2>Tambahkan Wisata</h2>
    <form method="POST" action="" enctype="multipart/form-data" >
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama" required><br>
        <label for="gambar">Gambar:</label><br>
        <input type="file" name="gambar" id="gambar"  required><br>
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi" id="deskrisi" id="deskripsi" required></textarea><br>
        <label for="biaya_masuk">Biaya Masuk:</label><br>
        <input step="0.01" min="0" type="number" name="biaya_masuk" id="biaya_masuk" required><br>
        <label for="jam_buka">Jam Buka:</label><br>
        <input type="time" name="jam_buka" id="jam_buka" required><br><br>
        <label for="jam_tutup">Jam Tutup:</label><br>
        <input type="time" name="jam_tutup" id="jam_tutup" required><br><br>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" name="lokasi" id="lokasi" required><br><br>
        <label for="fasilitas">Fasilitas:</label><br>
        <input type="text" name="fasilitas" id="fasilitas" required><br><br>

        <button type="submit" name="submit">Submit!</button>
    </form>
</body>

</html>