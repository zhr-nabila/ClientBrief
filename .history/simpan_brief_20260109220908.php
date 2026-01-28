<?php
include 'koneksi.php';

if(isset($_POST['submit'])) {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $jasa  = $_POST['jasa'];
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    
    // Handler Upload File
    $file_name = $_FILES['file_brief']['name'];
    if($file_name) {
        $tmp_name = $_FILES['file_brief']['tmp_name'];
        move_uploaded_file($tmp_name, "uploads/".$file_name);
    }

    $query = "INSERT INTO tb_projek (nama_klien, email_klien, jasa_pilihan, kebutuhan_detail, nama_file, status) 
              VALUES ('$nama', '$email', '$jasa', '$pesan', '$file_name', 'Pending')";
    
    if(mysqli_query($koneksi, $query)) {
        // Simulasi Logika Email (Simpan ke log atau kirim jika di hosting)
        $to = "admin@zstudio.com";
        $subject = "New Project Brief from $nama";
        $body = "Service: $jasa \nMessage: $pesan";
        $headers = "From: system@zstudio.com";
        
        // Di server asli gunakan: mail($to, $subject, $body, $headers);
        
        // Lempar ke halaman thanks dengan status sukses
        header("Location: thanks.php?status=success&name=" . urlencode($nama));
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>