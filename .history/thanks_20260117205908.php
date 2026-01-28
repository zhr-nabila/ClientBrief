<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <title>Success | ClientBrief</title>
    <style>
        :root {
            --primary: #FF6B9D;
            --primary-dark: #E05587;
            --bg-dark: #0F0B1E;
        }
        
        body {
            background: radial-gradient(ellipse at top right, rgba(255, 107, 157, 0.15), transparent 60%),
                        radial-gradient(ellipse at bottom left, rgba(255, 184, 217, 0.1), transparent 60%),
                        var(--bg-dark);
            font-family: 'Inter', sans-serif;
        }
        
        .title-gradient {
            background: linear-gradient(135deg, #FF6B9D, #FFB8D9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .floating-element {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="text-white flex items-center justify-center min-h-screen p-6">
    <div class="text-center max-w-md">
        <div class="w-24 h-24 bg-gradient-to-br from-pink-500 to-pink-300 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl shadow-pink-500/30 floating-element">
            <i data-lucide="check-circle" class="w-14 h-14 text-white"></i>
        </div>
        <h1 class="text-5xl font-black mb-4">
            <span class="title-gradient">Brief Terkirim!</span>
        </h1>
        <p class="text-pink-100/70 mb-10 text-lg leading-relaxed">
            Terima kasih. Data Anda sudah kami terima. Kami akan segera menghubungi Anda melalui WhatsApp.
        </p>
        <a href="index.php" class="inline-flex items-center justify-center px-10 py-4 bg-gradient-to-r from-pink-500 to-pink-600 text-white font-bold rounded-2xl hover:from-pink-600 hover:to-pink-700 transition-all shadow-2xl shadow-pink-500/25">
            <i data-lucide="home" class="w-5 h-5 mr-3"></i>
            Kembali ke Beranda
        </a>
        
        <div class="mt-12 pt-8 border-t border-pink-500/20">
            <p class="text-pink-200/50 text-sm">
                Butuh bantuan segera? 
                <a href="https://wa.me/628123456789" class="text-pink-300 hover:text-pink-400 font-medium">Hubungi kami via WhatsApp</a>
            </p>
        </div>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>