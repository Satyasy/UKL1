<?php 
require ('../service/database.php');
$user = query("SELECT * FROM pengguna");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pengguna</title>
    <link rel="stylesheet" href="/dist/style.css">
</head>

<?php include "../layout/superheader.php" ?>

<body>
    <div class="container">
        <h2>Daftar Pengguna</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>ID Pengguna</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

            <?php $i = 1; ?>
                <?php foreach ($user as $row): ?>
                    <tr>
                        <td><?= "$i"; ?></td>
                        <td><?= $row["username"]; ?></td>
                        <td> <?= $row["id_pengguna"]; ?></td>
                        <td><?= $row["email"]; ?></td>
                        <td><?= $row["nomor_telepon"]; ?></td>
                        <td><?= $row["password"]; ?></td>
                        <td><?= $row["role"]; ?></td>
                        <td>
                            <a href="edit_pengguna.php? id=<?= $row["id_pengguna"]; ?>" class="btn" style=" margin:5px; padding:10px;  ">EDIT</a>
                            <a href="hapus_pengguna.php? id=<?= $row["id_pengguna"]; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn" style=" margin:5px; padding:10px; ">DELETE</a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a href="tambahkan_pengguna.php" class="btn">Tambahkan Pengguna</a>
        </div>
    </div>
</body>

</html>