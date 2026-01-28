<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Excellence Agency</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="text-white">

    <nav class="fixed w-full z-50 px-4 md:px-6 py-4">
        <div class="max-w-7xl mx-auto glass rounded-2xl p-3 md:p-4 flex justify-between items-center">
            <div class="text-xl font-extrabold tracking-tighter text-blue-500">Z-STUDIO.</div>
            
            <div class="flex items-center gap-4 md:gap-8">
                <div class="hidden md:flex gap-6 text-sm font-medium">
                    <a href="#hero" data-lang="nav-home">Beranda</a>
                    <a href="#services" data-lang="nav-services">Layanan</a>
                </div>
                
                <div class="flex bg-white/5 rounded-full p-1 border border-white/10">
                    <button onclick="changeLang('id')" id="btn-id">ID</button>
                    <button onclick="changeLang('en')" id="btn-en">EN</button>
                </div>
                
                <button onclick="startBrief()" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-xl text-xs font-bold transition shadow-lg shadow-blue-600/20" data-lang="nav-apply">Mulai Projek</button>
            </div>
        </div>
    </nav>

    <section id="hero" class="min-h-screen flex flex-col items-center justify-center px-6 text-center">
        <div class="inline-block px-4 py-1 rounded-full border border-blue-500/30 bg-blue-500/10 text-blue-400 text-[10px] font-bold tracking-widest mb-6" data-aos="fade-down">
            DIGITAL GROWTH PARTNER
        </div>
        <h1 class="text-4xl md:text-7xl font-extrabold mb-6 leading-tight max-w-4xl" data-aos="fade-up">
            Akselerasi Bisnis Anda ke <br> <span class="text-gradient font-black">Era Digital Next-Gen</span>
        </h1>
        <p class="text-gray-400 max-w-2xl text-base md:text-lg mb-10" data-aos="fade-up" data-aos-delay="100" data-lang="hero-desc">
            Kami membantu brand ambisius mendominasi pasar melalui strategi pemasaran digital yang berbasis data.
        </p>
        <div class="flex flex-col md:flex-row gap-4 w-full md:w-auto" data-aos="fade-up" data-aos-delay="200">
            <button onclick="startBrief()" class="bg-white text-black px-8 py-4 rounded-2xl font-bold hover:scale-105 transition-all" data-lang="btn-apply-hero">Konsultasi Sekarang</button>
            <a href="#services" class="px-8 py-4 rounded-2xl font-bold glass hover:bg-white/5 transition-all">Pelajari Layanan</a>
        </div>
    </section>

    <section id="form-section" class="hidden py-24 md:py-32 px-4 md:px-6">
        <div class="max-w-2xl mx-auto relative">
            <button onclick="cancelBrief()" class="absolute -top-12 right-0 flex items-center gap-2 text-gray-500 hover:text-white transition">
                <i data-lucide="x-circle" class="w-6 h-6"></i>
            </button>
            
            <div class="glass p-6 md:p-12 rounded-[32px] md:rounded-[40px]">
                <div class="mb-10 h-1 w-full bg-white/5 rounded-full overflow-hidden">
                    <div id="progress" class="h-full bg-blue-600 transition-all duration-500" style="width: 33%"></div>
                </div>

                <form action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                    <div class="step active" id="step1">
                        <h2 class="text-2xl md:text-3xl font-bold mb-6">Mari Berkenalan.</h2>
                        <input type="text" name="nama" placeholder="Nama Lengkap / Perusahaan" class="w-full p-4 bg-white/5 border border-white/10 rounded-2xl mb-4 focus:border-blue-500 outline-none transition" required>
                        <input type="email" name="email" placeholder="Email Aktif" class="w-full p-4 bg-white/5 border border-white/10 rounded-2xl mb-6 focus:border-blue-500 outline-none transition" required>
                        <button type="button" onclick="nextStep(2)" class="w-full bg-blue-600 py-4 rounded-2xl font-bold shadow-lg">Lanjutkan</button>
                    </div>

                    <div class="step" id="step2">
                        <h2 class="text-2xl md:text-3xl font-bold mb-6">Pilih Layanan.</h2>
                        <div class="grid gap-3">
                            <?php $svc = ["SEO Services", "Social Media", "Web Development", "Google Ads"]; foreach($svc as $s): ?>
                            <label class="flex items-center p-4 glass rounded-2xl cursor-pointer hover:border-blue-500/50 transition">
                                <input type="radio" name="jasa" value="<?= $s ?>" class="hidden peer" required>
                                <span class="w-5 h-5 border-2 border-white/20 rounded-full mr-4 peer-checked:bg-blue-600 peer-checked:border-blue-600"></span>
                                <span class="text-sm font-medium"><?= $s ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                        <div class="flex gap-4 mt-8">
                            <button type="button" onclick="nextStep(1)" class="w-1/3 text-gray-500 font-bold">Kembali</button>
                            <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 py-4 rounded-2xl font-bold">Lanjut</button>
                        </div>
                    </div>

                    <div class="step" id="step3">
                        <h2 class="text-2xl md:text-3xl font-bold mb-6">Detail Brief.</h2>
                        <textarea name="pesan" rows="4" class="w-full p-4 bg-white/5 border border-white/10 rounded-2xl mb-6 focus:border-blue-500 outline-none transition" placeholder="Jelaskan kebutuhan bisnis Anda..."></textarea>
                        <div class="mb-8">
                            <p class="text-[10px] font-bold text-gray-500 uppercase mb-2">Upload File (Optional)</p>
                            <input type="file" name="file_brief" class="text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-600 file:text-white">
                        </div>
                        <div class="flex gap-4">
                            <button type="button" onclick="nextStep(2)" class="w-1/3 text-gray-500 font-bold">Kembali</button>
                            <button type="submit" name="submit" class="w-2/3 bg-blue-600 py-4 rounded-2xl font-bold hover:bg-blue-700 transition">Kirim Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
</body>
</html>