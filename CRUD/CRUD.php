<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Pengguna</title>
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
        /* .btn {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        } */
                    /* .btn-danger {
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
                    } */
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
        <h2>CRUD Pengguna</h2>
        <div class="btn-group">
            <a href="tambahkan_pengguna.php" class="btn btn-success">Tambahkan Pengguna</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Pengguna</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fungsi untuk membuat koneksi ke database
                function buatKoneksi() {
                    $servername = "localhost";
                    $username = "root";
                    $password = "altered";
                    $database = "pariwisata_db";

                    $koneksi = new mysqli($servername, $username, $password, $database);

                    // Memeriksa koneksi
                    if ($koneksi->connect_error) {
                        die("Koneksi gagal: " . $koneksi->connect_error);
                    }
                    return $koneksi;
                }

                // Fungsi untuk mendapatkan data pengguna dari database
                function getDataPengguna() {
                    $koneksi = buatKoneksi();
                    $sql = "SELECT * FROM pengguna";
                    $hasil = $koneksi->query($sql);
                    
                    if ($hasil->num_rows > 0) {
                        while($row = $hasil->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_pengguna"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["nomor_telepon"] . "</td>";
                            echo "<td>" . $row["role"] . "</td>";
                            echo "<td>
                                    <a href='edit_pengguna.php?id=" . $row["id_pengguna"] . "' class='btn btn-primary'>Edit</a>
                                    <a href='hapus_pengguna.php?id=" . $row["id_pengguna"] . "' class='btn btn-danger'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Tidak ada data pengguna</td></tr>";
                    }
                    $koneksi->close();
                }

                // Memanggil fungsi untuk menampilkan data pengguna
                getDataPengguna();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
