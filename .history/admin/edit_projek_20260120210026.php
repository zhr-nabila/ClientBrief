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

// Status options dengan warna yang sesuai
$status_options = [
    'Pending' => 'bg-orange-500/10 text-orange-500',
    'Disetujui' => 'bg-green-500/10 text-green-500',
    'Dalam Pengerjaan' => 'bg-blue-500/10 text-blue-500',
    'Selesai' => 'bg-purple-500/10 text-purple-500',
    'Ditolak' => 'bg-red-500/10 text-red-500'
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Project | ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Custom styles untuk edit page */
        .status-badge {
            <?php echo $status_options[$data['status']] ?? 'bg-gray-500/10 text-gray-500'; ?>
        }
    </style>
</head>

<body class="p-6 md:p-12">
    <div class="max-w-4xl mx-auto">
        <!-- Header dengan tombol back -->
        <div class="flex items-center justify-between mb-10">
            <a href="index.php" class="inline-flex items-center gap-3 px-6 py-3 bg-white/5 hover:bg-white/10 rounded-2xl transition-all group">
                <i data-lucide="arrow-left" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
                <span class="text-sm font-semibold">Kembali ke Dashboard</span>
            </a>
            
            <div class="text-right">
                <div class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Project ID</div>
                <div class="text-lg font-mono font-bold">#<?= str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?></div>
            </div>
        </div>

        <!-- Main Title -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-black mb-4 uppercase tracking-tighter">
                Kelola <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-500">Project</span>
            </h1>
            <p class="text-gray-400 text-lg">Edit status dan tambahkan catatan untuk project ini</p>
        </div>

        <!-- Informasi Klien dalam Grid Card -->
        <div class="project-info-grid mb-10">
            <div class="info-item">
                <div class="info-label">Nama Klien</div>
                <div class="info-value flex items-center gap-3">
                    <i data-lucide="user" class="w-5 h-5 text-orange-500"></i>
                    <?= htmlspecialchars($data['nama_klien']) ?>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Email</div>
                <div class="info-value flex items-center gap-3">
                    <i data-lucide="mail" class="w-5 h-5 text-blue-500"></i>
                    <?= htmlspecialchars($data['email_klien']) ?>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Layanan</div>
                <div class="info-value flex items-center gap-3">
                    <i data-lucide="briefcase" class="w-5 h-5 text-purple-500"></i>
                    <?= htmlspecialchars($data['jasa_pilihan']) ?>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-label">Tanggal Submit</div>
                <div class="info-value flex items-center gap-3">
                    <i data-lucide="calendar" class="w-5 h-5 text-green-500"></i>
                    <?= date('d M Y H:i', strtotime($data['tgl_input'])) ?>
                </div>
            </div>
        </div>

        <!-- Brief Kebutuhan -->
        <div class="brief-container mb-10">
            <div class="info-label mb-4">Brief Kebutuhan Klien</div>
            <p class="brief-text"><?= nl2br(htmlspecialchars($data['kebutuhan_detail'])) ?></p>
        </div>

        <!-- Form Edit -->
        <div class="edit-project-card p-8 md:p-10">
            <form action="update_status.php" method="POST" class="space-y-8">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                
                <!-- Status Saat Ini -->
                <div class="mb-6">
                    <div class="info-label mb-3">Status Saat Ini</div>
                    <div class="inline-flex items-center gap-3 px-6 py-3 rounded-2xl status-badge">
                        <i data-lucide="activity" class="w-5 h-5"></i>
                        <span class="font-black uppercase tracking-tighter text-sm"><?= $data['status'] ?></span>
                    </div>
                </div>
                
                <!-- Update Status -->
                <div>
                    <label class="info-label mb-4 block">Update Status Proyek</label>
                    <div class="relative">
                        <select name="status" class="w-full" required>
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
                    <p class="text-gray-400 text-xs mt-2">Pilih status baru untuk project ini</p>
                </div>

                <!-- Catatan Admin -->
                <div>
                    <label class="info-label mb-4 block">Catatan Admin (Internal)</label>
                    <textarea name="keterangan_admin" rows="5" class="w-full" placeholder="Tambahkan catatan progres, timeline, atau instruksi khusus di sini..."><?= htmlspecialchars($data['keterangan_admin']) ?></textarea>
                    <p class="text-gray-400 text-xs mt-2">Catatan ini hanya akan dilihat oleh admin</p>
                </div>

                <!-- Tombol Submit -->
                <div class="pt-6">
                    <button type="submit" name="update_status" class="w-full py-4 rounded-2xl text-lg font-black uppercase tracking-wider transition-all duration-300 hover:scale-[1.02] active:scale-[0.98]">
                        <span class="flex items-center justify-center gap-3">
                            <i data-lucide="save" class="w-5 h-5"></i>
                            Simpan Perubahan
                        </span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Preview Gambar Referensi -->
        <?php if (!empty($data['nama_file'])): ?>
        <div class="mt-10 edit-project-card p-8">
            <div class="info-label mb-4">Referensi Gambar</div>
            <div class="flex flex-col md:flex-row items-center gap-6">
                <div class="relative group cursor-pointer" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')">
                    <div class="w-40 h-40 rounded-2xl overflow-hidden border-2 border-white/10 group-hover:border-orange-500 transition-all">
                        <img src="../Uploads/<?= $data['nama_file'] ?>" alt="Referensi" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl flex items-center justify-center">
                        <i data-lucide="zoom-in" class="w-8 h-8 text-white"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="text-sm text-gray-400 mb-2">Klik gambar untuk melihat ukuran penuh</div>
                    <button type="button" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white/5 hover:bg-white/10 rounded-xl transition-all">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span class="text-sm font-semibold">Buka Preview Penuh</span>
                    </button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!-- Modal untuk Preview Gambar -->
    <div id="imageModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4" onclick="closePreview()">
        <div class="relative max-w-6xl w-full h-full flex flex-col items-center justify-center" onclick="event.stopPropagation()">
            <button onclick="closePreview()" class="absolute top-4 right-4 z-10 px-4 py-2 bg-black/50 hover:bg-black/80 backdrop-blur-sm rounded-xl text-white transition-all flex items-center gap-2 font-semibold">
                <i data-lucide="x" class="w-5 h-5"></i> Tutup
            </button>
            
            <!-- Navigation Controls -->
            <button onclick="zoomIn()" class="absolute bottom-4 right-20 z-10 px-4 py-2 bg-black/50 hover:bg-black/80 backdrop-blur-sm rounded-xl text-white transition-all">
                <i data-lucide="zoom-in" class="w-5 h-5"></i>
            </button>
            <button onclick="zoomOut()" class="absolute bottom-4 right-4 z-10 px-4 py-2 bg-black/50 hover:bg-black/80 backdrop-blur-sm rounded-xl text-white transition-all">
                <i data-lucide="zoom-out" class="w-5 h-5"></i>
            </button>
            
            <div class="w-full h-full flex items-center justify-center">
                <img id="modalImg" src="" class="max-w-full max-h-full object-contain rounded-lg">
            </div>
            
            <!-- Loading Indicator -->
            <div id="loadingIndicator" class="absolute inset-0 flex items-center justify-center bg-black/50 hidden">
                <div class="w-12 h-12 border-4 border-orange-500 border-t-transparent rounded-full animate-spin"></div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk preview gambar
        let currentZoom = 1;
        
        function openPreview(imagePath) {
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImg');
            const loadingIndicator = document.getElementById('loadingIndicator');
            
            // Reset zoom
            currentZoom = 1;
            modalImg.style.transform = 'scale(1)';
            
            // Tampilkan loading
            loadingIndicator.classList.remove('hidden');
            
            // Set gambar
            modalImg.src = imagePath;
            
            // Sembunyikan loading setelah gambar dimuat
            modalImg.onload = function() {
                loadingIndicator.classList.add('hidden');
                modal.classList.remove('hidden');
                modal.classList.add('active');
                document.body.style.overflow = 'hidden';
            };
            
            // Handle error
            modalImg.onerror = function() {
                loadingIndicator.classList.add('hidden');
                alert('Gagal memuat gambar');
            };
        }
        
        function closePreview() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 400);
            document.body.style.overflow = 'auto';
        }
        
        function zoomIn() {
            currentZoom = Math.min(currentZoom + 0.25, 3);
            document.getElementById('modalImg').style.transform = `scale(${currentZoom})`;
        }
        
        function zoomOut() {
            currentZoom = Math.max(currentZoom - 0.25, 0.5);
            document.getElementById('modalImg').style.transform = `scale(${currentZoom})`;
        }
        
        // Close modal dengan ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closePreview();
            }
        });
        
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>

</html>