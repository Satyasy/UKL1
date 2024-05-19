<?php
include "../service/database.php";
session_start();
$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("Location: /index.php");
    exit(); // Pastikan untuk keluar setelah pengalihan header
}

if (isset($_POST["register"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $nomor_telepon = $_POST["number"];
    $password = $_POST["password"];

    // Hash password before storing it in the database
    $hashed_password = md5($password);

    // Check if the username, email, and phone number already exist in the database
    $sql_check = "SELECT * FROM pengguna WHERE email=? OR username=? OR nomor_telepon=?";
    $stmt_check = $db->prepare($sql_check);
    $stmt_check->bind_param("sss", $email, $username, $nomor_telepon);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        // Jika data sudah ada, tampilkan pesan error
        echo "<script>alert('Username, email, atau nomor telepon sudah terdaftar');</script>";
    } else {
        // Jika data belum ada, lakukan pendaftaran
        $sql = "INSERT INTO pengguna (email, username, nomor_telepon, password) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("ssss", $email, $username, $nomor_telepon, $hashed_password);
        
        if ($stmt->execute()) {
            // Redirect to login page after successful registration
            header("Location: login.php?register_success=1");
            // Pesan sukses setelah data berhasil dimasukkan
            echo "<script>alert('Akun berhasil terdaftar. Silahkan login');</script>";
            exit(); // Pastikan untuk keluar setelah pengalihan header
        } else {
            $register_message = "Gagal mendaftarkan akun. Silahkan coba lagi.";
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en"
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/dist/style2.css" />
    <title>Register Akun</title>
</head>

<script>
        // JavaScript untuk menampilkan pesan error sebagai popup
        <?php if (!empty($register_message)) : ?>
            alert('<?php echo $register_message; ?>');
        <?php endif; ?>
    </script>

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
                            <label for="username">Nama:</label><br />
                            <input type="text" name="username" id="username" class="input-field" /><br />
                            <label for="email">Email:</label><br />
                            <input type="email" name="email" id="email" class="input-field" /><br />
                            <label for="number">Nomor Telepon:</label><br />
                            <input type="tel" name="number" id="number" class="input-field" /><br />
                            <label for="password">Password:</label><br />
                            <input type="password" name="password" id="password" class="input-field" /><br />
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