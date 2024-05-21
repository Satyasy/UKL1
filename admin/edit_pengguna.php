<?php
 //import koneksi
include('../service/database.php');


// Dapatkan id_pengguna dari URL
$id_pengguna = $_GET["id"];

// Query database
$user = query("SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna")[0];

if (isset($_POST["submit"])) {


    //Mengabill data update
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    $nomor_telepon = htmlspecialchars($_POST["nomor_telepon"]);
    $role = htmlspecialchars($_POST["role"]);

    $user = "UPDATE pengguna SET 
            username = '$username',
            email = '$email',
            password =  '$password',
            nomor_telepon = '$nomor_telepon',
            role = '$role'
            WHERE id_pengguna = $id_pengguna";

    mysqli_query($db, $user);

    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
        alert('Data berhasil diedit!');
        document.location.href = 'pengguna-admin.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal diedit!');
        document.location.href = 'pengguna-admin.php';
        </script>";
    }

    return mysqli_affected_rows($db);
}




?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="style-admin.css">
</head>
<body>
    <h2>Edit Data Pengguna</h2>
    <form method="post" action="">
        <input type="hidden" name="id_pengguna?" value="<?php echo $user['id_pengguna']; ?>">
        <label>Username:</label><br>
        <input type="text" name="username" value="<?php echo $user['username']; ?>"><br>
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $user['email']; ?>"><br>
        <label>Password:</label><br>
        <input type="text" name="password" value="<?php echo $user['password']; ?>"><br>
        <label>Nomor Telepon:</label><br>
        <input type="text" name="nomor_telepon" value="<?php echo $user['nomor_telepon']; ?>"><br>
        <label>Role:</label><br>
        <input type="text" name="role" value="<?php echo $user['role']; ?>"><br><hr>
        <button type="submit" name="submit" class="btn">Simpan Perubahan!</button>
    </form>
</body>
</html>