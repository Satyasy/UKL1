<?php
$hostname = "localhost";
$username = "root";
$password = "altered";
$database_name = "pariwisata_db1";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if ($db->connect_error) {
    echo "koneksi rusak!";
    die("error");
}

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function hwisata($id)
{
    global $db;

    mysqli_query($db, "DELETE FROM wisata where id_wisata = $id");

    return mysqli_affected_rows($db);
}

function hpengguna($id)
{
    global $db;

    mysqli_query($db, "DELETE FROM pengguna where id_pengguna = $id");

    return mysqli_affected_rows($db);
}

function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

        //Cek ekstensi file upload
        $eksgambarvalid = ['jpg', 'png', 'jpeg'];
        $eksgambar= explode('.',$namafile);
        $eksgambar = strtolower(end($eksgambar));
        if (!in_array($eksgambar, $eksgambarvalid)) {
            echo "<script>
                    alert('Ekstensi gambar tidak valid!');
                    </script>";
            return false;
        }
    
    
        // Pengecekan apakah gambar diupload
        if($error === 4) {
            echo "<script>
                    alert('Silahkan Pilih Gambar!');
                    </script>";
            return false;
        }
    
        if($ukuranfile > 10000000) { 
            echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                    </script>";
            return false;
        }

        //newname file
        $namafilebaru = uniqid();
        $namafilebaru.= '.';
        $namafilebaru.= $eksgambar;
    
    
        // Uploading File picture
        move_uploaded_file($tmpname, 'img' . $namafilebaru);
    
        return $namafilebaru;
}

