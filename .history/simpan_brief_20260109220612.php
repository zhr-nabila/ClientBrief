<?php
include 'koneksi.php';

if(isset($_POST['submit'])) {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $jasa  = $_POST['jasa'];
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    
    // Logika Upload File
    $file = $_FILES['file_brief']['name'];
    if($file) {
        move_uploaded_file($_FILES['file_brief']['tmp_name'], "uploads/".$file);
    }

    $q = "INSERT INTO tb_projek (nama_klien, email_klien, jasa_pilihan, kebutuhan_detail, nama_file) 
          VALUES ('$nama', '$email', '$jasa', '$pesan', '$file')";
    
    if(mysqli_query($koneksi, $q)) {
        // --- FITUR KIRIM EMAIL (NOTIFIKASI KE ADMIN) ---
        $to = "emailkamu@gmail.com"; // GANTI DENGAN EMAIL KAMU
        $subject = "Brief Baru Masuk dari: $nama";
        $message = "Halo Tim Z-Studio,\n\nAda brief baru masuk:\nNama: $nama\nEmail: $email\nJasa: $jasa\nDetail: $pesan\n\nCek dashboard admin untuk detailnya.";
        $headers = "From: noreply@z-studio.com";
        
        // Fungsi mail() hanya jalan jika hosting/server lokalmu sudah dikonfigurasi SMTP-nya
        @mail($to, $subject, $message, $headers);

        header("Location: thanks.php");
    }
}
?>