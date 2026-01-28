<?php
// File: includes/koneksi.php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'db_client_brief';

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Database connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Function untuk sanitize input
function clean_input($data) {
    global $koneksi;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    $data = mysqli_real_escape_string($koneksi, $data);
    return $data;
}
?>