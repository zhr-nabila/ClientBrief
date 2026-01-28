<?php
include 'includes/koneksi.php';

if (isset($_POST['submit'])) {

    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $jasa  = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tgl   = date('Y-m-d H:i:s');

    // Nomor telepon - sudah diproses numeric only di JavaScript
    $telp = isset($_POST['no_telepon']) ? $_POST['no_telepon'] : '';
    $telp = preg_replace('/[^0-9]/', '', $telp);
    $telp = mysqli_real_escape_string($koneksi, $telp);

    $nama_file = '';

    // Upload gambar
    if (!empty($_FILES['gambar_projek']['name'])) {
        $fileName  = $_FILES['gambar_projek']['name'];
        $tmpName   = $_FILES['gambar_projek']['tmp_name'];
        $fileSize  = $_FILES['gambar_projek']['size'];
        $ext       = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed   = ['jpg', 'jpeg', 'png'];
        
        // Max file size 5MB
        $maxSize   = 5 * 1024 * 1024;

        if (in_array($ext, $allowed) && $fileSize <= $maxSize) {
            if (!is_dir('Uploads')) {
                mkdir('Uploads', 0777, true);
            }

            $safeName  = preg_replace('/[^a-zA-Z0-9]/', '', $nama);
            $nama_file = 'CB_' . date('Ymd_His') . '_' . $safeName . '.' . $ext;

            move_uploaded_file($tmpName, 'Uploads/' . $nama_file);
        }
    }

    $query = "INSERT INTO tb_projek 
        (nama_klien, email_klien, no_telepon, jasa_pilihan, kebutuhan_detail, nama_file, tgl_input, status) 
        VALUES 
        ('$nama', '$email', '$telp', '$jasa', '$pesan', '$nama_file', '$tgl', 'Pending')";

    if (mysqli_query($koneksi, $query)) {
        // REDIRECT KE HALAMAN TERIMA KASIH
        header('Location: thanks.php');
        exit();
    } else {
        // ERROR HANDLING
        echo "<script>
            alert('Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            window.location.href = 'index.php';
        </script>";
        exit();
    }
} else {
    // JIKA AKSES LANGSUNG TANPA SUBMIT, REDIRECT KE INDEX
    header('Location: index.php');
    exit();
}
?>