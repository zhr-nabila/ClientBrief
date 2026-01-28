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

    <nav class="fixed w-full z-[100] transition-all duration-500 py-6 px-6 md:px-20" id="navbar">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-white/10 backdrop-blur-lg border border-white/20 rounded-2xl p-4 shadow-xl">
            <div class="text-xl font-extrabold tracking-tighter">Z-STUDIO<span class="text-blue-600">.</span></div>
            <div class="hidden md:flex items-center space-x-8 text-xs font-bold uppercase tracking-widest">
                <a href="#hero" class="hover:text-blue-600">Home</a>
                <a href="#services" class="hover:text-blue-600">Services</a>
                <button onclick="startBrief()" class="bg-blue-600 text-white px-6 py-3 rounded-xl hover:bg-slate-900 transition-all duration-300">Start Project</button>
            </div>
        </div>
    </nav>

    <section id="hero" class="relative min-h-screen flex items-center justify-center pt-20">
        <div class="absolute top-0 left-0 w-full h-full -z-10 opacity-30">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-96 h-96 bg-indigo-400 rounded-full blur-[120px]"></div>
        </div>

        <div class="max-w-5xl px-6 text-center" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-6xl md:text-[100px] font-extrabold leading-[0.9] tracking-tighter mb-8">
                GROW <span class="text-blue-600">FASTER</span><br>THAN EVER.
            </h1>
            <p class="text-slate-500 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
                Solusi digital marketing end-to-end untuk bisnis ambisius. Kami membantu brand Anda mendominasi pasar digital.
            </p>
            <div class="flex flex-wrap justify-center gap-5">
                <button onclick="startBrief()" class="group bg-slate-900 text-white px-10 py-5 rounded-2xl font-bold flex items-center gap-3 hover:bg-blue-600 transition-all">
                    Ayo Mulai 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-2 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </button>
            </div>
        </div>
    </section>

    <section id="services" class="py-24 bg-slate-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20" data-aos="fade-up">
                <h2 class="text-4xl font-extrabold tracking-tight mb-4">Layanan Unggulan Kami</h2>
                <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm hover:shadow-2xl transition-all hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="100">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">SEO</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Optimasi mesin pencari agar brand Anda muncul di halaman pertama Google secara organik.</p>
                </div>

                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm hover:shadow-2xl transition-all hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="200">
                    <div class="w-14 h-14 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-pink-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Social Media</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Manajemen konten kreatif untuk membangun komunitas dan interaksi di Instagram/TikTok.</p>
                </div>

                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm hover:shadow-2xl transition-all hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="300">
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Web Maintain</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Memastikan website Anda selalu cepat, aman, dan bebas dari kendala teknis setiap harinya.</p>
                </div>

                <div class="bg-white p-8 rounded-[32px] border border-slate-100 shadow-sm hover:shadow-2xl transition-all hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="400">
                    <div class="w-14 h-14 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-600 group-hover:text-white transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Google Ads</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">Iklan berbayar yang efektif untuk mendapatkan traffic instan dan leads berkualitas tinggi.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="form-section" class="hidden min-h-screen py-24 bg-white">
        </section>

    <footer class="py-20 bg-slate-900 text-white text-center">
        <p class="text-slate-500 text-sm">Design & Developed by You for Internship Report.</p>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
    <script>
        AOS.init({ once: true });
    </script>
</body>
</html>