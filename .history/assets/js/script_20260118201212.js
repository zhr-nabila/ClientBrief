// JavaScript dari semua file - telah dibersihkan

// ==================== GLOBAL VARIABLES ====================
let currentStep = 1;
let currentLang = 'id';

// ==================== TRANSLATIONS ====================
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
        placeholderDetail: "Apa yang ingin Anda bangun?",
        invalidPhone: "Nomor tidak valid!",
        detailTitle: "DETAIL KEBUTUHAN:"
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
        placeholderDetail: "What do you want to build?",
        invalidPhone: "Invalid phone number!",
        detailTitle: "PROJECT DETAILS:"
    }
};

// Main website dictionary
const dictionary = {
    ID: { 
        desc: "Solusi Digital Berkelas. Mulai kolaborasi sekarang.", 
        start: "Mulai Konsultasi", 
        step1: "01. Identitas", 
        step2: "02. Layanan", 
        step3: "03. Projek", 
        nama: "Nama Lengkap", 
        email: "Email Aktif", 
        telp: "Nomor WhatsApp", 
        jasa: "Pilih Layanan", 
        pesan: "Apa yang ingin Anda bangun?", 
        upload: "Upload Referensi", 
        back: "Kembali", 
        next: "Lanjutkan", 
        submit: "Kirim Brief" 
    },
    EN: { 
        desc: "Premium Digital Solutions. Start collaboration now.", 
        start: "Start Consultation", 
        step1: "01. Identity", 
        step2: "02. Services", 
        step3: "03. Project", 
        nama: "Full Name", 
        email: "Active Email", 
        telp: "WhatsApp Number", 
        jasa: "Choose Service", 
        pesan: "What do you want to build?", 
        upload: "Upload Reference", 
        back: "Back", 
        next: "Next", 
        submit: "Submit Brief" 
    }
};

// ==================== THEME FUNCTIONS ====================
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

function toggleThemeMain() {
    document.body.classList.toggle('light-mode');
    const isLight = document.body.classList.contains('light-mode');
    const icon = document.getElementById('themeIcon');
    if (icon) {
        icon.setAttribute('data-lucide', isLight ? 'sun' : 'moon');
        lucide.createIcons();
    }
}

// ==================== LANGUAGE FUNCTIONS ====================
function toggleLanguage() {
    currentLang = currentLang === 'id' ? 'en' : 'id';

    document.querySelectorAll('[data-key]').forEach(el => {
        const key = el.dataset.key;
        if (translations[currentLang][key]) {
            el.innerText = translations[currentLang][key];
        }
    });

    document.querySelector('input[name="nama"]').placeholder = translations[currentLang].placeholderName;
    document.querySelector('input[name="email"]').placeholder = translations[currentLang].placeholderEmail;
    document.querySelector('input[name="telepon"]').placeholder = translations[currentLang].placeholderPhone;
    document.querySelector('textarea[name="pesan"]').placeholder = translations[currentLang].placeholderDetail;
}

function toggleLang() {
    let currentLangMain = window.currentLangMain || 'ID';
    currentLangMain = currentLangMain === 'ID' ? 'EN' : 'ID';
    window.currentLangMain = currentLangMain;
    
    const langBtn = document.getElementById('langBtn');
    if (langBtn) langBtn.innerText = currentLangMain === 'ID' ? 'EN' : 'ID';
    
    const dict = dictionary[currentLangMain];
    const elements = {
        'txt-desc': dict.desc,
        'txt-startBtn': dict.start,
        'txt-step1-title': dict.step1,
        'txt-step2-title': dict.step2,
        'txt-step3-title': dict.step3,
        'txt-upload': dict.upload,
        'txt-submit': dict.submit
    };
    
    // Update text elements
    Object.keys(elements).forEach(id => {
        const el = document.getElementById(id);
        if (el) el.innerText = elements[id];
    });
    
    // Update placeholders
    const namaInput = document.getElementById('in-nama');
    const emailInput = document.getElementById('in-email');
    const pesanTextarea = document.getElementById('in-pesan');
    const telpInput = document.querySelector("#in-telp");
    const optDefault = document.getElementById('opt-default');
    
    if (namaInput) namaInput.placeholder = dict.nama;
    if (emailInput) emailInput.placeholder = dict.email;
    if (pesanTextarea) pesanTextarea.placeholder = dict.pesan;
    if (telpInput) telpInput.placeholder = dict.telp;
    if (optDefault) optDefault.innerText = dict.jasa;
    
    // Update buttons
    document.querySelectorAll('.btn-back').forEach(el => el.innerText = dict.back);
    document.querySelectorAll('.btn-next').forEach(el => el.innerText = dict.next);
}

