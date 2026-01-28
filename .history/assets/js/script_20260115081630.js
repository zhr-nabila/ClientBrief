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

function toggleLanguage() {
    currentLang = currentLang === 'id' ? 'en' : 'id';

    document.querySelectorAll('[data-key]').forEach(el => {
        const key = el.dataset.key;
        if (translations[currentLang][key]) {
            el.innerText = translations[currentLang][key];
        }
    });

    document.querySelector('input[name="nama"]').placeholder =
        translations[currentLang].placeholderName;
    document.querySelector('input[name="email"]').placeholder =
        translations[currentLang].placeholderEmail;
    document.querySelector('input[name="telepon"]').placeholder =
        translations[currentLang].placeholderPhone;
    document.querySelector('textarea[name="pesan"]').placeholder =
        translations[currentLang].placeholderDetail;
}

function toggleTheme() {
    document.body.classList.toggle('light-theme');
    const isLight = document.body.classList.contains('light-theme');
    localStorage.setItem('theme', isLight ? 'light' : 'dark');

    const icon = document.getElementById('themeIcon');
    if (icon) {
        icon.setAttribute('data-lucide', isLight ? 'moon' : 'sun');
        lucide.createIcons();
    }
}

function openModal() {
    const modal = document.getElementById('briefModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
    moveStep(1);
}

function closeModal() {
    const modal = document.getElementById('briefModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

window.onclick = e => {
    const modal = document.getElementById('briefModal');
    if (e.target === modal) closeModal();
};

function moveStep(step) {
    if (step > currentStep) {
        const inputs = document.querySelectorAll(
            `#step${currentStep} [required]`
        );

        let valid = true;

        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.style.borderColor = '#ef4444';
                valid = false;
            } else {
                input.style.borderColor = '';
            }
        });

        if (!valid) {
            alert(translations[currentLang].alertMsg);
            return;
        }
    }

    document.querySelectorAll('.step').forEach(s =>
        s.classList.remove('active')
    );

    const target = document.getElementById(`step${step}`);
    if (target) {
        target.classList.add('active');
        currentStep = step;

        const progress = document.getElementById('progressBar');
        if (progress) {
            progress.style.width = `${(step / 3) * 100}%`;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();

    if (localStorage.getItem('theme') === 'light') {
        document.body.classList.add('light-theme');
    }
});
