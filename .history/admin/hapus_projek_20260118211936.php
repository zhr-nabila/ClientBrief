<?php
include 'auth.php';
include '../includes/koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$get = mysqli_query($koneksi, "SELECT nama_file FROM tb_projek WHERE id = '$id'");

if (mysqli_num_rows($get) === 0) {
    echo "<script>
        alert('Data tidak ditemukan.');
        window.location='index.php';
    </script>";
    exit();
}

$data = mysqli_fetch_assoc($get);
$nama_file = $data['nama_file'];

if (!empty($nama_file)) {
    $file_path = "../Uploads/" . $nama_file;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

$delete = mysqli_query($koneksi, "DELETE FROM tb_projek WHERE id = '$id'");

if ($delete) {
    echo "<script>
        alert('Data berhasil dihapus.');
        window.location='index.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data.');
        window.location='index.php';
    </script>";
}
