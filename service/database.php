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

function query ($query) {
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    
    }
    return $rows;
}
