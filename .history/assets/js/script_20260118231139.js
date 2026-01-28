lucide.createIcons();

const inputTel = document.querySelector("#in-telp");
const fullPhoneInput = document.querySelector("#full_phone");
const fileInput = document.querySelector("#fileInput");
const fileNameDisplay = document.querySelector("#fileNameDisplay");
const fileNameSpan = document.querySelector("#fileName");

// === NOMOR TELEPON NUMERIC ONLY ===
// Validasi input hanya angka
if (inputTel) {
    inputTel.addEventListener('input', function(e) {
        // Hanya izinkan angka, plus, spasi, dan dash
        this.value = this.value.replace(/[^\d+\s\-]/g, '');
        
        // Update hidden field
        updateFullNumber();
        
        // Update state
        checkTelInputState();
    });
    
    // Prevent paste non-numeric
    inputTel.addEventListener('paste', function(e) {
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        if (!/^[\d+\s\-]*$/.test(paste)) {
            e.preventDefault();
        }
    });
}

// Inisialisasi International Telephone Input
const iti = window.intlTelInput(inputTel, {
    initialCountry: "id",
    separateDialCode: true,
    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
    customPlaceholder: function() {
        return "81234567890";
    },
    // Format number as user types
    formatOnDisplay: true,
    nationalMode: false
});

// Update nomor lengkap
const updateFullNumber = () => {
    if (fullPhoneInput) {
        const number = iti.getNumber();
        fullPhoneInput.value = number ? number.replace(/\D/g, '') : '';
    }
};

if (inputTel) {
    inputTel.addEventListener("keyup", updateFullNumber);
    inputTel.addEventListener("change", updateFullNumber);
}

// === EMAIL INPUT BUG FIX ===
const emailInput = document.querySelector("#in-email");
if (emailInput) {
    // Simpan nilai awal
    let emailValue = emailInput.value;
    
    emailInput.addEventListener('input', function() {
        emailValue = this.value;
        checkInputState(this);
    });
    
    emailInput.addEventListener('blur', function() {
        this.value = emailValue;
        checkInputState(this);
    });
    
    // Fix khusus untuk Chrome autofill
    setTimeout(() => {
        if (emailInput.value) {
            checkInputState(emailInput);
        }
    }, 500);
}

// === FUNGSI UTAMA ===
function handleInputChanges() {
    const inputs = document.querySelectorAll('.form-input');
    
    inputs.forEach(input => {
        // Skip tel input karena sudah dihandle khusus
        if (input.id === 'in-telp') return;
        
        // Initial check
        checkInputState(input);
        
        // Add event listeners
        input.addEventListener('input', () => checkInputState(input));
        input.addEventListener('change', () => checkInputState(input));
        input.addEventListener('focus', () => handleInputFocus(input));
        input.addEventListener('blur', () => handleInputBlur(input));
    });
}

function checkInputState(input) {
    const formGroup = input.closest('.form-group');
    if (!formGroup) return;
    
    const hasValue = input.value.trim() !== '' || 
                    (input.type === 'select-one' && input.value !== '');
    
    if (hasValue) {
        formGroup.classList.add('filled');
        input.classList.add('filled');
    } else {
        formGroup.classList.remove('filled');
        input.classList.remove('filled');
    }
}

function checkTelInputState() {
    if (!inputTel) return;
    const formGroup = inputTel.closest('.form-group');
    if (!formGroup) return;
    
    if (inputTel.value.trim() !== '') {
        formGroup.classList.add('filled');
        inputTel.classList.add('filled');
    } else {
        formGroup.classList.remove('filled');
        inputTel.classList.remove('filled');
    }
}

function handleInputFocus(input) {
    input.classList.add('focused');
    const formGroup = input.closest('.form-group');
    if (formGroup) formGroup.classList.add('focused');
}

function handleInputBlur(input) {
    input.classList.remove('focused');
    const formGroup = input.closest('.form-group');
    if (formGroup) formGroup.classList.remove('focused');
}

// === MULTI-LANGUAGE ===
let currentLang = "ID";
const dictionary = {
    ID: {
        desc: "Solusi Digital Berkelas. Mulai kolaborasi sekarang.",
        start: "Mulai Konsultasi",
        step1: "01. IDENTITAS",
        step2: "02. LAYANAN",
        step3: "03. DETAIL PROJEK",
        nama: "Masukkan nama lengkap Anda",
        email: "contoh@email.com",
        telp: "81234567890",
        jasa: "-- Pilih jenis layanan --",
        pesan: "Contoh: Saya butuh website company profile dengan 5 halaman (Home, About, Services, Portfolio, Contact) dan blog section. Target selesai dalam 2 bulan.",
        upload: "Upload file referensi",
        back: "Kembali",
        next1: "Lanjutkan ke Layanan",
        next2: "Lanjutkan ke Detail Projek",
        submit: "Kirim Brief",
    },
    EN: {
        desc: "Premium Digital Solutions. Start collaboration now.",
        start: "Start Consultation",
        step1: "01. IDENTITY",
        step2: "02. SERVICES",
        step3: "03. PROJECT DETAILS",
        nama: "Enter your full name",
        email: "example@email.com",
        telp: "81234567890",
        jasa: "-- Select service type --",
        pesan: "Example: I need a company profile website with 5 pages (Home, About, Services, Portfolio, Contact) and blog section. Target completion in 2 months.",
        upload: "Upload reference file",
        back: "Back",
        next1: "Continue to Services",
        next2: "Continue to Project Details",
        submit: "Submit Brief",
    },
};

