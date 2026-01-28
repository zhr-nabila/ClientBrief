<?php
include 'includes/koneksi.php';

if(isset($_POST['submit'])) {
    // 1. Ambil data teks
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $telp  = mysqli_real_escape_string($koneksi, $_POST['telepon']);
    $jasa  = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);

    // 2. Logika Upload Gambar
    $nama_file_db = ""; // default kosong jika tidak upload
    if(isset($_FILES['gambar_projek']) && $_FILES['gambar_projek']['error'] == 0) {
        $target_dir = "uploads/";
        $file_extension = pathinfo($_FILES["gambar_projek"]["name"], PATHINFO_EXTENSION);
        
        // Buat nama file unik agar tidak tertukar (contoh: 170521_nama.jpg)
        $nama_file_baru = time() . "_" . preg_replace("/[^a-zA-Z0-9]/", "_", $nama) . "." . $file_extension;
        $target_file = $target_dir . $nama_file_baru;

        // Pindahkan file dari folder sementara ke folder uploads
        if(move_uploaded_file($_FILES["gambar_projek"]["tmp_name"], $target_file)) {
            $nama_file_db = $nama_file_baru;
        }
    }

    // 3. Simpan ke Database (Sesuaikan nama kolom tabelmu)
    // Asumsi tabel kamu punya kolom: nama_file
    $sql = "INSERT INTO tb_projek (nama_klien, email_klien, no_telepon, jasa_pilihan, kebutuhan_detail, nama_file, status) 
            VALUES ('$nama', '$email', '$telp', '$jasa', '$pesan', '$nama_file_db', 'Pending')";

    if(mysqli_query($koneksi, $sql)) {
        // Berhasil, lempar ke thanks.php
        header("Location: thanks.php?name=" . urlencode($nama));
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika akses file ini tanpa pencet tombol submit
    header("Location: index.php");
}
?>