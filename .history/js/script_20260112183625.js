// Konfigurasi Terjemahan
const translations = {
    id: {
        "nav-home": "Beranda",
        "nav-services": "Layanan",
        "nav-apply": "Mulai Projek",
        "hero-desc": "Kami membantu brand ambisius mendominasi pasar melalui strategi pemasaran digital yang berbasis data dan kreativitas tanpa batas.",
        "btn-apply-hero": "Konsultasi Sekarang"
    },
    en: {
        "nav-home": "Home",
        "nav-services": "Services",
        "nav-apply": "Get Started",
        "hero-desc": "We help ambitious brands dominate the market through data-driven digital marketing strategies and limitless creativity.",
        "btn-apply-hero": "Consult Now"
    }
};

// Fungsi Ganti Bahasa
function changeLang(lang) {
    localStorage.setItem('selectedLang', lang);
    
    // Update Teks
    document.querySelectorAll('[data-lang]').forEach(el => {
        const key = el.getAttribute('data-lang');
        if (translations[lang][key]) {
            el.innerText = translations[lang][key];
        }
    });

    // Update Style Tombol Bahasa
    const btnId = document.getElementById('btn-id');
    const btnEn = document.getElementById('btn-en');
    
    if(lang === 'id') {
        btnId.className = 'px-3 py-1 rounded-full text-[10px] font-bold bg-blue-600 text-white transition-all';
        btnEn.className = 'px-3 py-1 rounded-full text-[10px] font-bold text-gray-500 transition-all';
    } else {
        btnEn.className = 'px-3 py-1 rounded-full text-[10px] font-bold bg-blue-600 text-white transition-all';
        btnId.className = 'px-3 py-1 rounded-full text-[10px] font-bold text-gray-500 transition-all';
    }
}

// Fungsi Navigasi Form
function startBrief() {
    document.getElementById('hero').classList.add('hidden');
    document.getElementById('form-section').classList.remove('hidden');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function cancelBrief() {
    document.getElementById('form-section').classList.add('hidden');
    document.getElementById('hero').classList.remove('hidden');
    document.querySelector('form').reset();
    nextStep(1);
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function nextStep(step) {
    // Hide all steps
    document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
    
    // Show target step
    const target = document.getElementById(`step${step}`);
    if(target) target.classList.add('active');
    
    // Update Progress Bar
    const progress = (step / 3) * 100;
    document.getElementById('progress').style.width = `${progress}%`;
}

// Initialize on Load
document.addEventListener('DOMContentLoaded', () => {
    const savedLang = localStorage.getItem('selectedLang') || 'id';
    changeLang(savedLang);
    
    // Inisialisasi Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
});