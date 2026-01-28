<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Z-STUDIO | Inisiasi Projek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="flex flex-col items-center justify-center min-h-screen p-6">

    <div class="switcher">
        <button onclick="toggleLanguage()" class="p-3 glass-card rounded-full text-[10px] font-bold">ID / EN</button>
        <button onclick="toggleTheme()" class="p-3 glass-card rounded-full">
            <i data-lucide="sun" class="w-4 h-4"></i>
        </button>
    </div>

    <div class="text-center">
        <h1 class="text-6xl font-black tracking-tighter mb-4">Z-STUDIO.</h1>
        <p class="text-gray-500 mb-8">Solusi Digital Berkelas Tanpa Kompromi.</p>
        <button onclick="openModal()" class="bg-white text-black px-8 py-4 rounded-2xl font-bold hover:scale-105 transition">
            Mulai Konsultasi
        </button>
    </div>

    <div id="briefModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center z-50 p-4">
        <div class="glass-card w-full max-w-xl relative overflow-hidden">
            <div class="h-1 bg-white/5">
                <div id="progressBar" class="h-full bg-blue-600 transition-all duration-500"></div>
            </div>

            <form action="simpan_brief.php" method="POST" class="p-10">
                <div class="step active" id="step1">
                    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"><i data-lucide="user"></i> Identitas</h2>
                    <div class="space-y-4">
                        <input type="text" name="nama" placeholder="Nama Lengkap" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="tel" name="telepon" placeholder="No. WhatsApp" required>
                    </div>
                    <button type="button" onclick="moveStep(2)" class="w-full bg-blue-600 py-4 rounded-xl font-bold mt-8">Lanjut</button>
                </div>

                <div class="step" id="step2">
                    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"><i data-lucide="briefcase"></i> Layanan</h2>
                    <select name="jasa" required>
                        <option value="Web Development">Web Development</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                    </select>
                    <div class="flex gap-4 mt-8">
                        <button type="button" onclick="moveStep(1)" class="w-1/3 text-gray-400">Kembali</button>
                        <button type="button" onclick="moveStep(3)" class="w-2/3 bg-blue-600 py-4 rounded-xl font-bold">Lanjut</button>
                    </div>
                </div>

                <div class="step" id="step3">
                    <h2 class="text-2xl font-bold mb-6 flex items-center gap-2"><i data-lucide="message-square"></i> Detail</h2>
                    <textarea name="pesan" rows="4" placeholder="Apa yang ingin Anda bangun?" required></textarea>
                    <div class="flex gap-4 mt-8">
                        <button type="button" onclick="moveStep(2)" class="w-1/3 text-gray-400">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-blue-600 py-4 rounded-xl font-bold">Kirim Brief</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>

</html>