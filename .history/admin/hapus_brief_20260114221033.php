<?php
include 'includes/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 1. Ambil nama file gambar dulu supaya bisa dihapus dari folder
    $ambil_data = mysqli_query($koneksi, "SELECT gambar_projek FROM brief_projek WHERE id = '$id'");
    $data = mysqli_fetch_array($ambil_data);
    $nama_file = $data['gambar_projek'];

    // 2. Hapus file fisik di folder uploads (jika ada)
    if ($nama_file != "" && file_exists("uploads/" . $nama_file)) {
        unlink("uploads/" . $nama_file);
    }

    // 3. Hapus data dari database
    $hapus = mysqli_query($koneksi, "DELETE FROM brief_projek WHERE id = '$id'");

    if ($hapus) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data.'); window.location='admin.php';</script>";
    }
} else {
    header("Location: admin.php");
}
?>