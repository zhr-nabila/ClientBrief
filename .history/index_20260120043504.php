<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ClientBrief</title>

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/lucide@latest"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/css/intlTelInput.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="min-h-screen flex items-center justify-center p-6">

<div id="form-container" class="w-full max-w-xl">
    <div class="progress-wrap mb-8">
        <div id="p-1" class="progress-bar active"></div>
        <div id="p-2" class="progress-bar"></div>
        <div id="p-3" class="progress-bar"></div>
    </div>

    <div class="glass-card rounded-[36px] p-8 md:p-10">
        <form action="simpan_brief.php" method="POST" enctype="multipart/form-data">

            <!-- STEP 1 -->
            <div id="step-1" class="step-content active space-y-6">
                <h2 class="text-2xl font-black uppercase">Identitas</h2>

                <div class="grid gap-4">
                    <input type="text" name="nama" placeholder="Nama lengkap" required>
                    <input type="email" name="email" placeholder="Email aktif" required>

                    <input type="tel" id="in-telp" required
                        inputmode="numeric"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')"
                        placeholder="Nomor WhatsApp">
                    <input type="hidden" name="no_telepon" id="full_phone">
                </div>

                <button type="button" onclick="validateAndNext(1,2)" class="btn-primary w-full">
                    Lanjutkan
                </button>
            </div>

            <!-- STEP 2 -->
            <div id="step-2" class="step-content space-y-6">
                <h2 class="text-2xl font-black uppercase">Layanan</h2>

                <select name="jasa" required>
                    <option value="" disabled selected>Pilih layanan</option>
                    <option value="Web Development">Web Development</option>
                    <option value="UI/UX Design">UI / UX Design</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                </select>

                <div class="flex gap-4">
                    <button type="button" onclick="goToStep(1)" class="btn-outline w-1/3">Kembali</button>
                    <button type="button" onclick="validateAndNext(2,3)" class="btn-primary w-2/3">Lanjutkan</button>
                </div>
            </div>

            <!-- STEP 3 -->
            <div id="step-3" class="step-content space-y-6">
                <h2 class="text-2xl font-black uppercase">Projek</h2>

                <textarea name="pesan" rows="4" placeholder="Ceritakan singkat kebutuhan projek" required></textarea>

                <div class="border border-dashed border-white/10 rounded-2xl p-6 text-center relative">
                    <input type="file" name="gambar_projek" class="absolute inset-0 opacity-0 cursor-pointer">
                    <p class="text-xs text-gray-400 font-bold uppercase">Upload referensi (opsional)</p>
                </div>

                <div class="flex gap-4">
                    <button type="button" onclick="goToStep(2)" class="btn-outline w-1/3">Kembali</button>
                    <button type="submit" name="submit" class="btn-primary w-2/3">
                        Kirim Brief
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@24.3.4/build/js/intlTelInput.min.js"></script>
<script src="assets/js/script.js"></script>
<script>
lucide.createIcons();
</script>
</body>
</html>
