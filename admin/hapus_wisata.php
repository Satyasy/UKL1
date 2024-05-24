<?php 
require ('../service/database.php');

$id_wisata = $_GET["id"];

if (hwisata($id_wisata) > 0) {
    

        echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'wisata-admin.php';
        </script>";
        
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'wisata-admin.php';
        </script>";
    }

    