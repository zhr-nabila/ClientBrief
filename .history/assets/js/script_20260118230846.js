// ===== INISIALISASI =====
lucide.createIcons();

// ===== VARIABLES =====
const inputTel = document.querySelector("#in-telp");
const fullPhoneInput = document.querySelector("#full_phone");
const fileInput = document.querySelector("#fileInput");
const fileNameDisplay = document.getElementById("fileNameDisplay");
const fileNameSpan = document.getElementById("fileName");

let currentLang = "ID";
let iti = null;

// ===== DICTIONARY =====
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
        pesan: "Jelaskan kebutuhan proyek Anda secara singkat dan jelas",
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
        pesan: "Describe your project needs briefly and clearly",
        upload: "Upload reference file",
        back: "Back",
        next1: "Continue to Services",
        next2: "Continue to Project Details",
        submit: "Submit Brief",
    },
};

// ===== INISIALISASI INTEGRATED TELEPHONE INPUT =====
if (inputTel) {
    iti = window.intlTelInput(inputTel, {
        initialCountry: "id",
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
        customPlaceholder: function() {
            return dictionary[currentLang].telp;
        },
        formatOnDisplay: true,
        nationalMode: false
    });

    // ===== VALIDASI INPUT HANYA ANGKA =====
    inputTel.addEventListener('input', function(e) {
        // Simpan posisi cursor
        let cursorPosition = this.selectionStart;
        
        // Ambil nilai input
        let value = this.value;
        
        // Hapus semua karakter non-numeric kecuali + di awal
        let newValue = value.replace(/[^\d+]/g, '');
        
        // Pastikan hanya satu + di awal
        if ((newValue.match(/\+/g) || []).length > 1) {
            newValue = '+' + newValue.replace(/\+/g, '');
        }
        
        // Jika berbeda, update
        if (value !== newValue) {
            this.value = newValue;
            // Kembalikan cursor position
            const newCursor = Math.max(0, cursorPosition - (value.length - newValue.length));
            this.setSelectionRange(newCursor, newCursor);
        }
        
        updateFullNumber();
        checkTelInputState();
    });

    // Prevent paste non-numeric
    inputTel.addEventListener('paste', function(e) {
        e.preventDefault();
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        const numericPaste = paste.replace(/[^\d+]/g, '');
        document.execCommand('insertText', false, numericPaste);
    });
}

// ===== UPDATE FULL NUMBER =====
function updateFullNumber() {
    if (fullPhoneInput && iti) {
        const number = iti.getNumber();
        // Simpan hanya angka untuk database
        const cleanNumber = number ? number.replace(/\D/g, '') : '';
        fullPhoneInput.value = cleanNumber;
    }
}

// ===== CHECK TEL INPUT STATE =====
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

