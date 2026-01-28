<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Creative Brief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050810; font-family: 'Plus Jakarta Sans', sans-serif; color: white; overflow-x: hidden; }
        .glass-card { background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); }
        .step-content { display: none; }
        .step-content.active { display: block; animation: fadeIn 0.5s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-xl">
        <div class="flex justify-between mb-8 px-2">
            <div id="p-1" class="h-1.5 w-[30%] rounded-full bg-blue-600 transition-all"></div>
            <div id="p-2" class="h-1.5 w-[30%] rounded-full bg-white/10 transition-all"></div>
            <div id="p-3" class="h-1.5 w-[30%] rounded-full bg-white/10 transition-all"></div>
        </div>

        <div class="glass-card rounded-[40px] p-10 shadow-2xl">
            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                
                <div id="step-1" class="step-content active space-y-6">
                    <div>
                        <span class="text-blue-500 font-black text-xs uppercase tracking-widest">Langkah 01</span>
                        <h2 class="text-3xl font-black mt-1 tracking-tighter italic">SIAPA ANDA?</h2>
                    </div>
                    <div class="space-y-4">
                        <input type="text" name="nama_klien" placeholder="Nama Lengkap" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all">
                        <input type="email" name="email_klien" placeholder="Alamat Email" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all">
                        <input type="number" name="no_telepon" placeholder="No. WhatsApp (812...)" class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all">
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full bg-white text-black font-black py-4 rounded-2xl hover:bg-blue-500 hover:text-white transition-all">LANJUT</button>
                </div>

                <div id="step-2" class="step-content space-y-6">
                    <div>
                        <span class="text-blue-500 font-black text-xs uppercase tracking-widest">Langkah 02</span>
                        <h2 class="text-3xl font-black mt-1 tracking-tighter italic">DETAIL PROJEK</h2>
                    </div>
                    <div class="space-y-4">
                        <select name="jasa_pilihan" class="w-full bg-[#0a0f1a] border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all">
                            <option value="" disabled selected>Pilih Layanan</option>
                            <option value="Logo Design">Logo Design</option>
                            <option value="Web Development">Web Development</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                        </select>
                        <textarea name="kebutuhan_detail" rows="4" placeholder="Jelaskan keinginan Anda..." class="w-full bg-white/5 border border-white/10 rounded-2xl p-4 focus:border-blue-500 outline-none transition-all resize-none"></textarea>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 border border-white/10 font-bold py-4 rounded-2xl">BALIK</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-white text-black font-black py-4 rounded-2xl hover:bg-blue-500 hover:text-white transition-all">LANJUT</button>
                    </div>
                </div>

                <div id="step-3" class="step-content space-y-6">
                    <div>
                        <span class="text-blue-500 font-black text-xs uppercase tracking-widest">Langkah 03</span>
                        <h2 class="text-3xl font-black mt-1 tracking-tighter italic">LAMPIRAN</h2>
                    </div>
                    <div class="border-2 border-dashed border-white/10 rounded-3xl p-8 text-center hover:border-blue-500 transition-all relative">
                        <input type="file" name="foto_pendukung" class="absolute inset-0 opacity-0 cursor-pointer">
                        <i data-lucide="upload-cloud" class="w-10 h-10 text-gray-500 mx-auto mb-2"></i>
                        <p class="text-xs text-gray-400 font-bold">KLIK UNTUK UPLOAD ASSET</p>
                    </div>
                    <div class="flex gap-3">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 border border-white/10 font-bold py-4 rounded-2xl">BALIK</button>
                        <button type="submit" class="w-2/3 bg-blue-600 text-white font-black py-4 rounded-2xl shadow-lg shadow-blue-600/30">KIRIM BRIEF</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function nextStep(step) {
            // Sembunyikan semua step
            document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
            // Tampilkan step yang dituju
            document.getElementById('step-' + step).classList.add('active');
            
            // Update Progress Bar
            for(let i=1; i<=3; i++) {
                const bar = document.getElementById('p-' + i);
                if(i <= step) {
                    bar.classList.replace('bg-white/10', 'bg-blue-600');
                } else {
                    bar.classList.replace('bg-blue-600', 'bg-white/10');
                }
            }
        }
    </script>
</body>
</html>