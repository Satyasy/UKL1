<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperUser View</title>
</head>
<?php require '../layout/superheader.php'; ?>
<body>
    <form action="">
    <form>
            <h2>Ketik Apa yang anda cari dibawah</h2>
            <div class="search">
                <span class="material-symbols-outlined">
                    search
                </span>
                <input type="search" class="search-input" id="find" placeholder="Cari rating berdasarkan"
                    onkeyup="search()" />
            </div>
    </form>
</body>
<?php require '../layout/footer.php';  ?>
<script src="/js/script.js"></script>
</html>