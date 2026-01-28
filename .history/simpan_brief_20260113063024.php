<?php
// File: simpan_brief.php
session_start();
include 'includes/koneksi.php';

date_default_timezone_set('Asia/Jakarta');

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $errors = [];
    
    // Collect and sanitize form data
    $nama_klien = mysqli_real_escape_string($koneksi, sanitize_input($_POST['nama']));
    $email_klien = mysqli_real_escape_string($koneksi, sanitize_input($_POST['email']));
    $country_code = isset($_POST['country_code']) ? mysqli_real_escape_string($koneksi, $_POST['country_code']) : '+62';
    $telepon = mysqli_real_escape_string($koneksi, sanitize_input($_POST['telepon']));
    $no_telepon = $country_code . ' ' . $telepon;
    $jasa_pilihan = mysqli_real_escape_string($koneksi, sanitize_input($_POST['jasa']));
    $kebutuhan_detail = mysqli_real_escape_string($koneksi, sanitize_input($_POST['pesan']));
    $deadline = isset($_POST['deadline']) && !empty($_POST['deadline']) ? $_POST['deadline'] : null;
    
    // Validation
    if (empty($nama_klien)) $errors[] = "Name is required";
    if (empty($email_klien) || !filter_var($email_klien, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required";
    if (empty($telepon)) $errors[] = "Phone number is required";
    if (empty($jasa_pilihan)) $errors[] = "Service selection is required";
    if (empty($kebutuhan_detail) || strlen($kebutuhan_detail) < 20) $errors[] = "Detailed description is required (min 20 characters)";
    
    // File upload handling
    $nama_file = null;
    if (isset($_FILES['file_brief']) && $_FILES['file_brief']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['file_brief']['tmp_name'];
        $file_name = basename($_FILES['file_brief']['name']);
        $file_size = $_FILES['file_brief']['size'];
        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        $allowed_types = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'zip'];
        $max_size = 10 * 1024 * 1024; // 10MB
        
        if (!in_array($file_type, $allowed_types)) {
            $errors[] = "File type not supported. Only PDF, DOC, JPG, PNG, or ZIP allowed.";
        }
        
        if ($file_size > $max_size) {
            $errors[] = "File size too large. Maximum 10MB.";
        }
        
        if (empty($errors)) {
            if (!file_exists('uploads')) {
                mkdir('uploads', 0755, true);
            }
            
            $new_filename = time() . '_' . uniqid() . '.' . $file_type;
            $upload_path = 'uploads/' . $new_filename;
            
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $nama_file = $new_filename;
            } else {
                $errors[] = "Failed to upload file";
            }
        }
    }
    
    // Insert into database if no errors
    if (empty($errors)) {
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
                
                // Redirect to success page
                header("Location: thanks.php?id=" . $project_id);
                exit();
                
            } else {
                $errors[] = "Database error: " . mysqli_error($koneksi);
            }
            
            mysqli_stmt_close($stmt);
        }
    }
    
    // If there are errors, store in session and redirect back
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header("Location: index.php?error=1");
        exit();
    }
    
} else {
    header("Location: index.php");
    exit();
}

mysqli_close($koneksi);
?>