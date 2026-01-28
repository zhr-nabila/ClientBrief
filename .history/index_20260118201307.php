<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientBrief | Digital Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/css/intlTelInput.css">

   <link rel="stylesheet" href="css/style.css">

</head>

<body class="min-h-screen hero-gradient flex items-center justify-center p-6">

    <div class="fixed top-6 right-6 flex gap-4 z-50">
        <button onclick="toggleLang()" class="glass-card px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest hover:bg-blue-600 hover:text-white transition-all" id="langBtn">EN</button>
        <button onclick="toggleTheme()" class="glass-card p-2 rounded-full hover:scale-110 transition-all">
            <i data-lucide="moon" id="themeIcon" class="w-5 h-5"></i>
        </button>
    </div>

    <div id="landing-page" class="active text-center max-w-2xl">
        <h1 class="text-6xl md:text-7xl font-black tracking-tighter mb-6 italic" id="txt-title">Client<span class="text-blue-600">Brief.</span></h1>
        <p class="text-gray-400 text-lg mb-10 font-medium" id="txt-desc">Solusi Digital Berkelas. Mulai kolaborasi sekarang.</p>
        <button onclick="startJourney()" class="group relative inline-flex items-center justify-center px-10 py-5 font-black text-black bg-white rounded-full transition-all hover:pr-12 shadow-2xl shadow-white/10">
            <span class="relative uppercase tracking-tighter" id="txt-startBtn">Mulai Konsultasi</span>
            <i data-lucide="arrow-right" class="w-5 h-5 ml-2 transition-all group-hover:translate-x-1"></i>
        </button>
    </div>

    <div id="form-container" class="w-full max-w-xl">
        <div class="flex justify-between mb-8 px-2">
            <div id="p-1" class="h-1 w-[30%] rounded-full bg-blue-600 transition-all duration-500"></div>
            <div id="p-2" class="h-1 w-[30%] rounded-full bg-white/10 transition-all duration-500"></div>
            <div id="p-3" class="h-1 w-[30%] rounded-full bg-white/10 transition-all duration-500"></div>
        </div>

        <div class="glass-card rounded-[40px] p-8 md:p-12 shadow-2xl">
            <form id="briefForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data">

                <div id="step-1" class="step-content active space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step1-title">01. Identitas</h2>
                    <div class="space-y-4">
                        <input type="text" name="nama" id="in-nama" placeholder="Nama Lengkap" required>
                        <input type="email" name="email" id="in-email" placeholder="Email Aktif" required>

                        <div class="w-full">
                            <input type="tel" id="in-telp" required
                                inputmode="numeric"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                                placeholder="Nomor WhatsApp">
                            <input type="hidden" name="no_telepon" id="full_phone">
                        </div>
                    </div>
                    <button type="button" onclick="validateAndNext(1, 2)" class="w-full bg-blue-600 text-white font-black py-5 rounded-[24px] uppercase tracking-tighter btn-next">Lanjutkan</button>
                </div>

                <div id="step-2" class="step-content space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step2-title">02. Layanan</h2>
                    <div class="space-y-4">
                        <select name="jasa" id="in-jasa" required>
                            <option value="" disabled selected id="opt-default">Pilih Layanan</option>
                            <option value="Web Development">Web Development</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Digital Marketing">Digital Marketing</option>
                        </select>
                    </div>
                    <div class="flex gap-4">
                        <button type="button" onclick="goToStep(1)" class="w-1/3 border border-white/10 text-gray-400 font-bold py-5 rounded-[24px] uppercase text-xs btn-back">Kembali</button>
                        <button type="button" onclick="validateAndNext(2, 3)" class="w-2/3 bg-blue-600 text-white font-black py-5 rounded-[24px] uppercase tracking-tighter btn-next">Lanjutkan</button>
                    </div>
                </div>

                <div id="step-3" class="step-content space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step3-title">03. Projek</h2>
                    <div class="space-y-4">
                        <textarea name="pesan" id="in-pesan" rows="4" placeholder="Apa yang ingin Anda bangun?" required class="resize-none"></textarea>
                        <div class="border-2 border-dashed border-white/10 rounded-[24px] p-6 text-center relative bg-white/[0.02]">
                            <input type="file" name="gambar_projek" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                            <i data-lucide="upload-cloud" class="w-8 h-8 text-blue-500 mx-auto mb-2"></i>
                            <p class="text-[10px] font-bold text-gray-500 uppercase" id="txt-upload">Upload Referensi</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="button" onclick="goToStep(2)" class="w-1/3 border border-white/10 text-gray-400 font-bold py-5 rounded-[24px] uppercase text-xs btn-back">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-white text-black font-black py-5 rounded-[24px] hover:bg-blue-600 hover:text-white transition-all uppercase tracking-tighter" id="txt-submit">Kirim Brief</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/intlTelInput.min.js"></script>
    <script>
        lucide.createIcons();

        const inputTel = document.querySelector("#in-telp");
        const fullPhoneInput = document.querySelector("#full_phone");
        const iti = window.intlTelInput(inputTel, {
            initialCountry: "id",
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
        });

        const updateFullNumber = () => {
            fullPhoneInput.value = iti.getNumber();
        };
        inputTel.addEventListener('keyup', updateFullNumber);
        inputTel.addEventListener('change', updateFullNumber);

        let currentLang = 'ID';
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

        function toggleLang() {
            currentLang = currentLang === 'ID' ? 'EN' : 'ID';
            document.getElementById('langBtn').innerText = currentLang === 'ID' ? 'EN' : 'ID';
            const dict = dictionary[currentLang];
            document.getElementById('txt-desc').innerText = dict.desc;
            document.getElementById('txt-startBtn').innerText = dict.start;
            document.getElementById('txt-step1-title').innerText = dict.step1;
            document.getElementById('txt-step2-title').innerText = dict.step2;
            document.getElementById('txt-step3-title').innerText = dict.step3;
            document.getElementById('in-nama').placeholder = dict.nama;
            document.getElementById('in-email').placeholder = dict.email;
            inputTel.placeholder = dict.telp;
            document.getElementById('opt-default').innerText = dict.jasa;
            document.getElementById('in-pesan').placeholder = dict.pesan;
            document.getElementById('txt-upload').innerText = dict.upload;
            document.querySelectorAll('.btn-back').forEach(el => el.innerText = dict.back);
            document.querySelectorAll('.btn-next').forEach(el => el.innerText = dict.next);
            document.getElementById('txt-submit').innerText = dict.submit;
        }

        function toggleTheme() {
            document.body.classList.toggle('light-mode');
            const isLight = document.body.classList.contains('light-mode');
            const icon = document.getElementById('themeIcon');
            icon.setAttribute('data-lucide', isLight ? 'sun' : 'moon');
            lucide.createIcons();
        }

        function startJourney() {
            document.getElementById('landing-page').classList.remove('active');
            setTimeout(() => {
                document.getElementById('landing-page').style.display = 'none';
                document.getElementById('form-container').classList.add('active');
            }, 300);
        }

        function validateAndNext(currentStep, nextStep) {
            const currentStepEl = document.getElementById('step-' + currentStep);
            const isTelValid = iti.isValidNumber();
            const inputs = currentStepEl.querySelectorAll('input[required]:not([type="tel"]), select[required], textarea[required]');

            let allValid = true;
            inputs.forEach(input => {
                if (!input.value) {
                    allValid = false;
                    input.classList.add('error-shake');
                    setTimeout(() => input.classList.remove('error-shake'), 400);
                }
            });

            // Validasi nomor telpon
            if (currentStep === 1) {
                if (!inputTel.value || !isTelValid) {
                    allValid = false;
                    inputTel.classList.add('error-shake');
                    setTimeout(() => inputTel.classList.remove('error-shake'), 400);
                    // ERROR BUAT TELPON
                    if (inputTel.value && !isTelValid) alert(currentLang === 'ID' ? "Nomor tidak valid!" : "Invalid phone number!");
                }
            }

            if (allValid) goToStep(nextStep);
        }

        function goToStep(step) {
            document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
            setTimeout(() => {
                document.getElementById('step-' + step).classList.add('active');
            }, 50);
            for (let i = 1; i <= 3; i++) {
                const bar = document.getElementById('p-' + i);
                if (bar) bar.style.backgroundColor = (i <= step) ? '#2563eb' : 'rgba(255,255,255,0.1)';
            }
        }
    </script>
</body>

</html>