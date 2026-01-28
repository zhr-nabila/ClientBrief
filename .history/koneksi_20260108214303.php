<?php
// Seting database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_client_brief"; // Pastikan nama DB ini sama dengan yang kamu buat tadi

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Gagal nyambung ke database: " . mysqli_connect_error());
}
?>