<?php 
$hostname = "localhost";
$username = "root";
$password = "altered";
$database_name = "pariwisata_db";

$db = mysqli_connect($hostname, $username, $password, $database_name);
        

if ($db->connect_error) {
    echo "koneksi rusak!";
    die("error");
} 