// ===== FILE UPLOAD HANDLING =====
if (fileInput && fileNameDisplay && fileNameSpan) {
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

function clearFile() {
    if (fileInput) {
        fileInput.value = '';
        if (fileNameDisplay) {
            fileNameDisplay.classList.add('hidden');
        }
        
        // Reset upload area text
        const uploadText = document.getElementById('txt-upload');
        if (uploadText) {
            uploadText.textContent = dictionary[currentLang].upload;
        }
    }
}

// ===== LANGUAGE TOGGLE =====
function toggleLang() {
    currentLang = currentLang === "ID" ? "EN" : "ID";
    const langBtn = document.getElementById("langBtn");
    if (langBtn) langBtn.innerText = currentLang === "ID" ? "EN" : "ID";
    
    const dict = dictionary[currentLang];
    
    // Update semua teks
    const textElements = {
        "txt-desc": dict.desc,
        "txt-startBtn": dict.start,
        "txt-step1-title": dict.step1,
        "txt-step2-title": dict.step2,
        "txt-step3-title": dict.step3,
        "txt-upload": dict.upload,
        "txt-next-1": dict.next1,
        "txt-next-2": dict.next2,
        "txt-submit": dict.submit
    };
    
    Object.keys(textElements).forEach(id => {
        const el = document.getElementById(id);
        if (el) el.innerText = textElements[id];
    });
    
    // Update placeholders
    const inNama = document.getElementById("in-nama");
    const inEmail = document.getElementById("in-email");
    const inPesan = document.getElementById("in-pesan");
    
    if (inNama) inNama.placeholder = dict.nama;
    if (inEmail) inEmail.placeholder = dict.email;
    if (inPesan) inPesan.placeholder = dict.pesan;
    
    // Update select placeholder
    const selectElement = document.getElementById("in-jasa");
    if (selectElement && selectElement.options[0]) {
        selectElement.options[0].text = dict.jasa;
    }
    
    // Update back buttons
    document.querySelectorAll(".btn-back").forEach(el => {
        el.textContent = dict.back;
    });
    
    // Update tel placeholder
    if (inputTel) {
        inputTel.placeholder = dict.telp;
    }
}

// ===== THEME TOGGLE =====
function toggleTheme() {
    document.body.classList.toggle("light-mode");
    const isLight = document.body.classList.contains("light-mode");
    const icon = document.getElementById("themeIcon");
    if (icon) {
        icon.setAttribute("data-lucide", isLight ? "sun" : "moon");
        lucide.createIcons();
    }
}

// ===== FORM NAVIGATION =====
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
    
    const isTelValid = iti ? iti.isValidNumber() : false;
    
    // Ambil semua input required kecuali tel
    const inputs = currentStepEl.querySelectorAll(
        'input[required]:not([type="tel"]), select[required], textarea[required]'
    );

    let allValid = true;
    
    // Validasi input regular
    inputs.forEach(input => {
        if (!input.value.trim()) {
            allValid = false;
            input.classList.add("error-shake");
            setTimeout(() => input.classList.remove("error-shake"), 400);
            
            // Focus ke input pertama yang invalid
            if (allValid === false) {
                input.focus();
            }
        }
    });

    // Validasi nomor telepon untuk step 1
    if (currentStep === 1 && inputTel) {
        const telValue = inputTel.value.replace(/\D/g, '');
        if (!telValue || !isTelValid) {
            allValid = false;
            inputTel.classList.add("error-shake");
            setTimeout(() => inputTel.classList.remove("error-shake"), 400);
            
            // Tampilkan error untuk nomor tidak valid
            if (telValue && !isTelValid) {
                const errorMsg = currentLang === "ID" 
                    ? "Nomor WhatsApp tidak valid. Contoh: 81234567890" 
                    : "Invalid WhatsApp number. Example: 81234567890";
                alert(errorMsg);
            }
            
            if (!telValue) {
                inputTel.focus();
            }
        }
    }

    // Jika semua valid, lanjut ke step berikutnya
    if (allValid) {
        goToStep(nextStep);
    }
}

function goToStep(step) {
    // Sembunyikan semua steps
    document.querySelectorAll(".step-content").forEach(s => {
        s.classList.remove("active");
    });
    
    // Tampilkan step yang dipilih dengan animasi
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

// ===== FORM SUBMIT HANDLER =====
document.addEventListener('DOMContentLoaded', function() {
    // Set progress awal
    goToStep(1);
    
    // Initial tel input check
    setTimeout(() => {
        checkTelInputState();
    }, 100);
    
    // Drag and drop untuk file upload
    const uploadArea = document.querySelector('.upload-area');
    if (uploadArea && fileInput) {
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-blue-500', 'bg-blue-500/10');
        });
        
        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-blue-500', 'bg-blue-500/10');
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-blue-500', 'bg-blue-500/10');
            
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files;
                const event = new Event('change', { bubbles: true });
                fileInput.dispatchEvent(event);
            }
        });
    }
    
    // Form submit handler
    const form = document.getElementById('briefForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            // Cegah double submission
            if (this.classList.contains('submitting')) {
                e.preventDefault();
                return;
            }
            
            const submitBtn = document.querySelector('.btn-submit');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = currentLang === "ID" 
                    ? '<span class="flex items-center justify-center gap-2"><i data-lucide="loader-circle" class="w-4 h-4 animate-spin"></i> Mengirim...</span>' 
                    : '<span class="flex items-center justify-center gap-2"><i data-lucide="loader-circle" class="w-4 h-4 animate-spin"></i> Sending...</span>';
                lucide.createIcons();
                this.classList.add('submitting');
            }
        });
    }
    
    // Event listeners untuk tel input
    if (inputTel) {
        inputTel.addEventListener("keyup", updateFullNumber);
        inputTel.addEventListener("change", updateFullNumber);
        inputTel.addEventListener("blur", updateFullNumber);
    }
});