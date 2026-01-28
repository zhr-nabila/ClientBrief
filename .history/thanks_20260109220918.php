<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <title>Terima Kasih | Z-STUDIO</title>
</head>
<body class="bg-[#030712] text-white font-['Space_Grotesk'] min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full text-center">
        <div class="mb-8 inline-flex items-center justify-center w-24 h-24 bg-green-500/10 border border-green-500/50 rounded-full shadow-[0_0_50px_rgba(34,197,94,0.2)]">
            <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-4xl font-bold mb-4 tracking-tighter">BRIEF TERKIRIM!</h1>
        <p class="text-gray-400 mb-10">Halo <span class="text-blue-400 font-bold"><?= $_GET['name'] ?? 'Klien' ?></span>, brief kamu sudah masuk ke sistem kami. Tim Z-STUDIO akan segera membalas melalui email dalam 1x24 jam.</p>

        <div class="grid gap-4">
            <a href="index.php" class="bg-blue-600 hover:bg-blue-700 py-4 rounded-2xl font-bold transition-all shadow-lg shadow-blue-600/20">
                Kembali ke Beranda
            </a>
            <button onclick="window.print()" class="bg-gray-800 hover:bg-gray-700 py-4 rounded-2xl font-bold transition-all border border-white/5">
                Cetak Bukti Brief
            </button>
        </div>
        
        <p class="mt-8 text-xs text-gray-600 uppercase tracking-widest">Notification sent to admin@zstudio.com</p>
    </div>

    <script>
        // Notifikasi Popup pas halaman kebuka
        Swal.fire({
            title: 'Berhasil!',
            text: 'Email notifikasi telah dikirim ke tim admin.',
            icon: 'success',
            background: '#111827',
            color: '#fff',
            confirmButtonColor: '#2563eb'
        });
    </script>
</body>
</html>