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
                        <div class="relative">
                            <select name="jasa" id="in-jasa" required class="input-field custom-select">
                                <option value="" disabled selected id="opt-default">Pilih Layanan</option>
                                <option value="Web Development">
                                    <i data-lucide="code" class="inline w-4 h-4 mr-2"></i>Web Development
                                </option>
                                <option value="UI/UX Design">
                                    <i data-lucide="palette" class="inline w-4 h-4 mr-2"></i>UI/UX Design
                                </option>
                                <option value="Digital Marketing">
                                    <i data-lucide="megaphone" class="inline w-4 h-4 mr-2"></