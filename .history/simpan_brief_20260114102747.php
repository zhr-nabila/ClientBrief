<?php
include 'includes/koneksi.php';

if(isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telepon']);
    $jasa = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

    $sql = "INSERT INTO tb_projek (nama_klien, email_klien, no_telepon, jasa_pilihan, kebutuhan_detail) 
            VALUES ('$nama', '$email', '$telp', '$jasa', '$pesan')";

    if(mysqli_query($koneksi, $sql)) {
        header("Location: thanks.php?name=" . urlencode($nama));
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>