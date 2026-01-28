<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Briefing Portal | Creative Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .step { display: none; }
        .step.active { display: block; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <section id="hero" class="min-h-screen flex items-center justify-center bg-white">
        <div class="max-w-4xl px-6 text-center">
            <span class="text-blue-600 font-semibold tracking-widest uppercase text-sm">Onboarding Process</span>
            <h1 class="text-5xl md:text-6xl font-bold mt-4 mb-6 tracking-tight">Mari bangun sesuatu yang <span class="text-blue-600">luar biasa.</span></h1>
            <p class="text-slate-500 text-lg mb-10 max-w-2xl mx-auto">Satu langkah menuju kolaborasi hebat. Ceritakan visi proyekmu dan kami akan bantu mewujudkannya.</p>
            <button onclick="startBrief()" class="bg-slate-900 text-white px-8 py-4 rounded-full font-medium hover:bg-blue-600 transition-all duration-300 shadow-xl shadow-blue-100">
                Mulai Isi Briefing
            </button>
        </div>
    </section>

    <section id="form-section" class="hidden min-h-screen py-20 bg-slate-50">
        <div class="max-w-2xl mx-auto px-6">
            
            <div class="mb-12">
                <div class="h-2 w-full bg-slate-200 rounded-full">
                    <div id="progress" class="h-2 bg-blue-600 rounded-full transition-all duration-500" style="width: 33%"></div>
                </div>
                <div class="flex justify-between mt-4 text-xs font-medium text-slate-400 uppercase tracking-wider">
                    <span>Identity</span>
                    <span>Service</span>
                    <span>Project Detail</span>
                </div>
            </div>

            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-slate-100">
                
                <div class="step active">
                    <h2 class="text-2xl font-bold mb-2">Siapa Anda?</h2>
                    <p class="text-slate-500 mb-8 text-sm">Kenalan dulu yuk sebelum mulai.</p>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Nama Lengkap / Perusahaan</label>
                            <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Contoh: Alex Project" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Email Bisnis</label>
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="alex@bisnis.com" required>
                        </div>
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full mt-10 bg-blue-600 text-white py-4 rounded-xl font-semibold hover:bg-blue-700 transition">Lanjut</button>
                </div>

                <div class="step">
                    <h2 class="text-2xl font-bold mb-2">Layanan Apa yang Dibutuhkan?</h2>
                    <p class="text-slate-500 mb-8 text-sm">Pilih salah satu fokus utama Anda.</p>
                    
                    <div class="grid grid-cols-1 gap-4">
                        <label class="relative flex items-center p-4 border border-slate-200 rounded-xl cursor-pointer hover:bg-blue-50 transition">
                            <input type="radio" name="jasa" value="Website" class="w-4 h-4 text-blue-600" required>
                            <span class="ml-4 font-medium">Website & Application</span>
                        </label>
                        <label class="relative flex items-center p-4 border border-slate-200 rounded-xl cursor-pointer hover:bg-blue-50 transition">
                            <input type="radio" name="jasa" value="Digital Marketing" class="w-4 h-4 text-blue-600">
                            <span class="ml-4 font-medium">Digital Marketing (SEO/Ads)</span>
                        </label>
                        <label class="relative flex items-center p-4 border border-slate-200 rounded-xl cursor-pointer hover:bg-blue-50 transition">
                            <input type="radio" name="jasa" value="Branding" class="w-4 h-4 text-blue-600">
                            <span class="ml-4 font-medium">Branding & Visual Identity</span>
                        </label>
                    </div>
                    
                    <div class="flex gap-4 mt-10">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 border border-slate-200 py-4 rounded-xl font-medium hover:bg-slate-50">Kembali</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 text-white py-4 rounded-xl font-semibold hover:bg-blue-700">Lanjut</button>
                    </div>
                </div>

                <div class="step">
                    <h2 class="text-2xl font-bold mb-2">Detail Proyek</h2>
                    <p class="text-slate-500 mb-8 text-sm">Ceritakan visi atau masalah yang ingin dipecahkan.</p>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium mb-2">Apa tujuan utama proyek ini?</label>
                            <textarea name="pesan" rows="4" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 focus:outline-none transition" placeholder="Ceritakan detailnya..."></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-2">Upload Referensi (Opsional)</label>
                            <input type="file" name="file_brief" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                    </div>

                    <div class="flex gap-4 mt-10">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 border border-slate-200 py-4 rounded-xl font-medium hover:bg-slate-50">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-slate-900 text-white py-4 rounded-xl font-semibold hover:bg-blue-600 transition">Kirim Ke Tim Kami</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

    <script>
        function startBrief() {
            document.getElementById('hero').classList.add('hidden');
            document.getElementById('form-section').classList.remove('hidden');
            window.scrollTo(0, 0);
        }

        function nextStep(step) {
            const steps = document.querySelectorAll('.step');
            const progress = document.getElementById('progress');
            
            steps.forEach((s, index) => {
                s.classList.toggle('active', index === (step - 1));
            });

            // Update Progress Bar
            const percent = (step / 3) * 100;
            progress.style.width = percent + '%';
        }
    </script>

</body>
</html>