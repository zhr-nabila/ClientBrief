<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO Academy | Dev & Design Internship</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide-icons@latest/dist/umd/lucide.js"></script>
</head>
<body class="bg-gradient-to-br from-gray-950 to-black text-white overflow-x-hidden relative">

    <div class="fixed inset-0 z-0 opacity-10 pointer-events-none">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.1\' fill-rule=\'evenodd\'%3E%3Ccircle cx=\'10\' cy=\'10\' r=\'10\'/%3E%3C/g%3E%3C/svg%3E')]" style="background-size: 20px 20px;"></div>
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute bottom-1/3 right-1/4 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
    </div>
    <nav class="fixed w-full z-[100] transition-all duration-500 py-4 px-4 md:px-20 backdrop-blur-md bg-black/30">
        <div class="max-w-7xl mx-auto flex justify-between items-center rounded-2xl p-2 md:p-4 border border-white/10 shadow-lg">
            <div class="text-2xl font-extrabold tracking-tighter font-['Space_Grotesk'] text-blue-400">Z-STUDIO</div>
            
            <div class="hidden md:flex items-center space-x-8 text-sm font-bold uppercase tracking-wide text-gray-300">
                <a href="#hero" class="hover:text-blue-400 transition" data-lang="nav-home">Beranda</a>
                <a href="#about" class="hover:text-blue-400 transition" data-lang="nav-about">Tentang</a>
                <a href="#courses" class="hover:text-blue-400 transition" data-lang="nav-courses">Layanan</a>
                
                <div class="flex border border-gray-700 rounded-full p-0.5 bg-gray-800">
                    <button onclick="changeLang('id')" id="btn-id" class="px-3 py-1 rounded-full bg-blue-600 text-white text-xs transition-all">ID</button>
                    <button onclick="changeLang('en')" id="btn-en" class="px-3 py-1 rounded-full text-gray-400 text-xs transition-all">EN</button>
                </div>

                <button onclick="startBrief()" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-purple-600 transition-all text-sm" data-lang="nav-apply">Mulai Projek</button>
            </div>

            <button class="md:hidden p-2 text-white" onclick="toggleMobileMenu()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden absolute top-24 left-4 right-4 bg-gray-900 p-6 rounded-3xl shadow-2xl border border-gray-700 flex flex-col space-y-4 text-center font-bold uppercase text-sm tracking-widest text-white">
            <a href="#hero" onclick="toggleMobileMenu()" data-lang="nav-home">Beranda</a>
            <a href="#about" onclick="toggleMobileMenu()" data-lang="nav-about">Tentang</a>
            <a href="#courses" onclick="toggleMobileMenu()" data-lang="nav-courses">Layanan</a>
            <hr class="border-gray-700">
            <div class="flex justify-center gap-4">
                <button onclick="changeLang('id')" class="text-blue-400">INDONESIA</button>
                <button onclick="changeLang('en')" class="text-gray-400">ENGLISH</button>
            </div>
            <button onclick="startBrief(); toggleMobileMenu();" class="bg-blue-600 text-white py-3 rounded-xl" data-lang="nav-apply">Mulai Projek</button>
        </div>
    </nav>

    <main class="relative z-10">
        <section id="hero" class="min-h-screen flex flex-col items-center justify-center text-center px-6 pt-32 pb-20">
            <p class="text-blue-400 font-semibold tracking-wide mb-4" data-aos="fade-up" data-aos-delay="100">Dev & Design Internship</p>
            <h1 class="text-6xl md:text-8xl font-extrabold leading-tight tracking-tighter mb-8 gradient-text" data-aos="fade-up" data-aos-delay="200">
                Z-STUDIO<br>Academy
            </h1>
            <button onclick="startBrief()" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-10 py-4 rounded-xl text-lg font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all" data-aos="fade-up" data-aos-delay="300" data-lang="btn-apply-hero">
                Daftar Sekarang
            </button>
            
            <div class="mt-20 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-4xl mx-auto border border-white/10 rounded-2xl p-6 bg-white/5 backdrop-blur-sm shadow-xl" data-aos="fade-up" data-aos-delay="400">
                <div class="text-center">
                    <p class="text-xl md:text-3xl font-bold text-white mb-1">Split / Zagreb</p>
                    <p class="text-xs md:text-sm text-gray-400 uppercase tracking-widest" data-lang="hero-info-1">Lokasi</p>
                </div>
                <div class="text-center">
                    <p class="text-xl md:text-3xl font-bold text-white mb-1">8 Weeks</p>
                    <p class="text-xs md:text-sm text-gray-400 uppercase tracking-widest" data-lang="hero-info-2">Durasi</p>
                </div>
                <div class="text-center">
                    <p class="text-xl md:text-3xl font-bold text-white mb-1">5+</p>
                    <p class="text-xs md:text-sm text-gray-400 uppercase tracking-widest" data-lang="hero-info-3">Mentor</p>
                </div>
                <div class="text-center">
                    <p class="text-xl md:text-3xl font-bold text-white mb-1">4</p>
                    <p class="text-xs md:text-sm text-gray-400 uppercase tracking-widest" data-lang="hero-info-4">Layanan</p>
                </div>
            </div>
        </section>

        <section id="about" class="py-24 px-6 text-center">
            <a href="#" class="inline-flex items-center text-blue-400 text-sm font-semibold hover:underline mb-12" data-aos="fade-up">
                <i data-lucide="info" class="h-4 w-4 mr-2"></i> <span data-lang="about-learn-more">Pelajari lebih lanjut tentang kami</span>
            </a>
            <h2 class="text-4xl md:text-5xl font-extrabold mb-16 gradient-text" data-aos="fade-up" data-aos-delay="100">
                <span data-lang="about-title-1">Apa yang kamu dapatkan</span> <span data-lang="about-title-2">di sini?</span>
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                <div class="glass-card" data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center mb-6 shadow-lg">
                        <i data-lucide="hand" class="h-8 w-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-lang="about-card-1-title">Praktik Langsung</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="about-card-1-desc">
                        Setiap layanan akan membimbingmu melalui seluruh proses pengembangan dan implementasi proyek nyata.
                    </p>
                </div>
                <div class="glass-card" data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-green-500 to-teal-500 flex items-center justify-center mb-6 shadow-lg">
                        <i data-lucide="users" class="h-8 w-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-lang="about-card-2-title">Mentoring Ahli</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="about-card-2-desc">
                        Manfaatkan kesempatan untuk menerima umpan balik dan bimbingan berharga dari para ahli industri.
                    </p>
                </div>
                <div class="glass-card" data-aos="zoom-in" data-aos-delay="400">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center mb-6 shadow-lg">
                        <i data-lucide="zap" class="h-8 w-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-lang="about-card-3-title">Skill Relevan</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="about-card-3-desc">
                        Dirancang untuk memberikan keterampilan yang kamu butuhkan untuk menunjang karir profesionalmu.
                    </p>
                </div>
                <div class="glass-card" data-aos="zoom-in" data-aos-delay="500">
                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-red-500 to-pink-500 flex items-center justify-center mb-6 shadow-lg">
                        <i data-lucide="award" class="h-8 w-8 text-white"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3" data-lang="about-card-4-title">Sertifikat</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="about-card-4-desc">
                        Setelah berhasil menyelesaikan, kamu akan menerima sertifikat yang memvalidasi keahlianmu.
                    </p>
                </div>
            </div>
        </section>

        <section id="courses" class="py-24 px-6">
            <h2 class="text-4xl md:text-5xl font-extrabold text-center mb-16 gradient-text" data-aos="fade-up" data-aos-delay="100" data-lang="courses-title">Layanan Kami</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                <div class="glass-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-blue-400">SEO</h3>
                        <i data-lucide="globe" class="h-6 w-6 text-gray-400"></i>
                    </div>
                    <p class="text-gray-400 mb-6 text-sm" data-lang="serv-1-desc">Optimasi mesin pencari agar brand Anda muncul di halaman pertama Google secara organik.</p>
                    <a href="#" onclick="startBrief()" class="text-blue-400 hover:text-purple-400 text-sm font-semibold flex items-center">
                        <span data-lang="view-details">Mulai Proyek</span> <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                    </a>
                </div>
                <div class="glass-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-purple-400">Social Media</h3>
                        <i data-lucide="megaphone" class="h-6 w-6 text-gray-400"></i>
                    </div>
                    <p class="text-gray-400 mb-6 text-sm" data-lang="serv-2-desc">Manajemen konten kreatif untuk membangun komunitas dan interaksi di platform sosial.</p>
                    <a href="#" onclick="startBrief()" class="text-purple-400 hover:text-blue-400 text-sm font-semibold flex items-center">
                        <span data-lang="view-details">Mulai Proyek</span> <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                    </a>
                </div>
                <div class="glass-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-green-400">Web Maintenance</h3>
                        <i data-lucide="settings" class="h-6 w-6 text-gray-400"></i>
                    </div>
                    <p class="text-gray-400 mb-6 text-sm" data-lang="serv-3-desc">Memastikan website Anda selalu cepat, aman, dan bebas dari kendala teknis setiap harinya.</p>
                    <a href="#" onclick="startBrief()" class="text-green-400 hover:text-blue-400 text-sm font-semibold flex items-center">
                        <span data-lang="view-details">Mulai Proyek</span> <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                    </a>
                </div>
                <div class="glass-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-2xl font-bold text-yellow-400">Google Ads</h3>
                        <i data-lucide="zap" class="h-6 w-6 text-gray-400"></i>
                    </div>
                    <p class="text-gray-400 mb-6 text-sm" data-lang="serv-4-desc">Iklan berbayar yang efektif untuk mendapatkan traffic instan dan leads berkualitas tinggi.</p>
                    <a href="#" onclick="startBrief()" class="text-yellow-400 hover:text-blue-400 text-sm font-semibold flex items-center">
                        <span data-lang="view-details">Mulai Proyek</span> <i data-lucide="arrow-right" class="ml-2 h-4 w-4"></i>
                    </a>
                </div>
            </div>
        </section>

        <section id="form-section" class="hidden min-h-screen py-24 px-6 bg-black/50 backdrop-blur-lg">
            <div class="max-w-xl mx-auto">
                <div class="mb-8 h-2 w-full bg-gray-700 rounded-full overflow-hidden">
                    <div id="progress" class="h-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-500" style="width: 33.3%"></div>
                </div>

                <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="bg-gray-900 p-8 md:p-12 rounded-[32px] shadow-2xl border border-gray-700 glass-effect">
                    <div class="step active">
                        <h2 class="text-3xl font-bold mb-8 text-white" data-lang="form-step-1-title">Informasi Kontak</h2>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-gray-400 text-sm mb-2" data-lang="form-label-name">Nama Lengkap / Perusahaan</label>
                                <input type="text" name="nama" placeholder="Your Name / Company" class="w-full p-4 rounded-xl border border-gray-700 bg-gray-800 text-white outline-none focus:border-blue-500 transition" required>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm mb-2" data-lang="form-label-email">Email Bisnis Aktif</label>
                                <input type="email" name="email" placeholder="email@example.com" class="w-full p-4 rounded-xl border border-gray-700 bg-gray-800 text-white outline-none focus:border-blue-500 transition" required>
                            </div>
                        </div>
                        <button type="button" onclick="nextStep(2)" class="w-full mt-10 bg-gradient-to-r from-blue-500 to-purple-600 text-white py-4 rounded-xl text-lg font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all" data-lang="btn-next">Selanjutnya</button>
                    </div>

                    <div class="step">
                        <h2 class="text-3xl font-bold mb-8 text-white" data-lang="form-step-2-title">Pilih Layanan Utama</h2>
                        <div class="space-y-4">
                            <?php 
                            $services = ["SEO", "Social Media", "Web Maintenance", "Google Ads"];
                            foreach($services as $s): ?>
                            <label class="flex items-center p-5 border border-gray-700 rounded-2xl cursor-pointer hover:bg-gray-800 transition">
                                <input type="radio" name="jasa" value="<?= $s ?>" class="w-5 h-5 text-blue-500 bg-gray-800 border-gray-600 focus:ring-blue-500" required>
                                <span class="ml-4 font-semibold text-white text-lg"><?= $s ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                        <div class="flex gap-4 mt-10">
                            <button type="button" onclick="nextStep(1)" class="w-1/3 py-4 text-gray-400 font-bold hover:text-white transition" data-lang="btn-back">Kembali</button>
                            <button type="button" onclick="nextStep(3)" class="w-2/3 bg-gradient-to-r from-blue-500 to-purple-600 text-white py-4 rounded-xl text-lg font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all" data-lang="btn-next">Selanjutnya</button>
                        </div>
                    </div>

                    <div class="step">
                        <h2 class="text-3xl font-bold mb-8 text-white" data-lang="form-step-3-title">Detail Kebutuhan Proyek</h2>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-gray-400 text-sm mb-2" data-lang="form-label-details">Ceritakan visi atau masalah yang ingin dipecahkan</label>
                                <textarea name="pesan" rows="6" placeholder="Project goals, target audience, challenges, etc." class="w-full p-4 rounded-xl border border-gray-700 bg-gray-800 text-white outline-none focus:border-blue-500 transition"></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm mb-2" data-lang="form-label-file">Upload Referensi (Opsional)</label>
                                <input type="file" name="file_brief" class="w-full text-sm text-gray-400 file:mr-4 file:py-3 file:px-6 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-purple-600 transition">
                            </div>
                        </div>
                        <div class="flex gap-4 mt-10">
                            <button type="button" onclick="nextStep(2)" class="w-1/3 py-4 text-gray-400 font-bold hover:text-white transition" data-lang="btn-back">Kembali</button>
                            <button type="submit" name="submit" class="w-2/3 bg-gradient-to-r from-blue-500 to-purple-600 text-white py-4 rounded-xl text-lg font-bold shadow-lg hover:shadow-xl transform hover:scale-105 transition-all" data-lang="btn-submit">Kirim Brief Sekarang</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        </main>

    <footer class="py-12 bg-gray-900 text-gray-500 text-center text-sm">
        <p>&copy; 2024 Z-STUDIO Academy. All rights reserved.</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
    <script>
        AOS.init({ once: true, duration: 800 });
        lucide.createIcons(); // Initialize Lucide icons
    </script>
</body>
</html>