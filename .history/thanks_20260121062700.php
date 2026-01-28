<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <title>Success | ClientBrief</title>
    <style>
        body.light-mode {
            background: linear-gradient(135deg, #FFF897 0%, #FE7F42 100%) !important;
            color: #1A141A !important;
        }
        
        body:not(.light-mode) {
            background: linear-gradient(135deg, #2A1617 0%, #7A4B47 50%, #2A1617 100%) !important;
            color: white !important;
        }
        
        .bg-blue-600\/20 {
            background: rgba(254, 127, 66, 0.2) !important;
        }
        
        .text-blue-500 {
            color: #FE7F42 !important;
        }
        
        .hover\:bg-blue-600:hover {
            background: #FE7F42 !important;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-6">
    <div class="text-center">
        <div class="w-20 h-20 bg-blue-600/20 text-blue-500 rounded-full flex items-center justify-center mx-auto mb-8 shadow-2xl">
            <i data-lucide="check-circle" class="w-12 h-12"></i>
        </div>
        <h1 class="text-5xl font-black italic uppercase tracking-tighter mb-4">Brief Terkirim!</h1>
        <p class="text-gray-400 mb-10 max-w-sm mx-auto">Terima kasih. Data Anda sudah kami terima. Kami akan segera menghubungi Anda melalui WhatsApp.</p>
        <a href="index.php" class="bg-white text-black px-10 py-4 rounded-2xl font-black uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all">Kembali</a>
    </div>
    <script>
        lucide.createIcons();
        if (localStorage.getItem('theme') === 'light') {
            document.body.classList.add('light-mode');
        }
    </script>
</body>

</html>