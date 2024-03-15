<!-- Login Kode -->

<?php 
include "service/database.php";
session_start();
$login_message = "";

if (isset($_SESSION["is_login"])) {
    header("Location:index.php");
}

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM pengguna WHERE email='$email' 
        AND password='$password'";

    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $_SESSION["email"] = $data["email"];
        $_SESSION["is_login"] = true;

        header("location:index.php");
    } else {
        $login_message = "Akun tidak ditemukan,Silahkan daftar.";
    }
}

?>

<!-- Register Kode -->

<?php
include "service/database.php";
$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("Location:index.php");
}

if (isset($_POST["register"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $password = $_POST["password"];
    $alamat = $_POST["alamat"];

    $sql = "INSERT INTO pengguna (email, username, nomor_telepon, password, alamat) VALUES 
        ('$email','$username', '$nomor_telepon', '$password', '$alamat')";

    if ($db->query($sql)) {
        $register_message = "Akun berhasil terdaftarkan, Silahkan Login1!";
        echo "$register_message";
    } else {
        $register_message = "Akun Gagal terdaftarkan, Silahkan daftar kembali!";
        echo "register_message";
    }
}
?> 




<!DOCTYPE html>
<!-- Coding By CodingNepal - www.codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website with Login and Registration Form | CodingNepal</title>
    <!-- Google Fonts Link For Icons -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="css1.css">
    <script src="sc1.js" defer></script>
</head>

<body>
    <header>
        <nav class="navbar">
            <span class="hamburger-btn material-symbols-rounded">menu</span>
            <a href="#" class="logo">
                <img src="images/logo.jpg" alt="logo">
                <h2>CodingNepal</h2>
            </a>
            <ul class="links">
                <span class="close-btn material-symbols-rounded">close</span>
                <li><a href="#">Home</a></li>
                <li><a href="#">Portfolio</a></li>
                <li><a href="#">Courses</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
            <button class="login-btn">LOG IN</button>
        </nav>
    </header>

    <div class="blur-bg-overlay"></div>
    <div class="lgn-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="lgn-box login">
            <div class="lgn-details">
                <h2>Selamat Datang</h2>
                <p>H A I ! <br>
                    Selamat datang kembali, <br>
                    Silahkan Login..</p>
            </div>
            <div class="lgn-content">
                <h2 class="cap">LOGIN</h2>
                <i><?php $register_message ?></i>
                <form action="#">
                    <div class="input-field">
                        <label>Email/Username</label>
                        <input type="text" required>
                    </div>
                    <div class="input-field">
                        <label>Password</label>
                        <input type="password" required>
                    </div>
                    <a href="#" class="forgot-pass-link">Lupa password?</a>
                    <button type="submit">Login</button>
                </form>
                <div class="bottom-link">
                    Belum punya akun?
                    <a href="#" id="daftar-link">Daftar!</a>
                </div>
            </div>
        </div>
        <form action="#">
            <div class="lgn-box daftar">
                <div class="lgn-details">
                    <h2>Registrasi Akun</h2>
                    <p>H A L O ! <br> Selamat datang di website kami,<br> Silahkan daftar dulu..</p>
                </div>
                <div class="lgn-content">
                    <h2 class="cap">Daftar</h2>
                    <i><?php $register_message ?></i>
                    <div class="input-field">
                        <label>Username</label><br>
                        <input type="text" name="username" required><br>
                    </div>
                    <div class="input-field">
                        <label>Email:</label><br>
                        <input type="text" name="email" required><br>
                    </div>
                    <div class="input-field">
                        <label>Password:</label><br>
                        <input type="password" name="password" required><br>
                    </div>
                    <div class="input-field">
                        <label>Nomor Telepon:</label><br>
                        <input type="tel" name="nomor_telepon" required><br>
                    </div>
                    <button type="submit">Daftar</button>
        </form>
        <div class="bottom-link">
            Sudah punya akun?
            <a href="#" id="login-link">Login</a>
        </div>
    </div>
</body>

</html>