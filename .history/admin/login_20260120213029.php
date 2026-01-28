<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    if ($user === "admin" && $pass === "admin123") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Username atau Password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Login | ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #050810;
            --text: white;
            --card: rgba(42, 22, 23, 0.8);
            --border: rgba(179, 44, 26, 0.2);
        }
        
        body {
            background: linear-gradient(135deg, #2A1617 0%, #7A4B47 100%) !important;
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
        }
        
        /* Hilangkan scrollbar */
        html, body {
            overflow-y: auto !important;
            overflow-x: hidden !important;
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }
        
        ::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            background: transparent !important;
        }
        
        /* Glass Card */
        .glass-card {
            background: rgba(26, 20, 26, 0.7) !important;
            border: 1px solid rgba(179, 44, 26, 0.2) !important;
            backdrop-filter: blur(15px);
        }
        
        /* Input Field Styling */
        .input-field {
            width: 100%;
            background: rgba(42, 22, 23, 0.6);
            border: 1px solid rgba(179, 44, 26, 0.3);
            border-radius: 1rem;
            padding: 1rem;
            color: white;
            outline: none;
            transition: 0.3s;
        }
        
        .input-field:focus {
            border-color: #FE7F42 !important;
            box-shadow: 0 0 0 2px rgba(254, 127, 66, 0.2);
        }
        
        .input-field::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }
        
        /* Button Styling */
        .btn-primary {
            background: #FE7F42 !important;
            border: none !important;
            font-weight: 800;
            transition: all 0.3s;
            color: #2A1617;
        }
        
        .btn-primary:hover {
            background: #B32C1A !important;
            color: white;
        }
        
        /* Label Styling */
        .form-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        /* Error Message */
        .error-message {
            background: rgba(179, 44, 26, 0.1);
            border: 1px solid rgba(179, 44, 26, 0.3);
            color: #FF6B6B;
            border-radius: 0.75rem;
            padding: 1rem;
            font-size: 0.875rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        /* Animation */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slideUp {
            animation: slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-md glass-card p-8 md:p-10 rounded-3xl animate-slideUp">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black tracking-tight">
                ClientBrief <span class="text-[#FE7F42]">ADMIN</span>
            </h1>
            <p class="text-gray-400 mt-2 text-sm">Silakan masuk untuk mengelola projek.</p>
        </div>
        
        <!-- Error Message -->
        <?php if (isset($error)): ?>
            <div class="error-message mb-6">
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <!-- Login Form -->
        <form method="POST" class="space-y-6">
            <!-- Username -->
            <div>
                <label class="form-label">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    class="input-field" 
                    placeholder="Masukkan username" 
                    required
                >
            </div>
            
            <!-- Password -->
            <div>
                <label class="form-label">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    class="input-field" 
                    placeholder="Masukkan password" 
                    required
                >
            </div>
            
            <!-- Submit Button -->
            <button 
                type="submit" 
                name="login" 
                class="btn-primary w-full py-4 rounded-2xl font-bold mt-2 transition-all shadow-lg shadow-[#FE7F42]/20 hover:shadow-[#B32C1A]/30"
            >
                Masuk
            </button>
        </form>
        
        <!-- Footer Note -->
        <div class="mt-8 text-center">
            <p class="text-xs text-gray-500">
                Gunakan kredensial yang diberikan untuk masuk ke panel admin
            </p>
        </div>
    </div>

    <script>
        // Focus effects for inputs
        const inputs = document.querySelectorAll('.input-field');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = '#FE7F42';
                this.style.boxShadow = '0 0 0 2px rgba(254, 127, 66, 0.2)';
            });
            
            input.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
            });
        });
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const username = document.querySelector('input[name="username"]');
            const password = document.querySelector('input[name="password"]');
            
            if (!username.value || !password.value) {
                e.preventDefault();
                if (!username.value) {
                    username.focus();
                    username.style.borderColor = '#B32C1A';
                } else {
                    password.focus();
                    password.style.borderColor = '#B32C1A';
                }
                return false;
            }
            return true;
        });
    </script>
</body>

</html>