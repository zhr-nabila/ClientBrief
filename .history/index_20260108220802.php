<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-Studio | Digital Agency Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-slate-900 overflow-x-hidden">

    <nav class="fixed w-full z-[100] transition-all duration-500 py-6 px-4 md:px-20" id="navbar">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-white/80 backdrop-blur-xl border border-white/20 rounded-2xl p-4 shadow-xl">
            <div class="text-xl font-extrabold tracking-tighter">Z-STUDIO<span class="text-blue-600">.</span></div>
            
            <div class="hidden md:flex items-center space-x-8 text-xs font-bold uppercase tracking-widest">
                <a href="#hero" data-lang="nav-home">Beranda</a>
                <a href="#services" data-lang="nav-services">Layanan</a>
                <div class="flex border border-slate-200 rounded-full p-1 bg-slate-50">
                    <button onclick="changeLang('id')" id="btn-id" class="px-3 py-1 rounded-full bg-blue-600 text-white transition-all text-[10px]">ID</button>
                    <button onclick="changeLang('en')" id="btn-en" class="px-3 py-1 rounded-full text-slate-400 transition-all text-[10px]">EN</button>
                </div>
                <button onclick="startBrief()" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-slate-900 transition-all" data-lang="nav-start">Mulai Projek</button>
            </div>

            <button class="md:hidden p-2" onclick="toggleMobileMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden absolute top-24 left-4 right-4 bg-white p-6 rounded-3xl shadow-2xl border border-slate-100 flex flex-col space-y-4 text-center font-bold uppercase text-sm tracking-widest">
            <a href="#hero" onclick="toggleMobileMenu()" data-lang="nav-home">Beranda</a>
            <a href="#services" onclick="toggleMobileMenu()" data-lang="nav-services">Layanan</a>
            <button onclick="startBrief(); toggleMobileMenu();" class="bg-blue-600 text-white py-4 rounded-xl" data-lang="nav-start">Mulai Projek</button>
        </div>
    </nav>

    <section id="hero" class="relative min-h-screen flex items-center justify-center pt-20">
        <div class="max-w-5xl px-6 text-center" data-aos="fade-up">
            <h1 class="text-5xl md:text-[90px] font-extrabold leading-[0.9] tracking-tighter mb-8">
                <span data-lang="hero-1">TUMBUH</span> <span class="text-blue-600" data-lang="hero-2">LEBIH CEPAT</span><br><span data-lang="hero-3">DARI SEBELUMNYA.</span>
            </h1>
            <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto mb-10" data-lang="hero-desc">Solusi digital marketing end-to-end untuk bisnis ambisius.</p>
            <button onclick="startBrief()" class="bg-slate-900 text-white px-10 py-5 rounded-2xl font-bold hover:bg-blue-600 transition-all" data-lang="btn-hero">Ayo Mulai</button>
        </div>
    </section>

    <section id="services" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-extrabold text-center mb-16" data-lang="serv-title">Layanan Kami</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-blue-600 mb-4 font-bold text-xl">01</div>
                    <h3 class="font-bold mb-2">SEO</h3>
                    <p class="text-sm text-slate-500" data-lang="serv-1">Optimasi Google secara organik.</p>
                </div>
                <div class="bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-blue-600 mb-4 font-bold text-xl">02</div>
                    <h3 class="font-bold mb-2">Social Media</h3>
                    <p class="text-sm text-slate-500" data-lang="serv-2">Manajemen konten kreatif.</p>
                </div>
                <div class="bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-blue-600 mb-4 font-bold text-xl">03</div>
                    <h3 class="font-bold mb-2">Maintenance</h3>
                    <p class="text-sm text-slate-500" data-lang="serv-3">Pemeliharaan sistem website.</p>
                </div>
                <div class="bg-white p-8 rounded-[32px] shadow-sm hover:shadow-xl transition-all" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-blue-600 mb-4 font-bold text-xl">04</div>
                    <h3 class="font-bold mb-2">Google Ads</h3>
                    <p class="text-sm text-slate-500" data-lang="serv-4">Iklan berbayar hasil instan.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="form-section" class="hidden min-h-screen py-32 bg-slate-50">
        <div class="max-w-2xl mx-auto px-6">
            <div class="mb-8 h-1.5 w-full bg-slate-200 rounded-full overflow-hidden">
                <div id="progress" class="h-full bg-blue-600 transition-all duration-500" style="width: 33.3%"></div>
            </div>

            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 md:p-12 rounded-[40px] shadow-2xl border border-slate-100">
                <div class="step active">
                    <h2 class="text-2xl font-bold mb-8">Informasi Dasar</h2>
                    <div class="space-y-4">
                        <input type="text" name="nama" placeholder="Nama / Perusahaan" class="w-full p-4 rounded-2xl border border-slate-200 outline-none focus:border-blue-600" required>
                        <input type="email" name="email" placeholder="Email Aktif" class="w-full p-4 rounded-2xl border border-slate-200 outline-none focus:border-blue-600" required>
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full mt-8 bg-blue-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-blue-200">Selanjutnya</button>
                </div>

                <div class="step">
                    <h2 class="text-2xl font-bold mb-8">Pilih Layanan</h2>
                    <div class="space-y-3">
                        <?php 
                        $services = ["SEO", "Social Media", "Website Maintenance", "Google Ads"];
                        foreach($services as $s): ?>
                        <label class="flex items-center p-4 border border-slate-200 rounded-2xl cursor-pointer hover:bg-blue-50">
                            <input type="radio" name="jasa" value="<?= $s ?>" class="w-4 h-4 text-blue-600" required>
                            <span class="ml-4 font-medium text-slate-700"><?= $s ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="flex gap-3 mt-8">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 py-4 text-slate-400 font-bold">Kembali</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 text-white py-4 rounded-2xl font-bold shadow-lg shadow-blue-200 text-sm">Selanjutnya</button>
                    </div>
                </div>

                <div class="step">
                    <h2 class="text-2xl font-bold mb-8">Detail Brief</h2>
                    <textarea name="pesan" rows="5" placeholder="Jelaskan kebutuhan Anda..." class="w-full p-4 rounded-2xl border border-slate-200 outline-none focus:border-blue-600 mb-4"></textarea>
                    <input type="file" name="file_brief" class="w-full text-xs text-slate-400 mb-8">
                    <div class="flex gap-3 mt-8">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 py-4 text-slate-400 font-bold">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-slate-900 text-white py-4 rounded-2xl font-bold shadow-lg text-sm">Kirim Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <footer class="py-10 bg-slate-900 text-white text-center text-[10px] tracking-widest uppercase">
        &copy; 2024 Z-STUDIO AGENCY - Internship Project
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
</body>
</html>