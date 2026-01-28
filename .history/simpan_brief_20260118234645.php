<?php
// 1. Tambahkan ini untuk melihat error jika terjadi masalah
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/koneksi.php';

if (isset($_POST['submit'])) {

    // Sanitasi input
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $jasa  = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tgl   = date('Y-m-d H:i:s');

    // Ambil nomor telpon dari hidden input 'no_telepon' (hasil dari intl-tel-input)
    $telp = preg_replace('/[^0-9]/', '', $_POST['no_telepon']);
    $telp = mysqli_real_escape_string($koneksi, $telp);

    $nama_file = '';

    // Proses upload gambar jika ada
    if (isset($_FILES['gambar_projek']) && $_FILES['gambar_projek']['error'] === 0) {
        
        $fileName  = $_FILES['gambar_projek']['name'];
        $tmpName   = $_FILES['gambar_projek']['tmp_name'];
        $ext       = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed   = ['jpg', 'jpeg', 'png'];

        if (in_array($ext, $allowed)) {
            // Buat folder Uploads jika belum ada
            if (!is_dir('Uploads')) {
                mkdir('Uploads', 0777, true);
            }

            $safeName  = preg_replace('/[^a-zA-Z0-9]/', '', $nama);
            $nama_file = 'CB_' . date('Ymd_His') . '_' . $safeName . '.' . $ext;

            if (!move_uploaded_file($tmpName, 'Uploads/' . $nama_file)) {
                // Jika gagal upload, kita kosongkan nama_file agar query tetap jalan
                $nama_file = '';
            }
        }
    }

    // Query INSERT
    $query = "INSERT INTO tb_projek 
        (nama_klien, email_klien, no_telepon, jasa_pilihan, kebutuhan_detail, nama_file, tgl_input, status) 
        VALUES 
        ('$nama', '$email', '$telp', '$jasa', '$pesan', '$nama_file', '$tgl', 'Pending')";

    if (mysqli_query($koneksi, $query)) {
        // Berhasil simpan, langsung pindah ke thanks.php
        header('Location: thanks.php');
        exit(); 
    } else {
        // Jika gagal query, tampilkan pesan errornya
        die("Error Database: " . mysqli_error($koneksi));
    }
} else {
    // Jika file diakses langsung tanpa POST submit
    header('Location: index.php');
    exit();
}
?>