// 1. DATA TRANSLASI (Indonesia & Inggris)
const translations = {
    id: {
        "nav-home": "Beranda",
        "nav-about": "Tentang",
        "nav-courses": "Layanan",
        "nav-apply": "Mulai Projek",
        "btn-apply-hero": "Daftar Sekarang",
        "hero-info-1": "Lokasi",
        "hero-info-2": "Durasi",
        "hero-info-3": "Mentor",
        "hero-info-4": "Layanan",
        "about-learn-more": "Pelajari lebih lanjut tentang kami",
        "about-title-1": "Apa yang kamu dapatkan",
        "about-title-2": "di sini?",
        "about-card-1-title": "Praktik Langsung",
        "about-card-1-desc": "Setiap layanan akan membimbingmu melalui seluruh proses pengembangan proyek nyata.",
        "about-card-2-title": "Mentoring Ahli",
        "about-card-2-desc": "Manfaatkan kesempatan untuk menerima umpan balik berharga dari para ahli industri.",
        "about-card-3-title": "Skill Relevan",
        "about-card-3-desc": "Dirancang untuk memberikan keterampilan yang kamu butuhkan untuk karir profesional.",
        "about-card-4-title": "Sertifikat",
        "about-card-4-desc": "Setelah selesai, kamu akan menerima sertifikat yang memvalidasi keahlianmu.",
        "courses-title": "Layanan Kami",
        "serv-1-desc": "Optimasi mesin pencari agar brand muncul di halaman pertama Google.",
        "serv-2-desc": "Manajemen konten kreatif untuk membangun komunitas di platform sosial.",
        "serv-3-desc": "Memastikan website Anda selalu cepat, aman, dan bebas kendala teknis.",
        "serv-4-desc": "Iklan berbayar yang efektif untuk mendapatkan traffic instan berkualitas.",
        "view-details": "Mulai Proyek",
        "form-step-1-title": "Informasi Kontak",
        "form-label-name": "Nama Lengkap / Perusahaan",
        "form-label-email": "Email Bisnis Aktif",
        "form-step-2-title": "Pilih Layanan Utama",
        "form-step-3-title": "Detail Kebutuhan",
        "form-label-details": "Ceritakan visi atau masalah proyek Anda",
        "form-label-file": "Upload Referensi (Opsional)",
        "btn-next": "Selanjutnya",
        "btn-back": "Kembali",
        "btn-submit": "Kirim Brief Sekarang"
    },
    en: {
        "nav-home": "Home",
        "nav-about": "About",
        "nav-courses": "Services",
        "nav-apply": "Start Project",
        "btn-apply-hero": "Join Now",
        "hero-info-1": "Location",
        "hero-info-2": "Duration",
        "hero-info-3": "Mentors",
        "hero-info-4": "Services",
        "about-learn-more": "Learn more about us",
        "about-title-1": "What you will get",
        "about-title-2": "from here?",
        "about-card-1-title": "Hands-on Practice",
        "about-card-1-desc": "Each service guides you through the entire real-world project development process.",
        "about-card-2-title": "Expert Mentoring",
        "about-card-2-desc": "Take the opportunity to receive valuable feedback from industry experts.",
        "about-card-3-title": "Relevant Skills",
        "about-card-3-desc": "Designed to provide the skills you need for your professional career.",
        "about-card-4-title": "Certificate",
        "about-card-4-desc": "Upon completion, you will receive a certificate validating your skills.",
        "courses-title": "Our Services",
        "serv-1-desc": "Search engine optimization to get your brand on Google's first page.",
        "serv-2-desc": "Creative content management to build community on social platforms.",
        "serv-3-desc": "Ensuring your website is always fast, secure, and error-free.",
        "serv-4-desc": "Effective paid ads to get instant and high-quality traffic.",
        "view-details": "Start Project",
        "form-step-1-title": "Contact Information",
        "form-label-name": "Full Name / Company",
        "form-label-email": "Active Business Email",
        "form-step-2-title": "Select Primary Service",
        "form-step-3-title": "Project Details",
        "form-label-details": "Tell us about your vision or project issues",
        "form-label-file": "Upload Reference (Optional)",
        "btn-next": "Next",
        "btn-back": "Back",
        "btn-submit": "Submit Brief Now"
    }
};

// 2. FUNGSI GANTI BAHASA
function changeLang(lang) {
    document.querySelectorAll('[data-lang]').forEach(el => {
        const key = el.getAttribute('data-lang');
        if (translations[lang][key]) {
            el.innerText = translations[lang][key];
        }
    });

    // Toggle Style Tombol
    const btnId = document.getElementById('btn-id');
    const btnEn = document.getElementById('btn-en');

    if (lang === 'id') {
        btnId.classList.add('bg-blue-600', 'text-white');
        btnId.classList.remove('text-gray-400');
        btnEn.classList.remove('bg-blue-600', 'text-white');
        btnEn.classList.add('text-gray-400');
    } else {
        btnEn.classList.add('bg-blue-600', 'text-white');
        btnEn.classList.remove('text-gray-400');
        btnId.classList.remove('bg-blue-600', 'text-white');
        btnId.classList.add('text-gray-400');
    }
}

// 3. FUNGSI MULTI-STEP FORM
function nextStep(step) {
    // Sembunyikan semua langkah
    document.querySelectorAll('.step').forEach(el => el.classList.remove('active'));
    
    // Tampilkan langkah yang dituju
    const allSteps = document.querySelectorAll('.step');
    allSteps[step - 1].classList.add('active');

    // Update Progress Bar
    const progress = document.getElementById('progress');
    const percent = (step / 3) * 100;
    progress.style.width = percent + '%';
}

// 4. TRANSISI KE FORM SECTION
function startBrief() {
    const hero = document.getElementById('hero');
    const about = document.getElementById('about');
    const courses = document.getElementById('courses');
    const formSec = document.getElementById('form-section');

    // Efek smooth hiding
    [hero, about, courses].forEach(el => {
        el.style.opacity = '0';
        el.style.transition = '0.5s';
    });

    setTimeout(() => {
        [hero, about, courses].forEach(el => el.classList.add('hidden'));
        formSec.classList.remove('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // Animasi muncul form
        formSec.style.opacity = '0';
        setTimeout(() => {
            formSec.style.opacity = '1';
            formSec.style.transition = '0.8s';
        }, 100);
    }, 500);
}

// 5. NAVBAR MOBILE TOGGLE
function toggleMobileMenu() {
    const menu = document.getElementById('mobile-menu');
    menu.classList.toggle('hidden');
}

// 6. NAVBAR SCROLL EFFECT
window.addEventListener('scroll', () => {
    const nav = document.querySelector('nav');
    if (window.scrollY > 50) {
        nav.classList.add('py-2');
        nav.querySelector('.max-w-7xl').classList.add('bg-black/60', 'border-blue-500/30');
    } else {
        nav.classList.remove('py-2');
        nav.querySelector('.max-w-7xl').classList.remove('bg-black/60', 'border-blue-500/30');
    }
});

// 7. INISIALISASI SAAT PAGE LOAD
document.addEventListener('DOMContentLoaded', () => {
    // Jalankan Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
    
    // Default bahasa Indonesia
    changeLang('id');
});