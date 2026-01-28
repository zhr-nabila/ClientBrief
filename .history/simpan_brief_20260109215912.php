<?php
include 'koneksi.php';
if(isset($_POST['submit'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = $_POST['email'];
    $jasa = $_POST['jasa'];
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    
    $file = $_FILES['file_brief']['name'];
    if($file) {
        move_uploaded_file($_FILES['file_brief']['tmp_name'], "uploads/".$file);
    }

    $q = "INSERT INTO tb_projek (nama_klien, email_klien, jasa_pilihan, kebutuhan_detail, nama_file) 
          VALUES ('$nama', '$email', '$jasa', '$pesan', '$file')";
    
    if(mysqli_query($koneksi, $q)) {
        header("Location: thanks.php");
    }
}
?>