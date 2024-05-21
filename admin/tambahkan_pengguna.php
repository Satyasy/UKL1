<?php
//import koneksi
require('./service/database.php');

if (isset($_POST["submit"])) {


    //Mengabill data insert
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $nomor_telepon = htmlspecialchars($_POST["nomor_telepon"]);
    $role = htmlspecialchars($_POST["role"]);

    $sql = "INSERT INTO pengguna 
    VALUES 
    ('0','$username','$email','$password','$nomor_telepon','$role') 
    ";

    mysqli_query($db, $sql);

    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'pengguna-admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'pengguna-admin.php';
        </script>";
    }

    return mysqli_affected_rows($db);
}




?>




<!DOCTYPE html>
<html>

<head>
    <title>SuperUser View</title>
    <link rel="stylesheet" href="style-admin.css">
</head>

<body>
    <h2>Tambahkan Pengguna</h2>
    <form method="POST" action="" >
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" placeholder="username" required><br>
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" placeholder="contoh@xxx.com" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br>
        <label for="nomor_telepon">Nomor Telepon:</label><br>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" placeholder="08xx atau +628xx" pattern="(\+62|0)[2-9]{1}[0-9]{7,12|11}" required>
        <input type="hidden" name="role" value="user"><br><br>
        <button type="submit" name="submit">Submit!</button>
    </form>
</body>

</html>