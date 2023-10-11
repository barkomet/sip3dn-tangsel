<?php
$host = "localhost"; // Sesuaikan dengan host database Anda
$username = "username_db"; // Ganti dengan nama pengguna database Anda
$password = "password_db"; // Ganti dengan kata sandi database Anda
$database = "datauseropd"; // Sesuaikan dengan nama database Anda

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
