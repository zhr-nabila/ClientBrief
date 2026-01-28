<?php
// File: admin/login.php
session_start();
if(isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    // Change credentials as needed
    if($user == "admin" && $pass == "zstudio123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Z-STUDIO</title>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            background: #050810;
            font-family: 'Poppins', sans-serif;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="login-card rounded-3xl p-8 w-full max-w-sm">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center mx-auto mb-4">
                <i data-lucide="shield" class="w-8 h-8 text-white"></i>
            </div>
            <h1 class="text-2xl font-bold text-white">Admin Access</h1>
            <p class="text-gray-400 text-sm mt-2">Z-STUDIO Control Panel</p>
        </div>
        
        <!-- Login Form -->
        <form method="POST" class="space-y-6">
            <?php if(isset($error)): ?>
            <div class="p-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                <i data-lucide="alert-circle" class="w-4 h-4 inline-block mr-2"></i>
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Username</label>
                <input type="text" 
                       name="username" 
                       required
                       class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none text-white">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-2">Password</label>
                <input type="password" 
                       name="password" 
                       required
                       class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none text-white">
            </div>
            
            <button type="submit" 
                    name="login"
                    class="w-full py-3 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium hover:opacity-90 transition">
                Sign In
            </button>
        </form>
        
        <!-- Note -->
        <p class="text-center text-gray-500 text-sm mt-8">
            <i data-lucide="lock" class="w-3 h-3 inline-block mr-1"></i>
            Secure admin access only
        </p>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>