function toggleLang() {
    currentLang = currentLang === "ID" ? "EN" : "ID";
    const langBtn = document.getElementById("langBtn");
    if (langBtn) langBtn.innerText = currentLang === "ID" ? "EN" : "ID";
    
    const dict = dictionary[currentLang];
    
    // Update semua teks
    const elements = {
        "txt-desc": dict.desc,
        "txt-startBtn": dict.start,
        "txt-step1-title": dict.step1,
        "txt-step2-title": dict.step2,
        "txt-step3-title": dict.step3,
    };
    
    Object.keys(elements).forEach(id => {
        const el = document.getElementById(id);
        if (el) el.innerText = elements[id];
    });
    
    // Update placeholders
    const inNama = document.getElementById("in-nama");
    const inEmail = document.getElementById("in-email");
    const inPesan = document.getElementById("in-pesan");
    
    if (inNama) inNama.placeholder = dict.nama;
    if (inEmail) inEmail.placeholder = dict.email;
    if (inPesan) inPesan.placeholder = dict.pesan;
    
    // Update select
    const selectElement = document.getElementById("in-jasa");
    if (selectElement && selectElement.options[0]) {
        selectElement.options[0].text = dict.jasa;
    }
    
    // Update buttons
    document.querySelectorAll(".btn-back").forEach(el => {
        el.textContent = dict.back;
    });
    
    const next1 = document.getElementById("txt-next-1");
    const next2 = document.getElementById("txt-next-2");
    const submit = document.getElementById("txt-submit");
    
    if (next1) next1.textContent = dict.next1;
    if (next2) next2.textContent = dict.next2;
    if (submit) submit.textContent = dict.submit;
    
    // Update upload text
    const uploadText = document.getElementById("txt-upload");
    if (uploadText) uploadText.textContent = dict.upload;
}

function toggleTheme() {
    document.body.classList.toggle("light-mode");
    const isLight = document.body.classList.contains("light-mode");
    const icon = document.getElementById("themeIcon");
    if (icon) {
        icon.setAttribute("data-lucide", isLight ? "sun" : "moon");
        lucide.createIcons();
    }
}

function startJourney() {
    const landingPage = document.getElementById("landing-page");
    const formContainer = document.getElementById("form-container");
    
    if (landingPage && formContainer) {
        landingPage.classList.remove("active");
        setTimeout(() => {
            landingPage.style.display = "none";
            formContainer.classList.add("active");
        }, 300);
    }
}

function validateAndNext(currentStep, nextStep) {
    const currentStepEl = document.getElementById("step-" + currentStep);
    if (!currentStepEl) return;
    
    const isTelValid = iti.isValidNumber();
    
    // Get all required inputs except tel input
    const inputs = currentStepEl.querySelectorAll(
        'input[required]:not([type="tel"]), select[required], textarea[required]'
    );

    let allValid = true;
    
    // Validate regular inputs
    inputs.forEach(input => {
        if (!input.value.trim()) {
            allValid = false;
            input.classList.add("error-shake");
            setTimeout(() => input.classList.remove("error-shake"), 400);
            
            // Focus on first invalid input
            if (allValid === false) {
                input.focus();
            }
        }
    });

    // Validate telephone number for step 1
    if (currentStep === 1) {
        if (!inputTel.value || !isTelValid) {
            allValid = false;
            inputTel.classList.add("error-shake");
            setTimeout(() => inputTel.classList.remove("error-shake"), 400);
            
            // Show error for invalid number
            if (inputTel.value && !isTelValid) {
                const errorMsg = currentLang === "ID" 
                    ? "Nomor WhatsApp tidak valid. Contoh format: 81234567890" 
                    : "Invalid WhatsApp number. Example format: 81234567890";
                alert(errorMsg);
            }
            
            if (!inputTel.value) {
                inputTel.focus();
            }
        }
    }

    // If all valid, go to next step
    if (allValid) {
        goToStep(nextStep);
    }
}

function goToStep(step) {
    // Hide all steps
    document.querySelectorAll(".step-content").forEach(s => {
        s.classList.remove("active");
    });
    
    // Show selected step with animation
    setTimeout(() => {
        const stepEl = document.getElementById("step-" + step);
        if (stepEl) stepEl.classList.add("active");
    }, 50);
    
    // Update progress bar
    for (let i = 1; i <= 3; i++) {
        const bar = document.getElementById("p-" + i);
        if (bar) {
            bar.style.backgroundColor = i <= step ? "#2563eb" : "rgba(255, 255, 255, 0.1)";
        }
    }
}

// === INITIALIZE ===
document.addEventListener('DOMContentLoaded', function() {
    // Set initial progress
    goToStep(1);
    
    // Handle input changes
    handleInputChanges();
    
    // Initial check for all inputs
    setTimeout(() => {
        document.querySelectorAll('.form-input').forEach(input => {
            if (input.id !== 'in-telp') {
                checkInputState(input);
            }
        });
        checkTelInputState();
    }, 100);
    
    // File upload handling
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            if (e.target.files.length > 0) {
                const file = e.target.files[0];
                fileNameSpan.textContent = file.name;
                fileNameDisplay.classList.remove('hidden');
                
                // Update upload area text
                const uploadText = document.getElementById('txt-upload');
                if (uploadText) {
                    uploadText.textContent = currentLang === "ID" 
                        ? "File terpilih" 
                        : "File selected";
                }
            }
        });
    }
    
    // Form submit handler
    const form = document.getElementById('briefForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = document.querySelector('.btn-submit');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = currentLang === "ID" 
                    ? '<span class="flex items-center justify-center gap-2"><i data-lucide="loader-circle" class="w-4 h-4 animate-spin"></i> Mengirim...</span>' 
                    : '<span class="flex items-center justify-center gap-2"><i data-lucide="loader-circle" class="w-4 h-4 animate-spin"></i> Sending...</span>';
                lucide.createIcons();
            }
        });
    }
});