<?php
include 'includes/koneksi.php';

if (isset($_POST['submit'])) {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email   = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telp    = mysqli_real_escape_string($koneksi, $_POST['telepon']);
    $jasa    = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan   = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tgl     = date('Y-m-d H:i:s');
    
    $nama_file_baru = ""; // Default jika tidak upload file

    // LOGIKA UPLOAD GAMBAR
    if (!empty($_FILES['gambar_projek']['name'])) {
        $filename  = $_FILES['gambar_projek']['name'];
        $filesize  = $_FILES['gambar_projek']['size'];
        $fileerror = $_FILES['gambar_projek']['error'];
        $tmpname   = $_FILES['gambar_projek']['tmp_name'];

        // 1. Cek Ekstensi
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFile  = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!in_array($ekstensiFile, $ekstensiValid)) {
            echo "<script>alert('Format file harus JPG/PNG!'); window.history.back();</script>";
            exit;
        }

        // 2. Cek Ukuran (2MB = 2.048.000 bytes)
        if ($filesize > 2048000) {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 2MB'); window.history.back();</script>";
            exit;
        }

        // 3. Auto-Rename (Format: Z-STUDIO_Tanggal_NamaKlien.ekstensi)
        $nama_bersih = preg_replace("/[^a-zA-Z0-9]/", "", $nama); // Hapus karakter aneh di nama
        $nama_file_baru = "Z-STUDIO_" . date('Ymd_His') . "_" . $nama_bersih . "." . $ekstensiFile;

        // Pindahkan file
        move_uploaded_file($tmpname, 'Uploads/' . $nama_file_baru);
    }

    // SIMPAN KE DATABASE
    // Sesuaikan nama kolom tabel kamu (nama_klien, email_klien, dll)
    $query = "INSERT INTO tb_projek (nama_klien, email_klien, no_telp, jasa_pilihan, kebutuhan_detail, nama_file, tgl_input, status) 
              VALUES ('$nama', '$email', '$telp', '$jasa', '$pesan', '$nama_file_baru', '$tgl', 'Pending')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Brief berhasil dikirim! Tim kami akan segera menghubungi Anda.'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>