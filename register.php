 <?php
        include "./service/database.php";
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
                $register_message = "Akun berhasil terdaftarkan, Silahkan Login1!";
                echo "$register_message";
            } else {
                $register_message = "Akun Gagal terdaftarkan, Silahkan daftar kembali!";
                echo "register_message";
            }
        }
        ?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />

    <!--Fonts Google-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />

    <!---CSS--->
    <link rel="stylesheet" href="css1.css" />
    <script src=""></script>
    <title>Masuk Travo</title>
</head>


<body>
    <form action="register.php" method="POST">
    <h3>Daftar Akun</h3>
    <i><?php $register_message ?></i>
    <label>Nama:</label><br>
        <input type="text" name="username"><br>
        <label>Email:</label><br>
        <input type="text" name="email"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon"><br>
        <button  name="register">Daftar</button>
        <a href="login.php" class="btn" style="margin-top: 15px;">Sudah punya akun?, Login dong!</a>
    </form>

    <!-- <form action="#">
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
        <a href="login.php" id="login-link">Login</a>
    </div> -->
    </body>
</html>