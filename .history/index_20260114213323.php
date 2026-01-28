<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Inisiasi Projek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="flex flex-col items-center justify-center min-h-screen p-6 transition-colors duration-500">

    <div class="switcher fixed top-6 right-6 flex gap-3 z-[60]">
        <button onclick="toggleLanguage()" class="p-3 glass-card rounded-2xl text-[10px] font-black tracking-widest hover:bg-white/10 transition">
            ID / EN
        </button>
        <button onclick="toggleTheme()" class="p-3 glass-card rounded-2xl hover:bg-white/10 transition">
            <i data-lucide="sun" id="themeIcon" class="w-4 h-4"></i>
        </button>
    </div>

    <div class="text-center">
        <h1 class="text-6xl md:text-8xl font-black tracking-tighter mb-4 uppercase">Z-STUDIO.</h1>
        <p class="text-gray-500 mb-8 max-w-md mx-auto" data-key="heroSub">Solusi Digital Berkelas Tanpa Kompromi.</p>
        <button onclick="openModal()" class="bg-white text-black px-10 py-5 rounded-2xl font-bold hover:scale-105 transition shadow-xl" data-key="startBtn">
            Mulai Konsultasi
        </button>
    </div>

    <div id="briefModal" class="fixed inset-0 bg-black/80 backdrop-blur-md hidden items-center justify-center z-50 p-4">
        <div class="glass-card w-full max-w-xl relative overflow-hidden">
            <div class="h-1.5 bg-white/5">
                <div id="progressBar" class="h-full bg-blue-600 transition-all duration-500"></div>
            </div>

            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="p-8 md:p-12">
                
                <div class="step active" id="step1">
                    <h2 class="text-2xl font-bold mb-8 flex items-center gap-3">
                        <i data-lucide="user"></i> <span data-key="identity">Identitas</span>
                    </h2>
                    <div class="space-y-4">
                        <input type="text" name="nama" placeholder="Nama Lengkap" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <input type="tel" name="telepon" placeholder="No. WhatsApp" required>
                    </div>
                    <button type="button" onclick="moveStep(2)" class="w-full bg-blue-600 py-4 rounded-xl font-bold mt-8" data-key="next">Lanjut</button>
                </div>

                <div class="step" id="step2">
                    <h2 class="text-2xl font-bold mb-8 flex items-center gap-3">
                        <i data-lucide="briefcase"></i> <span data-key="service">Layanan</span>
                    </h2>
                    <select name="jasa" required>
                        <option value="Web Development">Web Development</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                    </select>
                    <div class="flex gap-4 mt-8">
                        <button type="button" onclick="moveStep(1)" class="w-1/3 text-gray-400 font-bold" data-key="back">Kembali</button>
                        <button type="button" onclick="moveStep(3)" class="w-2/3 bg-blue-600 py-4 rounded-xl font-bold" data-key="next">Lanjut</button>
                    </div>
                </div>

                <div class="step" id="step3">
                    <h2 class="text-2xl font-bold mb-8 flex items-center gap-3">
                        <i data-lucide="message-square"></i> <span data-key="detail">Detail Projek</span>
                    </h2>
                    <div class="space-y-4">
                        <textarea name="pesan" rows="4" placeholder="Apa yang ingin Anda bangun?" required></textarea>
                        
                        <div class="bg-white/5 p-4 rounded-xl border border-white/10">
                            <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block mb-2">Upload Referensi (Gambar)</label>
                            <input type="file" name="gambar_projek" accept="image/*" class="text-xs text-gray-400">
                        </div>
                    </div>

                    <div class="flex gap-4 mt-8">
                        <button type="button" onclick="moveStep(2)" class="w-1/3 text-gray-400 font-bold" data-key="back">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-blue-600 py-4 rounded-xl font-bold" data-key="send">Kirim Brief</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>