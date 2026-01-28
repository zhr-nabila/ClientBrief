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

  // Validasi nomor telpon
  if (currentStep === 1) {
    if (!inputTel.value || !isTelValid) {
      allValid = false;
      inputTel.classList.add("error-shake");
      setTimeout(() => inputTel.classList.remove("error-shake"), 400);
      // ERROR BUAT TELPON
      if (inputTel.value && !isTelValid)
        alert(
          currentLang === "ID" ? "Nomor tidak valid!" : "Invalid phone number!",
        );
    }
  }

  if (allValid) goToStep(nextStep);
}

// Di function goToStep, update warna progress bar dengan warna baru
function goToStep(step) {
  document
    .querySelectorAll(".step-content")
    .forEach((s) => s.classList.remove("active"));
  setTimeout(() => {
    document.getElementById("step-" + step).classList.add("active");
  }, 50);
  for (let i = 1; i <= 3; i++) {
    const bar = document.getElementById("p-" + i);
    if (bar)
      bar.style.backgroundColor =
        i <= step ? "#FE7F42" : "rgba(255,255,255,0.1)"; // #FE7F42 mengganti #2563eb
  }
}

// Tambahkan di akhir script.js (setelah semua fungsi)

// Custom dropdown untuk select layanan
document.addEventListener('DOMContentLoaded', function() {
    const selectJasa = document.getElementById('in-jasa');
    const selectContainer = document.querySelector('.relative'); // container select
    
    if (selectJasa && selectContainer) {
        // Buat custom dropdown
        const customDropdown = document.createElement('div');
        customDropdown.id = 'in-jasa-custom-dropdown';
        customDropdown.className = 'absolute left-0 right-0 mt-2 bg-[#2A1617] border border-[#B32C1A] rounded-[18px] backdrop-blur-xl z-50 max-h-60 overflow-y-auto hidden';
        customDropdown.style.boxShadow = '0 10px 40px rgba(42, 22, 23, 0.3)';
        
        // Isi dropdown dengan options
        const options = Array.from(selectJasa.options);
        options.forEach((option, index) => {
            if (option.value !== '') {
                const div = document.createElement('div');
                div.className = 'px-4 py-3 hover:bg-[#B32C1A]/20 cursor-pointer transition-colors';
                div.textContent = option.text.replace(/<[^>]*>/g, '').trim();
                div.dataset.value = option.value;
                
                div.addEventListener('click', function() {
                    selectJasa.value = this.dataset.value;
                    selectJasa.dispatchEvent(new Event('change'));
                    customDropdown.classList.add('hidden');
                    
                    // Update tampilan select
                    selectJasa.style.color = 'white';
                });
                
                customDropdown.appendChild(div);
            }
        });
        
        selectContainer.appendChild(customDropdown);
        
        // Toggle dropdown saat select diklik
        selectJasa.addEventListener('click', function(e) {
            e.stopPropagation();
            customDropdown.classList.toggle('hidden');
        });
        
        // Tutup dropdown saat klik di luar
        document.addEventListener('click', function() {
            customDropdown.classList.add('hidden');
        });
        
        // Cegah event bubbling
        customDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
        
        // Update tampilan saat option dipilih
        selectJasa.addEventListener('change', function() {
            if (this.value) {
                this.style.color = 'white';
            }
        });
    }
    
    // Fungsi untuk reset select styling saat ganti bahasa
    const originalToggleLang = toggleLang;
    window.toggleLang = function() {
        originalToggleLang();
        
        // Reset select styling
        setTimeout(() => {
            const selectJasa = document.getElementById('in-jasa');
            if (selectJasa && selectJasa.value) {
                selectJasa.style.color = 'white';
            }
        }, 100);
    };
});