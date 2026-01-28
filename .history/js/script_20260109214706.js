const translations = {
    id: {
        "nav-home": "Beranda", "nav-services": "Layanan", "nav-start": "Mulai Projek",
        "hero-1": "TUMBUH", "hero-2": "LEBIH CEPAT", "hero-3": "DARI SEBELUMNYA.",
        "hero-desc": "Solusi digital marketing end-to-end untuk bisnis ambisius.",
        "btn-hero": "Ayo Mulai", "serv-title": "Layanan Kami",
        "serv-1": "Optimasi Google secara organik.", "serv-2": "Manajemen konten kreatif.",
        "serv-3": "Pemeliharaan sistem website.", "serv-4": "Iklan berbayar hasil instan."
    },
    en: {
        "nav-home": "Home", "nav-services": "Services", "nav-start": "Start Project",
        "hero-1": "GROW", "hero-2": "FASTER", "hero-3": "THAN EVER.",
        "hero-desc": "End-to-end digital marketing solutions for ambitious businesses.",
        "btn-hero": "Get Started", "serv-title": "Our Services",
        "serv-1": "Organic Search Engine Optimization.", "serv-2": "Creative content management.",
        "serv-3": "Website system maintenance.", "serv-4": "Instant result with paid ads."
    }
};

function changeLang(lang) {
    document.querySelectorAll('[data-lang]').forEach(el => {
        const key = el.getAttribute('data-lang');
        if (translations[lang][key]) el.innerText = translations[lang][key];
    });
    document.getElementById('btn-id').className = lang === 'id' ? "px-3 py-1 rounded-full bg-blue-600 text-white transition-all text-[10px]" : "px-3 py-1 rounded-full text-slate-400 transition-all text-[10px]";
    document.getElementById('btn-en').className = lang === 'en' ? "px-3 py-1 rounded-full bg-blue-600 text-white transition-all text-[10px]" : "px-3 py-1 rounded-full text-slate-400 transition-all text-[10px]";
}

function toggleMobileMenu() { document.getElementById('mobile-menu').classList.toggle('hidden'); }

function startBrief() {
    document.getElementById('hero').classList.add('hidden');
    document.getElementById('services').classList.add('hidden');
    document.getElementById('form-section').classList.remove('hidden');
    window.scrollTo({top: 0, behavior: 'smooth'});
}

function nextStep(step) {
    const steps = document.querySelectorAll('.step');
    steps.forEach((s, i) => s.classList.toggle('active', i === (step - 1)));
    document.getElementById('progress').style.width = (step / 3 * 100) + '%';
}

window.addEventListener('scroll', () => {
    const nav = document.getElementById('navbar');
    window.scrollY > 50 ? nav.classList.add('scrolled') : nav.classList.remove('scrolled');
});

AOS.init({ once: true, duration: 800 });
