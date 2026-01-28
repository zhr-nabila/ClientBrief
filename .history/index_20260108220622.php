<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-Studio | Premium Digital Agency</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-slate-900 overflow-x-hidden">

    <nav class="fixed w-full z-[100] transition-all duration-500 py-6 px-4 md:px-20" id="navbar">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-white/80 backdrop-blur-xl border border-white/20 rounded-2xl p-4 shadow-xl">
            <div class="text-xl font-extrabold tracking-tighter">Z-STUDIO<span class="text-blue-600">.</span></div>
            
            <div class="hidden md:flex items-center space-x-8 text-xs font-bold uppercase tracking-widest">
                <a href="#hero" data-lang="nav-home">Beranda</a>
                <a href="#services" data-lang="nav-services">Layanan</a>
                
                <div class="flex border border-slate-200 rounded-full p-1 bg-slate-50">
                    <button onclick="changeLang('id')" id="btn-id" class="px-3 py-1 rounded-full bg-blue-600 text-white transition-all">ID</button>
                    <button onclick="changeLang('en')" id="btn-en" class="px-3 py-1 rounded-full text-slate-400 transition-all">EN</button>
                </div>

                <button onclick="startBrief()" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-slate-900 transition-all" data-lang="nav-start">Mulai Projek</button>
            </div>

            <button class="md:hidden p-2 text-slate-900" onclick="toggleMobileMenu()">
                <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden absolute top-24 left-4 right-4 bg-white p-6 rounded-3xl shadow-2xl border border-slate-100 flex flex-col space-y-4 text-center font-bold uppercase text-sm tracking-widest">
            <a href="#hero" onclick="toggleMobileMenu()" data-lang="nav-home">Beranda</a>
            <a href="#services" onclick="toggleMobileMenu()" data-lang="nav-services">Layanan</a>
            <hr>
            <div class="flex justify-center gap-4">
                <button onclick="changeLang('id')" class="text-blue-600">INDONESIA</button>
                <button onclick="changeLang('en')" class="text-slate-400">ENGLISH</button>
            </div>
            <button onclick="startBrief(); toggleMobileMenu();" class="bg-blue-600 text-white py-4 rounded-xl" data-lang="nav-start">Mulai Projek</button>
        </div>
    </nav>

    <section id="hero" class="relative min-h-screen flex items-center justify-center pt-20">
        <div class="max-w-5xl px-6 text-center" data-aos="fade-up">
            <h1 class="text-6xl md:text-[100px] font-extrabold leading-[0.9] tracking-tighter mb-8">
                <span data-lang="hero-1">TUMBUH</span> <span class="text-blue-600" data-lang="hero-2">LEBIH CEPAT</span><br><span data-lang="hero-3">DARI SEBELUMNYA.</span>
            </h1>
            <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed" data-lang="hero-desc">
                Solusi digital marketing end-to-end untuk bisnis ambisius. Kami membantu brand Anda mendominasi pasar digital.
            </p>
            <button onclick="startBrief()" class="bg-slate-900 text-white px-10 py-5 rounded-2xl font-bold hover:bg-blue-600 transition-all" data-lang="btn-hero">Ayo Mulai</button>
        </div>
    </section>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
</body>
</html>