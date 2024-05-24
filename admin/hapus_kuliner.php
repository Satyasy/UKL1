<?php
require ('../service/database.php');

$id_kuliner = $_GET["id"];

if (hkuliner($id_kuliner) > 0) {


    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'kuliner-admin.php';
        </script>";

} else {
    echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'kuliner-admin.php';
        </script>";
}