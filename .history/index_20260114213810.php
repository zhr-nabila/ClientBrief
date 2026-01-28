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
        .step-content, #form-container { display: none; }
        .active { display: block !important; animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1); }
        @keyframes slideUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        input, select, textarea { width: 100%; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); rounded: 1rem; padding: 1rem; outline: none; transition: 0.3s; }
        input:focus { border-color: #2563eb; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 bg-[radial-gradient(circle_at_top_right,#1e293b,#050810)]">

    <div id="landing-page" class="active text-center max-w-2xl">
        <h1 class="text-7xl font-black tracking-tighter mb-6 italic">Z-STUDIO<span class="text-blue-600">.</span></h1>
        <p class="text-gray-400 text-lg mb-10">Solusi Digital Berkelas Tanpa Kompromi.</p>
        <button onclick="startJourney()" class="bg-white text-black px-10 py-5 rounded-2xl font-black hover:scale-105 transition shadow-2xl uppercase tracking-tighter">Mulai Konsultasi</button>
    </div>

    <div id="form-container" class="w-full max-w-xl">
        <div class="glass-card rounded-[40px] overflow-hidden shadow-2xl">
            <div class="h-1.5 bg-white/5">
                <div id="progressBar" class="h-full bg-blue-600 w-1/3 transition-all duration-500"></div>
            </div>

            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="p-8 md:p-12">
                
                <div id="step-1" class="step-content active space-y-6">
                    <h2 class="text-2xl font-black flex items-center gap-3 uppercase italic"><i data-lucide="user"></i> Identitas</h2>
                    <div class="space-y-4">
                        <input type="text" name="nama" placeholder="Nama Lengkap" required>
                        <input type="email" name="email" placeholder="Email Aktif" required>
                        <input type="number" name="telepon" placeholder="Nomor WhatsApp" required>
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full bg-blue-600 py-4 rounded-xl font-black uppercase tracking-widest mt-4">Lanjut</button>
                </div>

                <div id="step-2" class="step-content space-y-6">
                    <h2 class="text-2xl font-black flex items-center gap-3 uppercase italic"><i data-lucide="briefcase"></i> Layanan</h2>
                    <select name="jasa" required class="cursor-pointer">
                        <option value="Web Development">Web Development</option>
                        <option value="UI/UX Design">UI/UX Interface</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                    </select>
                    <div class="flex gap-4">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 text-gray-500 font-bold uppercase text-xs">Kembali</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 py-4 rounded-xl font-black uppercase tracking-widest">Lanjut</button>
                    </div>
                </div>

                <div id="step-3" class="step-content space-y-6">
                    <h2 class="text-2xl font-black flex items-center gap-3 uppercase italic"><i data-lucide="message-square"></i> Detail Projek</h2>
                    <textarea name="pesan" rows="4" placeholder="Apa yang ingin Anda bangun?" required class="rounded-2xl"></textarea>
                    
                    <div class="bg-white/5 p-4 rounded-2xl border border-white/10">
                        <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block mb-2">Upload Referensi (Gambar)</label>
                        <input type="file" name="gambar_projek" accept="image/*" class="text-xs text-gray-400 border-none p-0 bg-transparent">
                    </div>

                    <div class="flex gap-4">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 text-gray-500 font-bold uppercase text-xs">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-white text-black py-4 rounded-xl font-black uppercase tracking-widest">Kirim Brief</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();
        function startJourney() {
            document.getElementById('landing-page').style.display = 'none';
            document.getElementById('form-container').classList.add('active');
        }
        function nextStep(step) {
            document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
            document.getElementById('step-' + step).classList.add('active');
            document.getElementById('progressBar').style.width = (step * 33.33) + '%';
        }
    </script>
</body>
</html>