<?php
include "../service/database.php";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Register/style.css" />
    <title>Login Akun</title>
</head>

<body>
    <div class="wrap">
        <div class="grid">
            <div class="grid-side">
                <div class="box">
                    <div class="login-content2">
                        <h1>Selamat Datang <span>Kembali!</span> </h1>
                        <br>
                        <p>
                            Gunakan akun yang telah anda miliki untuk melanjutkan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="grid-side">
                <form action="register.php" method="POST">
                    <div class="box">
                        <div class="login-field">
                            <h3>Login Akun</h3>
                            <i ><?php $register_message ?></i>
                            <label>Username:</label><br />
                            <input type="text" name="username" class="input-field" /><br />
                            <label>Email:</label><br />
                            <input type="text" name="email" class="input-field" /><br />
                            <label>Password:</label><br />
                            <input type="password" name="password" class="input-field" /><br />
                            <button name="login" class="button">Login</button> <br>
                            <a href="register.php" class="#" style="margin-top: 15px">Belum pnya akun?, Daftar dulu sini!</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>