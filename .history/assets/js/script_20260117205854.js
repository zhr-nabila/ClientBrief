let currentStep = 1;
let currentLang = 'ID';

const dictionary = {
    ID: { 
        desc: "Solusi Digital Berkelas. Mulai kolaborasi sekarang.", 
        start: "Mulai Konsultasi", 
        step1: "01. Identitas", 
        step2: "02. Layanan", 
        step3: "03. Projek", 
        nama: "Masukkan nama lengkap Anda", 
        email: "contoh@email.com", 
        telp: "Contoh: 8123456789", 
        jasa: "Pilih Layanan", 
        pesan: "Jelaskan apa yang ingin Anda bangun, tujuan, dan spesifikasi projek Anda...", 
        upload: "Unggah Referensi", 
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
        nama: "Enter your full name", 
        email: "example@email.com", 
        telp: "Example: 8123456789", 
        jasa: "Choose Service", 
        pesan: "Describe what you want to build, goals, and project specifications...", 
        upload: "Upload Reference", 
        back: "Back", 
        next: "Next", 
        submit: "Submit Brief" 
    }
};

let iti;

document.addEventListener('DOMContentLoaded', function() {
    lucide.createIcons();
    
    // Initialize international telephone input
    const inputTel = document.querySelector("#in-telp");
    const fullPhoneInput = document.querySelector("#full_phone");
    
    if (inputTel) {
        iti = window.intlTelInput(inputTel, {
            initialCountry: "id",
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
        });

        const updateFullNumber = () => {
            if (fullPhoneInput) {
                fullPhoneInput.value = iti.getNumber();
            }
        };
        inputTel.addEventListener('keyup', updateFullNumber);
        inputTel.addEventListener('change', updateFullNumber);
    }
    
    // File upload display
    const fileInput = document.getElementById('file-input');
    const fileNameDisplay = document.getElementById('file-name');
    
    if (fileInput && fileNameDisplay) {
        fileInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                fileNameDisplay.textContent = this.files[0].name;
                fileNameDisplay.classList.add('text-pink-400');
            } else {
                fileNameDisplay.textContent = 'Belum ada file yang dipilih';
                fileNameDisplay.classList.remove('text-pink-400');
            }
        });
    }
});

function toggleLang() {
    currentLang = currentLang === 'ID' ? 'EN' : 'ID';
    const langBtn = document.getElementById('langBtn');
    
    if (langBtn) {
        langBtn.innerHTML = `<i data-lucide="globe" class="w-4 h-4"></i><span>${currentLang === 'ID' ? 'EN' : 'ID'}</span>`;
        lucide.createIcons();
    }
    
    const dict = dictionary[currentLang];
    const elements = {
        'txt-desc': dict.desc,
        'txt-startBtn': dict.start,
        'txt-step1-title': dict.step1,
        'txt-step2-title': dict.step2,
        'txt-step3-title': dict.step3,
        'txt-upload': dict.upload,
        'txt-submit': `<i data-lucide="send" class="mr-3 w-5 h-5"></i>${dict.submit}`
    };
    
    // Update text elements
    Object.keys(elements).forEach(id => {
        const element = document.getElementById(id);
        if (element) element.innerHTML = elements[id];
    });
    
    // Update placeholders
    const placeholders = {
        'in-nama': dict.nama,
        'in-email': dict.email,
        'in-telp': dict.telp,
        'in-pesan': dict.pesan
    };
    
    Object.keys(placeholders).forEach(id => {
        const element = document.getElementById(id);
        if (element) element.placeholder = placeholders[id];
    });
    
    // Update select default option
    const optDefault = document.getElementById('opt-default');
    if (optDefault) optDefault.innerText = dict.jasa;
    
    // Update buttons
    document.querySelectorAll('.btn-back').forEach(el => {
        el.innerHTML = `<i data-lucide="arrow-left" class="inline-block mr-2 w-4 h-4"></i>${dict.back}`;
    });
    
    document.querySelectorAll('.btn-next').forEach(el => {
        el.innerHTML = `${dict.next}<i data-lucide="arrow-right" class="inline-block ml-2 w-5 h-5"></i>`;
    });
}

function toggleTheme() {
    document.body.classList.toggle('light-mode');
    const isLight = document.body.classList.contains('light-mode');
    const icon = document.getElementById('themeIcon');
    
    if (icon) {
        icon.setAttribute('data-lucide', isLight ? 'sun' : 'moon');
        lucide.createIcons();
    }
    
    // Update decorative circles for light mode
    document.querySelectorAll('.decorative-circle').forEach(circle => {
        if (isLight) {
            circle.style.background = 'radial-gradient(circle, rgba(255, 107, 157, 0.1), transparent 70%)';
        } else {
            circle.style.background = 'radial-gradient(circle, rgba(255, 107, 157, 0.2), transparent 70%)';
        }
    });
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

function validateAndNext(currentStep, nextStep) {
    const currentStepEl = document.getElementById('step-' + currentStep);
    const isTelValid = iti ? iti.isValidNumber() : true;
    const inputs = currentStepEl.querySelectorAll('input[required]:not([type="tel"]), select[required], textarea[required]');
    
    let allValid = true;
    inputs.forEach(input => {
        if (!input.value.trim()) {
            allValid = false;
            input.classList.add('error-shake');
            setTimeout(() => input.classList.remove('error-shake'), 400);
        }
    });

    // Validate phone number for step 1
    if (currentStep === 1) {
        const inputTel = document.querySelector("#in-telp");
        if (inputTel && (!inputTel.value || !isTelValid)) {
            allValid = false;
            inputTel.classList.add('error-shake');
            setTimeout(() => inputTel.classList.remove('error-shake'), 400);
            
            if(inputTel.value && !isTelValid) {
                alert(currentLang === 'ID' ? "Nomor telepon tidak valid!" : "Invalid phone number!");
            }
        }
    }

    if (allValid) {
        // Update progress bar
        const progressFill = document.getElementById('progress-fill');
        if (progressFill) {
            progressFill.style.width = `${(nextStep/3)*100}%`;
        }
        goToStep(nextStep);
    }
}

function goToStep(step) {
    document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
    setTimeout(() => { 
        const nextStep = document.getElementById('step-' + step);
        if (nextStep) nextStep.classList.add('active');
    }, 50);
}