// ==================== MODAL FUNCTIONS ====================
function openModal() {
    const modal = document.getElementById('briefModal');
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        moveStep(1);
    }
}

function closeModal() {
    const modal = document.getElementById('briefModal');
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
}

function showDetail(text) {
    const currentLang = window.currentLangMain || 'ID';
    const title = currentLang === 'ID' ? "DETAIL KEBUTUHAN:\n\n" : "PROJECT DETAILS:\n\n";
    alert(title + text);
}

// ==================== STEP FUNCTIONS ====================
function moveStep(step) {
    if (step > currentStep) {
        const inputs = document.querySelectorAll(`#step${currentStep} [required]`);
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

    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
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

function startJourney() {
    const landingPage = document.getElementById('landing-page');
    const formContainer = document.getElementById('form-container');
    
    if (landingPage && formContainer) {
        landingPage.classList.remove('active');
        setTimeout(() => {
            landingPage.style.display = 'none';
            formContainer.classList.add('active');
        }, 300);
    }
}

function goToStep(step) {
    document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
    setTimeout(() => {
        const target = document.getElementById('step-' + step);
        if (target) target.classList.add('active');
    }, 50);
    
    // Update progress bars
    for(let i = 1; i <= 3; i++) {
        const bar = document.getElementById('p-' + i);
        if(bar) {
            bar.style.backgroundColor = (i <= step) ? '#2563eb' : 'rgba(255,255,255,0.1)';
        }
    }
}

function validateAndNext(currentStepNum, nextStep) {
    const currentStepEl = document.getElementById('step-' + currentStepNum);
    if (!currentStepEl) return;
    
    const iti = window.iti;
    const isTelValid = iti ? iti.isValidNumber() : true;
    const inputs = currentStepEl.querySelectorAll('input[required]:not([type="tel"]), select[required], textarea[required]');
    
    let allValid = true;
    inputs.forEach(input => {
        if (!input.value) {
            allValid = false;
            input.classList.add('error-shake');
            setTimeout(() => input.classList.remove('error-shake'), 400);
        }
    });

    // Phone validation for step 1
    if (currentStepNum === 1) {
        const inputTel = document.querySelector("#in-telp");
        if (inputTel) {
            if (!inputTel.value || !isTelValid) {
                allValid = false;
                inputTel.classList.add('error-shake');
                setTimeout(() => inputTel.classList.remove('error-shake'), 400);
                
                const currentLangMain = window.currentLangMain || 'ID';
                if(inputTel.value && !isTelValid) {
                    alert(currentLangMain === 'ID' ? "Nomor tidak valid!" : "Invalid phone number!");
                }
            }
        }
    }

    if (allValid) goToStep(nextStep);
}

// ==================== IMAGE PREVIEW FUNCTIONS ====================
function openPreview(src) {
    const modal = document.getElementById('imageModal');
    const img = document.getElementById('modalImg');
    
    if (modal && img) {
        img.src = src;
        modal.classList.add('active');
        modal.classList.remove('hidden');
    }
}

function closePreview() {
    const modal = document.getElementById('imageModal');
    if (modal) {
        modal.classList.remove('active');
        modal.classList.add('hidden');
    }
}

// ==================== EVENT LISTENERS ====================
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Lucide icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }
    
    // Load saved theme
    if (localStorage.getItem('theme') === 'light') {
        document.body.classList.add('light-theme');
    }
    
    // Initialize phone input if exists
    const inputTel = document.querySelector("#in-telp");
    if (inputTel && typeof intlTelInput !== 'undefined') {
        window.iti = intlTelInput(inputTel, {
            initialCountry: "id",
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
        });
        
        const fullPhoneInput = document.querySelector("#full_phone");
        if (fullPhoneInput) {
            const updateFullNumber = () => {
                fullPhoneInput.value = window.iti.getNumber();
            };
            inputTel.addEventListener('keyup', updateFullNumber);
            inputTel.addEventListener('change', updateFullNumber);
        }
    }
    
    // Close modal on outside click
    window.onclick = (e) => {
        const modal = document.getElementById('briefModal');
        if (modal && e.target === modal) {
            closeModal();
        }
        
        const imageModal = document.getElementById('imageModal');
        if (imageModal && e.target === imageModal) {
            closePreview();
        }
    };
});