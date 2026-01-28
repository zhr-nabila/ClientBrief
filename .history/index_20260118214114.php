<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientBrief | Digital Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/css/intlTelInput.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .form-input {
            @apply w-full bg-white/[0.03] border border-white/10 rounded-[20px] p-4 text-white placeholder-gray-500 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/20 transition-all duration-300;
        }
        
        .form-label {
            @apply block text-[12px] font-semibold text-gray-400 uppercase tracking-wider mb-2 ml-1;
        }
        
        .step-title {
            @apply text-2xl md:text-3xl font-black italic uppercase tracking-tight mb-8;
        }
        
        .btn-primary {
            @apply w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-[20px] uppercase tracking-tight transition-all duration-300 shadow-lg hover:shadow-blue-600/20 active:scale-[0.98];
        }
        
        .btn-secondary {
            @apply w-full bg-white/[0.05] hover:bg-white/[0.1] border border-white/10 text-gray-300 font-semibold py-4 px-6 rounded-[20px] uppercase tracking-tight transition-all duration-300;
        }
        
        .upload-area {
            @apply border-2 border-dashed border-white/10 rounded-[24px] p-8 text-center relative bg-white/[0.02] hover:border-blue-500/50 hover:bg-white/[0.04] transition-all duration-300 cursor-pointer;
        }
        
        .progress-bar {
            @apply h-2 rounded-full transition-all duration-500;
        }
    </style>
</head>

