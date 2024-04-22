<?php
// Fungsi untuk membuat koneksi ke database
function buatKoneksi() {
    $servername = "localhost";
    $username = "root";
    $password = "altered";
    $database = "pariwisata_db";

    $koneksi = new mysqli($servername, $username, $password, $database);

    // Memeriksa koneksi
    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }
    return $koneksi;
}

// Memeriksa apakah data yang diterima tidak kosong
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id_pengguna"]) && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["nomor_telepon"]) && !empty($_POST["role"])) {
    $id_pengguna = $_POST["id_pengguna"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $role = $_POST["role"];
    
    // Fungsi untuk membuat koneksi ke database
    $koneksi = buatKoneksi();
    
    // Melakukan escape string pada data input
    $username = mysqli_real_escape_string($koneksi, $username);
    $email = mysqli_real_escape_string($koneksi, $email);
    $nomor_telepon = mysqli_real_escape_string($koneksi, $nomor_telepon);
    $role = mysqli_real_escape_string($koneksi, $role);
    
    // Query SQL untuk mengubah data pengguna
    $sql = "UPDATE pengguna SET username='$username', email='$email', nomor_telepon='$nomor_telepon', role='$role' WHERE id_pengguna=$id_pengguna";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "Data pengguna berhasil diupdate. <a href='CRUD.php'>Kembali ke Daftar Pengguna</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    
    // Menutup koneksi
    $koneksi->close();
} else {
    echo "Harap isi semua bidang. <a href='CRUD.php'>Kembali ke Daftar Pengguna</a>";
}

