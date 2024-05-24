<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location:../Register/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/dist/style.css">
</head>

<body>
    <?php include "../layout/superheader.php" ?>

    <div class="container">
        <div class="dashboard-content">
            <div class="about-text">
                <h1 style="text-transform: capitalize; margin-top: 20vh;"><span>Halo <?php
                $row = $_SESSION['username_or_email'];
                echo "$row!";
                ?></span> <br>
                    Ini adalah Halaman Utama dari Superuser Page!!</h1>
                <p>
                    Halaman ini adalah tempat dimana semua data yang ada di website Travo disimpan. Anda dapat Mengedit,
                    Menghapus bahkan Menambah data!.
                </p>
            </div>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
<?php include "../layout/footer.php" ?>

</html>