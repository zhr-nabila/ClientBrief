// ==========================================
// 1. KONFIGURASI & STATE
// ==========================================
let currentStep = 1;
let currentLang = 'id';

const translations = {
    id: {
        heroSub: "Solusi Digital Berkelas Tanpa Kompromi.",
        startBtn: "Mulai Konsultasi",
        step1Title: "Identitas",
        step2Title: "Layanan",
        step3Title: "Detail Projek",
        nextBtn: "Lanjut",
        backBtn: "Kembali",
        sendBtn: "Kirim Brief",
        alertMsg: "Mohon isi semua bidang sebelum melanjutkan.",
        placeholderName: "Nama Lengkap",
        placeholderEmail: "Email",
        placeholderPhone: "No. WhatsApp",
        placeholderDetail: "Apa yang ingin Anda bangun?"
    },
    en: {
        heroSub: "High-End Digital Solutions Without Compromise.",
        startBtn: "Start Consultation",
        step1Title: "Identity",
        step2Title: "Services",
        step3Title: "Project Details",
        nextBtn: "Next",
        backBtn: "Back",
        sendBtn: "Send Brief",
        alertMsg: "Please fill in all fields before continuing.",
        placeholderName: "Full Name",
        placeholderEmail: "Email",
        placeholderPhone: "WhatsApp Number",
        placeholderDetail: "What do you want to build?"
    }
};

// ==========================================
// 2. FUNGSI MULTI-LANGUAGE (ID/EN)
// ==========================================
function toggleLanguage() {
    currentLang = (currentLang === 'id') ? 'en' : 'id';
    
    // Update semua elemen dengan data-key
    document.querySelectorAll('[data-key]').forEach(el => {
        const key = el.getAttribute('data-key');
        if (translations[currentLang][key]) {
            el.innerText = translations[currentLang][key];
        }
    });

    // Update khusus untuk Placeholder Input
    document.querySelector('input[name="nama"]').placeholder = translations[currentLang].placeholderName;
    document.querySelector('input[name="email"]').placeholder = translations[currentLang].placeholderEmail;
    document.querySelector('input[name="telepon"]').placeholder = translations[currentLang].placeholderPhone;
    document.querySelector('textarea[name="pesan"]').placeholder = translations[currentLang].placeholderDetail;
}

// ==========================================
// 3. FUNGSI TEMA (DARK/LIGHT)
// ==========================================
function toggleTheme() {
    document.body.classList.toggle('light-theme');
    const isLight = document.body.classList.contains('light-theme');
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
    
    // Update Icon Lucide jika perlu
    const themeIcon = document.getElementById('themeIcon');
    if(themeIcon) {
        if(isLight) {
            themeIcon.setAttribute('data-lucide', 'moon');
        } else {
            themeIcon.setAttribute('data-lucide', 'sun');
        }
        lucide.createIcons();
    }
}

// ==========================================
// 4. LOGIKA MODAL & SCROLL LOCK
// ==========================================
function openModal() {
    const modal = document.getElementById('briefModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden'; // Kunci scroll background
    moveStep(1); // Reset ke step 1 tiap kali buka
}

function closeModal() {
    const modal = document.getElementById('briefModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto'; // Aktifkan scroll kembali
}

// Tutup modal jika klik area luar kotak (overlay)
window.onclick = function(event) {
    const modal = document.getElementById('briefModal');
    if (event.target == modal) {
        closeModal();
    }
}

// ==========================================
// 5. LOGIKA WIZARD (ANTI-SKIP VALIDATION)
// ==========================================
function moveStep(step) {
    // Jika mencoba maju ke depan, cek validasi dulu
    if (step > currentStep) {
        const currentInputs = document.querySelectorAll(`#step${currentStep} [required]`);
        let allValid = true;

        currentInputs.forEach(input => {
            if (!input.value.trim()) {
                input.style.borderColor = '#ef4444'; // Merah (Tailwind red-500)
                allValid = false;
            } else {
                input.style.borderColor = ''; // Reset
            }
        });

        if (!allValid) {
            alert(translations[currentLang].alertMsg);
            return; // Berhenti di sini, jangan lanjut step
        }
    }

    // Jalankan perpindahan step
    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
    const target = document.getElementById('step' + step);
    if(target) {
        target.classList.add('active');
        currentStep = step;
        
        // Update Progress Bar
        const progress = (step / 3) * 100;
        const progressBar = document.getElementById('progressBar');
        if(progressBar) progressBar.style.width = progress + '%';
    }
}

// ==========================================
// 6. INISIALISASI SAAT HALAMAN DIMUAT
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    // Jalankan Lucide Icons
    lucide.createIcons();

    // Cek preferensi tema sebelumnya
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'light') {
        document.body.classList.add('light-theme');
    }
});