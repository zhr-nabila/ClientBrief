<?php
include 'auth.php';
include '../includes/koneksi.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);

    // 1. Ambil nama file gambar agar bisa dihapus dari folder Uploads
    $ambil_data = mysqli_query($koneksi, "SELECT nama_file FROM tb_projek WHERE id = '$id'");
    
    if (mysqli_num_rows($ambil_data) > 0) {
        $data = mysqli_fetch_array($ambil_data);
        $nama_file = $data['nama_file'];

        // 2. Hapus file fisik di folder ../Uploads/ jika file ada
        if (!empty($nama_file)) {
            $path = "../Uploads/" . $nama_file;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // 3. Hapus data dari database
        $hapus = mysqli_query($koneksi, "DELETE FROM tb_projek WHERE id = '$id'");

        if ($hapus) {
            echo "<script>alert('Data berhasil dihapus selamanya.'); window.location='index.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data dari database.'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Data tidak ditemukan.'); window.location='index.php';</script>";
    }
} else {
    header("Location: index.php");
}
?>