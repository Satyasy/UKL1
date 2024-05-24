<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}

include "../service/database.php";

if (isset($_POST["login"])) {
    $username_or_email = isset($_POST["username_or_email"]) ? $_POST["username_or_email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';

    $result = mysqli_query($db, "SELECT * FROM pengguna WHERE username = '$username_or_email' OR email = '$username_or_email'");

    // Check keberadaan
    if (mysqli_num_rows($result) > 0) {

        // Check password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // Set session variables
            $_SESSION["login"] = true;
            $_SESSION["username_or_email"] = $row["username"];
            $_SESSION["role"] = $row["role"];

            // pengalihan header
            if ($row["role"] === 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../index.php");
            }
            exit;
        }
    }

    $error = true;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--ICONs-->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

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
    <title>Login Akun</title>
</head>

<body>
    <div class="wrap">
        <div class="grid">
            <div class="grid-side">
                <div class="box">
                    <div class="login-content2">
                        <h1>Selamat Datang <br> Kembali! </h1>
                        <br>
                        <p>
                            Gunakan akun yang telah anda miliki untuk melanjutkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid-side">
                <form action="login.php" method="POST">
                    <div class="box">
                        <div class="login-field">
                            <h3>Login Akun</h3>
                            <?php if (isset($error)): ?>
                                <div style="font-style: italic; color: red;" role="alert">
                                    Username atau password salah!
                                </div>
                            <?php endif; ?>
                            <label for="username_or_email">Username / Email:</label><br />
                            <input type="text" name="username_or_email" class="input-field" /><br />
                            <label for="password">Password:</label><br />
                            <input type="password" name="password" class="input-field" /><br />
                            <button name="login" class="button">Login</button> <br>
                            <a href="register.php">Belum Punya akun?, Daftar dulu
                                dong!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>