<body class="min-h-screen hero-gradient flex items-center justify-center p-4 md:p-6">

    <div class="fixed top-6 right-6 flex gap-3 z-50">
        <button onclick="toggleLang()" class="glass-card px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all" id="langBtn">EN</button>
        <button onclick="toggleTheme()" class="glass-card p-2 rounded-full hover:scale-110 transition-all">
            <i data-lucide="moon" id="themeIcon" class="w-5 h-5"></i>
        </button>
    </div>

    <div id="landing-page" class="active text-center max-w-2xl mx-auto px-4">
        <h1 class="text-5xl md:text-7xl font-black tracking-tighter mb-6 italic leading-tight" id="txt-title">Client<span class="text-blue-600">Brief.</span></h1>
        <p class="text-gray-400 text-lg md:text-xl mb-10 font-medium leading-relaxed" id="txt-desc">Solusi Digital Berkelas. Mulai kolaborasi sekarang.</p>
        <button onclick="startJourney()" class="group relative inline-flex items-center justify-center px-8 md:px-10 py-4 md:py-5 font-bold md:font-black text-black bg-white rounded-full transition-all hover:pr-12 shadow-2xl shadow-white/10 hover:shadow-white/20">
            <span class="relative uppercase tracking-tight md:tracking-tighter text-sm md:text-base" id="txt-startBtn">Mulai Konsultasi</span>
            <i data-lucide="arrow-right" class="w-4 h-4 md:w-5 md:h-5 ml-2 transition-all group-hover:translate-x-1"></i>
        </button>
    </div>

    <div id="form-container" class="w-full max-w-2xl mx-auto px-4">
        <!-- Progress Bar -->
        <div class="flex justify-between items-center mb-10">
            <div id="p-1" class="progress-bar w-[30%] bg-blue-600"></div>
            <div class="w-4 h-4 rounded-full bg-blue-600"></div>
            <div id="p-2" class="progress-bar w-[30%] bg-white/10"></div>
            <div class="w-4 h-4 rounded-full bg-white/10"></div>
            <div id="p-3" class="progress-bar w-[30%] bg-white/10"></div>
        </div>

        <!-- Form Container -->
        <div class="glass-card rounded-[32px] p-6 md:p-10 shadow-2xl">
            <form id="briefForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data">

                <!-- Step 1: Identitas -->
                <div id="step-1" class="step-content active">
                    <h2 class="step-title" id="txt-step1-title">01. Identitas</h2>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="form-label" for="in-nama">Nama Lengkap</label>
                            <input type="text" name="nama" id="in-nama" class="form-input" placeholder="Masukkan nama lengkap Anda" required>
                        </div>
                        
                        <div>
                            <label class="form-label" for="in-email">Email Aktif</label>
                            <input type="email" name="email" id="in-email" class="form-input" placeholder="contoh@email.com" required>
                        </div>
                        
                        <div>
                            <label class="form-label" for="in-telp">Nomor WhatsApp</label>
                            <div class="relative">
                                <input type="tel" id="in-telp" class="form-input pl-14" required
                                    inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                    placeholder="812 3456 7890">
                                <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i data-lucide="phone" class="w-4 h-4"></i>
                                </div>
                            </div>
                            <input type="hidden" name="no_telepon" id="full_phone">
                            <p class="text-xs text-gray-500 mt-2 ml-1">Kami akan menghubungi Anda via WhatsApp</p>
                        </div>
                    </div>
                    
                    <button type="button" onclick="validateAndNext(1, 2)" class="btn-primary mt-8">
                        <span class="btn-next">Lanjutkan</span>
                        <i data-lucide="arrow-right" class="w-4 h-4 inline-block ml-2"></i>
                    </button>
                </div>

                <!-- Step 2: Layanan -->
                <div id="step-2" class="step-content">
                    <h2 class="step-title" id="txt-step2-title">02. Layanan</h2>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="form-label" for="in-jasa">Pilih Layanan</label>
                            <div class="relative">
                                <select name="jasa" id="in-jasa" class="form-input appearance-none" required>
                                    <option value="" disabled selected id="opt-default">-- Pilih layanan yang Anda butuhkan --</option>
                                    <option value="Web Development">🌐 Web Development</option>
                                    <option value="UI/UX Design">🎨 UI/UX Design</option>
                                    <option value="Digital Marketing">📈 Digital Marketing</option>
                                </select>
                                <div class="absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i data-lucide="chevron-down" class="w-4 h-4"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white/[0.02] rounded-[20px] p-6 border border-white/5">
                            <div class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0">
                                    <i data-lucide="help-circle" class="w-5 h-5 text-blue-400"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-300 font-medium mb-1">Butuh bantuan memilih?</p>
                                    <p class="text-xs text-gray-500">Pilih layanan yang paling sesuai dengan kebutuhan proyek Anda. Kami akan membantu menyesuaikan solusi terbaik.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 mt-8">
                        <button type="button" onclick="goToStep(1)" class="btn-secondary flex items-center justify-center gap-2">
                            <i data-lucide="arrow-left" class="w-4 h-4"></i>
                            <span class="btn-back">Kembali</span>
                        </button>
                        <button type="button" onclick="validateAndNext(2, 3)" class="btn-primary flex items-center justify-center gap-2">
                            <span class="btn-next">Lanjutkan</span>
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3: Projek -->
                <div id="step-3" class="step-content">
                    <h2 class="step-title" id="txt-step3-title">03. Projek</h2>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="form-label" for="in-pesan">Detail Kebutuhan</label>
                            <textarea name="pesan" id="in-pesan" rows="5" class="form-input resize-none" placeholder="Ceritakan tentang proyek Anda, tujuan, fitur yang diinginkan, timeline, atau hal penting lainnya..." required></textarea>
                            <p class="text-xs text-gray-500 mt-2 ml-1">Semakin detail, semakin baik kami memahami kebutuhan Anda</p>
                        </div>
                        
                        <div>
                            <label class="form-label">Referensi Visual (Opsional)</label>
                            <div class="upload-area">
                                <input type="file" name="gambar_projek" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                                <div class="w-12 h-12 rounded-full bg-blue-500/20 flex items-center justify-center mx-auto mb-4">
                                    <i data-lucide="upload-cloud" class="w-6 h-6 text-blue-400"></i>
                                </div>
                                <p class="text-sm font-medium text-gray-300 mb-2" id="txt-upload">Upload Referensi</p>
                                <p class="text-xs text-gray-500">Drag & drop atau klik untuk mengupload gambar (JPG, PNG, max 5MB)</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex gap-4 mt-8">
                        <button type="button" onclick="goToStep(2)" class="btn-secondary flex items-center justify-center gap-2">
                            <i data-lucide="arrow-left" class="w-4 h-4"></i>
                            <span class="btn-back">Kembali</span>
                        </button>
                        <button type="submit" name="submit" class="btn-primary bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 flex items-center justify-center gap-2">
                            <i data-lucide="send" class="w-4 h-4"></i>
                            <span id="txt-submit">Kirim Brief</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Step Indicator -->
        <div class="flex justify-center gap-2 mt-8">
            <div class="w-2 h-2 rounded-full bg-blue-600"></div>
            <div class="w-2 h-2 rounded-full bg-white/20"></div>
            <div class="w-2 h-2 rounded-full bg-white/20"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/intlTelInput.min.js"></script>
    <script src="assets/js/script.js" defer></script>
</body>

</html>