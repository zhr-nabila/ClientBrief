<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creative Portal | Digital Solution</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-slate-900 scroll-smooth">

    <nav class="fixed w-full z-50 transition-all duration-300 py-6 px-10" id="navbar">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-extrabold tracking-tighter text-slate-900">Z-STUDIO<span class="text-blue-600">.</span></div>
            <div class="hidden md:flex space-x-10 text-sm font-semibold uppercase tracking-widest text-slate-600">
                <a href="#hero" class="hover:text-blue-600 transition">Home</a>
                <a href="#services" class="hover:text-blue-600 transition">Services</a>
                <a href="#form-section" onclick="startBrief()" class="bg-slate-900 text-white px-6 py-2 rounded-full hover:bg-blue-600 transition">Work with us</a>
            </div>
        </div>
    </nav>

    <section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute top-20 -left-20 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <div class="absolute bottom-20 -right-20 w-96 h-96 bg-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>

        <div class="relative max-w-5xl px-6 text-center">
            <h1 class="text-6xl md:text-8xl font-extrabold mb-8 tracking-tighter leading-tight">
                Design the <span class="text-blue-600">Future</span> <br>of your business.
            </h1>
            <p class="text-slate-500 text-xl mb-12 max-w-2xl mx-auto leading-relaxed">
                Kami menggabungkan strategi kreatif dan teknologi untuk membantu brand Anda tumbuh lebih cepat di ekosistem digital.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <button onclick="startBrief()" class="bg-slate-900 text-white px-10 py-5 rounded-2xl font-bold text-lg hover:scale-105 transition-all shadow-2xl shadow-slate-200">
                    Mulai Proyek Sekarang
                </button>
                <a href="#services" class="bg-white border border-slate-200 px-10 py-5 rounded-2xl font-bold text-lg hover:bg-slate-50 transition-all">
                    Lihat Layanan
                </a>
            </div>
        </div>
    </section>

    <section id="services" class="py-32 bg-slate-50">
        <div class="max-w-7xl mx-auto px-10">
            <div class="grid md:grid-cols-3 gap-12">
                <div class="space-y-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-bold">01</div>
                    <h3 class="text-2xl font-bold">Website Dev</h3>
                    <p class="text-slate-500">Membangun platform digital yang responsif, cepat, dan berfokus pada konversi.</p>
                </div>
                <div class="space-y-4">
                    <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center text-white font-bold">02</div>
                    <h3 class="text-2xl font-bold">Digital Ads</h3>
                    <p class="text-slate-500">Strategi pemasaran terukur untuk menjangkau audiens yang tepat di waktu yang tepat.</p>
                </div>
                <div class="space-y-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-2xl flex items-center justify-center text-white font-bold">03</div>
                    <h3 class="text-2xl font-bold">Branding</h3>
                    <p class="text-slate-500">Menciptakan identitas visual yang unik dan meninggalkan kesan mendalam.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="form-section" class="hidden min-h-screen py-32 bg-white">
        </section>

    <footer class="py-20 bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-10 flex flex-col md:flex-row justify-between items-center border-t border-slate-800 pt-10">
            <div class="text-xl font-bold mb-6 md:mb-0">Z-STUDIO<span class="text-blue-500">.</span></div>
            <p class="text-slate-500 text-sm">© 2024 Z-Studio Creative. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>A