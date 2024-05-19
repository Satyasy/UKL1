<?php
include "../service/database.php";
session_start();

if (isset($_POST['login'])) {
    header("Location: /index.php");
    echo "<script>alert('Anda telah Login!')</script>";
    exit(); // Pastikan untuk keluar setelah pengalihan header
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        header("location: /index.php");
    } else {
        $login_message = "Invalid username or password.";
    }
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sedan+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                            <label for="username">Username:</label><br />
                            <input type="text" name="username" class="input-field" /><br />
                            <label for="email">Email:</label><br />
                            <input type="text" name="email" class="input-field" /><br />
                            <label for="password">Password:</label><br />
                            <input type="password" name="password" class="input-field" /><br />
                            <input type="hidden" name="role" value="admin" />
                            <button name="login" class="button">Login</button> <br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>