lucide.createIcons();

const inputTel = document.querySelector("#in-telp");
const fullPhoneInput = document.querySelector("#full_phone");
const fileInput = document.querySelector("#fileInput");
const fileNameDisplay = document.querySelector("#fileNameDisplay");
const fileNameSpan = document.querySelector("#fileName");

// Inisialisasi International Telephone Input
const iti = window.intlTelInput(inputTel, {
  initialCountry: "id",
  separateDialCode: true,
  utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
  customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
    return "812 3456 7890";
  }
});

// Update nomor lengkap
const updateFullNumber = () => {
  fullPhoneInput.value = iti.getNumber();
};
inputTel.addEventListener("keyup", updateFullNumber);
inputTel.addEventListener("change", updateFullNumber);

// File upload display handler
if (fileInput) {
  fileInput.addEventListener("change", function(e) {
    if (e.target.files.length > 0) {
      const file = e.target.files[0];
      fileNameSpan.textContent = file.name;
      fileNameDisplay.classList.remove("hidden");
      
      // Update upload area text
      const uploadText = document.querySelector(".upload-text");
      if (uploadText) {
        uploadText.textContent = "File berhasil dipilih";
      }
      
      // Change icon
      const uploadIcon = document.querySelector(".upload-icon");
      if (uploadIcon) {
        uploadIcon.setAttribute("data-lucide", "check-circle");
        lucide.createIcons();
      }
    }
  });
}

// Clear file function
function clearFile() {
  if (fileInput) {
    fileInput.value = '';
    fileNameDisplay.classList.add("hidden");
    
    // Reset upload area text
    const uploadText = document.querySelector(".upload-text");
    if (uploadText) {
      uploadText.textContent = currentLang === "ID" ? "Seret atau klik untuk upload file" : "Drag or click to upload file";
    }
    
    // Reset icon
    const uploadIcon = document.querySelector(".upload-icon");
    if (uploadIcon) {
      uploadIcon.setAttribute("data-lucide", "upload-cloud");
      lucide.createIcons();
    }
  }
}

// Multi-language support
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
    telp: "812 3456 7890",
    jasa: "-- Pilih jenis layanan --",
    pesan: "Jelaskan secara detail:\n- Tujuan proyek\n- Fitur yang dibutuhkan\n- Target audience\n- Waktu yang diharapkan\n- Budget yang tersedia\n- Contoh referensi (jika ada)",
    upload: "Seret atau klik untuk upload file",
    back: "Kembali",
    next1: "Lanjutkan ke Layanan",
    next2: "Lanjutkan ke Detail Projek",
    submit: "Kirim Brief Projek",
  },
  EN: {
    desc: "Premium Digital Solutions. Start collaboration now.",
    start: "Start Consultation",
    step1: "01. IDENTITY",
    step2: "02. SERVICES",
    step3: "03. PROJECT DETAILS",
    nama: "Enter your full name",
    email: "example@email.com",
    telp: "812 3456 7890",
    jasa: "-- Select service type --",
    pesan: "Describe in detail:\n- Project objectives\n- Required features\n- Target audience\n- Expected timeline\n- Available budget\n- Reference examples (if any)",
    upload: "Drag or click to upload file",
    back: "Back",
    next1: "Continue to Services",
    next2: "Continue to Project Details",
    submit: "Submit Project Brief",
  },
};

function toggleLang() {
  currentLang = currentLang === "ID" ? "EN" : "ID";
  document.getElementById("langBtn").innerText = currentLang === "ID" ? "EN" : "ID";
  
  const dict = dictionary[currentLang];
  
  // Update semua teks
  document.getElementById("txt-desc").innerText = dict.desc;
  document.getElementById("txt-startBtn").innerText = dict.start;
  document.getElementById("txt-step1-title").innerText = dict.step1;
  document.getElementById("txt-step2-title").innerText = dict.step2;
  document.getElementById("txt-step3-title").innerText = dict.step3;
  document.getElementById("in-nama").placeholder = dict.nama;
  document.getElementById("in-email").placeholder = dict.email;
  inputTel.placeholder = dict.telp;
  
  // Update select placeholder
  const selectElement = document.getElementById("in-jasa");
  if (selectElement) {
    selectElement.options[0].text = dict.jasa;
  }
  
  document.getElementById("in-pesan").placeholder = dict.pesan;
  document.getElementById("txt-upload").innerText = dict.upload;
  
  // Update button texts
  document.querySelectorAll(".btn-back").forEach(el => el.textContent = dict.back);
  document.getElementById("txt-next-1").textContent = dict.next1;
  document.getElementById("txt-next-2").textContent = dict.next2;
  document.getElementById("txt-submit").textContent = dict.submit;
  
  // Update file upload text if file is cleared
  if (fileInput && !fileInput.value) {
    const uploadText = document.querySelector(".upload-text");
    if (uploadText) {
      uploadText.textContent = dict.upload;
    }
  }
}

function toggleTheme() {
  document.body.classList.toggle("light-mode");
  const isLight = document.body.classList.contains("light-mode");
  const icon = document.getElementById("themeIcon");
  icon.setAttribute("data-lucide", isLight ? "sun" : "moon");
  lucide.createIcons();
}

function startJourney() {
  const landingPage = document.getElementById("landing-page");
  const formContainer = document.getElementById("form-container");
  
  landingPage.classList.remove("active");
  setTimeout(() => {
    landingPage.style.display = "none";
    formContainer.classList.add("active");
  }, 300);
}

function validateAndNext(currentStep, nextStep) {
  const currentStepEl = document.getElementById("step-" + currentStep);
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
          ? "Nomor WhatsApp tidak valid. Pastikan format nomor benar (contoh: 81234567890)." 
          : "Invalid WhatsApp number. Please check the format (example: 81234567890).";
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
    document.getElementById("step-" + step).classList.add("active");
  }, 50);
  
  // Update progress bar
  for (let i = 1; i <= 3; i++) {
    const bar = document.getElementById("p-" + i);
    if (bar) {
      bar.style.backgroundColor = i <= step ? "#2563eb" : "rgba(255, 255, 255, 0.1)";
    }
  }
  
  // Scroll to top of form on step change
  document.querySelector('.glass-form').scrollIntoView({ 
    behavior: 'smooth', 
    block: 'start' 
  });
}



// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
  // Set initial progress
  goToStep(1);
  
  // Add form submit handler
  const form = document.getElementById('briefForm');
  if (form) {
    form.addEventListener('submit', function(e) {
      const submitBtn = document.querySelector('.btn-submit');
      if (submitBtn) {
        submitBtn.innerHTML = currentLang === "ID" 
          ? '<span class="flex items-center justify-center gap-2"><i data-lucide="loader-circle" class="w-4 h-4 animate-spin"></i> Mengirim...</span>' 
          : '<span class="flex items-center justify-center gap-2"><i data-lucide="loader-circle" class="w-4 h-4 animate-spin"></i> Sending...</span>';
        lucide.createIcons();
        submitBtn.classList.add('loading');
        submitBtn.disabled = true;
      }
    });
  }
  
  // Add drag and drop for file upload
  const uploadArea = document.querySelector('.upload-area');
  if (uploadArea) {
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
});