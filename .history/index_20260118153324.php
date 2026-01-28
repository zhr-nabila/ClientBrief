<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClientBrief | Bubble Fusion Edition</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/css/intlTelInput.css">

    <style>
        :root {
            /* Warna dari Palette Bubble Fusion */
            --pink-1: #9D0E52; /* Deep Magenta */
            --pink-2: #FF4E88; /* Vibrant Pink */
            --pink-3: #F9C0E2; /* Baby Pink */
            --pink-7: #E61291; /* Hot Pink */
            --pink-bg: #4A0E2E; /* Background Dark Pink */
        }

        body {
            /* Animasi Background Gradient Bergerak */
            background: linear-gradient(-45deg, #4A0E2E, #9D0E52, #E61291, #2D051A);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Glassmorphism Card */
        .glass-card {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        /* Input Styling */
        input, select, textarea {
            width: 100%;
            background: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            border-radius: 1.25rem !important;
            padding: 1.2rem !important;
            color: white !important;
            outline: none !important;
            transition: 0.3s all ease;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--pink-2) !important;
            background: rgba(255, 255, 255, 0.1) !important;
            box-shadow: 0 0 15px rgba(255, 78, 136, 0.3);
        }

        /* Button Bubble Style */
        .btn-bubble {
            background: linear-gradient(90deg, var(--pink-2), var(--pink-7));
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-bubble:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(230, 18, 145, 0.4);
        }

        /* Phone Input Adjustment */
        .iti { width: 100%; }
        .iti__country-list { background: #2D051A; color: white; border-radius: 1rem; }
        .iti__country:hover { background: var(--pink-1); }

        /* Navigation Steps Animation */
        .step-content { display: none; }
        .active { 
            display: block !important; 
            animation: bubbleUp 0.6s cubic-bezier(0.16, 1, 0.3, 1); 
        }

        @keyframes bubbleUp {
            from { opacity: 0; transform: scale(0.9) translateY(30px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .progress-dot {
            height: 6px;
            border-radius: 99px;
            transition: all 0.5s ease;
        }
    </style>
</head>
<body>

    <div class="fixed top-6 right-6 z-50">
        <button onclick="toggleLang()" class="glass-card px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest hover:text-pink-300 transition-all" id="langBtn">EN</button>
    </div>

    <div id="landing-page" class="active text-center max-w-2xl px-4">
        <h1 class="text-6xl md:text-8xl font-black tracking-tighter mb-4 italic">
            Client<span style="color: var(--pink-2)">Brief.</span>
        </h1>
        <p class="text-pink-100/70 text-lg mb-10 font-medium" id="txt-desc">Premium Digital Creative. Mari bangun projek impianmu.</p>
        <button onclick="startJourney()" class="btn-bubble group px-12 py-5 font-black text-white rounded-2xl transition-all shadow-2xl">
            <span class="uppercase tracking-tighter" id="txt-startBtn">Mulai Konsultasi</span>
        </button>
    </div>

    <div id="form-container" class="w-full max-w-xl px-4">
        <div class="flex justify-between mb-8 gap-2">
            <div id="p-1" class="progress-dot w-full bg-pink-500"></div>
            <div id="p-2" class="progress-dot w-full bg-white/10"></div>
            <div id="p-3" class="progress-dot w-full bg-white/10"></div>
        </div>

        <div class="glass-card rounded-[40px] p-8 md:p-12">
            <form id="briefForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                
                <div id="step-1" class="step-content active space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step1-title">01. Identitas</h2>
                    <div class="space-y-4">
                        <input type="text" name="nama" id="in-nama" placeholder="Nama Lengkap" required>
                        <input type="email" name="email" id="in-email" placeholder="Email Aktif" required>
                        <div class="w-full">
                            <input type="tel" id="in-telp" required inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Nomor WhatsApp">
                            <input type="hidden" name="no_telepon" id="full_phone">
                        </div>
                    </div>
                    <button type="button" onclick="validateAndNext(1, 2)" class="w-full btn-bubble text-white font-black py-5 rounded-2xl uppercase tracking-tighter btn-next">Lanjutkan</button>
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
                        <button type="button" onclick="goToStep(1)" class="w-1/3 border border-white/10 text-pink-200/50 font-bold py-5 rounded-2xl uppercase text-xs btn-back">Kembali</button>
                        <button type="button" onclick="validateAndNext(2, 3)" class="w-2/3 btn-bubble text-white font-black py-5 rounded-2xl uppercase tracking-tighter btn-next">Lanjutkan</button>
                    </div>
                </div>

                <div id="step-3" class="step-content space-y-8">
                    <h2 class="text-3xl font-black italic uppercase tracking-tighter" id="txt-step3-title">03. Projek</h2>
                    <div class="space-y-4">
                        <textarea name="pesan" id="in-pesan" rows="4" placeholder="Apa yang ingin Anda bangun?" required class="resize-none"></textarea>
                        <div class="border-2 border-dashed border-white/10 rounded-2xl p-6 text-center relative bg-white/[0.02] hover:border-pink-400 transition-colors">
                            <input type="file" name="gambar_projek" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
                            <i data-lucide="upload-cloud" class="w-8 h-8 text-pink-400 mx-auto mb-2"></i>
                            <p class="text-[10px] font-bold text-pink-200/50 uppercase" id="txt-upload">Upload Referensi</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button type="button" onclick="goToStep(2)" class="w-1/3 border border-white/10 text-pink-200/50 font-bold py-5 rounded-2xl uppercase text-xs btn-back">Kembali</button>
                        <button type="submit" name="submit" class="w-2/3 bg-white text-black font-black py-5 rounded-2xl hover:bg-pink-100 transition-all uppercase tracking-tighter" id="txt-submit">Kirim Brief</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/intlTelInput.min.js"></script>
    <script>
        lucide.createIcons();

        // System: Phone Input
        const inputTel = document.querySelector("#in-telp");
        const fullPhoneInput = document.querySelector("#full_phone");
        const iti = window.intlTelInput(inputTel, {
            initialCountry: "id",
            separateDialCode: true,
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/utils.js",
        });

        inputTel.addEventListener('change', () => fullPhoneInput.value = iti.getNumber());
        inputTel.addEventListener('keyup', () => fullPhoneInput.value = iti.getNumber());

        // System: Navigation & Lang (Tidak mengubah sistem)
        let currentLang = 'ID';
        const dictionary = {
            ID: { desc: "Solusi Digital Berkelas. Mulai kolaborasi sekarang.", start: "Mulai Konsultasi", step1: "01. Identitas", step2: "02. Layanan", step3: "03. Projek", nama: "Nama Lengkap", email: "Email Aktif", telp: "Nomor WhatsApp", jasa: "Pilih Layanan", pesan: "Apa yang ingin Anda bangun?", upload: "Upload Referensi", back: "Kembali", next: "Lanjutkan", submit: "Kirim Brief" },
            EN: { desc: "Premium Digital Solutions. Start collaboration now.", start: "Start Consultation", step1: "01. Identity", step2: "02. Services", step3: "03. Project", nama: "Full Name", email: "Active Email", telp: "WhatsApp Number", jasa: "Choose Service", pesan: "What do you want to build?", upload: "Upload Reference", back: "Back", next: "Next", submit: "Submit Brief" }
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

        function startJourney() {
            document.getElementById('landing-page').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('landing-page').style.display = 'none';
                document.getElementById('form-container').classList.add('active');
            }, 300);
        }

        function validateAndNext(currentStep, nextStep) {
            const currentStepEl = document.getElementById('step-' + currentStep);
            const inputs = currentStepEl.querySelectorAll('input[required]:not([type="tel"]), select[required], textarea[required]');
            let allValid = true;

            inputs.forEach(input => {
                if (!input.value) {
                    allValid = false;
                    input.style.borderColor = '#FF4E88';
                    setTimeout(() => input.style.borderColor = '', 1000);
                }
            });

            if (currentStep === 1 && !iti.isValidNumber()) {
                allValid = false;
                inputTel.style.borderColor = '#FF4E88';
            }

            if (allValid) goToStep(nextStep);
        }

        function goToStep(step) {
            document.querySelectorAll('.step-content').forEach(s => s.classList.remove('active'));
            setTimeout(() => { document.getElementById('step-' + step).classList.add('active'); }, 50);
            for(let i=1; i<=3; i++) {
                const bar = document.getElementById('p-' + i);
                if(bar) bar.style.backgroundColor = (i <= step) ? '#FF4E88' : 'rgba(255,255,255,0.1)';
            }
        }
    </script>
</body>
</html>