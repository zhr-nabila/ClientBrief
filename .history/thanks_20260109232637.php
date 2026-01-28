<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih | Z-STUDIO</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            min-height: 100vh;
        }
        
        .success-animation {
            animation: successScale 0.5s ease;
        }
        
        @keyframes successScale {
            0% { transform: scale(0); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
            opacity: 0;
        }
    </style>
</head>
<body class="text-white">
    <div class="min-h-screen flex items-center justify-center px-6">
        <div class="max-w-md w-full text-center">
            <!-- Success Icon -->
            <div class="mb-8 success-animation inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-emerald-500/20 to-green-500/10 border border-emerald-500/30 rounded-full shadow-[0_0_60px_rgba(34,197,94,0.3)]">
                <i class="fas fa-check text-4xl text-emerald-500"></i>
            </div>

            <!-- Success Message -->
            <h1 class="text-4xl font-bold mb-4 font-['Space_Grotesk'] bg-gradient-to-r from-emerald-400 to-green-500 bg-clip-text text-transparent">
                BRIEF TERKIRIM!
            </h1>
            
            <p class="text-gray-300 mb-6 text-lg">
                Terima kasih <span class="text-blue-400 font-bold"><?= htmlspecialchars($_GET['name'] ?? 'Klien') ?></span>, 
                brief proyek Anda telah berhasil kami terima.
            </p>
            
            <!-- Info Box -->
            <div class="bg-gray-900/50 backdrop-blur-sm rounded-2xl p-6 mb-8 border border-gray-800">
                <div class="flex items-start gap-3 mb-4">
                    <i class="fas fa-clock text-yellow-400 text-xl mt-1"></i>
                    <div class="text-left">
                        <p class="text-gray-300 font-medium">Tim akan menghubungi Anda</p>
                        <p class="text-gray-400 text-sm">Dalam 1x24 jam via email</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <i class="fas fa-envelope text-blue-400 text-xl mt-1"></i>
                    <div class="text-left">
                        <p class="text-gray-300 font-medium">Notifikasi telah dikirim</p>
                        <p class="text-gray-400 text-sm">Ke admin@zstudio.com</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <a href="index.php" 
                   class="block bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 py-4 rounded-2xl font-semibold transition-all shadow-lg shadow-blue-600/20 hover:shadow-blue-600/30">
                    <i class="fas fa-home mr-2"></i>
                    Kembali ke Beranda
                </a>
                
                <button onclick="window.print()" 
                        class="w-full bg-gray-800 hover:bg-gray-700 py-4 rounded-2xl font-semibold transition-all border border-gray-700 hover:border-gray-600">
                    <i class="fas fa-print mr-2"></i>
                    Cetak Bukti Brief
                </button>
                
                <a href="https://wa.me/6281234567890" 
                   target="_blank"
                   class="block bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 py-4 rounded-2xl font-semibold transition-all">
                    <i class="fab fa-whatsapp mr-2"></i>
                    Chat via WhatsApp
                </a>
            </div>
            
            <!-- Footer Note -->
            <p class="mt-8 text-xs text-gray-600">
                <i class="fas fa-shield-alt mr-2"></i>
                Data Anda aman & terenkripsi
            </p>
        </div>
    </div>

    <script>
        // Success Notification
        Swal.fire({
            title: 'Berhasil!',
            html: `
                <div class="text-center py-4">
                    <div class="text-6xl mb-4">🎉</div>
                    <p class="text-gray-300 text-lg">Brief telah terkirim ke tim kami.</p>
                    <p class="text-gray-400 mt-2">Anda akan dihubungi segera.</p>
                </div>
            `,
            icon: 'success',
            background: '#111827',
            color: '#fff',
            confirmButtonColor: '#10b981',
            confirmButtonText: 'Mengerti',
            timer: 3000,
            timerProgressBar: true,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        });
        
        // Create confetti effect
        function createConfetti() {
            const colors = ['#3b82f6', '#8b5cf6', '#ec4899', '#10b981', '#f59e0b'];
            
            for (let i = 0; i < 30; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-10px';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = confetti.style.width;
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                
                document.body.appendChild(confetti);
                
                // Animate
                const animation = confetti.animate([
                    { 
                        transform: `translateY(0) rotate(0deg)`, 
                        opacity: 1 
                    },
                    { 
                        transform: `translateY(${window.innerHeight + 100}px) rotate(${Math.random() * 360}deg)`, 
                        opacity: 0 
                    }
                ], {
                    duration: Math.random() * 3000 + 2000,
                    easing: 'cubic-bezier(0.215, 0.61, 0.355, 1)'
                });
                
                // Remove after animation
                animation.onfinish = () => confetti.remove();
            }
        }
        
        // Create confetti on load
        document.addEventListener('DOMContentLoaded', () => {
            createConfetti();
            
            // Play success sound if needed
            // const audio = new Audio('success-sound.mp3');
            // audio.volume = 0.3;
            // audio.play();
        });
    </script>
</body>
</html>