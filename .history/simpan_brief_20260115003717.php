<?php
include 'includes/koneksi.php';

if (isset($_POST['submit'])) {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email   = mysqli_real_escape_string($koneksi, $_POST['email']);
    
    // Ambil nomor dari input hidden 'no_telepon' (hasil gabungan kode negara)
    $telp_raw = $_POST['no_telepon'];
    
    // BERSIHKAN NOMOR: Menghapus tanda '+' dan karakter non-angka lainnya
    // Supaya tersimpan format bersih (contoh: 628123456789)
    $telp = preg_replace('/[^0-9]/', '', $telp_raw);
    $telp = mysqli_real_escape_string($koneksi, $telp);

    $jasa    = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan   = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tgl     = date('Y-m-d H:i:s');
    
    $nama_file_baru = ""; 

    // LOGIKA UPLOAD GAMBAR
    if (!empty($_FILES['gambar_projek']['name'])) {
        $filename  = $_FILES['gambar_projek']['name'];
        $tmpname   = $_FILES['gambar_projek']['tmp_name'];
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFile  = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($ekstensiFile, $ekstensiValid)) {
            // Penamaan file baru dengan awalan CB (ClientBrief)
            $nama_file_baru = "CB_" . date('Ymd_His') . "_" . preg_replace("/[^a-zA-Z0-9]/", "", $nama) . "." . $ekstensiFile;
            
            // Pastikan folder 'Uploads' sudah ada
            if (!is_dir('Uploads')) {
                mkdir('Uploads', 0777, true);
            }
            
            move_uploaded_file($tmpname, 'Uploads/' . $nama_file_baru);
        }
    }

    // SIMPAN KE DATABASE
    // Pastikan nama kolom di tabel kamu adalah 'no_telepon'
    $query = "INSERT INTO tb_projek (nama_klien, email_klien, no_telepon, jasa_pilihan, kebutuhan_detail, nama_file, tgl_input, status) 
              VALUES ('$nama', '$email', '$telp', '$jasa', '$pesan', '$nama_file_baru', '$tgl', 'Pending')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: thanks.php");
        exit();
    } else {
        echo "Error Database: " . mysqli_error($koneksi);
    }
}
?>