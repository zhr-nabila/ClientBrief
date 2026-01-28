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
        
        /* Input Styling agar seragam */
        input, select, textarea { 
            width: 100%; 
            background: rgba(255, 255, 255, 0.05) !important; 
            border: 1px solid rgba(255, 255, 255, 0.1) !important; 
            border-radius: 1rem; 
            padding: 1rem; 
            color: white;
            outline: none; 
            transition: 0.3s; 
        }
        input:focus, select:focus, textarea:focus { border-color: #2563eb !important; }
    </style>
</head>
<body class="min-h-screen hero-gradient flex items-center justify-center p-6">

    <div id="landing-page" class="active text-center max-w-2xl">
        <div class="inline-block px-4 py-1.5 mb-6 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-[0.3em]">
            Digital Creative Agency
        </div>
        <h1 class="text-6xl md:text-7xl font-black tracking-tighter mb-6 italic">
            Z-STUDIO<span class="text-blue-600">.</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl leading-relaxed mb-10 font-medium">
            Solusi Digital Berkelas Tanpa Kompromi. Mulai kolaborasi profesional bersama tim kami sekarang.
        </p>
        <button onclick="startJourney()" class="group relative inline-flex items-center justify-center px-10 py-5 font-black text-black bg-white rounded-full overflow-hidden transition-all hover:pr-12 active:scale-95 shadow-2xl shadow-white/10">
            <span class="relative uppercase tracking-tighter">Mulai Konsultasi</span>
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
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter"><i data-lucide="user" class="inline mb-2 mr-2"></i> Identitas</h2>
                    <div class="space-y-4">
                        <input type="text" name="nama" placeholder="Nama Lengkap" required>
                        <input type="email" name="email" placeholder="Alamat Email" required>
                        <input type="number" name="telepon" placeholder="Nomor WhatsApp" required>
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full bg-blue-600 text-white font-black py-5 rounded-[24px] hover:bg-blue-700 transition-all uppercase tracking-tighter">Lanjutkan</button>
                </div>

                <div id="step-2" class="step-content space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter"><i data-lucide="briefcase" class="inline mb-2 mr-2"></i> Layanan</h2>
                    <select name="jasa" required>
                        <option value="Web Development">Web Development</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Digital Marketing">Digital Marketing</option>
                    </select>
                    <div class="flex gap-4">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 text-gray-400 font-bold uppercase text-xs">Kembali</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 text-white font-black py-5 rounded-[24px] hover:bg-blue-700 transition-all uppercase tracking-tighter">Lanjutkan</button>
                    </div>
                </div>

                <div id="step-3" class="step-content space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter"><i data-lucide="message-square" class="inline mb-2 mr-2"></i> Projek</h2>
                    <div class="space-y-4">
                        <textarea name="pesan" rows="4" placeholder="Apa yang ingin Anda bangun?" required class="resize-none"></textarea>
                        <div class="bg-white/5 p-4 rounded-2xl border border-white/10 relative">
                            <label class="text-[10px] font-bold text-gray-500 uppercase tracking-widest block mb-2">Upload Referensi</label>
                            <input type="file" name="gambar_projek" accept="image/*" class="text-xs text-gray-400 border-none p-0 bg-transparent">
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 text-gray-400 font-bold uppercase text-xs">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-white text-black font-black py-5 rounded-[24px] hover:bg-blue-600 hover:text-white transition-all uppercase tracking-tighter">Kirim Brief</button>
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
            setTimeout(() => { document.getElementById('step-' + step).classList.add('active'); }, 50);
            for(let i=1; i<=3; i++) {
                const bar = document.getElementById('p-' + i);
                bar.style.backgroundColor = (i <= step) ? '#2563eb' : 'rgba(255,255,255,0.1)';
            }
        }
    </script>
</body>
</html>