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

// Memeriksa apakah parameter ID pengguna diberikan dalam URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_pengguna = $_GET["id"];
    
    // Panggil fungsi untuk membaca data pengguna berdasarkan ID
    $koneksi = buatKoneksi();
    $sql = "SELECT * FROM pengguna WHERE id_pengguna = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_pengguna);
    $stmt->execute();
    $hasil = $stmt->get_result();
    
    if ($hasil->num_rows > 0) {
        $dataPengguna = $hasil->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h2>Edit Pengguna</h2>
    <form method="post" action="update_pengguna.php">
        <input type="hidden" name="id_pengguna" value="<?php echo $dataPengguna['id_pengguna']; ?>">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?php echo $dataPengguna['username']; ?>"><br>
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $dataPengguna['email']; ?>"><br>
        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon" value="<?php echo $dataPengguna['nomor_telepon']; ?>"><br>
        <label>Role:</label><br>
        <input type="text" name="role" value="<?php echo $dataPengguna['role']; ?>"><br><br>
        <input type="submit" name="submit" value="Simpan Perubahan">
    </form>
</body>
</html>
<?php
    } else {
        echo "Pengguna tidak ditemukan.";
    }
    $stmt->close();
    $koneksi->close();
} else {
    echo "ID pengguna tidak diberikan.";
}
?>
