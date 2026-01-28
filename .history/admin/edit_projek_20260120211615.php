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

$statusColors = [
    'Pending' => 'text-orange-500 bg-orange-50 border-orange-200',
    'Disetujui' => 'text-green-500 bg-green-50 border-green-200',
    'Dalam Pengerjaan' => 'text-blue-500 bg-blue-50 border-blue-200',
    'Selesai' => 'text-purple-500 bg-purple-50 border-purple-200',
    'Ditolak' => 'text-red-500 bg-red-50 border-red-200'
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Project | ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        :root {
            --primary: #FE7F42;
            --primary-dark: #B32C1A;
        }
        
        body {
            background-color: #f8fafc;
            color: #1e293b;
        }
        
        .glass-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
        }
        
        select.custom-select {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            color: #334155;
            background-color: white;
            transition: all 0.2s;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364758b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        
        select.custom-select:hover {
            border-color: #94a3b8;
        }
        
        select.custom-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(254, 127, 66, 0.1);
        }
        
        textarea.custom-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            color: #334155;
            background-color: white;
            transition: all 0.2s;
            min-height: 120px;
            resize: vertical;
            line-height: 1.5;
        }
        
        textarea.custom-textarea:hover {
            border-color: #94a3b8;
        }
        
        textarea.custom-textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(254, 127, 66, 0.1);
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            padding: 14px 24px;
            border-radius: 10px;
            transition: all 0.2s;
            border: none;
            width: 100%;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(254, 127, 66, 0.2);
        }
        
        .btn-primary:active {
            transform: translateY(0);
        }
        
        .btn-secondary {
            background-color: white;
            color: #475569;
            font-weight: 600;
            padding: 12px 20px;
            border-radius: 10px;
            transition: all 0.2s;
            border: 1px solid #cbd5e1;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-secondary:hover {
            background-color: #f1f5f9;
            border-color: #94a3b8;
        }
        
        .info-item {
            padding: 20px;
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            transition: all 0.2s;
        }
        
        .info-item:hover {
            border-color: var(--primary);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .info-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .info-value {
            font-size: 16px;
            color: #1e293b;
            font-weight: 600;
        }
        
        .brief-box {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            position: relative;
        }
        
        .brief-box::before {
            content: '"';
            position: absolute;
            top: 12px;
            left: 16px;
            font-size: 48px;
            color: #f1f5f9;
            font-family: serif;
            font-weight: bold;
            line-height: 1;
        }
        
        .brief-text {
            color: #475569;
            line-height: 1.6;
            position: relative;
            z-index: 1;
            font-size: 15px;
        }
        
        .image-preview {
            width: 140px;
            height: 140px;
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid #e2e8f0;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .image-preview:hover {
            border-color: var(--primary);
            transform: scale(1.02);
        }
        
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 20px;
        }
        
        .modal-overlay.active {
            display: flex;
            animation: fadeIn 0.2s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .modal-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
        }
        
        .modal-img {
            max-width: 100%;
            max-height: 90vh;
            border-radius: 12px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        
        .modal-close {
            position: absolute;
            top: -40px;
            right: 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .modal-close:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="max-w-4xl mx-auto p-6 md:p-8">
        <!-- Header -->
        <div class="mb-8">
            <a href="index.php" class="btn-secondary mb-6 inline-block">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali ke Dashboard
            </a>
            
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Edit Project Brief</h1>
                    <p class="text-gray-600 mt-1">Kelola status dan informasi project</p>
                </div>
                <div class="text-right">
                    <div class="text-sm text-gray-500 font-medium">Project ID</div>
                    <div class="text-lg font-bold text-gray-900">#<?= str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?></div>
                </div>
            </div>
        </div>

        <!-- Client Information Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
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
                    TANGGAL
                </div>
                <div class="info-value"><?= date('d M Y, H:i', strtotime($data['tgl_input'])) ?></div>
            </div>
        </div>

        <!-- Brief Section -->
        <div class="brief-box mb-8">
            <div class="info-label mb-4">
                <i data-lucide="message-square" class="w-4 h-4"></i>
                BRIEF KLIEN
            </div>
            <div class="brief-text"><?= nl2br(htmlspecialchars($data['kebutuhan_detail'])) ?></div>
        </div>

        <!-- Current Status -->
        <div class="glass-card p-6 mb-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="info-label mb-0">STATUS SAAT INI</div>
                <div class="status-badge <?= $statusColors[$data['status']] ?? 'text-gray-500 bg-gray-50 border-gray-200' ?>">
                    <i data-lucide="circle" class="w-2 h-2"></i>
                    <?= $data['status'] ?>
                </div>
            </div>
            <p class="text-sm text-gray-600">Terakhir diperbarui: <?= date('d M Y', strtotime($data['tgl_input'])) ?></p>
        </div>

        <!-- Edit Form -->
        <div class="glass-card p-6 md:p-8">
            <form action="update_status.php" method="POST" class="space-y-6">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                
                <!-- Status Update -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Ubah Status Project
                    </label>
                    <select name="status" class="custom-select" required>
                        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                        <option value="Dalam Pengerjaan" <?= $data['status'] == 'Dalam Pengerjaan' ? 'selected' : '' ?>>Dalam Pengerjaan</option>
                        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                </div>

                <!-- Admin Notes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Catatan Admin
                    </label>
                    <textarea 
                        name="keterangan_admin" 
                        class="custom-textarea" 
                        placeholder="Tambahkan catatan internal untuk project ini..."
                    ><?= htmlspecialchars($data['keterangan_admin']) ?></textarea>
                    <p class="text-sm text-gray-500 mt-2">Hanya dapat dilihat oleh tim admin</p>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="update_status" class="btn-primary">
                    <div class="flex items-center justify-center gap-2">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        Simpan Perubahan
                    </div>
                </button>
            </form>
        </div>

        <!-- Image Preview (if exists) -->
        <?php if (!empty($data['nama_file'])): ?>
        <div class="glass-card p-6 mt-8">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                <div>
                    <div class="info-label mb-3">
                        <i data-lucide="image" class="w-4 h-4"></i>
                        REFERENSI GAMBAR
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Klien telah mengunggah file referensi</p>
                    
                    <div class="flex items-center gap-4">
                        <div class="image-preview" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')">
                            <img src="../Uploads/<?= $data['nama_file'] ?>" alt="Referensi">
                        </div>
                        
                        <button 
                            type="button" 
                            onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')"
                            class="btn-secondary"
                        >
                            <i data-lucide="zoom-in" class="w-4 h-4"></i>
                            Lihat Full Size
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="modal-overlay" onclick="closePreview()">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button onclick="closePreview()" class="modal-close">
                <i data-lucide="x" class="w-4 h-4"></i>
                Tutup
            </button>
            <img id="modalImg" class="modal-img" src="" alt="">
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
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closePreview() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePreview();
            }
        });
        
        // Form validation and styling
        document.querySelector('form').addEventListener('submit', function(e) {
            const select = document.querySelector('select[name="status"]');
            if (!select.value) {
                e.preventDefault();
                select.focus();
                select.style.borderColor = '#ef4444';
                setTimeout(() => {
                    select.style.borderColor = '#cbd5e1';
                }, 1000);
                return false;
            }
            return true;
        });
        
        // Add focus effects to form elements
        const formElements = document.querySelectorAll('.custom-select, .custom-textarea');
        formElements.forEach(el => {
            el.addEventListener('focus', function() {
                this.style.borderColor = '#FE7F42';
                this.style.boxShadow = '0 0 0 3px rgba(254, 127, 66, 0.1)';
            });
            
            el.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
                if (!this.value) {
                    this.style.borderColor = '#cbd5e1';
                }
            });
        });
        
        // Smooth hover effects for info items
        const infoItems = document.querySelectorAll('.info-item');
        infoItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-2px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>

</html>