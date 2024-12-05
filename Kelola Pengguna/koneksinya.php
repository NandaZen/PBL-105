<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "kost_2";

$koneksi = mysqli_connect($host,$username,$password,$database, 3306);

if (!$koneksi) {
    die("Gagal terhubung ke database. Error ". "" . mysqli_connect_error());
}
?>