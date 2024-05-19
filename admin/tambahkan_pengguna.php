<?php
//import koneksi
include('../service/database.php');

if (isset($_POST["submit"])) {


    //Mengabill data insert
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $nomor_telepon = $_POST["nomor_telepon"];
    $role = $_POST["role"];

    $sql = "INSERT INTO pengguna 
    VALUES 
    ('0','$username','$email','$password','$nomor_telepon','$role') 
    ";

    mysqli_query($db, $sql);

    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'CRUD.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'CRUD.php';
        </script>";
    }
}




?>




<!DOCTYPE html>
<html>

<head>
    <title>Tambahkan Pengguna</title>
</head>

<body>
    <h2>Tambahkan Pengguna</h2>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" placeholder="username"><br>
        <label for="email">Email:</label><br>
        <input type="text" name="email" id="email" placeholder="contoh@xxx.com"><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password"><br>
        <label for="nomor_telepon">Nomor Telepon:</label><br>
        <input type="tel" id="nomor_telepon" name="nomor_telepon" placeholder="08xx atau +628xx" pattern="(\+62|0)[2-9]{1}[0-9]{7,12}" required>
        <input type="hidden" name="role" value="user"><br><br>
        <button type="submit" name="submit">Submit!</button>
    </form>
</body>

</html>