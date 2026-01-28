<?php
// Konfigurasi database
$host = "localhost";
$username = "root";
$password = "";
$database = "db_client_brief";

// Membuat koneksi dengan error handling
try {
    $koneksi = mysqli_connect($host, $username, $password, $database);
    
    // Cek koneksi
    if (!$koneksi) {
        throw new Exception("Koneksi database gagal: " . mysqli_connect_error());
    }
    
    // Set charset
    if (!mysqli_set_charset($koneksi, "utf8mb4")) {
        throw new Exception("Error setting charset: " . mysqli_error($koneksi));
    }
    
    // Set timezone
    date_default_timezone_set('Asia/Jakarta');
    
} catch (Exception $e) {
    // Log error dan tampilkan pesan yang ramah
    error_log($e->getMessage());
    die("Maaf, sedang ada gangguan sistem. Silakan coba beberapa saat lagi.");
}
?>