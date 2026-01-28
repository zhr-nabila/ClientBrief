<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Briefing Portal | Creative Agency</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="css/style.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-slate-50 text-slate-900">

    <section id="hero" class="min-h-screen flex items-center justify-center bg-white">
        <div class="max-w-4xl px-6 text-center">
            <span class="text-blue-600 font-semibold tracking-widest uppercase text-xs">Onboarding System</span>
            <h1 class="text-5xl md:text-6xl font-bold mt-4 mb-6 tracking-tight">Bangun proyek digital yang <span class="text-blue-600 italic">berdampak.</span></h1>
            <p class="text-slate-500 text-lg mb-10 max-w-2xl mx-auto">Kami siap membantu mewujudkan visi bisnismu. Mulai dengan mengisi brief singkat di bawah ini.</p>
            <button onclick="startBrief()" class="bg-slate-900 text-white px-10 py-4 rounded-full font-medium hover:bg-blue-600 transition-all duration-300 shadow-xl shadow-blue-100">
                Mulai Konsultasi Gratis
            </button>
        </div>
    </section>

    <section id="form-section" class="hidden min-h-screen py-20">
        <div class="max-w-2xl mx-auto px-6">
            
            <div class="mb-12">
                <div class="h-1.5 w-full bg-slate-200 rounded-full">
                    <div id="progress" class="h-1.5 bg-blue-600 rounded-full transition-all duration-500" style="width: 33.3%"></div>
                </div>
            </div>

            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-slate-100">
                
                <div class="step active">
                    <h2 class="text-2xl font-bold mb-8">Informasi Dasar</h2>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold mb-2">Nama Anda / Perusahaan</label>
                            <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:outline-none transition" required>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2">Email Bisnis</label>
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:outline-none transition" required>
                        </div>
                    </div>
                    <button type="button" onclick="nextStep(2)" class="w-full mt-10 bg-blue-600 text-white py-4 rounded-xl font-semibold hover:bg-blue-700 transition">Selanjutnya</button>
                </div>

                <div class="step">
                    <h2 class="text-2xl font-bold mb-8">Layanan Utama</h2>
                    <div class="grid grid-cols-1 gap-4">
                        <label class="service-option flex items-center p-5 border border-slate-200 rounded-2xl cursor-pointer transition">
                            <input type="radio" name="jasa" value="Website" class="w-4 h-4 text-blue-600" required>
                            <span class="ml-4 font-medium">Website Development</span>
                        </label>
                        <label class="service-option flex items-center p-5 border border-slate-200 rounded-2xl cursor-pointer transition">
                            <input type="radio" name="jasa" value="Marketing" class="w-4 h-4 text-blue-600">
                            <span class="ml-4 font-medium">Digital Marketing (SEO/Ads)</span>
                        </label>
                        <label class="service-option flex items-center p-5 border border-slate-200 rounded-2xl cursor-pointer transition">
                            <input type="radio" name="jasa" value="Branding" class="w-4 h-4 text-blue-600">
                            <span class="ml-4 font-medium">Branding & Logo Design</span>
                        </label>
                    </div>
                    <div class="flex gap-4 mt-10">
                        <button type="button" onclick="nextStep(1)" class="w-1/3 text-slate-500 font-medium">Kembali</button>
                        <button type="button" onclick="nextStep(3)" class="w-2/3 bg-blue-600 text-white py-4 rounded-xl font-semibold hover:bg-blue-700 transition">Selanjutnya</button>
                    </div>
                </div>

                <div class="step">
                    <h2 class="text-2xl font-bold mb-8">Detail Proyek</h2>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold mb-2">Ceritakan kebutuhan Anda</label>
                            <textarea name="pesan" rows="5" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-blue-500 focus:outline-none transition" placeholder="Tujuan, target, atau masalah proyek..."></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2">File Pendukung (Opsional)</label>
                            <input type="file" name="file_brief" class="w-full text-sm text-slate-500">
                        </div>
                    </div>
                    <div class="flex gap-4 mt-10">
                        <button type="button" onclick="nextStep(2)" class="w-1/3 text-slate-500 font-medium">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-slate-900 text-white py-4 rounded-xl font-semibold hover:bg-blue-600 transition">Kirim Sekarang</button>
                    </div>
                </div>

            </form>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>