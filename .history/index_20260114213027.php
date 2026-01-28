<?php include 'includes/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Creative Project Brief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    
    <style>
        body { 
            background-color: #050810; 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            color: white;
            background-image: radial-gradient(circle at top right, #1e293b, #050810);
            background-attachment: fixed;
        }
        .glass-card { 
            background: rgba(255, 255, 255, 0.02); 
            border: 1px solid rgba(255, 255, 255, 0.08); 
            backdrop-filter: blur(12px);
        }
        input, select, textarea {
            background: rgba(255, 255, 255, 0.03) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        input:focus, select:focus, textarea:focus {
            border-color: #3b82f6 !important;
            outline: none;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
    </style>
</head>
<body class="antialiased">

    <div class="min-h-screen flex flex-col items-center justify-center p-6">
        
        <div class="text-center mb-10">
            <div class="inline-block px-4 py-1.5 mb-4 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-400 text-[10px] font-black uppercase tracking-[0.2em]">
                Creative Agency Service
            </div>
            <h1 class="text-5xl md:text-6xl font-black tracking-tighter mb-4 italic">Z-STUDIO<span class="text-blue-600">.</span></h1>
            <p class="text-gray-400 max-w-md mx-auto leading-relaxed">Isi formulir di bawah untuk memulai proyek impian Anda bersama tim kreatif kami.</p>
        </div>

        <div class="w-full max-w-3xl glass-card rounded-[40px] p-8 md:p-12 shadow-2xl">
            <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="space-y-10">
                
                <section class="space-y-6">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-10 h-10 bg-blue-600 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-600/20">
                            <i data-lucide="user" class="w-5 h-5 text-white"></i>
                        </div>
                        <h2 class="text-xl font-extrabold tracking-tight">Informasi Klien</h2>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold ml-1">Nama Lengkap</label>
                            <input type="text" name="nama_klien" required placeholder="Siapa nama Anda?"
                                class="w-full rounded-2xl py-4 px-5 text-white transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold ml-1">Email Aktif</label>
                            <input type="email" name="email_klien" required placeholder="email@perusahaan.com"
                                class="w-full rounded-2xl py-4 px-5 text-white transition-all">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold ml-1">Nomor WhatsApp</label>
                        <div class="relative">
                            <span class="absolute left-5 top-1/2 -translate-y-1/2 text-gray-500 text-sm font-bold">+62</span>
                            <input type="number" name="no_telepon" required placeholder="812xxxxxxx"
                                class="w-full rounded-2xl py-4 pl-14 pr-5 text-white transition-all">
                        </div>
                    </div>
                </section>

                <section class="space-y-6">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-10 h-10 bg-purple-600 rounded-2xl flex items-center justify-center shadow-lg shadow-purple-600/20">
                            <i data-lucide="briefcase" class="w-5 h-5 text-white"></i>
                        </div>
                        <h2 class="text-xl font-extrabold tracking-tight">Detail Kebutuhan</h2>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold ml-1">Layanan yang Dibutuhkan</label>
                        <select name="jasa_pilihan" required
                            class="w-full rounded-2xl py-4 px-5 text-white transition-all appearance-none cursor-pointer">
                            <option value="" disabled selected>Pilih kategori proyek...</option>
                            <option value="Branding & Logo">Branding & Logo</option>
                            <option value="Website Development">Website Development</option>
                            <option value="Social Media Content">Social Media Content</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold ml-1">Brief Penjelasan</label>
                        <textarea name="kebutuhan_detail" rows="4" required placeholder="Ceritakan konsep atau fitur yang Anda inginkan secara detail..."
                            class="w-full rounded-2xl py-4 px-5 text-white transition-all resize-none"></textarea>
                    </div>
                </section>

                <section class="space-y-6">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="w-10 h-10 bg-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-600/20">
                            <i data-lucide="image" class="w-5 h-5 text-white"></i>
                        </div>
                        <h2 class="text-xl font-extrabold tracking-tight">Lampiran Referensi</h2>
                    </div>

                    <div class="relative group border-2 border-dashed border-white/10 rounded-[24px] p-8 transition-all hover:border-blue-500/50 hover:bg-blue-500/5 text-center">
                        <input type="file" name="foto_pendukung" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <i data-lucide="upload-cloud" class="w-12 h-12 text-blue-500 mx-auto mb-4 group-hover:scale-110 transition-transform"></i>
                        <p class="text-sm font-semibold mb-1">Upload file referensi (PNG/JPG)</p>
                        <p class="text-xs text-gray-500">Maksimal ukuran file 2MB</p>
                    </div>
                </section>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black py-5 rounded-[24px] text-lg uppercase tracking-tighter transition-all shadow-2xl shadow-blue-600/30 active:scale-[0.98] flex items-center justify-center gap-3">
                        Kirim Brief Projek <i data-lucide="send" class="w-5 h-5"></i>
                    </button>
                    <p class="text-center text-[10px] text-gray-600 mt-6 uppercase tracking-[0.2em] font-bold">Z-STUDIO &copy; 2026 - Digital Solution Agency</p>
                </div>

            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>