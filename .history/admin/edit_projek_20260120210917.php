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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        
        .btn-primary {
            background-color: #3b82f6;
            color: white;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 8px;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
        }
        
        .btn-secondary {
            background-color: white;
            color: #64748b;
            border: 1px solid #e2e8f0;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.2s;
        }
        
        .btn-secondary:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
        }
        
        .form-select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background-color: white;
            color: #374151;
            font-size: 14px;
            transition: all 0.2s;
        }
        
        .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background-color: white;
            color: #374151;
            font-size: 14px;
            line-height: 1.5;
            resize: vertical;
            transition: all 0.2s;
        }
        
        .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .badge-pending { background-color: #fef3c7; color: #92400e; }
        .badge-approved { background-color: #d1fae5; color: #065f46; }
        .badge-progress { background-color: #dbeafe; color: #1e40af; }
        .badge-completed { background-color: #ede9fe; color: #5b21b6; }
        .badge-rejected { background-color: #fee2e2; color: #991b1b; }
        
        .info-item {
            padding: 16px;
            background-color: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        
        .info-label {
            font-size: 12px;
            color: #64748b;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 4px;
        }
        
        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #1e293b;
        }
        
        .brief-box {
            background-color: #f8fafc;
            border-left: 4px solid #3b82f6;
            padding: 20px;
            border-radius: 8px;
            font-style: italic;
            color: #475569;
            line-height: 1.6;
        }
        
        .image-preview {
            width: 120px;
            height: 120px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }
        
        .image-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
        }
        
        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 90vw;
            max-height: 90vh;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">
    <div class="max-w-4xl mx-auto p-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div>
                <a href="index.php" class="btn-secondary inline-flex items-center gap-2">
                    <i data-lucide="arrow-left" class="w-4 h-4"></i>
                    Kembali
                </a>
            </div>
            <div class="text-right">
                <div class="text-sm text-gray-500">Project ID</div>
                <div class="font-mono font-semibold">#<?= str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?></div>
            </div>
        </div>

        <!-- Main Title -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Edit Project</h1>
            <p class="text-gray-600">Kelola status dan informasi proyek</p>
        </div>

        <!-- Client Info -->
        <div class="card p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Klien</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="info-item">
                    <div class="info-label">Nama Klien</div>
                    <div class="info-value"><?= htmlspecialchars($data['nama_klien']) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value"><?= htmlspecialchars($data['email_klien']) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Layanan</div>
                    <div class="info-value"><?= htmlspecialchars($data['jasa_pilihan']) ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">Tanggal Submit</div>
                    <div class="info-value"><?= date('d M Y', strtotime($data['tgl_input'])) ?></div>
                </div>
            </div>
        </div>

        <!-- Brief -->
        <div class="card p-6 mb-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Brief Kebutuhan</h2>
            <div class="brief-box">
                <?= nl2br(htmlspecialchars($data['kebutuhan_detail'])) ?>
            </div>
        </div>

        <!-- Edit Form -->
        <div class="card p-6">
            <form action="update_status.php" method="POST" class="space-y-6">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                
                <!-- Current Status -->
                <div>
                    <h3 class="text-sm font-medium text-gray-900 mb-2">Status Saat Ini</h3>
                    <?php
                    $badgeClass = [
                        'Pending' => 'badge-pending',
                        'Disetujui' => 'badge-approved',
                        'Dalam Pengerjaan' => 'badge-progress',
                        'Selesai' => 'badge-completed',
                        'Ditolak' => 'badge-rejected'
                    ];
                    $currentBadge = $badgeClass[$data['status']] ?? 'badge-pending';
                    ?>
                    <div class="badge <?= $currentBadge ?>">
                        <?= $data['status'] ?>
                    </div>
                </div>
                
                <!-- Update Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Update Status
                    </label>
                    <select name="status" class="form-select" required>
                        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                        <option value="Dalam Pengerjaan" <?= $data['status'] == 'Dalam Pengerjaan' ? 'selected' : '' ?>>Dalam Pengerjaan</option>
                        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                    <p class="text-sm text-gray-500 mt-1">Pilih status baru untuk proyek ini</p>
                </div>
                
                <!-- Admin Notes -->
                <div>
                    <label class="block text-sm font-medium text-gray-900 mb-2">
                        Catatan Admin
                    </label>
                    <textarea name="keterangan_admin" rows="4" class="form-textarea" 
                              placeholder="Tambahkan catatan internal..."><?= htmlspecialchars($data['keterangan_admin']) ?></textarea>
                    <p class="text-sm text-gray-500 mt-1">Catatan hanya untuk tim internal</p>
                </div>
                
                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" name="update_status" class="btn-primary w-full">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Image Preview -->
        <?php if (!empty($data['nama_file'])): ?>
        <div class="card p-6 mt-6">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Referensi Gambar</h2>
            <div class="flex items-start gap-4">
                <div class="image-preview cursor-pointer" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')">
                    <img src="../Uploads/<?= $data['nama_file'] ?>" alt="Referensi">
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-600 mb-3">Klien telah mengirim referensi gambar untuk proyek ini.</p>
                    <button type="button" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')" 
                            class="btn-secondary inline-flex items-center gap-2">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        Lihat Gambar
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 modal-backdrop" onclick="closePreview()">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="p-4 border-b border-gray-200 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Preview Gambar</h3>
                <button onclick="closePreview()" class="text-gray-500 hover:text-gray-700">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <div class="p-4">
                <img id="modalImg" src="" alt="" class="max-w-full max-h-[70vh] mx-auto">
            </div>
        </div>
    </div>

    <script>
        // Initialize icons
        lucide.createIcons();
        
        // Image modal functions
        function openPreview(imagePath) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImg');
            
            modalImg.src = imagePath;
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closePreview() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Close modal with ESC
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closePreview();
        });
        
        // Close modal on backdrop click
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this) closePreview();
        });
    </script>
</body>

</html>