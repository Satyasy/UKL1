<?php
session_start();
include "../service/database.php";

if (isset($_SESSION["login"])) {
    $role = $_SESSION["role"] ?? '';

    //if role is admin
    if ($role == 'admin') {
        header("Location: ../admin/index.php");
        exit;
    }
    header("Location:../index.php");
    exit;
}

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
        alert('User Berhasil dibuat!');
        document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($db);
        echo "<script>
        alert('User Gagal dibuat!');
         document.location.href = 'register.php';
        </script>";
    }
    return mysqli_affected_rows($db);
}

?>



<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--Fonts Google-->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
    rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sedan+SC&display=swap" rel="stylesheet">
<link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="/dist/style2.css" />
<title>Register Akun</title>
</head>



<body>
    <div class="wrap">
        <div class="grid">
            <div class="grid-side">
                <div class="box">
                    <div class="login-content">
                        <h1>Selamat Datang <br> Pengguna baru! </h1>
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
                            <label for="username">Username:</label><br>
                            <input type="text" name="username" id="username" placeholder="username" required
                                class="input-field"><br>
                            <label for="email">Email:</label><br>
                            <input type="text" name="email" id="email" class="input-field" placeholder="contoh@xxx.com"
                                required><br>
                            <label for="nomor_telepon">Nomor Telepon:</label><br>
                            <input type="tel" id="nomor_telepon" name="nomor_telepon" placeholder="08xx atau +628xx"
                                pattern="(\+62|0)[2-9]{1}[0-9]{7,12|11}" class="input-field" required><br>
                            <label for="password">Password:</label><br>
                            <input type="password" name="password" id="password" required class="input-field"><br>
                            <label for="password">Konfirmasi Password:</label><br>
                            <input type="password" name="password" id="password" required class="input-field"><br>
                            <input type="hidden" name="role" value="user">
                            <button name="register" class="button">Daftar</button> <br>
                            <a href="login.php">Sudah Punya akun?, Login dulu dong!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>