<?php
// Start session
session_start();

// Include database connection
include 'koneksi.php';

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    // Initialize variables
    $errors = [];
    $success = false;
    
    // Collect and sanitize form data
    $nama_klien = mysqli_real_escape_string($koneksi, sanitize_input($_POST['nama']));
    $email_klien = mysqli_real_escape_string($koneksi, sanitize_input($_POST['email']));
    $no_telepon = isset($_POST['telepon']) ? mysqli_real_escape_string($koneksi, sanitize_input($_POST['telepon'])) : null;
    $jasa_pilihan = isset($_POST['jasa']) ? mysqli_real_escape_string($koneksi, sanitize_input($_POST['jasa'])) : null;
    $kebutuhan_detail = mysqli_real_escape_string($koneksi, sanitize_input($_POST['pesan']));
    $deadline = isset($_POST['deadline']) && !empty($_POST['deadline']) ? $_POST['deadline'] : null;
    $keterangan_admin = ''; // Empty for now
    
    // Validation
    if (empty($nama_klien)) {
        $errors[] = "Nama lengkap harus diisi";
    }
    
    if (empty($email_klien)) {
        $errors[] = "Email harus diisi";
    } elseif (!filter_var($email_klien, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid";
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
                mkdir('uploads', 0777, true);
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
        // Prepare SQL statement using prepared statement
        $sql = "INSERT INTO tb_projek (
            nama_klien, 
            email_klien, 
            no_telepon, 
            jasa_pilihan, 
            kebutuhan_detail, 
            nama_file, 
            deadline, 
            keterangan_admin,
            status
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";
        
        $stmt = mysqli_prepare($koneksi, $sql);
        
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ssssssss", 
                $nama_klien,
                $email_klien,
                $no_telepon,
                $jasa_pilihan,
                $kebutuhan_detail,
                $nama_file,
                $deadline,
                $keterangan_admin
            );
            
            if (mysqli_stmt_execute($stmt)) {
                $project_id = mysqli_insert_id($koneksi);
                $success = true;
                
                // Send email notification (optional)
                sendEmailNotification($nama_klien, $email_klien, $jasa_pilihan, $project_id);
                
                // Redirect to success page
                header("Location: thanks.php?id=" . $project_id . "&name=" . urlencode($nama_klien));
                exit();
                
            } else {
                $errors[] = "Terjadi kesalahan saat menyimpan data. Silakan coba lagi.";
            }
            
            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Terjadi kesalahan pada sistem. Silakan coba lagi.";
        }
    }
    
    // If there are errors, store them in session and redirect back
    if (!empty($errors)) {
        $_SESSION['form_errors'] = $errors;
        $_SESSION['form_data'] = $_POST;
        header("Location: index.php#cta");
        exit();
    }
    
    mysqli_close($koneksi);
} else {
    // If not POST request, redirect to homepage
    header("Location: index.php");
    exit();
}

// Function to send email notification
function sendEmailNotification($nama, $email, $service, $project_id) {
    // Email configuration (update with your SMTP settings)
    $to_admin = "admin@zstudio.co.id";
    $to_client = $email;
    $subject_admin = "New Project Brief - #" . $project_id;
    $subject_client = "Konfirmasi Brief Projek - Z-STUDIO";
    
    // Admin email content
    $message_admin = "
    <html>
    <head>
        <title>New Project Brief</title>
    </head>
    <body>
        <h2>New Project Brief Received</h2>
        <p><strong>Project ID:</strong> #$project_id</p>
        <p><strong>Client Name:</strong> $nama</p>
        <p><strong>Client Email:</strong> $email</p>
        <p><strong>Service:</strong> $service</p>
        <p><strong>Submission Time:</strong> " . date('Y-m-d H:i:s') . "</p>
        <br>
        <p>Please check the admin dashboard for full details.</p>
    </body>
    </html>
    ";
    
    // Client email content
    $message_client = "
    <html>
    <head>
        <title>Project Brief Confirmation</title>
    </head>
    <body>
        <h2>Terima Kasih $nama!</h2>
        <p>Brief proyek Anda telah berhasil kami terima.</p>
        <p><strong>Detail Brief:</strong></p>
        <ul>
            <li><strong>Nomor Referensi:</strong> #$project_id</li>
            <li><strong>Layanan yang Dipilih:</strong> $service</li>
            <li><strong>Waktu Pengiriman:</strong> " . date('d M Y H:i') . " WIB</li>
        </ul>
        <p>Tim kami akan menghubungi Anda dalam 1x24 jam untuk melanjutkan proses konsultasi.</p>
        <br>
        <p>Salam,<br>Tim Z-STUDIO</p>
    </body>
    </html>
    ";
    
    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: Z-STUDIO <noreply@zstudio.co.id>" . "\r\n";
    
    // Send emails (commented out by default - enable when you have email server)
    // mail($to_admin, $subject_admin, $message_admin, $headers);
    // mail($to_client, $subject_client, $message_client, $headers);
}
?>