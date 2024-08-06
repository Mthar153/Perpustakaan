<?php
$servername = "localhost";
$username = "root"; // ganti dengan username MySQL Anda
$password = "";     // ganti dengan password MySQL Anda
$dbname = "perpustakaan";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
