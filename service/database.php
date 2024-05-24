<?php

$hostname = "localhost";
$username = "root";
$password = "";
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

function hkuliner($id)
{
    global $db;

    mysqli_query($db, "DELETE FROM kuliner WHERE id_kuliner = $id");

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
    $eksgambar = explode('.', $namafile);
    $eksgambar = strtolower(end($eksgambar));
    if (!in_array($eksgambar, $eksgambarvalid)) {
        echo "<script>
                    alert('Ekstensi gambar tidak valid!');
                    </script>";
        return false;
    }


    // Pengecekan apakah gambar diupload
    if ($error === 4) {
        echo "<script>
                    alert('Silahkan Pilih Gambar!');
                    </script>";
        return false;
    }

    if ($ukuranfile > 10000000) {
        echo "<script>
                    alert('Ukuran gambar terlalu besar!');
                    </script>";
        return false;
    }

    //newname file
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $eksgambar;


    // Uploading File picture
    move_uploaded_file($tmpname, '../img/upload/' . $namafilebaru);

    return $namafilebaru;
}

function registrasi($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $email = strtolower(stripslashes($data["email"]));
    $nomor_telepon = stripslashes($data["nomor_telepon"]);
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password"]);
    $role = $data["role"];

    // Check if username,email and nomer tellpon already exists
    $result = mysqli_query($db, "SELECT username FROM pengguna WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    $result = mysqli_query($db, "SELECT email FROM pengguna WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Email sudah terdaftar!');</script>";
        return false;
    }

    $result = mysqli_query($db, "SELECT nomor_telepon FROM pengguna WHERE nomor_telepon = '$nomor_telepon'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>alert('Nomor telepon sudah terdaftar!');</script>";
        return false;
    }


    //hapus spacing username,email and telp

    if (empty(trim($username))) {
        return false;
    }


    // Confirm password
    if ($password !== $password2) {
        echo "<script>alert('Password tidak sama!');</script>";
        return false;
    }

    // Encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $tambah = "INSERT INTO pengguna (id_pengguna, username, email, password, nomor_telepon, role) 
               VALUES ('0', '$username', '$email', '$password', '$nomor_telepon', '$role')";

    mysqli_query($db, $tambah);

    return mysqli_affected_rows($db);
}