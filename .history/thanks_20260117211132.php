<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <title>Success | ClientBrief</title>

    <style>
    body {
        background: linear-gradient(-45deg, #0a0a0f, #1a0f2e, #0f172a, #1a102e);
        background-size: 400% 400%;
        animation: gradientFlow 15s ease infinite;
    }
    
    .bg-blue-600\/20 {
        background: rgba(255, 107, 157, 0.2) !important;
    }
    
    .text-blue-500 {
        color: #ff6b9d !important;
    }
    
    .shadow-2xl {
        box-shadow: 0 25px 50px -12px rgba(255, 107, 157, 0.25) !important;
    }
    
    .bg-white {
        background: linear-gradient(135deg, #ff6b9d, #a463f2) !important;
        color: white !important;
    }
    
    .hover\:bg-blue-600:hover {
        background: linear-gradient(135deg, #ff80b0, #b577ff) !important;
    }
    
    @keyframes gradientFlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
</style>
</head>
<body class="bg-[#050810] text-white flex items-center justify-center min-h-screen p-6">
    <div class="text-center">
        <div class="w-20 h-20 bg-blue-600/20 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
            <i data-lucide="check-circle" class="w-12 h-12"></i>
        </div>
        <h1 class="text-5xl font-black italic uppercase tracking-tighter mb-4">Brief Terkirim!</h1>
        <p class="text-gray-400 mb-10 max-w-sm mx-auto">Terima kasih. Data Anda sudah kami terima. Kami akan segera menghubungi Anda melalui WhatsApp.</p>
        <a href="index.php" class="bg-white text-black px-10 py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all">Kembali</a>
    </div>
    <script>lucide.createIcons();</script>
</body>
</html>