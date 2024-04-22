<?php
session_start();

// Memeriksa apakah pengguna sudah login sebagai admin atau belum
if(!isset($_SESSION["admin"])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum login
    exit();
}

// Ambil data admin dari session
$admin = $_SESSION["admin"];

// Ambil data pengguna dari database atau sumber data lainnya sesuai kebutuhan
$data_pengguna = [
    ["id" => 1, "username" => "admin1", "email" => "admin1@example.com", "role" => "admin"],
    ["id" => 2, "username" => "user1", "email" => "user1@example.com", "role" => "user"],
    ["id" => 3, "username" => "user2", "email" => "user2@example.com", "role" => "user"]
    // Data lainnya
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-top: 0;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-danger {
            background-color: #f44336;
        }
        .btn-success {
            background-color: #4caf50;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-group {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $admin["username"]; ?>!</h2>
        <p><a href="logout.php" class="btn btn-danger">Logout</a></p>
        <h3>Daftar Pengguna</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_pengguna as $pengguna) : ?>
                <tr>
                    <td><?php echo $pengguna["id"]; ?></td>
                    <td><?php echo $pengguna["username"]; ?></td>
                    <td><?php echo $pengguna["email"]; ?></td>
                    <td><?php echo $pengguna["role"]; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
