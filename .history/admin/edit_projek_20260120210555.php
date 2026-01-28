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
        /* CUSTOM STYLING UNTUK EDIT PAGE */
        :root {
            --primary: #FE7F42;
            --primary-dark: #B32C1A;
            --bg-dark: #1A141A;
            --bg-card: rgba(26, 20, 26, 0.8);
            --border-light: rgba(254, 127, 66, 0.15);
        }
        
        body {
            background: linear-gradient(135deg, #2A1617 0%, #7A4B47 100%);
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
        }
        
        .glass-card {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-light);
            border-radius: 32px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        /* SELECT DROPDOWN CUSTOM */
        select.custom-select {
            width: 100%;
            padding: 1rem 3rem 1rem 1.5rem;
            font-size: 15px;
            font-weight: 500;
            border-radius: 16px;
            border: 1px solid rgba(254, 127, 66, 0.3);
            background: rgba(26, 20, 26, 0.9);
            color: white;
            transition: all 0.3s ease;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24' fill='none' stroke='%23FE7F42' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 20px;
        }
        
        select.custom-select:hover {
            border-color: var(--primary);
            background: rgba(254, 127, 66, 0.1);
        }
        
        select.custom-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(254, 127, 66, 0.2);
            background: rgba(26, 20, 26, 0.95);
        }
        
        select.custom-select option {
            padding: 12px 16px;
            background: rgba(26, 20, 26, 0.95);
            color: white;
            font-size: 14px;
            border: none;
        }
        
        select.custom-select option:hover {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
        }
        
        select.custom-select option:checked {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            color: white;
            font-weight: 600;
        }
        
        /* TEXTAREA CUSTOM */
        textarea.custom-textarea {
            min-height: 140px;
            resize: vertical;
            line-height: 1.6;
            font-size: 15px;
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid rgba(254, 127, 66, 0.3);
            background: rgba(26, 20, 26, 0.9);
            color: white;
            transition: all 0.3s ease;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        textarea.custom-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(254, 127, 66, 0.2);
            background: rgba(26, 20, 26, 0.95);
        }
        
        textarea.custom-textarea::-webkit-scrollbar {
            width: 8px;
        }
        
        textarea.custom-textarea::-webkit-scrollbar-track {
            background: rgba(26, 20, 26, 0.3);
            border-radius: 4px;
        }
        
        textarea.custom-textarea::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 4px;
        }
        
        /* BUTTON CUSTOM */
        .btn-submit {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            font-weight: 800;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(254, 127, 66, 0.4);
        }
        
        .btn-submit::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-submit:hover::after {
            left: 100%;
        }
        
        /* STATUS BADGES */
        .status-badge {
            padding: 0.5rem 1.5rem;
            border-radius: 100px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .status-pending { background: rgba(251, 146, 60, 0.15); color: #FB923C; border: 1px solid rgba(251, 146, 60, 0.3); }
        .status-disetujui { background: rgba(34, 197, 94, 0.15); color: #22C55E; border: 1px solid rgba(34, 197, 94, 0.3); }
        .status-dikerjakan { background: rgba(59, 130, 246, 0.15); color: #3B82F6; border: 1px solid rgba(59, 130, 246, 0.3); }
        .status-selesai { background: rgba(168, 85, 247, 0.15); color: #A855F7; border: 1px solid rgba(168, 85, 247, 0.3); }
        .status-ditolak { background: rgba(239, 68, 68, 0.15); color: #EF4444; border: 1px solid rgba(239, 68, 68, 0.3); }
        
        /* INFO CARDS */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
            background: rgba(26, 20, 26, 0.4);
            border-radius: 20px;
            border: 1px solid rgba(254, 127, 66, 0.1);
            margin-bottom: 2rem;
        }
        
        .info-item {
            padding: 1.5rem;
            background: rgba(26, 20, 26, 0.6);
            border-radius: 16px;
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }
        
        .info-item:hover {
            background: rgba(26, 20, 26, 0.8);
            transform: translateY(-2px);
            border-left-color: var(--primary-dark);
        }
        
        .info-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary);
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .info-value {
            font-size: 18px;
            font-weight: 700;
            color: white;
        }
        
        /* BRIEF CONTAINER */
        .brief-container {
            position: relative;
            padding: 2.5rem;
            background: rgba(26, 20, 26, 0.4);
            border-radius: 20px;
            border: 1px solid rgba(254, 127, 66, 0.1);
            margin-bottom: 2rem;
        }
        
        .brief-container::before {
            content: '"';
            position: absolute;
            top: 1rem;
            left: 1.5rem;
            font-size: 5rem;
            color: rgba(254, 127, 66, 0.2);
            font-family: serif;
            font-weight: bold;
        }
        
        .brief-text {
            font-size: 16px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
            font-style: normal;
            position: relative;
            z-index: 1;
            padding-left: 1rem;
        }
        
        /* IMAGE PREVIEW */
        .image-preview-container {
            padding: 2rem;
            background: rgba(26, 20, 26, 0.4);
            border-radius: 20px;
            border: 1px solid rgba(254, 127, 66, 0.1);
            margin-top: 2rem;
        }
        
        .preview-image {
            width: 160px;
            height: 160px;
            border-radius: 16px;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .preview-image:hover {
            border-color: var(--primary);
            transform: scale(1.05);
        }
        
        .preview-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }
        
        .preview-image:hover img {
            transform: scale(1.1);
        }
        
        /* MODAL STYLING */
        #imageModal {
            background: rgba(26, 20, 26, 0.98);
            backdrop-filter: blur(20px);
            display: none;
        }
        
        #imageModal.active {
            display: flex !important;
            animation: modalFadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        #modalImg {
            max-width: 90vw;
            max-height: 85vh;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 16px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(254, 127, 66, 0.2);
            animation: imgZoomIn 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        @keyframes imgZoomIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .modal-close-btn {
            background: rgba(254, 127, 66, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(254, 127, 66, 0.3);
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        
        .modal-close-btn:hover {
            background: rgba(254, 127, 66, 0.4);
            border-color: var(--primary);
            transform: translateY(-2px);
        }
        
        /* BACK BUTTON */
        .btn-back {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .btn-back:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(254, 127, 66, 0.3);
            transform: translateX(-5px);
        }
        
        /* RESPONSIVE */
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
                padding: 1.5rem;
            }
            
            .brief-container {
                padding: 2rem 1.5rem;
            }
            
            #modalImg {
                max-width: 95vw;
                max-height: 80vh;
            }
        }
    </style>
</head>

<body class="p-6 md:p-12">
    <div class="max-w-5xl mx-auto">
        <!-- HEADER -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
            <div>
                <a href="index.php" class="btn-back inline-flex items-center gap-3 px-6 py-3 rounded-2xl mb-4">
                    <i data-lucide="arrow-left" class="w-5 h-5"></i>
                    <span class="text-sm font-semibold">Kembali ke Dashboard</span>
                </a>
                <h1 class="text-3xl md:text-4xl font-black uppercase tracking-tight">
                    Edit <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-500">Project Brief</span>
                </h1>
                <p class="text-gray-400 mt-2">Kelola status dan catatan untuk proyek ini</p>
            </div>
            
            <div class="text-right">
                <div class="info-label">
                    <i data-lucide="hash" class="w-4 h-4"></i>
                    PROJECT ID
                </div>
                <div class="text-2xl font-black font-mono">#<?= str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?></div>
            </div>
        </div>

        <!-- INFO GRID -->
        <div class="info-grid">
            <div class="info-item">
                <div class="info-label">
                    <i data-lucide="user" class="w-4 h-4"></i>
                    NAMA KLIEN
                </div>
                <div class="info-value"><?= htmlspecialchars($data['nama_klien']) ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">
                    <i data-lucide="mail" class="w-4 h-4"></i>
                    EMAIL
                </div>
                <div class="info-value"><?= htmlspecialchars($data['email_klien']) ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">
                    <i data-lucide="briefcase" class="w-4 h-4"></i>
                    LAYANAN
                </div>
                <div class="info-value"><?= htmlspecialchars($data['jasa_pilihan']) ?></div>
            </div>
            
            <div class="info-item">
                <div class="info-label">
                    <i data-lucide="calendar" class="w-4 h-4"></i>
                    TANGGAL SUBMIT
                </div>
                <div class="info-value"><?= date('d M Y - H:i', strtotime($data['tgl_input'])) ?></div>
            </div>
        </div>

        <!-- BRIEF DETAIL -->
        <div class="brief-container">
            <div class="info-label mb-4">
                <i data-lucide="message-square" class="w-4 h-4"></i>
                BRIEF KEBUTUHAN KLIEN
            </div>
            <p class="brief-text"><?= nl2br(htmlspecialchars($data['kebutuhan_detail'])) ?></p>
        </div>

        <!-- FORM EDIT -->
        <div class="glass-card p-8 md:p-10">
            <form action="update_status.php" method="POST" class="space-y-8">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                
                <!-- CURRENT STATUS -->
                <div class="mb-6">
                    <div class="info-label mb-3">
                        <i data-lucide="activity" class="w-4 h-4"></i>
                        STATUS SAAT INI
                    </div>
                    <?php
                    $statusClass = [
                        'Pending' => 'status-pending',
                        'Disetujui' => 'status-disetujui',
                        'Dalam Pengerjaan' => 'status-dikerjakan',
                        'Selesai' => 'status-selesai',
                        'Ditolak' => 'status-ditolak'
                    ];
                    $currentStatusClass = $statusClass[$data['status']] ?? 'status-pending';
                    ?>
                    <div class="status-badge <?= $currentStatusClass ?>">
                        <i data-lucide="circle" class="w-3 h-3"></i>
                        <?= $data['status'] ?>
                    </div>
                </div>
                
                <!-- UPDATE STATUS -->
                <div>
                    <label class="info-label mb-4 block">
                        <i data-lucide="refresh-cw" class="w-4 h-4"></i>
                        UPDATE STATUS PROYEK
                    </label>
                    <div class="relative">
                        <select name="status" class="custom-select" required>
                            <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                            <option value="Dalam Pengerjaan" <?= $data['status'] == 'Dalam Pengerjaan' ? 'selected' : '' ?>>Dalam Pengerjaan</option>
                            <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                        </select>
                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 pointer-events-none">
                            <i data-lucide="chevron-down" class="w-5 h-5 text-orange-500"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm mt-2">Pilih status baru untuk proyek ini</p>
                </div>

                <!-- ADMIN NOTES -->
                <div>
                    <label class="info-label mb-4 block">
                        <i data-lucide="clipboard" class="w-4 h-4"></i>
                        CATATAN ADMIN (INTERNAL)
                    </label>
                    <textarea name="keterangan_admin" class="custom-textarea w-full" placeholder="Tambahkan catatan progres, timeline, atau instruksi khusus di sini..."><?= htmlspecialchars($data['keterangan_admin']) ?></textarea>
                    <p class="text-gray-400 text-sm mt-2">Catatan ini hanya akan dilihat oleh tim admin</p>
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="pt-6">
                    <button type="submit" name="update_status" class="btn-submit w-full py-4 text-lg font-black">
                        <span class="flex items-center justify-center gap-3">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            SIMPAN PERUBAHAN
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <!-- IMAGE PREVIEW SECTION -->
        <?php if (!empty($data['nama_file'])): ?>
        <div class="image-preview-container">
            <div class="info-label mb-4">
                <i data-lucide="image" class="w-4 h-4"></i>
                REFERENSI GAMBAR
            </div>
            <div class="flex flex-col md:flex-row items-start md:items-center gap-8">
                <div class="flex flex-col items-center">
                    <div class="preview-image group" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')">
                        <img src="../Uploads/<?= $data['nama_file'] ?>" alt="Referensi Gambar">
                        <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity rounded-16 flex items-center justify-center">
                            <i data-lucide="zoom-in" class="w-8 h-8 text-white"></i>
                        </div>
                    </div>
                    <div class="text-gray-400 text-sm mt-3 text-center">Klik untuk memperbesar</div>
                </div>
                
                <div class="flex-1">
                    <div class="text-gray-300 mb-4">
                        Klien telah mengunggah referensi gambar untuk proyek ini.
                    </div>
                    <button type="button" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')" 
                            class="inline-flex items-center gap-2 px-5 py-3 bg-white/5 hover:bg-white/10 rounded-xl transition-all border border-white/10 hover:border-orange-500">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span class="font-semibold">Buka Preview Penuh</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- IMAGE MODAL -->
    <div id="imageModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4" onclick="closePreview()">
        <div class="relative w-full h-full flex items-center justify-center" onclick="event.stopPropagation()">
            <button onclick="closePreview()" class="modal-close-btn absolute top-6 right-6 z-10 text-white flex items-center gap-2">
                <i data-lucide="x" class="w-5 h-5"></i> Tutup
            </button>
            
            <div class="w-full h-full flex items-center justify-center p-4">
                <img id="modalImg" src="" alt="Preview Image" class="max-w-full max-h-full">
            </div>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Image Preview Functions
        function openPreview(imagePath) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImg');
            
            modalImg.src = imagePath;
            modal.classList.remove('hidden');
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closePreview() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 400);
            document.body.style.overflow = 'auto';
        }
        
        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePreview();
            }
        });
        
        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closePreview();
            }
        });
        
        // Form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const select = document.querySelector('select[name="status"]');
            if (!select.value) {
                e.preventDefault();
                select.focus();
                select.style.borderColor = '#EF4444';
                return false;
            }
            return true;
        });
        
        // Add focus effect to form elements
        const formElements = document.querySelectorAll('select, textarea');
        formElements.forEach(el => {
            el.addEventListener('focus', function() {
                this.style.borderColor = '#FE7F42';
                this.style.boxShadow = '0 0 0 3px rgba(254, 127, 66, 0.2)';
            });
            
            el.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>

</html>