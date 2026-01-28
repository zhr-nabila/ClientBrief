<?php
// Start session
session_start();

// Include database connection
include 'includes/koneksi.php';

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    // Initialize variables
    $errors = [];
    $success = false;
    
    // Collect form data
    $nama_klien = mysqli_real_escape_string($koneksi, sanitize_input($_POST['nama']));
    $email_klien = mysqli_real_escape_string($koneksi, sanitize_input($_POST['email']));
    $country_code = isset($_POST['country_code']) ? mysqli_real_escape_string($koneksi, $_POST['country_code']) : '+62';
    $telepon = isset($_POST['telepon']) ? mysqli_real_escape_string($koneksi, sanitize_input($_POST['telepon'])) : '';
    $no_telepon = $country_code . ' ' . $telepon;
    $jasa_pilihan = isset($_POST['jasa']) ? mysqli_real_escape_string($koneksi, sanitize_input($_POST['jasa'])) : null;
    $kebutuhan_detail = mysqli_real_escape_string($koneksi, sanitize_input($_POST['pesan']));
    $deadline = isset($_POST['deadline']) && !empty($_POST['deadline']) ? $_POST['deadline'] : null;
    
    // Validation
    if (empty($nama_klien)) {
        $errors[] = "Nama lengkap harus diisi";
    }
    
    if (empty($email_klien)) {
        $errors[] = "Email harus diisi";
    } elseif (!filter_var($email_klien, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid";
    }
    
    if (empty($telepon)) {
        $errors[] = "Nomor telepon harus diisi";
    }
    
    if (empty($jasa_pilihan)) {
        $errors[] = "Pilihan layanan harus dipilih";
    }
    
    if (empty($kebutuhan_detail)) {
        $errors[] = "Detail kebutuhan harus diisi";
    } elseif (strlen($kebutuhan_detail) < 20) {
        $errors[] = "Detail kebutuhan minimal 20 karakter";
    }
    
    // Handle file upload
    $nama_file = null;
    if (isset($_FILES['file_brief']) && $_FILES['file_brief']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['file_brief']['tmp_name'];
        $file_name = basename($_FILES['file_brief']['name']);
        $file_size = $_FILES['file_brief']['size'];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        // Allowed file types
        $allowed_types = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'zip'];
        $max_size = 10 * 1024 * 1024; // 10MB
        
        // Validate file type
        if (!in_array($file_type, $allowed_types)) {
            $errors[] = "Format file tidak didukung. Hanya PDF, DOC, JPG, PNG, atau ZIP yang diperbolehkan.";
        }
        
        // Validate file size
        if ($file_size > $max_size) {
            $errors[] = "Ukuran file terlalu besar. Maksimal 10MB.";
        }
        
        // If no errors, proceed with upload
        if (empty($errors)) {
            // Create uploads directory if not exists
            if (!file_exists('uploads')) {
                mkdir('uploads', 0755, true);
            }
            
            // Generate unique filename
            $new_filename = time() . '_' . uniqid() . '.' . $file_type;
            $upload_path = 'uploads/' . $new_filename;
            
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $nama_file = $new_filename;
            } else {
                $errors[] = "Gagal mengupload file. Silakan coba lagi.";
            }
        }
    }
    
    // If no errors, insert into database
    if (empty($errors)) {
        // Prepare SQL statement
        $sql = "INSERT INTO tb_projek (
            nama_klien, 
            email_klien, 
            no_telepon, 
            jasa_pilihan, 
            kebutuhan_detail, 
            nama_file, 
            deadline,
            status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending')";
        
        $stmt = mysqli_prepare($koneksi, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssss", 
                $nama_klien,
                $email_klien,
                $no_telepon,
                $jasa_pilihan,
                $kebutuhan_detail,
                $nama_file,
                $deadline
            );
            
            if (mysqli_stmt_execute($stmt)) {
                $project_id = mysqli_insert_id($koneksi);
                $success = true;
                
                // Redirect to success page
                header("Location: thanks.php?id=" . $project_id . "&name=" . urlencode($nama_klien));
                exit();
                
            } else {
                $errors[] = "Terjadi kesalahan saat menyimpan data: " . mysqli_error($koneksi);
            }
            
            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Terjadi kesalahan pada sistem: " . mysqli_error($koneksi);
        }
    }
    
    // If there are errors, store them in session and redirect back
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        echo "<script>window.location.href = 'index.php?error=1#contact';</script>";
        exit();
    }
    
    mysqli_close($koneksi);
} else {
    // If not POST request, redirect to homepage
    header("Location: index.php");
    exit();
}
?>