<?php
//import koneksi
include ('../service/database.php');

if (isset($_POST["submit"])) {


    //Mengabill data insert
    $nama = $_POST["nama"];
    $gambar = $_POST["gambar"];
    $deskripsi = $_POST["deskripsi"];
    $biaya_masuk = $_POST["biaya_masuk"];
    $jam_buka = $_POST["jam_buka"];
    $jam_tutup = $_POST["jam_tutup"];
    $lokasi = $_POST["lokasi"];
    $fasilitas = $_POST["fasilitas"];


    $sql = "INSERT INTO wisata 
    VALUES 
    ('0','$gambar','$nama','$deskripsi','$biaya_masuk','$jam_buka','$jam_tutup','$lokasi','$fasilitas')";
    

    mysqli_query($db, $sql);

    if(mysqli_affected_rows($db) > 0) {

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
}

?>




<!DOCTYPE html>
<html>

<head>
    <title>Tambahkan Wisata</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script>
        function initAutocomplete() {
            const input = document.getElementById('lokasi');
            const autocomplete = new google.maps.places.Autocomplete(input);
        }
    </script>
</head>

<body onload="initAutocomplete()">
    <h2>Tambahkan Wisata</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" name="nama" id="nama"><br>
        <label for="gambar">Gambar:</label><br>
        <input type="text" name="gambar" id="gambar"><br>
        <label for="deskripsi">Deskripsi:</label><br>
        <textarea name="deskripsi" id="deskrisi" id="deskripsi"></textarea><br>
        <label for="biaya_masuk">Biaya Masuk:</label><br>
        <input step="0.01" min="0" type="number" name="biaya_masuk" id="biaya_masuk"><br>
        <label for="jam_buka">Jam Buka:</label><br>
        <input type="time" name="jam_buka" id="jam_buka"><br><br>
        <label for="jam_tutup">Jam Tutup:</label><br>
        <input type="time" name="jam_tutup" id="jam_tutup"><br><br>
        <label for="lokasi">Lokasi:</label><br>
        <input type="text" name="lokasi" id="lokasi"><br><br>
        <label for="fasilitas">Fasilitas:</label><br>
        <input type="text" name="fasilitas" id="fasilitas"><br><br>

        <button type="submit" name="submit">Submit!</button>
    </form>
</body>

</html>