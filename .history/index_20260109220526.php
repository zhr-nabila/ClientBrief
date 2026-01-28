<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-950 text-white overflow-x-hidden">

    <nav class="fixed w-full z-[100] p-6 transition-all duration-300">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl p-4">
            <div class="text-2xl font-bold text-blue-500 tracking-tighter">Z-STUDIO.</div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#hero" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-home">Beranda</a>
                <a href="#services" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-courses">Layanan</a>
                <div class="flex bg-gray-800 rounded-full p-1 border border-gray-700">
                    <button onclick="changeLang('id')" id="btn-id" class="px-3 py-1 rounded-full text-xs transition-all">ID</button>
                    <button onclick="changeLang('en')" id="btn-en" class="px-3 py-1 rounded-full text-xs transition-all">EN</button>
                </div>
                <button onclick="startBrief()" class="bg-blue-600 px-6 py-2 rounded-xl text-sm font-bold hover:bg-blue-700 transition" data-lang="nav-apply">Mulai Projek</button>
            </div>
        </div>
    </nav>

    <section id="hero" class="min-h-screen flex flex-col items-center justify-center text-center px-6">
        <h1 class="text-6xl md:text-8xl font-bold mb-6 gradient-text" data-aos="zoom-out" data-lang="hero-1">INOVASI</h1>
        <p class="text-gray-400 max-w-xl mb-10" data-lang="hero-desc">Solusi digital marketing end-to-end untuk bisnis ambisius.</p>
        <button onclick="startBrief()" class="bg-white text-black px-10 py-4 rounded-full font-bold hover:bg-blue-500 hover:text-white transition-all transform hover:scale-110" data-lang="btn-apply-hero">Daftar Sekarang</button>
    </section>

    <section id="services" class="py-24 px-6 max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold text-center mb-16 gradient-text" data-lang="courses-title">Layanan Kami</h2>
        <div class="grid md:grid-cols-4 gap-6">
            <div class="glass-card" data-aos="fade-up">
                <i data-lucide="search" class="text-blue-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">SEO</h3>
                <p class="text-sm text-gray-400" data-lang="serv-1-desc">Optimasi agar brand muncul di halaman pertama Google.</p>
            </div>
            <div class="glass-card" data-aos="fade-up" data-aos-delay="100">
                <i data-lucide="instagram" class="text-purple-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Social Media</h3>
                <p class="text-sm text-gray-400" data-lang="serv-2-desc">Konten kreatif untuk komunitas sosial media.</p>
            </div>
            <div class="glass-card" data-aos="fade-up" data-aos-delay="200">
                <i data-lucide="code" class="text-green-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Web Maintenance</h3>
                <p class="text-sm text-gray-400" data-lang="serv-3-desc">Pemeliharaan teknis agar website tetap aman.</p>
            </div>
            <div class="glass-card" data-aos="fade-up" data-aos-delay="300">
                <i data-lucide="trending-up" class="text-yellow-500 mb-4"></i>
                <h3 class="text-xl font-bold mb-2">Google Ads</h3>
                <p class="text-sm text-gray-400" data-lang="serv-4-desc">Iklan berbayar untuk traffic instan.</p>
            </div>
        </div>
    </section>

    <section id="form-section" class="hidden py-32 px-6">
        
        <div class="max-w-2xl mx-auto bg-gray-900/50 backdrop-blur-md p-10 rounded-[40px] border border-white/10 shadow-2xl">
            <div class="mb-8 h-1 w-full bg-gray-800 rounded-full">
                <div id="progress" class="h-full bg-blue-500 transition-all duration-500" style="width: 33%"></div>
            </div>
            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                <div class="step active">
                    <h2 class="text-2xl font-bold mb-6" data-lang="form-step-1-title">Kontak</h2>
                    <input type="text" name="nama" placeholder="Nama / Perusahaan" class="w-full p-4 bg-black/30 border border-gray-700 rounded-2xl mb-4 outline-none focus:border-blue-500 transition" required>
                    <input type="email" name="email" placeholder="Email Aktif" class="w-full p-4 bg-black/30 border border-gray-700 rounded-2xl mb-4 outline-none focus:border-blue-500 transition" required>
                    <button type="button" onclick="nextStep(2)" class="w-full bg-blue-600 py-4 rounded-2xl font-bold" data-lang="btn-next">Lanjut</button>
                </div>
                <div class="step">
                    <h2 class="text-2xl font-bold mb-6" data-lang="form-step-2-title">Pilih Jasa</h2>
                    <div class="grid gap-3">
                        <?php $svc = ["SEO", "Social Media", "Web Maintenance", "Google Ads"]; foreach($svc as $s): ?>
                        <label class="flex items-center p-4 border border-gray-700 rounded-2xl cursor-pointer hover:bg-blue-600/20 transition">
                            <input type="radio" name="jasa" value="<?= $s ?>" class="hidden peer" required>
                            <span class="w-4 h-4 border border-gray-500 rounded-full mr-4 peer-checked:bg-blue-500"></span>
                            <span class="font-medium"><?= $s ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex gap-4 mt-8">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 text-gray-400" data-lang="btn-back">Kembali</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 py-4 rounded-2xl font-bold" data-lang="btn-next">Lanjut</button>
                    </div>
                </div>
                <div class="step">
                    <h2 class="text-2xl font-bold mb-6" data-lang="form-step-3-title">Detail</h2>
                    <textarea name="pesan" rows="5" class="w-full p-4 bg-black/30 border border-gray-700 rounded-2xl mb-4 outline-none focus:border-blue-500" placeholder="Jelaskan kebutuhan Anda..."></textarea>
                    <input type="file" name="file_brief" class="mb-6 block text-sm text-gray-500">
                    <div class="flex gap-4">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 text-gray-400" data-lang="btn-back">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-green-600 py-4 rounded-2xl font-bold" data-lang="btn-submit">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
    <script>AOS.init(); lucide.createIcons();</script>
</body>
</html>