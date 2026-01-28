<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientBrief | Digital Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/css/intlTelInput.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="min-h-screen hero-gradient flex items-center justify-center p-4 md:p-8">
    
    <!-- Decorative background elements -->
    <div class="decorative-circle w-64 h-64 top-10 left-10 opacity-30 floating-element"></div>
    <div class="decorative-circle w-96 h-96 bottom-10 right-10 opacity-20 floating-element" style="animation-delay: 2s;"></div>
    <div class="decorative-circle w-48 h-48 top-1/2 right-1/4 opacity-15 pulse-element"></div>
    
    <!-- Theme and language toggle -->
    <div class="fixed top-6 right-6 flex gap-3 z-50">
        <button onclick="toggleLang()" class="glass-card px-5 py-2.5 rounded-full text-sm font-semibold uppercase tracking-wider hover:bg-primary hover:text-white transition-all duration-300 flex items-center gap-2" id="langBtn">
            <i data-lucide="globe" class="w-4 h-4"></i>
            <span>EN</span>
        </button>
        <button onclick="toggleTheme()" class="glass-card p-3 rounded-full hover:scale-110 transition-all duration-300 hover:pink-glow">
            <i data-lucide="moon" id="themeIcon" class="w-5 h-5"></i>
        </button>
    </div>

    <!-- Landing page -->
    <div id="landing-page" class="active text-center max-w-3xl relative z-10">
        <div class="mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-br from-pink-500 to-pink-300 mb-8 pink-glow">
                <i data-lucide="sparkles" class="w-10 h-10 text-white"></i>
            </div>
            <h1 class="text-7xl md:text-8xl font-black tracking-tighter mb-6" id="txt-title">
                <span class="title-gradient">ClientBrief</span>
                <span class="text-white">.</span>
            </h1>
            <p class="text-xl md:text-2xl text-pink-100 mb-10 font-medium max-w-2xl mx-auto leading-relaxed" id="txt-desc">
                Solusi Digital Berkelas. Mulai kolaborasi sekarang.
            </p>
        </div>
        
        <button onclick="startJourney()" class="group relative inline-flex items-center justify-center px-12 py-6 font-bold text-white bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl transition-all hover:from-pink-600 hover:to-pink-700 shadow-2xl shadow-pink-500/25 hover:shadow-pink-500/40">
            <span class="relative text-lg uppercase tracking-wide" id="txt-startBtn">Mulai Konsultasi</span>
            <i data-lucide="arrow-right" class="w-6 h-6 ml-3 transition-all group-hover:translate-x-2"></i>
        </button>
        
        <div class="mt-20 text-pink-200/60 text-sm">
            <div class="flex items-center justify-center gap-6">
                <div class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-4 h-4"></i>
                    <span>UI/UX Modern</span>
                </div>
                <div class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-4 h-4"></i>
                    <span>Responsive Design</span>
                </div>
                <div class="flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-4 h-4"></i>
                    <span>Multilingual</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Form container -->
    <div id="form-container" class="w-full max-w-2xl relative z-10">
        <!-- Progress bar -->
        <div class="mb-10">
            <div class="progress-bar mb-4">
                <div id="progress-fill" class="progress-fill" style="width: 33%"></div>
            </div>
            <div class="flex justify-between text-sm font-medium text-pink-200">
                <span>Identitas</span>
                <span>Layanan</span>
                <span>Projek</span>
            </div>
        </div>

        <div class="glass-card rounded-3xl p-8 md:p-12 shadow-2xl">
            <form id="briefForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                
                <!-- Step 1: Identity -->
                <div id="step-1" class="step-content active space-y-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-pink-500 to-pink-300 flex items-center justify-center">
                            <i data-lucide="user" class="w-6 h-6 text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold tracking-tight" id="txt-step1-title">01. Identitas</h2>
                            <p class="text-pink-200/70 text-sm">Isi data diri Anda untuk memulai kolaborasi</p>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-pink-200 mb-2" for="in-nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="in-nama" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-pink-200 mb-2" for="in-email">Email Aktif</label>
                            <input type="email" name="email" id="in-email" placeholder="contoh@email.com" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-pink-200 mb-2" for="in-telp">Nomor WhatsApp</label>
                            <input type="tel" id="in-telp" required 
                                   inputmode="numeric" 
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '');" 
                                   placeholder="Contoh: 8123456789">
                            <input type="hidden" name="no_telepon" id="full_phone">
                        </div>
                    </div>
                    
                    <div class="pt-4">
                        <button type="button" onclick="validateAndNext(1, 2)" class="w-full btn-primary py-4 rounded-xl text-lg font-bold btn-next">
                            Lanjutkan
                            <i data-lucide="arrow-right" class="inline-block ml-2 w-5 h-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2: Services -->
                <div id="step-2" class="step-content space-y-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-pink-500 to-pink-300 flex items-center justify-center">
                            <i data-lucide="layers" class="w-6 h-6 text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold tracking-tight" id="txt-step2-title">02. Layanan</h2>
                            <p class="text-pink-200/70 text-sm">Pilih layanan yang Anda butuhkan</p>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-pink-200 mb-2" for="in-jasa">Jenis Layanan</label>
                            <select name="jasa" id="in-jasa" required>
                                <option value="" disabled selected id="opt-default">Pilih Layanan</option>
                                <option value="Web Development">Web Development</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                            </select>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-8">
                            <div class="glass-card p-5 rounded-xl text-center hover:bg-pink-500/10 transition-all cursor-pointer" onclick="document.getElementById('in-jasa').value='Web Development'">
                                <i data-lucide="code" class="w-8 h-8 text-pink-400 mx-auto mb-3"></i>
                                <h4 class="font-bold">Web Development</h4>
                                <p class="text-xs text-pink-200/70 mt-1">Website & Aplikasi</p>
                            </div>
                            <div class="glass-card p-5 rounded-xl text-center hover:bg-pink-500/10 transition-all cursor-pointer" onclick="document.getElementById('in-jasa').value='UI/UX Design'">
                                <i data-lucide="palette" class="w-8 h-8 text-pink-400 mx-auto mb-3"></i>
                                <h4 class="font-bold">UI/UX Design</h4>
                                <p class="text-xs text-pink-200/70 mt-1">Desain Antarmuka</p>
                            </div>
                            <div class="glass-card p-5 rounded-xl text-center hover:bg-pink-500/10 transition-all cursor-pointer" onclick="document.getElementById('in-jasa').value='Digital Marketing'">
                                <i data-lucide="trending-up" class="w-8 h-8 text-pink-400 mx-auto mb-3"></i>
                                <h4 class="font-bold">Digital Marketing</h4>
                                <p class="text-xs text-pink-200/70 mt-1">Promosi Digital</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 pt-6">
                        <button type="button" onclick="goToStep(1)" class="w-1/3 btn-secondary py-4 rounded-xl font-semibold btn-back">
                            <i data-lucide="arrow-left" class="inline-block mr-2 w-4 h-4"></i>
                            Kembali
                        </button>
                        <button type="button" onclick="validateAndNext(2, 3)" class="w-2/3 btn-primary py-4 rounded-xl text-lg font-bold btn-next">
                            Lanjutkan
                            <i data-lucide="arrow-right" class="inline-block ml-2 w-5 h-5"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Project -->
                <div id="step-3" class="step-content space-y-8">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-pink-500 to-pink-300 flex items-center justify-center">
                            <i data-lucide="folder-kanban" class="w-6 h-6 text-white"></i>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold tracking-tight" id="txt-step3-title">03. Projek</h2>
                            <p class="text-pink-200/70 text-sm">Ceritakan tentang projek Anda</p>
                        </div>
                    </div>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-pink-200 mb-2" for="in-pesan">Detail Projek</label>
                            <textarea name="pesan" id="in-pesan" rows="5" placeholder="Jelaskan apa yang ingin Anda bangun, tujuan, dan spesifikasi projek Anda..." required class="resize-none"></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-pink-200 mb-2">Referensi Visual (Opsional)</label>
                            <div class="file-upload-area rounded-2xl p-8 text-center relative">
                                <input type="file" name="gambar_projek" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" id="file-input">
                                <i data-lucide="upload-cloud" class="w-12 h-12 text-pink-400 mx-auto mb-4"></i>
                                <p class="font-medium mb-1" id="txt-upload">Unggah Referensi</p>
                                <p class="text-xs text-pink-200/60">Seret & lepas atau klik untuk mengunggah gambar (JPG, PNG)</p>
                                <p class="text-xs text-pink-300/50 mt-2" id="file-name">Belum ada file yang dipilih</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 pt-6">
                        <button type="button" onclick="goToStep(2)" class="w-1/3 btn-secondary py-4 rounded-xl font-semibold btn-back">
                            <i data-lucide="arrow-left" class="inline-block mr-2 w-4 h-4"></i>
                            Kembali
                        </button>
                        <button type="submit" name="submit" class="w-2/3 btn-primary py-4 rounded-xl text-lg font-bold flex items-center justify-center" id="txt-submit">
                            <i data-lucide="send" class="mr-3 w-5 h-5"></i>
                            Kirim Brief
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="text-center mt-8 text-sm text-pink-200/50">
            <p>Data Anda aman bersama kami. Kami tidak akan membagikan informasi pribadi Anda.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/intlTelInput.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>