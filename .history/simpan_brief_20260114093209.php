<?php
// File: simpan_brief.php
session_start();
require_once 'includes/koneksi.php';

// Set JSON header
header('Content-Type: application/json');

// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'project_id' => null,
    'client_name' => ''
];

try {
    if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['submit'])) {
        throw new Exception("Invalid request method");
    }
    
    // Validate and sanitize inputs
    $nama_klien = clean_input($_POST['nama'] ?? '');
    $email_klien = clean_input($_POST['email'] ?? '');
    $country_code = clean_input($_POST['country_code'] ?? '+62');
    $telepon = clean_input($_POST['telepon'] ?? '');
    $jasa_pilihan = clean_input($_POST['jasa'] ?? '');
    $kebutuhan_detail = clean_input($_POST['pesan'] ?? '');
    $deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : null;
    
    // Validation
    $errors = [];
    
    if (empty($nama_klien) || strlen($nama_klien) < 2) {
        $errors[] = "Nama lengkap atau perusahaan minimal 2 karakter";
    }
    
    if (empty($email_klien) || !filter_var($email_klien, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid";
    }
    
    if (empty($telepon) || strlen($telepon) < 8) {
        $errors[] = "Nomor telepon tidak valid";
    }
    
    if (empty($jasa_pilihan)) {
        $errors[] = "Pilih layanan yang diinginkan";
    }
    
    if (empty($kebutuhan_detail) || strlen($kebutuhan_detail) < 20) {
        $errors[] = "Deskripsi proyek minimal 20 karakter";
    }
    
    if ($deadline && strtotime($deadline) < strtotime('today')) {
        $errors[] = "Deadline tidak boleh di masa lalu";
    }
    
    // File upload handling
    $nama_file = null;
    if (isset($_FILES['file_brief']) && $_FILES['file_brief']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['file_brief']['tmp_name'];
        $file_name = $_FILES['file_brief']['name'];
        $file_size = $_FILES['file_brief']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        
        $allowed_exts = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'zip'];
        $max_size = 10 * 1024 * 1024; // 10MB
        
        // Check file extension
        if (!in_array($file_ext, $allowed_exts)) {
            $errors[] = "Format file tidak didukung. Gunakan PDF, DOC, JPG, PNG, atau ZIP";
        }
        
        // Check file size
        if ($file_size > $max_size) {
            $errors[] = "Ukuran file maksimal 10MB";
        }
        
        // Check if file is actually uploaded
        if (!is_uploaded_file($file_tmp)) {
            $errors[] = "File upload error";
        }
        
        if (empty($errors)) {
            // Create uploads directory if not exists
            if (!file_exists('uploads')) {
                mkdir('uploads', 0755, true);
            }
            
            // Generate unique filename
            $new_filename = time() . '_' . bin2hex(random_bytes(8)) . '.' . $file_ext;
            $upload_path = 'uploads/' . $new_filename;
            
            // Move uploaded file
            if (move_uploaded_file($file_tmp, $upload_path)) {
                $nama_file = $new_filename;
            } else {
                $errors[] = "Gagal mengupload file";
            }
        }
    }
    
    // If there are errors, return them
    if (!empty($errors)) {
        throw new Exception(implode(', ', $errors));
    }
    
    // Prepare phone number
    $no_telepon = $country_code . ' ' . $telepon;
    
    // Insert into database using prepared statement
    $sql = "INSERT INTO tb_projek (
        nama_klien, 
        email_klien, 
        no_telepon, 
        jasa_pilihan, 
        kebutuhan_detail, 
        nama_file, 
        deadline,
        status,
        tgl_input
    ) VALUES (?, ?, ?, ?, ?, ?, ?, 'Pending', NOW())";
    
    $stmt = mysqli_prepare($koneksi, $sql);
    
    if (!$stmt) {
        throw new Exception("Database error: " . mysqli_error($koneksi));
    }
    
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
        
        $response['success'] = true;
        $response['message'] = "Project brief submitted successfully";
        $response['project_id'] = $project_id;
        $response['client_name'] = $nama_klien;
        
        // Log submission (optional)
        error_log("New project submitted: ID $project_id by $nama_klien ($email_klien)");
        
    } else {
        throw new Exception("Failed to save project: " . mysqli_error($koneksi));
    }
    
    mysqli_stmt_close($stmt);
    
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
    http_response_code(400);
}

// Close database connection
mysqli_close($koneksi);

// Return JSON response
echo json_encode($response);
exit();
?>