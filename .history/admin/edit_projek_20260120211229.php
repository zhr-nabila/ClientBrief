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

// Status mapping untuk styling
$statusColors = [
    'Pending' => 'bg-orange-100 text-orange-800 border-orange-200',
    'Disetujui' => 'bg-green-100 text-green-800 border-green-200',
    'Dalam Pengerjaan' => 'bg-blue-100 text-blue-800 border-blue-200',
    'Selesai' => 'bg-purple-100 text-purple-800 border-purple-200',
    'Ditolak' => 'bg-red-100 text-red-800 border-red-200'
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Project | Admin ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }
        
        body {
            background-color: #f8fafc;
        }
        
        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(226, 232, 240, 0.8);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
        }
        
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364758b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px;
        }
        
        .modal-overlay {
            background-color: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(4px);
        }
        
        .text-primary {
            color: #7c3aed;
        }
        
        .bg-primary {
            background-color: #7c3aed;
        }
        
        .hover\:bg-primary:hover {
            background-color: #6d28d9;
        }
        
        .border-primary {
            border-color: #7c3aed;
        }
    </style>
</head>

<body class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="index.php" class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                            <i data-lucide="briefcase" class="w-4 h-4 text-white"></i>
                        </div>
                        <span class="text-xl font-semibold text-gray-900">ClientBrief</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="index.php" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Edit Project</h1>
            <p class="text-gray-600 mt-2">Update project details and status</p>
        </div>

        <!-- Client Information Card -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Client Information</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                            <i data-lucide="user" class="w-5 h-5 text-purple-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Client Name</p>
                            <p class="font-medium text-gray-900"><?= htmlspecialchars($data['nama_klien']) ?></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-100 to-cyan-100 flex items-center justify-center">
                            <i data-lucide="mail" class="w-5 h-5 text-blue-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium text-gray-900"><?= htmlspecialchars($data['email_klien']) ?></p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-100 to-emerald-100 flex items-center justify-center">
                            <i data-lucide="briefcase" class="w-5 h-5 text-green-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Service</p>
                            <p class="font-medium text-gray-900"><?= htmlspecialchars($data['jasa_pilihan']) ?></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-orange-100 to-amber-100 flex items-center justify-center">
                            <i data-lucide="calendar" class="w-5 h-5 text-orange-600"></i>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Submitted</p>
                            <p class="font-medium text-gray-900"><?= date('F j, Y', strtotime($data['tgl_input'])) ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Details Card -->
        <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Project Details</h3>
                <div class="flex items-center space-x-2">
                    <span class="px-3 py-1 rounded-full text-xs font-medium border <?= $statusColors[$data['status']] ?? 'bg-gray-100 text-gray-800 border-gray-200' ?>">
                        <?= $data['status'] ?>
                    </span>
                    <span class="text-sm text-gray-500 font-mono">#<?= str_pad($data['id'], 4, '0', STR_PAD_LEFT) ?></span>
                </div>
            </div>
            
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Project Brief</label>
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                    <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($data['kebutuhan_detail'])) ?></p>
                </div>
            </div>

            <?php if (!empty($data['nama_file'])): ?>
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Reference Image</label>
                <div class="flex items-center space-x-4">
                    <div class="relative group cursor-pointer" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')">
                        <div class="w-32 h-32 rounded-lg overflow-hidden border border-gray-200 group-hover:border-purple-500 transition-colors">
                            <img src="../Uploads/<?= $data['nama_file'] ?>" alt="Reference" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                            <i data-lucide="zoom-in" class="w-6 h-6 text-white"></i>
                        </div>
                    </div>
                    <button type="button" onclick="openPreview('../Uploads/<?= $data['nama_file'] ?>')" class="px-4 py-2 text-sm font-medium text-purple-600 hover:text-purple-700 flex items-center space-x-2">
                        <i data-lucide="external-link" class="w-4 h-4"></i>
                        <span>View Full Image</span>
                    </button>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Update Form Card -->
        <form action="update_status.php" method="POST" class="bg-white rounded-xl border border-gray-200 p-6">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            
            <h3 class="text-lg font-semibold text-gray-900 mb-6">Update Project Status</h3>
            
            <div class="space-y-6">
                <!-- Status Selection -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="relative">
                        <select id="status" name="status" class="custom-select w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition-colors text-gray-900">
                            <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Approved</option>
                            <option value="Dalam Pengerjaan" <?= $data['status'] == 'Dalam Pengerjaan' ? 'selected' : '' ?>>In Progress</option>
                            <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Completed</option>
                            <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Rejected</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </div>
                </div>

                <!-- Admin Notes -->
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                    <textarea id="notes" name="keterangan_admin" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition-colors resize-none" placeholder="Add internal notes or instructions..."><?= htmlspecialchars($data['keterangan_admin']) ?></textarea>
                    <p class="text-xs text-gray-500 mt-2">These notes are only visible to admin team</p>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" name="update_status" class="w-full px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white font-medium rounded-lg hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all duration-200 flex items-center justify-center space-x-2">
                        <i data-lucide="save" class="w-4 h-4"></i>
                        <span>Save Changes</span>
                    </button>
                </div>
            </div>
        </form>
    </main>

    <!-- Image Preview Modal -->
    <div id="imageModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="modal-overlay absolute inset-0" onclick="closePreview()"></div>
        <div class="relative z-10 max-w-4xl w-full" onclick="event.stopPropagation()">
            <div class="bg-white rounded-xl overflow-hidden shadow-2xl">
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Image Preview</h3>
                    <button onclick="closePreview()" class="p-2 hover:bg-gray-100 rounded-lg transition-colors">
                        <i data-lucide="x" class="w-5 h-5 text-gray-500"></i>
                    </button>
                </div>
                <div class="p-2">
                    <img id="modalImg" src="" alt="Preview" class="w-full h-auto rounded-lg">
                </div>
                <div class="p-4 border-t border-gray-200 bg-gray-50 flex justify-end">
                    <button onclick="closePreview()" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                        Close Preview
                    </button>
                </div>
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
            document.body.style.overflow = 'hidden';
        }
        
        function closePreview() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') closePreview();
        });
        
        // Close modal when clicking outside
        document.getElementById('imageModal').addEventListener('click', function(e) {
            if (e.target === this || e.target.classList.contains('modal-overlay')) {
                closePreview();
            }
        });
        
        // Form submission feedback
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const button = this.querySelector('button[type="submit"]');
            const originalText = button.innerHTML;
            
            button.disabled = true;
            button.innerHTML = `
                <i data-lucide="loader" class="w-4 h-4 animate-spin"></i>
                <span>Saving...</span>
            `;
            lucide.createIcons();
            
            // Re-enable after 3 seconds if still on page
            setTimeout(() => {
                button.disabled = false;
                button.innerHTML = originalText;
                lucide.createIcons();
            }, 3000);
        });
    </script>
</body>

</html>