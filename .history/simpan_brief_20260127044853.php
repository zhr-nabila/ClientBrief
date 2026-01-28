<?php
include 'includes/koneksi.php';

if (isset($_POST['submit'])) {
    $nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $jasa  = mysqli_real_escape_string($koneksi, $_POST['jasa']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    $tgl   = date('Y-m-d H:i:s');

    $telp = preg_replace('/[^0-9]/', '', $_POST['no_telepon']);
    $telp = mysqli_real_escape_string($koneksi, $telp);

    $uploaded_files = array();
    
    // Multi-file upload
    if (!empty($_FILES['gambar_projek']['name'][0])) {
        if (!is_dir('Uploads')) {
            mkdir('Uploads', 0777, true);
        }
        
        $allowed_ext = ['jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'zip', 'rar'];
        $max_size = 10 * 1024 * 1024; // 10MB
        
        foreach ($_FILES['gambar_projek']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['gambar_projek']['name'][$key];
            $file_size = $_FILES['gambar_projek']['size'][$key];
            $file_error = $_FILES['gambar_projek']['error'][$key];
            
            if ($file_error === UPLOAD_ERR_OK && $file_size <= $max_size) {
                $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                
                if (in_array($file_ext, $allowed_ext)) {
                    $safe_name = preg_replace('/[^a-zA-Z0-9]/', '', $nama);
                    $new_filename = 'CB_' . date('Ymd_His') . '_' . $key . '_' . $safe_name . '.' . $file_ext;
                    
                    if (move_uploaded_file($tmp_name, 'Uploads/' . $new_filename)) {
                        $uploaded_files[] = $new_filename;
                    }
                }
            }
        }
    }
    
    // Simpan nama file pertama untuk kompatibilitas (opsional)
    $nama_file = !empty($uploaded_files) ? $uploaded_files[0] : '';
    $file_referensi = !empty($uploaded_files) ? json_encode($uploaded_files) : '';

    $query = "INSERT INTO tb_projek 
        (nama_klien, email_klien, no_telepon, jasa_pilihan, kebutuhan_detail, nama_file, file_referensi, tgl_input, status) 
        VALUES 
        ('$nama', '$email', '$telp', '$jasa', '$pesan', '$nama_file', '$file_referensi', '$tgl', 'Pending')";

    if (mysqli_query($koneksi, $query)) {
        header('Location: thanks.php');
        exit;
    } else {
        echo mysqli_error($koneksi);
    }
}