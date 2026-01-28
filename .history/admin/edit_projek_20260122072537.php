<?php
include 'auth.php';
include '../includes/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_projek WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Project | ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #050810;
            --text: white;
            --card: rgba(42, 22, 23, 0.8);
            --border: rgba(179, 44, 26, 0.2);
        }
        
        body {
            background: linear-gradient(135deg, #2A1617 0%, #7A4B47 100%) !important;
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
        }
        
        html, body {
            overflow-y: auto !important;
            overflow-x: hidden !important;
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }
        
        ::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
            background: transparent !important;
        }
        
        .glass-card {
            background: rgba(26, 20, 26, 0.7) !important;
            border: 1px solid rgba(179, 44, 26, 0.2) !important;
            backdrop-filter: blur(15px);
        }
        
        .light-mode .glass-card {
            background: rgba(255, 255, 255, 0.85) !important;
            border: 1px solid rgba(254, 127, 66, 0.2) !important;
        }
        
        .input-field {
            width: 100%;
            background: rgba(42, 22, 23, 0.6);
            border: 1px solid rgba(179, 44, 26, 0.3);
            border-radius: 1rem;
            padding: 1rem;
            color: inherit;
            outline: none;
            transition: 0.3s;
        }
        
        .input-field:focus {
            border-color: #FE7F42 !important;
            box-shadow: 0 0 0 2px rgba(254, 127, 66, 0.2);
        }
        
        select.input-field {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px;
            padding-right: 3rem;
            cursor: pointer;
        }
        
        select.input-field option {
            background: #2A1617;
            color: white;
            padding: 12px;
        }
        
        select.input-field option:checked {
            background: linear-gradient(135deg, #FE7F42, #B32C1A);
            color: white;
        }
        
        .btn-primary {
            background: #FE7F42 !important;
            border: none !important;
            font-weight: 800;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background: #B32C1A !important;
        }
        
        .form-label {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            color: rgba(255, 255, 255, 0.6);
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
        
        /* Value Styling */
        .form-value {
            font-size: 16px;
            font-weight: 600;
            color: white;
        }
        
        /* Divider */
        .divider {
            border: none;
            height: 1px;
            background: linear-gradient(90deg, 
                transparent 0%, 
                rgba(179, 44, 26, 0.3) 50%, 
                transparent 100%
            );
            margin: 2rem 0;
        }
        
        /* Brief Box */
        .brief-box {
            background: rgba(42, 22, 23, 0.4);
            border: 1px solid rgba(179, 44, 26, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            position: relative;
            font-style: italic;
            line-height: 1.6;
        }
        
        .brief-box::before {
            content: '"';
            position: absolute;
            top: 0.5rem;
            left: 1rem;
            font-size: 3rem;
            color: rgba(254, 127, 66, 0.3);
            font-family: serif;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 1rem !important;
            }
            
            .grid-cols-2 {
                grid-template-columns: 1fr !important;
                gap: 1.5rem !important;
            }
        }
        
        /* Animasi */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-slideUp {
            animation: slideUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
</head>

<body class="p-6 md:p-12">
    <div class="max-w-3xl mx-auto animate-slideUp">
        <!-- Back Button -->
        <a href="index.php" class="inline-flex items-center gap-2 text-gray-300 hover:text-white mb-8 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> 
            <span class="text-sm font-medium">Kembali ke Dashboard</span>
        </a>

        <!-- Header -->
        <h1 class="text-3xl font-black mb-8 uppercase tracking-tight">
            Kelola <span class="text-[#FE7F42]">Project</span>
        </h1>

        <!-- Form Container -->
        <div class="glass-card rounded-2xl p-6 md:p-8">
            <form action="update_status.php" method="POST" class="space-y-8">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <!-- Client Info Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                    <!-- Left Column -->
                    <div class="space-y-8">
                        <!-- Nama Klien -->
                        <div>
                            <label class="form-label">Nama Klien</label>
                            <div class="form-value"><?= htmlspecialchars($data['nama_klien']) ?></div>
                        </div>
                        
                        <!-- Layanan -->
                        <div>
                            <label class="form-label">Layanan</label>
                            <div class="form-value text-[#FE7F42]"><?= htmlspecialchars($data['jasa_pilihan']) ?></div>
                        </div>
                    </div>
                    
                    <!-- Right Column - Brief -->
                    <div>
                        <label class="form-label">Brief Kebutuhan</label>
                        <div class="brief-box mt-2">
                            <?= htmlspecialchars($data['kebutuhan_detail']) ?>
                        </div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="divider"></div>

                <!-- Status Update -->
                <div>
                    <label class="form-label mb-3">Update Status Proyek</label>
                    <div class="relative">
                        <select name="status" class="input-field" required>
                            <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                            <option value="Dalam Pengerjaan" <?= $data['status'] == 'Dalam Pengerjaan' ? 'selected' : '' ?>>Dalam Pengerjaan</option>
                            <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                        </select>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <i data-lucide="chevron-down" class="w-4 h-4 opacity-50"></i>
                        </div>
                    </div>
                </div>

                <!-- Admin Notes -->
                <div>
                    <label class="form-label mb-3">Catatan Admin (Internal)</label>
                    <textarea 
                        name="keterangan_admin" 
                        rows="4" 
                        class="input-field" 
                        placeholder="Tambahkan catatan progres di sini..."
                    ><?= htmlspecialchars($data['keterangan_admin']) ?></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="update_status" class="btn-primary w-full py-4 rounded-2xl text-white font-bold transition-all shadow-lg shadow-[#FE7F42]/20 hover:shadow-[#B32C1A]/30">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const select = document.querySelector('select[name="status"]');
            if (!select.value) {
                e.preventDefault();
                select.focus();
                select.style.borderColor = '#B32C1A';
                setTimeout(() => {
                    select.style.borderColor = 'rgba(179, 44, 26, 0.3)';
                }, 1000);
                return false;
            }
            return true;
        });
        
        // Focus effects for form inputs
        const formInputs = document.querySelectorAll('.input-field');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.borderColor = '#FE7F42';
                this.style.boxShadow = '0 0 0 2px rgba(254, 127, 66, 0.2)';
            });
            
            input.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
            });
        });
        
        // Auto-resize textarea
        const textarea = document.querySelector('textarea[name="keterangan_admin"]');
        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
        }
    </script>
</body>

</html>