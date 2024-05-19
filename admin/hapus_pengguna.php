<?php
// Fungsi untuk membuat koneksi ke database
require ('../service/database.php');

// Memeriksa apakah parameter ID pengguna diberikan dalam URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_pengguna = $_GET["id"];
    
    // Fungsi untuk membuat koneksi ke database
    
    // Query SQL untuk menghapus data pengguna
    $sql = "DELETE FROM pengguna WHERE id_pengguna=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id_pengguna);
    if ($stmt->execute()) {
        echo "Data pengguna berhasil dihapus. <a href='CRUD.php'>Kembali ke Daftar Pengguna</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    
    // Menutup koneksi
    $stmt->close();
    $koneksi->close();
} else {
    echo "ID pengguna tidak diberikan.";
}

