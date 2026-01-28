<?php
session_start();

// Include database connection
require_once '../includes/koneksi.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = clean_input($_POST['username']);
    $password = $_POST['password'];
    
    // Prepare SQL statement to prevent SQL injection
    $sql = "SELECT id, username, password_hash, nama_lengkap FROM tb_admin WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $id, $db_username, $db_password_hash, $nama_lengkap);
            mysqli_stmt_fetch($stmt);
            
            // Verify password
            if (password_verify($password, $db_password_hash)) {
                // Regenerate session ID for security
                session_regenerate_id(true);
                
                // Set session variables
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $id;
                $_SESSION['admin_username'] = $db_username;
                $_SESSION['admin_name'] = $nama_lengkap;
                $_SESSION['last_activity'] = time();
                
                // Update last login
                $update_sql = "UPDATE tb_admin SET last_login = NOW() WHERE id = ?";
                $update_stmt = mysqli_prepare($koneksi, $update_sql);
                mysqli_stmt_bind_param($update_stmt, "i", $id);
                mysqli_stmt_execute($update_stmt);
                mysqli_stmt_close($update_stmt);
                
                // Redirect to admin panel
                header("Location: index.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }
        } else {
            $error = "Invalid username or password";
        }
        
        mysqli_stmt_close($stmt);
    }
    
    // Add delay to prevent brute force attacks
    sleep(1);
}

// If already logged in, redirect to admin panel
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title>Admin Login | Z-STUDIO</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            max-width: 400px;
        }
        
        @media (max-width: 640px) {
            .login-card {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="login-card rounded-2xl p-8">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center mx-auto mb-4">
                <i data-lucide="shield" class="w-8 h-8 text-white"></i>
            </div>
            <h1 class="text-2xl font-bold text-white">Admin Panel</h1>
            <p class="text-gray-400 text-sm mt-2">Z-STUDIO Content Management System</p>
        </div>
        
        <!-- Login Form -->
        <form method="POST" class="space-y-6">
            <?php if($error): ?>
            <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm flex items-center space-x-3">
                <i data-lucide="alert-circle" class="w-5 h-5 flex-shrink-0"></i>
                <span><?php echo $error; ?></span>
            </div>
            <?php endif; ?>
            
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Username</label>
                <div class="relative">
                    <i data-lucide="user" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input type="text" 
                           name="username" 
                           required
                           class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-900/50 border border-gray-800 focus:border-blue-500 outline-none text-white"
                           placeholder="Enter username">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Password</label>
                <div class="relative">
                    <i data-lucide="lock" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                    <input type="password" 
                           name="password" 
                           required
                           class="w-full pl-12 pr-12 py-3 rounded-xl bg-gray-900/50 border border-gray-800 focus:border-blue-500 outline-none text-white"
                           placeholder="Enter password">
                    <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white">
                        <i data-lucide="eye" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
            
            <button type="submit" 
                    class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium hover:opacity-90 transition-all active:scale-95">
                Sign In
            </button>
            
            <div class="text-center">
                <a href="../index.php" class="text-sm text-gray-400 hover:text-white transition-all inline-flex items-center space-x-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    <span>Back to Website</span>
                </a>
            </div>
        </form>
        
        <!-- Security Note -->
        <p class="text-center text-gray-500 text-xs mt-8">
            <i data-lucide="shield" class="w-3 h-3 inline-block mr-1"></i>
            Secure admin access - All activities are logged
        </p>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
    <script>
        lucide.createIcons();
        
        function togglePassword() {
            const passwordInput = document.querySelector('input[name="password"]');
            const eyeIcon = document.querySelector('button[onclick="togglePassword()"] i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.setAttribute('data-lucide', 'eye-off');
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute('data-lucide', 'eye');
            }
            
            lucide.createIcons();
        }
    </script>
</body>
</html>