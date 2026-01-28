<?php
include 'includes/koneksi.php';

if (isset($_POST['submit'])) {

    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $jasa  = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tgl   = date('Y-m-d H:i:s');

    // bersihin nomor biar cuma angka
    $telp = preg_replace('/[^0-9]/', '', $_POST['no_telepon']);
    $telp = mysqli_real_escape_string($koneksi, $telp);

    $nama_file = '';

    // upload gambar 
    if (!empty($_FILES['gambar_projek']['name'])) {

        $fileName  = $_FILES['gambar_projek']['name'];
        $tmpName   = $_FILES['gambar_projek']['tmp_name'];
        $ext       = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed   = ['jpg', 'jpeg', 'png'];

        if (in_array($ext, $allowed)) {

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
        header('Location: thanks.php');
        exit;
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
