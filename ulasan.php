<?php
session_start();
if (!isset($_SESSION['id_pengguna'])) {
    header('Location: Register/login.php');
    exit;
}

require 'service/database.php';

if (isset($_POST["submit"])) {
    $id_pengguna = $_SESSION['id_pengguna'];
    $id_wisata = !empty($_GET['id_wisata']) ? $_GET['id_wisata'] : NULL;
    $id_kuliner = !empty($_GET['id_kuliner']) ? $_GET['id_kuliner'] : NULL;
    $rating = $_POST['rating'];
    $komentar = $_POST['komentar'];

    // Check if a duplicate entry already exists
    $sql_check = "SELECT COUNT(*) FROM ulasan WHERE id_pengguna =? AND (id_wisata =? OR id_kuliner =?)";
    $stmt_check = $db->prepare($sql_check);
    $stmt_check->bind_param("iii", $id_pengguna, $id_wisata, $id_kuliner);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    $row_check = $result_check->fetch_assoc();

    if ($row_check['COUNT(*)'] > 0) {
        // Update the existing entry
        $sql_update = "UPDATE ulasan SET rating =?, komentar =? WHERE id_pengguna =? AND (id_wisata =? OR id_kuliner =?)";
        $stmt_update = $db->prepare($sql_update);
        $stmt_update->bind_param("ssiii", $rating, $komentar, $id_pengguna, $id_wisata, $id_kuliner);

        if ($stmt_update->execute()) {
            echo "<script>
            alert('Terima Kasih atas perbaruan ulasan anda!');
            document.location.href = 'product.php';
            </script>";
        } else {
            echo "<script>
            alert('Perbaruan ulasan gagal!');
            document.location.href = 'product.php';
            </script>";
        }

        $stmt_update->close();
    } else {
        // Insert a new entry
        $sql_insert = "INSERT INTO ulasan (id_pengguna, id_wisata, id_kuliner, rating, komentar, waktu) VALUES (?,?,?,?,?,?)";
        $stmt_insert = $db->prepare($sql_insert);
        $stmt_insert->bind_param("iiiss", $id_pengguna, $id_wisata, $id_kuliner, $rating, $komentar, $waktu);

        if ($stmt_insert->execute()) {
            echo "<script>
            alert('Terima Kasih atas ulasan anda!');
            document.location.href = 'product.php';
            </script>";
        } else {
            echo "<script>
            alert('Ulasan gagal ditambahkan!');
            document.location.href = 'product.php';
            </script>";
        }

        $stmt_insert->close();
    }

    $db->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/style-admin.css">
    <title>Form Ulasan</title>
</head>

<body>
    <h2>Form Ulasan</h2>

    <form method="POST">
        <input type="hidden" name="id_pengguna" value="<?php echo $_SESSION['id_pengguna']; ?>">

        <label for="rating">Rating (1-5):</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required><br>

        <label for="komentar">Komentar:</label><br>
        <textarea name="komentar" id="komentar" rows="4" cols="50" required></textarea><br>
        <input type="hidden" name="waktu" id="waktu" value="<?php echo date('Y-m-d H:i:s'); ?>">

        <button type="submit" name="submit" class="btn" ">Kirim Ulasan!</button>
    </form>
</body>
</html>