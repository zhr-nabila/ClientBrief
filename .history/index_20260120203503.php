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
</head>

<body class="min-h-screen hero-gradient flex items-center justify-center p-6">

    <div class="fixed top-6 right-6 flex gap-4 z-50">
        <button onclick="toggleLang()" class="glass-card px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all" id="langBtn">EN</button>
        <button onclick="toggleTheme()" class="glass-card p-2 rounded-full hover:scale-110 transition-all">
            <i data-lucide="moon" id="themeIcon" class="w-5 h-5"></i>
        </button>
    </div>

    <div id="landing-page" class="active text-center max-w-2xl">
        <h1 class="text-6xl md:text-7xl font-black tracking-tighter mb-6 italic" id="txt-title">Client<span class="text-blue-600">Brief.</span></h1>
        <p class="text-gray-400 text-lg mb-10 font-medium" id="txt-desc">Solusi Digital Berkelas. Mulai kolaborasi sekarang.</p>
        <button onclick="startJourney()" class="group relative inline-flex items-center justify-center px-10 py-5 font-black text-black bg-white rounded-full transition-all hover:pr-12 shadow-2xl shadow-white/10">
            <span class="relative uppercase tracking-tighter" id="txt-startBtn">Mulai Konsultasi</span>
            <i data-lucide="arrow-right" class="w-5 h-5 ml-2 transition-all group-hover:translate-x-1"></i>
        </button>
    </div>

    <div id="form-container" class="w-full max-w-2xl"> <!-- Increased max-width for better grid layout -->
        <!-- Progress Bar: More visible and responsive -->
        <div class="flex justify-between mb-8 px-2 gap-2">
            <div id="p-1" class="h-2 flex-1 rounded-full bg-blue-600 transition-all duration-500 shadow-sm"></div>
            <div id="p-2" class="h-2 flex-1 rounded-full bg-white/10 transition-all duration-500 shadow-sm"></div>
            <div id="p-3" class="h-2 flex-1 rounded-full bg-white/10 transition-all duration-500 shadow-sm"></div>
        </div>

        <div class="glass-card rounded-[40px] p-8 md:p-12 shadow-2xl">
            <form id="briefForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data">

                <div id="step-1" class="step-content active space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step1-title">01. Identitas</h2>
                    <!-- Grid layout for responsive form fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <input type="text" name="nama" id="in-nama" placeholder="Nama Lengkap" required class="input-field">
                        <input type="email" name="email" id="in-email" placeholder="Email Aktif" required class="input-field">
                    </div>
                    <div class="w-full">
                        <input type="tel" id="in-telp" required
                            inputmode="numeric"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                            placeholder="Nomor WhatsApp" class="input-field">
                        <input type="hidden" name="no_telepon" id="full_phone">
                    </div>
                    <button type="button" onclick="validateAndNext(1, 2)" class="w-full bg-blue-600 text-white font-black py-5 rounded-[24px] uppercase tracking-tighter btn-next">Lanjutkan</button>
                </div>

                <div id="step-2" class="step-content space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step2-title">02. Layanan</h2>
                    <div class="space-y-4">
                        <!-- Custom dropdown with arrow icon and professional text -->
                        <!-- GANTI bagian select di step-2 dengan ini: -->
                        <div class="relative">
                            <select name="jasa" id="in-jasa" required class="w-full h-14 px-4 pr-12 bg-[#2A1617]/60 border border-[#B32C1A]/30 rounded-xl text-white focus:outline-none focus:border-[#FE7F42] focus:ring-2 focus:ring-[#FE7F42]/20 appearance-none">
                                <option value="" disabled selected id="opt-default">Pilih Layanan</option>
                                <option value="Web Development">Web Development</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                            </select>
                            <i data-lucide="chevron-down" class="absolute right-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>
                    <!-- Button alignment: 1:2 ratio, centered -->
                    <div class="flex gap-4 justify-center">
                        <button type="button" onclick="goToStep(1)" class="flex-1 max-w-[30%] border border-white/10 text-gray-400 font-bold py-5 rounded-[24px] uppercase text-xs btn-back">Kembali</button>
                        <button type="button" onclick="validateAndNext(2, 3)" class="flex-1 max-w-[60%] bg-blue-600 text-white font-black py-5 rounded-[24px] uppercase tracking-tighter btn-next">Lanjutkan</button>
                    </div>
                </div>

                <div id="step-3" class="step-content space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step3-title">03. Projek</h2>
                    <div class="space-y-4">
                        <textarea name="pesan" id="in-pesan" rows="4" placeholder="Deskripsikan proyek Anda secara singkat" required class="input-field resize-none"></textarea>
                        <div class="border-2 border-dashed border-white/10 rounded-[24px] p-6 text-center relative bg-white/[0.02]">
                            <input type="file" name="gambar_projek" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                            <i data-lucide="upload-cloud" class="w-8 h-8 text-blue-500 mx-auto mb-2"></i>
                            <p class="text-[10px] font-bold text-gray-500 uppercase" id="txt-upload">Upload Referensi</p>
                        </div>
                    </div>
                    <!-- Button alignment: 1:2 ratio, centered -->
                    <div class="flex gap-4 justify-center">
                        <button type="button" onclick="goToStep(2)" class="flex-1 max-w-[30%] border border-white/10 text-gray-400 font-bold py-5 rounded-[24px] uppercase text-xs btn-back">Kembali</button>
                        <button type="submit" name="submit" class="flex-1 max-w-[60%] bg-white text-black font-black py-5 rounded-[24px] hover:bg-blue-600 hover:text-white transition-all uppercase tracking-tighter" id="txt-submit">Kirim Brief</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/intlTelInput.min.js"></script>
    <script src="assets/js/script.js" defer></script>
</body>

</html>