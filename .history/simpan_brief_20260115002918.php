<?php
include 'includes/koneksi.php';

if (isset($_POST['submit'])) {
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email   = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telp    = mysqli_real_escape_string($koneksi, $_POST['no_telepon']);
    $jasa    = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan   = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tgl     = date('Y-m-d H:i:s');
    
    $nama_file_baru = ""; 

    if (!empty($_FILES['gambar_projek']['name'])) {
        $filename  = $_FILES['gambar_projek']['name'];
        $tmpname   = $_FILES['gambar_projek']['tmp_name'];
        $ekstensiValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFile  = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($ekstensiFile, $ekstensiValid)) {
            $nama_file_baru = "CB_" . date('Ymd_His') . "_" . preg_replace("/[^a-zA-Z0-9]/", "", $nama) . "." . $ekstensiFile;
            move_uploaded_file($tmpname, 'Uploads/' . $nama_file_baru);
        }
    }

    $query = "INSERT INTO tb_projek (nama_klien, email_klien, no_telepon, jasa_pilihan, kebutuhan_detail, nama_file, tgl_input, status) 
              VALUES ('$nama', '$email', '$telp', '$jasa', '$pesan', '$nama_file_baru', '$tgl', 'Pending')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: thanks.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>