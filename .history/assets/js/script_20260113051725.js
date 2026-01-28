const translations = {
    id: {
        "hero-title": "Akselerasi Bisnis ke Era Digital",
        "hero-desc": "Solusi kreatif dan berbasis data untuk pertumbuhan brand Anda.",
        "btn-start": "Mulai Projek"
    },
    en: {
        "hero-title": "Accelerate Business to Digital Era",
        "hero-desc": "Creative and data-driven solutions for your brand growth.",
        "btn-start": "Start Project"
    }
};

function changeLang(lang) {
    localStorage.setItem('lang', lang);
    document.querySelectorAll('[data-lang]').forEach(el => {
        const key = el.getAttribute('data-lang');
        if(translations[lang][key]) el.innerText = translations[lang][key];
    });
    
    // Toggle active class on buttons
    document.getElementById('btn-id').style.opacity = lang === 'id' ? '1' : '0.5';
    document.getElementById('btn-en').style.opacity = lang === 'en' ? '1' : '0.5';
}

function showForm() {
    document.getElementById('hero').classList.add('hidden');
    document.getElementById('form-section').classList.remove('hidden');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

function hideForm() {
    document.getElementById('form-section').classList.add('hidden');
    document.getElementById('hero').classList.remove('hidden');
}

function nextStep(n) {
    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
    document.getElementById('step' + n).classList.add('active');
    
    // Progress Bar
    const progress = (n / 3) * 100;
    document.getElementById('progress-bar').style.width = progress + '%';
}

document.addEventListener('DOMContentLoaded', () => {
    changeLang(localStorage.getItem('lang') || 'id');
});