<?php 
require ('../service/database.php');

$id_pengguna = $_GET["id"];


//Mengecek terhapus
if (hpengguna($id_pengguna) > 0) {
    

        echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'pengguna-admin.php';
        </script>";
        
    } else {
        echo "<script>
        alert('Data gagal dihapus!');
        document.location.href = 'pengguna-admin.php';
        </script>";
    }

    
