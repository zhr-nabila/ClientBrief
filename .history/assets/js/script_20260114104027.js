let currentStep = 1;

function moveStep(step) {
    // Sembunyikan semua step
    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
    
    // Tampilkan step tujuan
    const target = document.getElementById('step' + step);
    if(target) {
        target.classList.add('active');
        currentStep = step;
        
        // Update Progress Bar
        const progress = (step / 3) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
    }
}

function openModal() {
    document.getElementById('briefModal').style.display = 'flex';
    moveStep(1);
}

function closeModal() {
    document.getElementById('briefModal').style.display = 'none';
}

// Inisialisasi Lucide Icons
document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
});

// Tambahkan ini di bagian paling bawah script.js kamu
window.onclick = function(event) {
    const modal = document.getElementById('briefModal');
    if (event.target == modal) {
        closeModal();
    }
}

function closeModal() {
    document.getElementById('briefModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Update fungsi openModal agar mematikan scroll body
function openModal() {
    document.getElementById('briefModal').style.display = 'flex';
    document.body.style.overflow = 'hidden';
    moveStep(1);
}

// Konfigurasi Bahasa
const translations = {
    id: {
        heroTitle: "Masa Depan Digital Anda.",
        startBtn: "Mulai Konsultasi",
        identity: "Identitas",
        service: "Layanan",
        detail: "Detail Projek",
        next: "Lanjut",
        back: "Kembali",
        send: "Kirim Brief",
        placeholderName: "Nama Lengkap"
    },
    en: {
        heroTitle: "Your Digital Future.",
        startBtn: "Start Consultation",
        identity: "Identity",
        service: "Services",
        detail: "Project Detail",
        next: "Next",
        back: "Back",
        send: "Send Brief",
        placeholderName: "Full Name"
    }
};

let currentLang = 'id';

// Fungsi Ganti Bahasa
function toggleLanguage() {
    currentLang = currentLang === 'id' ? 'en' : 'id';
    document.querySelectorAll('[data-key]').forEach(el => {
        const key = el.getAttribute('data-key');
        el.innerText = translations[currentLang][key];
    });
}

// Fungsi Dark/Light Mode
function toggleTheme() {
    document.body.classList.toggle('light-theme');
    const isLight = document.body.classList.contains('light-theme');
    localStorage.setItem('theme', isLight ? 'light' : 'dark');
}

// Logika Wizard dengan Validasi (Anti-Skip)
function moveStep(step) {
    if (step > currentStep) {
        // Validasi input di step sekarang
        const inputs = document.querySelectorAll(`#step${currentStep} [required]`);
        let allValid = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.style.borderColor = 'red';
                allValid = false;
            } else {
                input.style.borderColor = '';
            }
        });
        if (!allValid) return alert("Mohon isi semua bidang sebelum melanjutkan.");
    }

    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');
    currentStep = step;
    document.getElementById('progressBar').style.width = (step / 3) * 100 + '%';
}