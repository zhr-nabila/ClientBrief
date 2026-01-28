<?php
include 'auth.php'; // Pastikan admin login
include '../includes/koneksi.php'; // Hubungkan ke database

if (isset($_GET['id'])) {
    // Ambil ID dan bersihkan untuk keamanan
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // 1. Ambil nama file gambar agar bisa dihapus dari folder fisik
    $ambil_data = mysqli_query($koneksi, "SELECT nama_file FROM tb_projek WHERE id = '$id'");
    
    if (mysqli_num_rows($ambil_data) > 0) {
        $data = mysqli_fetch_array($ambil_data);
        $nama_file = $data['nama_file'];

        // 2. Hapus file gambar di folder ../Uploads/ jika ada
        if (!empty($nama_file)) {
            $path_gambar = "../Uploads/" . $nama_file;
            if (file_exists($path_gambar)) {
                unlink($path_gambar); // Menghapus file dari server
            }
        }

        // 3. Hapus data dari tabel database
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_projek WHERE id = '$id'");

        if ($hapus) {
            // Berhasil: arahkan kembali ke index admin
            echo "<script>alert('Data dan file gambar berhasil dihapus!'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data dari database.'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan!'); window.location='index.php';</script>";
    }
} else {
    // Jika akses file langsung tanpa ID
    header("Location: index.php");
    exit();
}
?>