<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Terima Kasih | Z-STUDIO</title>
    <style>
        @keyframes confetti {
            0% { transform: translateY(-100vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(100vh) rotate(360deg); opacity: 0; }
        }
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6, #ec4899);
            animation: confetti 3s linear forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-950 to-black text-white font-['Inter'] min-h-screen flex items-center justify-center p-6 overflow-hidden">

    <!-- Confetti Effect -->
    <div id="confetti-container"></div>

    <div class="max-w-md w-full text-center relative z-10">
        <!-- Success Icon -->
        <div class="mb-8 inline-flex items-center justify-center w-24 h-24 bg-gradient-to-br from-green-500/20 to-emerald-500/10 border border-emerald-500/30 rounded-full shadow-[0_0_60px_rgba(34,197,94,0.3)] animate-pulse">
            <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <!-- Success Message -->
        <h1 class="text-4xl font-bold mb-4 tracking-tighter font-['Space_Grotesk'] bg-gradient-to-r from-emerald-400 to-green-500 bg-clip-text text-transparent">
            BRIEF TERKIRIM!
        </h1>
        
        <p class="text-gray-300 mb-6">
            Terima kasih <span class="text-blue-400 font-bold"><?= htmlspecialchars($_GET['name'] ?? 'Klien') ?></span>, 
            brief proyek Anda telah berhasil kami terima.
        </p>
        
        <div class="bg-gray-900/50 backdrop-blur-sm rounded-2xl p-6 mb-8 border border-gray-800">
            <p class="text-gray-400 text-sm mb-4">
                <i class="fas fa-clock text-yellow-400 mr-2"></i>
                Tim Z-STUDIO akan menghubungi Anda via email dalam <span class="text-white font-semibold">1x24 jam</span>.
            </p>
            <p class="text-gray-400 text-sm">
                <i class="fas fa-envelope text-blue-400 mr-2"></i>
                Notifikasi telah dikirim ke <span class="text-white font-semibold">admin@zstudio.com</span>
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="grid gap-4">
            <a href="index.php" 
               class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-blue-600/20 hover:shadow-blue-600/30 transform hover:-translate-y-1">
                <i class="fas fa-home mr-2"></i>
                Kembali ke Beranda
            </a>
            
            <button onclick="window.print()" 
                    class="bg-gray-800 hover:bg-gray-700 py-4 rounded-2xl font-bold transition-all border border-gray-700 hover:border-gray-600">
                <i class="fas fa-print mr-2"></i>
                Cetak Bukti Brief
            </button>
            
            <a href="https://wa.me/6281234567890" 
               target="_blank"
               class="bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 py-4 rounded-2xl font-bold transition-all">
                <i class="fab fa-whatsapp mr-2"></i>
                Chat via WhatsApp
            </a>
        </div>
        
        <!-- Tracking Info -->
        <p class="mt-8 text-xs text-gray-600 uppercase tracking-widest">
            <i class="fas fa-shield-alt mr-2"></i>
            Data Anda aman & terenkripsi
        </p>
    </div>

    <script>
        // Confetti Effect
        function createConfetti() {
            const container = document.getElementById('confetti-container');
            const colors = ['#3b82f6', '#8b5cf6', '#ec4899', '#10b981', '#f59e0b'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = confetti.style.width;
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                confetti.style.animationDelay = Math.random() * 2 + 's';
                
                container.appendChild(confetti);
                
                // Remove after animation
                setTimeout(() => {
                    confetti.remove();
                }, 5000);
            }
        }
        
        // Success Notification
        Swal.fire({
            title: 'Sukses!',
            html: `
                <div class="text-center">
                    <div class="text-6xl mb-4">🎉</div>
                    <p class="text-gray-300">Brief telah terkirim ke tim kami.</p>
                    <p class="text-gray-400 text-sm mt-2">Anda akan dihubungi segera.</p>
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
        
        // Create confetti on load
        document.addEventListener('DOMContentLoaded', () => {
            createConfetti();
            
            // Play success sound if needed
            // const audio = new Audio('https://assets.mixkit.co/sfx/preview/mixkit-winning-chimes-2015.mp3');
            // audio.volume = 0.3;
            // audio.play().catch(e => console.log('Audio play failed:', e));
        });
    </script>
</body>
</html>