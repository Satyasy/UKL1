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
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["nomor_telepon"]) && !empty($_POST["role"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $role = $_POST["role"];
    
    // Fungsi untuk membuat koneksi ke database
    $koneksi = buatKoneksi();
    
    // Melakukan escape string pada data input
    $username = mysqli_real_escape_string($koneksi, $username);
    $email = mysqli_real_escape_string($koneksi, $email);
    $password = mysqli_real_escape_string($koneksi, $password); // Sebaiknya dienkripsi sebelum disimpan
    $nomor_telepon = mysqli_real_escape_string($koneksi, $nomor_telepon);
    $role = mysqli_real_escape_string($koneksi, $role);
    
    // Query SQL untuk menambahkan data pengguna baru
    $sql = "INSERT INTO pengguna (username, email, password, nomor_telepon, role) VALUES ('$username', '$email', '$password', '$nomor_telepon', '$role')";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "Data pengguna berhasil ditambahkan. <a href='CRUD.php'>Kembali ke Daftar Pengguna</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    
    // Menutup koneksi
    $koneksi->close();
} else {
    echo "Harap isi semua bidang. <a href='CRUD.php'>Kembali ke Daftar Pengguna</a>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambahkan Pengguna</title>
</head>
<body>
    <h2>Tambahkan Pengguna</h2>
    <form method="post" action="">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Email:</label><br>
        <input type="text" name="email"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon"><br>
        <label>Role:</label><br>
        <input type="text" name="role"><br><br>
        <input type="submit" name="submit" value="Tambahkan Pengguna">
    </form>
</body>
</html>
