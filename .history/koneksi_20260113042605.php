<?php
// Konfigurasi database
$host = "localhost";
$username = "root";  // Sesuaikan
$password = "";      // Sesuaikan
$database = "db_client_brief";

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Set charset
mysqli_set_charset($koneksi, "utf8mb4");

// Set timezone
date_default_timezone_set('Asia/Jakarta');
?>