<?php
include("/opt/web/UKL/service/database.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel User</title>
    <link rel="stylesheet" href="style.css">
    <?php //include("./layout/header.php") ?>
</head>
<table border="2px">
    <thead>
        <tr>
            <th>No</th>
            <th>id_pengguna</th>
            <th>Username</th>
            <th>Email</th>
            <th>No_telepon</th>
            <th>role</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM pengguna";
        $query = mysqli_query($db, $sql);

        while ($traveler = mysqli_fetch_array($query))
            echo "<tr>";

        echo "<td>" . $traveler["id_pengguna"] . "</td>";
        echo "<td>" . $traveler["username"] . "</td>";
        echo "<td>" . $traveler["email"] . "</td>";
        echo "<td>" . $traveler["nomor_telepon"] . "</td>";
        echo "<td>" . $traveler["password"] . "</td>";
        //echo "<td>" . $traveler["role"] . "</td>";

        echo "<td>";
        echo "<a href='edit.php?id=" . $traveler['id_pengguna'] . "'>Edit</a>";
        echo "<a href='hapus.php?id=" . $traveler['id_pengguna'] . "'>Delete</a>";
        echo "</td>";

        echo "</tr>";
        ?>

    </tbody>
</table>

</html>