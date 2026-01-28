lucide.createIcons();

const inputTel = document.querySelector("#in-telp");
const fullPhoneInput = document.querySelector("#full_phone");

// Inisialisasi International Telephone Input
const iti = window.intlTelInput(inputTel, {
  initialCountry: "id",
  separateDialCode: true,
  utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
});

// Update nomor lengkap
const updateFullNumber = () => {
  fullPhoneInput.value = iti.getNumber();
};
inputTel.addEventListener("keyup", updateFullNumber);
inputTel.addEventListener("change", updateFullNumber);

// Multi-language support
let currentLang = "ID";
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
    submit: "Kirim Brief",
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
    submit: "Submit Brief",
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
  document.getElementById("opt-default").innerText = dict.jasa;
  document.getElementById("in-pesan").placeholder = dict.pesan;
  document.getElementById("txt-upload").innerText = dict.upload;
  
  // Update button texts
  document.querySelectorAll(".btn-back").forEach(el => el.innerText = dict.back);
  document.querySelectorAll(".btn-next").forEach(el => el.innerText = dict.next);
  document.getElementById("txt-submit").innerText = dict.submit;
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
        alert(currentLang === "ID" ? "Nomor telepon tidak valid!" : "Invalid phone number!");
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
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
  // Set initial progress
  goToStep(1);
});