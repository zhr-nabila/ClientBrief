const translations = {
    id: {
        "nav-home": "Beranda", "nav-courses": "Layanan", "nav-apply": "Mulai Projek",
        "hero-1": "INOVASI TANPA BATAS", "hero-desc": "Solusi digital marketing end-to-end untuk bisnis ambisius.",
        "btn-apply-hero": "Mulai Sekarang", "courses-title": "Layanan Kami",
        "serv-1-desc": "Optimasi SEO agar brand muncul di halaman pertama.",
        "serv-2-desc": "Konten kreatif untuk sosial media.",
        "serv-3-desc": "Pemeliharaan teknis website agar aman.",
        "serv-4-desc": "Iklan berbayar untuk hasil instan.",
        "form-step-1-title": "Informasi Kontak", "form-step-2-title": "Pilih Jasa Utama", "form-step-3-title": "Detail Projek",
        "btn-next": "Selanjutnya", "btn-back": "Kembali", "btn-submit": "Kirim Sekarang"
    },
    en: {
        "nav-home": "Home", "nav-courses": "Services", "nav-apply": "Start Project",
        "hero-1": "LIMITLESS INNOVATION", "hero-desc": "End-to-end digital solutions for ambitious brands.",
        "btn-apply-hero": "Get Started", "courses-title": "Our Services",
        "serv-1-desc": "SEO optimization for top Google ranking.",
        "serv-2-desc": "Creative content for social platforms.",
        "serv-3-desc": "Technical web maintenance and security.",
        "serv-4-desc": "Paid ads for instant traffic growth.",
        "form-step-1-title": "Contact Info", "form-step-2-title": "Select Services", "form-step-3-title": "Project Detail",
        "btn-next": "Next Step", "btn-back": "Back", "btn-submit": "Submit Now"
    }
};

function changeLang(lang) {
    document.querySelectorAll('[data-lang]').forEach(el => {
        const key = el.getAttribute('data-lang');
        if (translations[lang][key]) el.innerText = translations[lang][key];
    });
    localStorage.setItem('lang', lang);
    const bId = document.getElementById('btn-id');
    const bEn = document.getElementById('btn-en');
    bId.className = lang === 'id' ? "px-3 py-1 rounded-full text-xs bg-blue-600 text-white" : "px-3 py-1 rounded-full text-xs text-gray-500";
    bEn.className = lang === 'en' ? "px-3 py-1 rounded-full text-xs bg-blue-600 text-white" : "px-3 py-1 rounded-full text-xs text-gray-500";
}

function nextStep(s) {
    document.querySelectorAll('.step').forEach((el, i) => el.classList.toggle('active', i === s-1));
    document.getElementById('progress').style.width = (s/3*100) + '%';
}

function startBrief() {
    document.getElementById('hero').classList.add('hidden');
    document.getElementById('services').classList.add('hidden');
    document.getElementById('form-section').classList.remove('hidden');
    window.scrollTo(0,0);
}

document.addEventListener('DOMContentLoaded', () => {
    changeLang(localStorage.getItem('lang') || 'id');
});