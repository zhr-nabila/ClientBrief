<?php
include 'auth.php';
include '../includes/koneksi.php';

if (isset($_POST['update_status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan_admin'];

    $update = mysqli_query($koneksi, "UPDATE tb_projek SET 
        status = '$status', 
        keterangan_admin = '$keterangan' 
        WHERE id = '$id'");

    if ($update) {
        echo "<script>alert('Status berhasil diperbarui!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui status.'); window.location='index.php';</script>";
    }
}
?>