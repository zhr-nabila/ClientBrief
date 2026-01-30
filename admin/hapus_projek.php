<?php
include 'auth.php';
include '../includes/koneksi.php';

header('Content-Type: application/json');

if (!isset($_GET['id'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'ID tidak ditemukan'
    ]);
    exit();
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);

$get = mysqli_query($koneksi, "SELECT nama_file, file_referensi FROM tb_projek WHERE id = '$id'");

if (mysqli_num_rows($get) === 0) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Data tidak ditemukan'
    ]);
    exit();
}

$data = mysqli_fetch_assoc($get);
$nama_file = $data['nama_file'];
$file_referensi = $data['file_referensi'];

// Hapus file dari folder Uploads
if (!empty($file_referensi)) {
    $files = json_decode($file_referensi, true);
    if (is_array($files)) {
        foreach ($files as $file) {
            $file_path = "../Uploads/" . $file;
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
    }
} elseif (!empty($nama_file)) {
    $file_path = "../Uploads/" . $nama_file;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

$delete = mysqli_query($koneksi, "DELETE FROM tb_projek WHERE id = '$id'");

if ($delete) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil dihapus'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Gagal menghapus data: ' . mysqli_error($koneksi)
    ]);
}