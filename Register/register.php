<?php
include "../service/database.php";
session_start();
$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("Location:index.php");
}

if (isset($_POST["register"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $nomor_telepon = $_POST["nomor_telepon"];
    $password = $_POST["password"];

    $sql = "INSERT INTO pengguna (email, username, nomor_telepon, password) VALUES 
         ('$email','$username', '$nomor_telepon', '$password')";

    if ($db->query($sql)) {
        $register_message = "Akun berhasil terdaftarkan, Silahkan Login!";
    } else {
        $register_message = "Akun Gagal terdaftarkan, Silahkan daftar kembali!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Register/style.css" />
    <title>Register Akun</title>
</head>

<body>
    <div class="wrap">
        <div class="grid">
            <div class="grid-side">
                <div class="box">
                    <div class="login-content">
                        <h1>Selamat Datang <span>Pengguna baru!</span> </h1>
                        <br>
                        <p>
                            Untuk terus menjelajahi situs kami silahkan Log-in menggunakan
                            akun anda
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid-side">
                <form action="register.php" method="POST">
                    <div class="box">
                        <div class="login-field">
                            <h3>Daftar Akun</h3>
                             <script>alert ("<?php echo "$register_message"?>")</script>
                            <label>Nama:</label><br />
                            <input type="text" name="username" class="input-field" /><br />
                            <label>Email:</label><br />
                            <input type="text" name="email" class="input-field" /><br />
                            <label>Password:</label><br />
                            <input type="password" name="password" class="input-field" /><br />
                            <label>Nomor Telepon:</label><br />
                            <input type="text" name="nomor_telepon" class="input-field" /><br />
                            <button name="register" class="button">Daftar</button> <br>
                            <a href="login.php" class="#" style="margin-top: 15px">Sudah Punya akun?, Login dong!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>