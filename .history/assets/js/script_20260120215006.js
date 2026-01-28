lucide.createIcons();

const inputTel = document.querySelector("#in-telp");
const fullPhoneInput = document.querySelector("#full_phone");
const iti = window.intlTelInput(inputTel, {
  initialCountry: "id",
  separateDialCode: true,
  dropdownContainer: document.body,
  utilsScript:
    "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
});

const updateFullNumber = () => {
  fullPhoneInput.value = iti.getNumber();
};
inputTel.addEventListener("keyup", updateFullNumber);
inputTel.addEventListener("change", updateFullNumber);

let currentLang = "ID";
const dictionary = {
  ID: {
    desc: "Mari wujudkan ide digital Anda",
    start: "Mulai Konsultasi",
    step1: "01. Identitas",
    step2: "02. Layanan",
    step3: "03. Projek",
    nama: "Nama Lengkap",
    email: "Email Aktif",
    telp: "Nomor WhatsApp",
    jasa: "Pilih Layanan",
    pesan: "Deskripsikan proyek Anda secara singkat",
    upload: "Upload Referensi",
    back: "Kembali",
    next: "Lanjutkan",
    submit: "Kirim Brief",
  },
  EN: {
    desc: "Let's realize your digital ideas",
    start: "Start Consultation",
    step1: "01. Identity",
    step2: "02. Services",
    step3: "03. Project",
    nama: "Full Name",
    email: "Active Email",
    telp: "WhatsApp Number",
    jasa: "Choose Service",
    pesan: "Describe your project briefly",
    upload: "Upload Reference",
    back: "Back",
    next: "Next",
    submit: "Submit Brief",
  },
};

function toggleLang() {
  currentLang = currentLang === "ID" ? "EN" : "ID";
  document.getElementById("langBtn").innerText =
    currentLang === "ID" ? "EN" : "ID";
  const dict = dictionary[currentLang];
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
  document
    .querySelectorAll(".btn-back")
    .forEach((el) => (el.innerText = dict.back));
  document
    .querySelectorAll(".btn-next")
    .forEach((el) => (el.innerText = dict.next));
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
  document.getElementById("landing-page").classList.remove("active");
  setTimeout(() => {
    document.getElementById("landing-page").style.display = "none";
    document.getElementById("form-container").classList.add("active");
  }, 300);
}

function validateAndNext(currentStep, nextStep) {
  const currentStepEl = document.getElementById("step-" + currentStep);
  const isTelValid = iti.isValidNumber();
  const inputs = currentStepEl.querySelectorAll(
    'input[required]:not([type="tel"]), select[required], textarea[required]',
  );

  let allValid = true;
  inputs.forEach((input) => {
    if (!input.value) {
      allValid = false;
      input.classList.add("error-shake");
      setTimeout(() => input.classList.remove("error-shake"), 400);
    }
  });

  if (currentStep === 1) {
    if (!inputTel.value || !isTelValid) {
      allValid = false;
      inputTel.classList.add("error-shake");
      setTimeout(() => inputTel.classList.remove("error-shake"), 400);
      if (inputTel.value && !isTelValid)
        alert(
          currentLang === "ID" ? "Nomor tidak valid!" : "Invalid phone number!",
        );
    }
  }

  if (allValid) goToStep(nextStep);
}

// ============ FIX PROGRESS BAR & DROPDOWN ============
function goToStep(step) {
  // Hide all steps
  document.querySelectorAll(".step-content").forEach((s) => {
    s.classList.remove("active");
  });
  
  // Show selected step
  setTimeout(() => {
    document.getElementById("step-" + step).classList.add("active");
  }, 50);
  
  // Update progress bar colors - FIX INI
  const bars = [
    document.getElementById("p-1"),
    document.getElementById("p-2"),
    document.getElementById("p-3")
  ];
  
  bars.forEach((bar, index) => {
    if (bar) {
      if (index < step) {
        bar.style.backgroundColor = "#FE7F42";
      } else {
        bar.style.backgroundColor = "rgba(255, 255, 255, 0.1)";
      }
    }
  });
}

// ============ FIX DROPDOWN LAYANAN ============
document.addEventListener('DOMContentLoaded', function() {
  // Clean up dropdown options
  const selectJasa = document.getElementById('in-jasa');
  if (selectJasa) {
    // Remove HTML tags from options
    for (let i = 0; i < selectJasa.options.length; i++) {
      const option = selectJasa.options[i];
      const cleanText = option.textContent.replace(/<[^>]*>/g, '').trim();
      option.textContent = cleanText;
    }
    
    // Fix placeholder text
    const defaultOption = selectJasa.options[0];
    if (defaultOption) {
      defaultOption.textContent = "Pilih Layanan";
    }
  }
  
  // Fix language toggle
  const originalToggleLang = toggleLang;
  window.toggleLang = function() {
    originalToggleLang();
    
    // Re-clean options after language change
    setTimeout(() => {
      const selectJasa = document.getElementById('in-jasa');
      if (selectJasa) {
        for (let i = 0; i < selectJasa.options.length; i++) {
          const option = selectJasa.options[i];
          const cleanText = option.textContent.replace(/<[^>]*>/g, '').trim();
          option.textContent = cleanText;
        }
      }
    }, 100);
  };
  
  // Set initial progress bar state
  setTimeout(() => {
    goToStep(1);
  }, 100);
});