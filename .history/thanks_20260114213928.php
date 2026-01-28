<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Terima Kasih | Z-STUDIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="flex items-center justify-center min-h-screen p-6">

    <div class="glass-card max-w-lg w-full p-12 text-center relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-48 h-48 bg-blue-600/20 rounded-full blur-3xl"></div>
        
        <div class="relative z-10">
            <div class="w-20 h-20 bg-green-500/10 text-green-500 rounded-3xl flex items-center justify-center mx-auto mb-8 border border-green-500/20">
                <i data-lucide="check-circle-2" class="w-10 h-10"></i>
            </div>

            <h1 class="text-3xl font-black tracking-tighter mb-4 uppercase">Brief <span class="text-blue-500">Diterima!</span></h1>
            
            <p class="text-gray-500 mb-10 leading-relaxed">
                Halo <span class="text-white font-bold"><?= isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Client' ?></span>, brief kamu sudah masuk ke radar kami. Tim admin akan segera meninjau dan menghubungi kamu via WhatsApp/Email.
            </p>

            <div class="space-y-4">
                <a href="index.php" class="block w-full bg-white text-black py-4 rounded-2xl font-bold hover:bg-gray-200 transition">
                    Kembali ke Beranda
                </a>
                <p class="text-[10px] text-gray-600 uppercase tracking-widest font-bold">Z-STUDIO Digital Agency</p>
            </div>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>