<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientBrief | Digital Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/css/intlTelInput.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form-style.css">
</head>

<body class="min-h-screen hero-gradient flex items-center justify-center p-4 md:p-6">

    <!-- Language & Theme Toggle -->
    <div class="fixed top-6 right-6 flex gap-4 z-50">
        <button onclick="toggleLang()" class="glass-card px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all" id="langBtn">EN</button>
        <button onclick="toggleTheme()" class="glass-card p-2 rounded-full hover:scale-110 transition-all">
            <i data-lucide="moon" id="themeIcon" class="w-5 h-5"></i>
        </button>
    </div>

    <!-- Landing Page -->
    <div id="landing-page" class="active text-center max-w-2xl px-4">
        <h1 class="text-5xl md:text-7xl font-black tracking-tighter mb-4 md:mb-6 italic" id="txt-title">
            Client<span class="text-blue-600">Brief.</span>
        </h1>
        <p class="text-gray-400 text-base md:text-lg mb-8 md:mb-10 font-medium" id="txt-desc">
            Solusi Digital Berkelas. Mulai kolaborasi sekarang.
        </p>
        <button onclick="startJourney()" 
                class="group relative inline-flex items-center justify-center px-8 md:px-10 py-4 md:py-5 font-black text-black bg-white rounded-full transition-all hover:pr-10 md:hover:pr-12 shadow-2xl shadow-white/10">
            <span class="relative uppercase tracking-tighter text-sm md:text-base" id="txt-startBtn">
                Mulai Konsultasi
            </span>
            <i data-lucide="arrow-right" class="w-4 h-4 md:w-5 md:h-5 ml-2 transition-all group-hover:translate-x-1"></i>
        </button>
    </div>

    <!-- Form Container -->
    <div id="form-container" class="form-container">
        <!-- Progress Bar -->
        <div class="form-progress">
            <div id="p-1" class="progress-bar bg-blue-600"></div>
            <div id="p-2" class="progress-bar bg-white/10"></div>
            <div id="p-3" class="progress-bar bg-white/10"></div>
        </div>

        <!-- Form Card -->
        <div class="glass-form">
            <form id="briefForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                
                <!-- Step 1: Identity -->
                <div id="step-1" class="step-content active">
                    <h2 class="step-title" id="txt-step1-title">01. Identitas</h2>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <input type="text" 
                                   name="nama" 
                                   id="in-nama" 
                                   class="form-input" 
                                   placeholder="Nama Lengkap" 
                                   required>
                        </div>
                        
                        <div class="form-group">
                            <input type="email" 
                                   name="email" 
                                   id="in-email" 
                                   class="form-input" 
                                   placeholder="Email Aktif" 
                                   required>
                        </div>
                        
                        <div class="form-group tel-input-container">
                            <input type="tel" 
                                   id="in-telp" 
                                   class="form-input" 
                                   required
                                   inputmode="numeric"
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                   placeholder="Nomor WhatsApp">
                            <input type="hidden" name="no_telepon" id="full_phone">
                        </div>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" 
                                onclick="validateAndNext(1, 2)" 
                                class="btn-next" 
                                id="txt-next-1">
                            Lanjutkan
                        </button>
                    </div>
                </div>

                <!-- Step 2: Service -->
                <div id="step-2" class="step-content">
                    <h2 class="step-title" id="txt-step2-title">02. Layanan</h2>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <select name="jasa" 
                                    id="in-jasa" 
                                    class="form-input" 
                                    required>
                                <option value="" disabled selected id="opt-default">
                                    Pilih Layanan
                                </option>
                                <option value="Web Development">Web Development</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" 
                                onclick="goToStep(1)" 
                                class="btn-back">
                            Kembali
                        </button>
                        <button type="button" 
                                onclick="validateAndNext(2, 3)" 
                                class="btn-next" 
                                id="txt-next-2">
                            Lanjutkan
                        </button>
                    </div>
                </div>

                <!-- Step 3: Project -->
                <div id="step-3" class="step-content">
                    <h2 class="step-title" id="txt-step3-title">03. Projek</h2>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <textarea name="pesan" 
                                      id="in-pesan" 
                                      class="form-input form-textarea" 
                                      placeholder="Apa yang ingin Anda bangun?" 
                                      rows="4" 
                                      required></textarea>
                        </div>
                        
                        <div class="upload-area">
                            <input type="file" 
                                   name="gambar_projek" 
                                   accept="image/*">
                            <i data-lucide="upload-cloud" class="upload-icon"></i>
                            <p class="upload-text" id="txt-upload">
                                Upload Referensi
                            </p>
                        </div>
                    </div>
                    
                    <div class="button-group">
                        <button type="button" 
                                onclick="goToStep(2)" 
                                class="btn-back">
                            Kembali
                        </button>
                        <button type="submit" 
                                name="submit" 
                                class="btn-submit" 
                                id="txt-submit">
                            Kirim Brief
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/intlTelInput.min.js"></script>
    <script src="assets/js/script.js" defer></script>
</body>
</html>