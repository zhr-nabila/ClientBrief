<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Premium Digital Solution</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050810; font-family: 'Plus Jakarta Sans', sans-serif; color: white; overflow-x: hidden; }
        .glass-card { background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); backdrop-filter: blur(15px); }
        .hero-gradient { background: radial-gradient(circle at top right, #1e293b, #050810); }
        .step-content, #form-container { display: none; }
        .active { display: block !important; animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen hero-gradient flex items-center justify-center p-6">

    <div id="landing-page" class="active text-center max-w-2xl">
        <div class="inline-block px-4 py-1.5 mb-6 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-[0.3em]">
            Digital Creative Agency
        </div>
        <h1 class="text-6xl md:text-7xl font-black tracking-tighter mb-6 italic italic">
            Z-STUDIO<span class="text-blue-600">.</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl leading-relaxed mb-10 font-medium">
            Transformasi ide brilian Anda menjadi mahakarya digital. Mulai kolaborasi profesional bersama tim kami sekarang.
        </p>
        <button onclick="startJourney()" class="group relative inline-flex items-center justify-center px-10 py-5 font-black text-black bg-white rounded-full overflow-hidden transition-all hover:pr-12 active:scale-95 shadow-2xl shadow-white/10">
            <span class="relative uppercase tracking-tighter">Mulai Konsultasi Projek</span>
            <i data-lucide="arrow-right" class="w-5 h-5 ml-2 transition-all group-hover:translate-x-1"></i>
        </button>
    </div>

    <div id="form-container" class="w-full max-w-xl">
        <div class="flex justify-between mb-8 px-2">
            <div id="p-1" class="h-1 w-[30%] rounded-full bg-blue-600 transition-all duration-500"></div>
            <div id="p-2" class="h-1 w-[30%] rounded-full bg-white/10 transition-all duration-500"></div>
            <div id="p-3" class="h-1 w-[30%] rounded-full bg-white/10 transition-all duration-500"></div>
        </div>

        <div class="glass-card rounded-[40px] p-8 md:p-12 shadow-2xl border-white/5">
            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                
                <div id="step-1" class="step-content active space-y-8">
                    <div>
                        <p class="text-blue-500 font-black text-[10px] uppercase tracking-[0.3em] mb-2">01. Identitas</p>
                        <h2 class="text-3xl font-black tracking-tighter italic uppercase leading-none">Siapa Anda?</h2>
                        <p class="text-gray-500 text-sm mt-2">Berikan detail kontak agar kami dapat menghubungi Anda.</p>
                    </div>
                    <div class="space-y-4">
                        <input type="text" name="nama_klien" placeholder="Nama Lengkap / Perusahaan" required class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all placeholder:text-gray-600">
                        <input type="email" name="email_klien" placeholder="Alamat Email Bisnis" required class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all placeholder:text-gray-600">
                        <input type="number" name="no_telepon" placeholder="Nomor WhatsApp (Aktif)" required class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all placeholder:text-gray-600">
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full bg-blue-600 text-white font-black py-5 rounded-[24px] hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20 uppercase tracking-tighter">Lanjutkan</button>
                </div>

                <div id="step-2" class="step-content space-y-8">
                    <div>
                        <p class="text-blue-500 font-black text-[10px] uppercase tracking-[0.3em] mb-2">02. Kebutuhan</p>
                        <h2 class="text-3xl font-black tracking-tighter italic uppercase leading-none">Detail Projek</h2>
                        <p class="text-gray-500 text-sm mt-2">Jelaskan visi atau tantangan yang ingin Anda selesaikan.</p>
                    </div>
                    <div class="space-y-4">
                        <select name="jasa_pilihan" required class="w-full bg-[#0a0f1a] border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>Pilih Kategori Layanan</option>
                            <option value="Visual Branding">Visual Branding & Identity</option>
                            <option value="Web Development">Premium Web Development</option>
                            <option value="UI/UX Design">UI/UX Interface Design</option>
                            <option value="Marketing">Social Media Marketing</option>
                        </select>
                        <textarea name="kebutuhan_detail" rows="4" placeholder="Deskripsikan fitur atau konsep yang Anda inginkan..." required class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all resize-none placeholder:text-gray-600"></textarea>
                    </div>
                    <div class="flex gap-4">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 border border-white/10 text-gray-400 font-bold py-5 rounded-[24px] hover:text-white transition-all uppercase text-xs tracking-widest">Kembali</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 text-white font-black py-5 rounded-[24px] hover:bg-blue-700 transition-all shadow-lg shadow-blue-600/20 uppercase tracking-tighter">Lanjutkan</button>
                    </div>
                </div>

                <div id="step-3" class="step-content space-y-8">
                    <div>
                        <p class="text-blue-500 font-black text-[10px] uppercase tracking-[0.3em] mb-2">03. Finalisasi</p>
                        <h2 class="text-3xl font-black tracking-tighter italic uppercase leading-none">Lampiran Asset</h2>
                        <p class="text-gray-500 text-sm mt-2">Unggah dokumen pendukung atau referensi visual (opsional).</p>
                    </div>
                    <div class="border-2 border-dashed border-white/10 rounded-[32px] p-10 text-center hover:border-blue-500 transition-all relative bg-white/[0.02]">
                        <input type="file" name="foto_pendukung" class="absolute inset-0 opacity-0 cursor-pointer">
                        <div class="flex flex-col items-center">
                            <i data-lucide="cloud-upload" class="w-12 h-12 text-blue-500 mb-4"></i>
                            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Klik atau Seret File Ke Sini</p>
                            <p class="text-[10px] text-gray-600 mt-2 uppercase tracking-tighter">Maksimal 2MB (JPG, PNG)</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 border border-white/10 text-gray-400 font-bold py-5 rounded-[24px] hover:text-white transition-all uppercase text-xs tracking-widest">Kembali</button>
                        <button type="submit" class="w-2/3 bg-white text-black font-black py-5 rounded-[24px] hover:bg-blue-600 hover:text-white transition-all shadow-xl shadow-white/5 uppercase tracking-tighter">Kirim Brief Projek</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function startJourney() {
            document.getElementById('landing-page').classList.remove('active');
            setTimeout(() => {
                document.getElementById('landing-page').style.display = 'none';
                document.getElementById('form-container').classList.add('active');
            }, 300);
        }

        function nextStep(step) {
            document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
            setTimeout(() => {
                document.getElementById('step-' + step).classList.add('active');
            }, 50);
            
            for(let i=1; i<=3; i++) {
                const bar = document.getElementById('p-' + i);
                if(i <= step) {
                    bar.style.backgroundColor = '#2563eb'; // blue-600
                } else {
                    bar.style.backgroundColor = 'rgba(255,255,255,0.1)';
                }
            }
        }
    </script>
</body>
</html>