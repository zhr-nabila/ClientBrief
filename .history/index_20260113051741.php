<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="overflow-x-hidden">

    <nav class="fixed w-full z-50 p-4 md:p-6">
        <div class="max-w-6xl mx-auto glass-card nav-container flex justify-between items-center p-4">
            <div class="font-black text-xl text-blue-500 tracking-tighter">Z-STUDIO.</div>
            <div class="flex items-center gap-4">
                <div class="flex gap-2 text-[10px] font-bold">
                    <button onclick="changeLang('id')" id="btn-id">ID</button>
                    <button onclick="changeLang('en')" id="btn-en">EN</button>
                </div>
                <button onclick="showForm()" class="bg-blue-600 px-5 py-2 rounded-xl text-xs font-bold hover:bg-blue-700 transition">Mulai Projek</button>
            </div>
        </div>
    </nav>

    <section id="hero" class="min-h-screen flex flex-col items-center justify-center text-center px-6">
        <h1 class="hero-title text-5xl md:text-7xl font-extrabold mb-6 max-w-4xl leading-tight" data-lang="hero-title">Akselerasi Bisnis ke Era Digital</h1>
        <p class="text-gray-400 max-w-xl text-lg mb-10" data-lang="hero-desc">Solusi kreatif dan berbasis data untuk pertumbuhan brand Anda.</p>
        <button onclick="showForm()" class="bg-white text-black px-10 py-4 rounded-2xl font-bold text-lg hover:scale-105 transition-all shadow-2xl shadow-white/10" data-lang="btn-start">Mulai Projek</button>
    </section>

    <section id="form-section" class="hidden min-h-screen py-32 px-6">
        <div class="max-w-xl mx-auto">
            <div class="flex justify-between items-center mb-8">
                <h3 class="font-bold text-blue-500 text-sm tracking-widest uppercase">Project Brief</h3>
                <button onclick="hideForm()" class="text-gray-500 hover:text-white transition">Batal</button>
            </div>

            <div class="glass-card p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-white/5">
                    <div id="progress-bar" class="h-full bg-blue-600 transition-all duration-500" style="width: 33%"></div>
                </div>

                <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="mt-4">
                    <div class="step active" id="step1">
                        <h2 class="text-3xl font-bold mb-8 italic">Data Diri</h2>
                        <div class="space-y-4">
                            <input type="text" name="nama" placeholder="Nama Anda" required>
                            <input type="email" name="email" placeholder="Email Aktif" required>
                            <button type="button" onclick="nextStep(2)" class="w-full bg-blue-600 py-4 rounded-xl font-bold mt-4">Selanjutnya</button>
                        </div>
                    </div>

                    <div class="step" id="step2">
                        <h2 class="text-3xl font-bold mb-8 italic">Pilih Jasa</h2>
                        <div class="grid gap-3">
                            <?php $svc = ["SEO", "Web Dev", "Social Media", "Video"]; foreach($svc as $s): ?>
                            <label class="flex items-center p-4 bg-white/5 rounded-xl border border-white/5 cursor-pointer hover:border-blue-500 transition">
                                <input type="radio" name="jasa" value="<?= $s ?>" class="hidden peer" required>
                                <span class="w-4 h-4 rounded-full border border-white/20 mr-4 peer-checked:bg-blue-600 peer-checked:border-blue-600"></span>
                                <span class="font-medium text-sm"><?= $s ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                        <div class="flex gap-4 mt-8">
                            <button type="button" onclick="nextStep(1)" class="w-1/2 text-gray-500 font-bold">Kembali</button>
                            <button type="button" onclick="nextStep(3)" class="w-1/2 bg-blue-600 py-4 rounded-xl font-bold">Selanjutnya</button>
                        </div>
                    </div>

                    <div class="step" id="step3">
                        <h2 class="text-3xl font-bold mb-8 italic">Detail Projek</h2>
                        <textarea name="pesan" rows="4" placeholder="Jelaskan kebutuhan Anda..." required class="mb-4"></textarea>
                        <div class="p-4 bg-white/5 rounded-xl border border-dashed border-white/20 mb-6">
                            <p class="text-[10px] font-bold text-gray-500 uppercase mb-2">Lampiran (Opsional)</p>
                            <input type="file" name="file_brief" class="text-xs">
                        </div>
                        <div class="flex gap-4">
                            <button type="button" onclick="nextStep(2)" class="w-1/2 text-gray-500 font-bold">Kembali</button>
                            <button type="submit" name="submit" class="w-1/2 bg-blue-600 py-4 rounded-xl font-bold">Kirim Brief</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="assets/js/script.js"></script>
</body>
</html>