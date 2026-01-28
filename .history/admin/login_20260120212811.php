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
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
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
        
        .light-mode .glass-card {
            background: rgba(255, 255, 255, 0.85) !important;
            border: 1px solid rgba(254, 127, 66, 0.2) !important;
        }
        
        /* Input Field Styling sesuai style.css */
        .input-field {
            width: 100%;
            background: rgba(42, 22, 23, 0.6);
            border: 1px solid rgba(179, 44, 26, 0.3);
            border-radius: 1rem;
            padding: 1rem;
            color: inherit;
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
        }
        
        .btn-primary:hover {
            background: #B32C1A !important;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(254, 127, 66, 0.3);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        /* Label Styling */
        .form-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        /* Error Message */
        .error-message {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #f87171;
            border-radius: 0.75rem;
            padding: 1rem;
            font-size: 14px;
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        /* Logo & Brand */
        .brand-text {
            background: linear-gradient(135deg, #FE7F42, #FFF897);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Glow Effect */
        .glow-effect {
            position: relative;
        }
        
        .glow-effect::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, #FE7F42, #B32C1A);
            border-radius: 1rem;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .glow-effect:hover::before {
            opacity: 0.3;
        }
        
        /* Responsive */
        @media (max-width: 640px) {
            .login-container {
                padding: 1.5rem !important;
                margin: 1rem !important;
            }
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-6">
    <div class="glass-card w-full max-w-md p-8 rounded-2xl animate-fadeInUp">
        <!-- Header -->
        <div class="text-center mb-10">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-[#FE7F42] to-[#B32C1A] flex items-center justify-center">
                    <i data-lucide="briefcase" class="w-6 h-6 text-white"></i>
                </div>
            </div>
            <h1 class="text-3xl font-black tracking-tight mb-2">
                <span class="brand-text">ClientBrief</span>
                <span class="text-white ml-2">ADMIN</span>
            </h1>
            <p class="text-gray-300 text-sm">Silakan masuk untuk mengelola projek</p>
        </div>
        
        <!-- Error Message -->
        <?php if (isset($error)): ?>
            <div class="error-message flex items-center justify-center gap-2 mb-6">
                <i data-lucide="alert-circle" class="w-4 h-4"></i>
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <!-- Login Form -->
        <form method="POST" class="space-y-6">
            <!-- Username -->
            <div>
                <label class="form-label">
                    <div class="flex items-center gap-2">
                        <i data-lucide="user" class="w-3 h-3"></i>
                        USERNAME
                    </div>
                </label>
                <input 
                    type="text" 
                    name="username" 
                    class="input-field" 
                    placeholder="Masukkan username"
                    required
                    autocomplete="username"
                >
            </div>
            
            <!-- Password -->
            <div>
                <label class="form-label">
                    <div class="flex items-center gap-2">
                        <i data-lucide="lock" class="w-3 h-3"></i>
                        PASSWORD
                    </div>
                </label>
                <input 
                    type="password" 
                    name="password" 
                    class="input-field" 
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                >
            </div>
            
            <!-- Submit Button -->
            <button 
                type="submit" 
                name="login" 
                class="btn-primary w-full py-4 rounded-xl text-white font-bold text-lg mt-8 glow-effect"
            >
                <div class="flex items-center justify-center gap-2">
                    <i data-lucide="log-in" class="w-5 h-5"></i>
                    MASUK
                </div>
            </button>
        </form>
        
        <!-- Footer Note -->
        <div class="mt-8 pt-6 border-t border-white/10 text-center">
            <p class="text-xs text-gray-400">
                <i data-lucide="shield" class="w-3 h-3 inline mr-1"></i>
                Akses terbatas untuk admin terautorisasi
            </p>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const username = document.querySelector('input[name="username"]');
            const password = document.querySelector('input[name="password"]');
            
            if (!username.value.trim() || !password.value.trim()) {
                e.preventDefault();
                
                if (!username.value.trim()) {
                    username.focus();
                    username.style.borderColor = '#B32C1A';
                } else {
                    password.focus();
                    password.style.borderColor = '#B32C1A';
                }
                
                setTimeout(() => {
                    username.style.borderColor = 'rgba(179, 44, 26, 0.3)';
                    password.style.borderColor = 'rgba(179, 44, 26, 0.3)';
                }, 1000);
                
                return false;
            }
            return true;
        });
        
        // Focus effects for inputs
        const inputs = document.querySelectorAll('.input-field');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = '#FE7F42';
                this.style.boxShadow = '0 0 0 2px rgba(254, 127, 66, 0.2)';
            });
            
            input.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
                if (!this.value) {
                    this.style.borderColor = 'rgba(179, 44, 26, 0.3)';
                }
            });
            
            // Add hover effect
            input.addEventListener('mouseenter', function() {
                if (!this.matches(':focus')) {
                    this.style.borderColor = 'rgba(254, 127, 66, 0.5)';
                }
            });
            
            input.addEventListener('mouseleave', function() {
                if (!this.matches(':focus')) {
                    this.style.borderColor = 'rgba(179, 44, 26, 0.3)';
                }
            });
        });
        
        // Add enter key to submit
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const focused = document.activeElement;
                if (focused && focused.classList.contains('input-field')) {
                    document.querySelector('button[type="submit"]').click();
                }
            }
        });
    </script>
</body>

</html>