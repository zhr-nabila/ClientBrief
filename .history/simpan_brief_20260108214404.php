<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama  = $_POST['nama'];
    $email = $_POST['email'];
    $jasa  = $_POST['jasa'];
    $pesan = $_POST['pesan'];

    $nama_file = $_FILES['file_brief']['name'];
    $tmp_file  = $_FILES['file_brief']['tmp_name'];
    $folder    = "uploads/" . $nama_file;

    move_uploaded_file($tmp_file, $folder);

    // Query simpan ke database
    $query = "INSERT INTO tb_projek (nama_klien, email_klien, jasa_pilihan, kebutuhan_detail, nama_file) 
              VALUES ('$nama', '$email', '$jasa', '$pesan', '$nama_file')";
    
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>
                alert('Berhasil! Brief kamu sudah kami terima.');
                window.location='index.php';
              </script>";
    } else {
        echo "Aduh, ada error nih: " . mysqli_error($koneksi);
    }
}
?>