<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include '../koneksi.php';

// Handle status update
if (isset($_GET['update_status'])) {
    $id = intval($_GET['id']);
    $status = $_GET['status'];
    
    $update_sql = "UPDATE tb_projek SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $update_sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    mysqli_stmt_execute($stmt);
    
    header("Location: index.php?updated=1");
    exit();
}

// Handle delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    // Get file name before deleting
    $file_query = "SELECT nama_file FROM tb_projek WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $file_query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $project = mysqli_fetch_assoc($result);
    
    // Delete file if exists
    if ($project['nama_file']) {
        $file_path = "../uploads/" . $project['nama_file'];
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }
    
    // Delete from database
    $delete_sql = "DELETE FROM tb_projek WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $delete_sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    
    header("Location: index.php?deleted=1");
    exit();
}

// Get filter parameters
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';
$search_query = isset($_GET['search']) ? $_GET['search'] : '';

// Build query
$sql = "SELECT * FROM tb_projek WHERE 1=1";

if (!empty($status_filter)) {
    $sql .= " AND status = '" . mysqli_real_escape_string($koneksi, $status_filter) . "'";
}

if (!empty($search_query)) {
    $search_term = mysqli_real_escape_string($koneksi, $search_query);
    $sql .= " AND (nama_klien LIKE '%$search_term%' OR email_klien LIKE '%$search_term%' OR jasa_pilihan LIKE '%$search_term%')";
}

$sql .= " ORDER BY tgl_input DESC";

$result = mysqli_query($koneksi, $sql);
$total_projects = mysqli_num_rows($result);

// Get statistics
$stats_sql = "SELECT 
    status,
    COUNT(*) as count,
    COUNT(CASE WHEN DATE(tgl_input) = CURDATE() THEN 1 END) as today_count
    FROM tb_projek 
    GROUP BY status";
$stats_result = mysqli_query($koneksi, $stats_sql);
$stats = [];
$total_today = 0;

while ($row = mysqli_fetch_assoc($stats_result)) {
    $stats[$row['status']] = $row['count'];
    $total_today += $row['today_count'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Z-STUDIO</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }
        
        .sidebar {
            width: 280px;
            background: #0f172a;
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            transition: all 0.3s;
        }
        
        .main-content {
            margin-left: 280px;
            padding: 30px;
            min-height: 100vh;
            transition: all 0.3s;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }
        
        .status-disetujui {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-dalam-pengerjaan {
            background: #dbeafe;
            color: #1e40af;
        }
        
        .status-selesai {
            background: #dcfce7;
            color: #166534;
        }
        
        .status-ditolak {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .project-row:hover {
            background: #f1f5f9;
        }
    </style>
    
    <script>
        // Initialize Tailwind
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2563eb',
                        secondary: '#7c3aed',
                        accent: '#10b981',
                        dark: '#0f172a'
                    }
                }
            }
        }
    </script>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-lg flex items-center justify-center text-white font-bold text-xl">
                    Z
                </div>
                <div>
                    <h1 class="text-xl font-bold">Z-STUDIO</h1>
                    <p class="text-gray-400 text-sm">Admin Panel</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="p-6">
            <ul class="space-y-2">
                <li>
                    <a href="index.php" class="flex items-center gap-3 p-3 bg-primary text-white rounded-lg">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../index.php" target="_blank" class="flex items-center gap-3 p-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition">
                        <i class="fas fa-external-link-alt"></i>
                        <span>Lihat Website</span>
                    </a>
                </li>
                <li>
                    <a href="export_excel.php" class="flex items-center gap-3 p-3 text-gray-400 hover:text-white hover:bg-gray-800 rounded-lg transition">
                        <i class="fas fa-file-excel"></i>
                        <span>Export Excel</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php" class="flex items-center gap-3 p-3 text-red-400 hover:text-red-300 hover:bg-red-900/20 rounded-lg transition">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        
        <!-- Stats -->
        <div class="p-6 border-t border-gray-800">
            <h3 class="text-sm font-semibold text-gray-400 mb-4">STATISTIK</h3>
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Total Projek</span>
                        <span class="font-semibold"><?php echo $total_projects; ?></span>
                    </div>
                    <div class="h-1 bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Hari Ini</span>
                        <span class="font-semibold"><?php echo $total_today; ?></span>
                    </div>
                    <div class="h-1 bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full bg-accent rounded-full" style="width: <?php echo min(100, ($total_today / max($total_projects, 1)) * 100); ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu Button -->
    <button onclick="toggleSidebar()" class="md:hidden fixed top-4 left-4 z-50 p-2 bg-primary text-white rounded-lg">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
                <p class="text-gray-600">Kelola brief proyek dari klien</p>
            </div>
            <div class="text-sm text-gray-500">
                <?php echo date('l, d F Y'); ?>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-blue-50 rounded-lg">
                        <i class="fas fa-inbox text-blue-500 text-xl"></i>
                    </div>
                    <span class="text-sm text-gray-500">Total</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $total_projects; ?></h3>
                <p class="text-gray-600 text-sm">Brief Projek</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-yellow-50 rounded-lg">
                        <i class="fas fa-clock text-yellow-500 text-xl"></i>
                    </div>
                    <span class="text-sm text-gray-500">Pending</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $stats['Pending'] ?? 0; ?></h3>
                <p class="text-gray-600 text-sm">Perlu Diproses</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-green-50 rounded-lg">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <span class="text-sm text-gray-500">Selesai</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $stats['Selesai'] ?? 0; ?></h3>
                <p class="text-gray-600 text-sm">Proyek Selesai</p>
            </div>
            
            <div class="bg-white rounded-xl p-6 shadow border border-gray-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="p-3 bg-purple-50 rounded-lg">
                        <i class="fas fa-chart-line text-purple-500 text-xl"></i>
                    </div>
                    <span class="text-sm text-gray-500">Proses</span>
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $stats['Dalam Pengerjaan'] ?? 0; ?></h3>
                <p class="text-gray-600 text-sm">Dalam Pengerjaan</p>
            </div>
        </div>
        
        <!-- Filters and Actions -->
        <div class="bg-white rounded-xl p-6 shadow border border-gray-200 mb-8">
            <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
                <!-- Search -->
                <div class="flex-1 w-full">
                    <form method="GET" class="flex gap-2">
                        <div class="flex-1 relative">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            <input type="text" 
                                   name="search" 
                                   placeholder="Cari berdasarkan nama, email, atau layanan..."
                                   value="<?php echo htmlspecialchars($search_query); ?>"
                                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg hover:bg-blue-700 transition">
                            Cari
                        </button>
                        <?php if (!empty($search_query)): ?>
                        <a href="index.php" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                            Reset
                        </a>
                        <?php endif; ?>
                    </form>
                </div>
                
                <!-- Status Filter -->
                <div class="flex gap-2">
                    <a href="index.php" 
                       class="px-4 py-2 rounded-lg <?php echo empty($status_filter) ? 'bg-primary text-white' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'; ?>">
                        Semua
                    </a>
                    <a href="index.php?status=Pending" 
                       class="px-4 py-2 rounded-lg <?php echo $status_filter == 'Pending' ? 'bg-yellow-100 text-yellow-800 border border-yellow-300' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'; ?>">
                        Pending
                    </a>
                    <a href="index.php?status=Disetujui" 
                       class="px-4 py-2 rounded-lg <?php echo $status_filter == 'Disetujui' ? 'bg-blue-100 text-blue-800 border border-blue-300' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'; ?>">
                        Disetujui
                    </a>
                    <a href="index.php?status=Dalam%20Pengerjaan" 
                       class="px-4 py-2 rounded-lg <?php echo $status_filter == 'Dalam Pengerjaan' ? 'bg-purple-100 text-purple-800 border border-purple-300' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'; ?>">
                        Diproses
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Projects Table -->
        <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden">
            <!-- Table Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-semibold text-gray-800">Brief Projek Masuk</h2>
                <p class="text-sm text-gray-600">Total: <?php echo $total_projects; ?> proyek</p>
            </div>
            
            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Klien</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Layanan</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php if ($total_projects == 0): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                                <p class="text-lg">Belum ada brief yang masuk</p>
                                <p class="text-sm">Saat klien mengisi form, data akan muncul di sini</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                        
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr class="project-row hover:bg-gray-50 transition">
                            <!-- Client Info -->
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900"><?php echo htmlspecialchars($row['nama_klien']); ?></div>
                                <div class="text-sm text-gray-500"><?php echo htmlspecialchars($row['email_klien']); ?></div>
                                <?php if ($row['no_telepon']): ?>
                                <div class="text-xs text-gray-400"><?php echo htmlspecialchars($row['no_telepon']); ?></div>
                                <?php endif; ?>
                            </td>
                            
                            <!-- Service -->
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm bg-blue-50 text-blue-700">
                                    <i class="fas fa-tag text-xs"></i>
                                    <?php echo htmlspecialchars($row['jasa_pilihan']); ?>
                                </span>
                            </td>
                            
                            <!-- Date -->
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900"><?php echo date('d M Y', strtotime($row['tgl_input'])); ?></div>
                                <div class="text-xs text-gray-500"><?php echo date('H:i', strtotime($row['tgl_input'])); ?></div>
                            </td>
                            
                            <!-- Status -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="status-badge status-<?php echo strtolower($row['status']); ?>">
                                        <?php echo $row['status']; ?>
                                    </span>
                                    
                                    <!-- Status Dropdown -->
                                    <div class="relative">
                                        <button onclick="toggleDropdown('status-<?php echo $row['id']; ?>')" 
                                                class="p-1 text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </button>
                                        
                                        <div id="status-<?php echo $row['id']; ?>" 
                                             class="hidden absolute left-0 mt-1 w-40 bg-white rounded-lg shadow-lg border border-gray-200 z-10">
                                            <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Pending" 
                                               class="block px-4 py-2 text-sm hover:bg-gray-100 <?php echo $row['status'] == 'Pending' ? 'text-yellow-600 font-medium' : 'text-gray-700'; ?>">
                                                <i class="fas fa-clock mr-2"></i>Pending
                                            </a>
                                            <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Disetujui" 
                                               class="block px-4 py-2 text-sm hover:bg-gray-100 <?php echo $row['status'] == 'Disetujui' ? 'text-blue-600 font-medium' : 'text-gray-700'; ?>">
                                                <i class="fas fa-check mr-2"></i>Disetujui
                                            </a>
                                            <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Dalam Pengerjaan" 
                                               class="block px-4 py-2 text-sm hover:bg-gray-100 <?php echo $row['status'] == 'Dalam Pengerjaan' ? 'text-purple-600 font-medium' : 'text-gray-700'; ?>">
                                                <i class="fas fa-cogs mr-2"></i>Diproses
                                            </a>
                                            <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Selesai" 
                                               class="block px-4 py-2 text-sm hover:bg-gray-100 <?php echo $row['status'] == 'Selesai' ? 'text-green-600 font-medium' : 'text-gray-700'; ?>">
                                                <i class="fas fa-flag-checkered mr-2"></i>Selesai
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <!-- View Details -->
                                    <button onclick="viewProject(<?php echo $row['id']; ?>)" 
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                            title="Lihat Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    
                                    <!-- Download File -->
                                    <?php if ($row['nama_file']): ?>
                                    <a href="../uploads/<?php echo $row['nama_file']; ?>" 
                                       target="_blank"
                                       class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition"
                                       title="Download File">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <!-- Delete -->
                                    <button onclick="confirmDelete(<?php echo $row['id']; ?>)" 
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Table Footer -->
            <?php if ($total_projects > 0): ?>
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div class="text-sm text-gray-600">
                        Menampilkan <?php echo $total_projects; ?> proyek
                    </div>
                    <a href="export_excel.php" 
                       class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                        <i class="fas fa-file-excel"></i>
                        Export Excel
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script>
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            
            sidebar.classList.toggle('active');
            
            if (sidebar.classList.contains('active')) {
                mainContent.style.marginLeft = '280px';
                mainContent.style.filter = 'brightness(0.95)';
            } else {
                mainContent.style.marginLeft = '0';
                mainContent.style.filter = 'none';
            }
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.querySelector('[onclick="toggleSidebar()"]');
            
            if (window.innerWidth <= 768 && 
                !sidebar.contains(event.target) && 
                !sidebarToggle.contains(event.target) && 
                sidebar.classList.contains('active')) {
                toggleSidebar();
            }
        });
        
        // Toggle dropdown
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
            
            // Close other dropdowns
            document.querySelectorAll('.dropdown').forEach(drop => {
                if (drop.id !== id) {
                    drop.classList.add('hidden');
                }
            });
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.matches('.dropdown-toggle')) {
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    dropdown.classList.add('hidden');
                });
            }
        });
        
        // View project details
        function viewProject(id) {
            // Fetch project details via AJAX
            fetch(`get_project.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    // Create modal
                    const modal = document.createElement('div');
                    modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4';
                    modal.innerHTML = `
                        <div class="bg-white rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                            <!-- Modal Header -->
                            <div class="sticky top-0 bg-white border-b border-gray-200 px-6 py-4 flex justify-between items-center">
                                <h3 class="text-lg font-semibold">Detail Brief</h3>
                                <button onclick="this.parentElement.parentElement.parentElement.remove()" 
                                        class="p-2 text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <!-- Modal Body -->
                            <div class="p-6 space-y-6">
                                <!-- Client Info -->
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 mb-2">Informasi Klien</h4>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-xs text-gray-400">Nama</label>
                                            <p class="font-medium">${data.nama_klien}</p>
                                        </div>
                                        <div>
                                            <label class="text-xs text-gray-400">Email</label>
                                            <p class="font-medium">${data.email_klien}</p>
                                        </div>
                                        ${data.no_telepon ? `
                                        <div>
                                            <label class="text-xs text-gray-400">Telepon</label>
                                            <p class="font-medium">${data.no_telepon}</p>
                                        </div>
                                        ` : ''}
                                        <div>
                                            <label class="text-xs text-gray-400">Tanggal</label>
                                            <p class="font-medium">${new Date(data.tgl_input).toLocaleDateString('id-ID', {
                                                weekday: 'long',
                                                year: 'numeric',
                                                month: 'long',
                                                day: 'numeric',
                                                hour: '2-digit',
                                                minute: '2-digit'
                                            })}</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Project Details -->
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 mb-2">Detail Projek</h4>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="text-xs text-gray-400">Layanan</label>
                                            <p class="font-medium">${data.jasa_pilihan}</p>
                                        </div>
                                        <div>
                                            <label class="text-xs text-gray-400">Kebutuhan Detail</label>
                                            <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                                                <p class="text-gray-700 whitespace-pre-line">${data.kebutuhan_detail}</p>
                                            </div>
                                        </div>
                                        ${data.deadline ? `
                                        <div>
                                            <label class="text-xs text-gray-400">Deadline</label>
                                            <p class="font-medium">${new Date(data.deadline).toLocaleDateString('id-ID')}</p>
                                        </div>
                                        ` : ''}
                                    </div>
                                </div>
                                
                                <!-- File Attachment -->
                                ${data.nama_file ? `
                                <div>
                                    <h4 class="text-sm font-semibold text-gray-500 mb-2">File Lampiran</h4>
                                    <a href="../uploads/${data.nama_file}" 
                                       target="_blank"
                                       class="inline-flex items-center gap-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition">
                                        <i class="fas fa-file"></i>
                                        <span>${data.nama_file}</span>
                                        <i class="fas fa-external-link-alt text-xs"></i>
                                    </a>
                                </div>
                                ` : ''}
                            </div>
                            
                            <!-- Modal Footer -->
                            <div class="sticky bottom-0 bg-gray-50 border-t border-gray-200 px-6 py-4 flex justify-end gap-2">
                                <button onclick="this.parentElement.parentElement.parentElement.remove()" 
                                        class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                                    Tutup
                                </button>
                                ${data.nama_file ? `
                                <a href="../uploads/${data.nama_file}" 
                                   download
                                   class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                    <i class="fas fa-download mr-2"></i>Download File
                                </a>
                                ` : ''}
                            </div>
                        </div>
                    `;
                    
                    document.body.appendChild(modal);
                })
                .catch(error => {
                    alert('Terjadi kesalahan saat mengambil data');
                    console.error(error);
                });
        }
        
        // Confirm delete
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus brief ini? Tindakan ini tidak dapat dibatalkan.')) {
                window.location.href = `index.php?delete=${id}`;
            }
        }
        
        // Show notification if updated
        <?php if (isset($_GET['updated']) || isset($_GET['deleted'])): ?>
        setTimeout(() => {
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-3 animate-slideIn';
            notification.innerHTML = `
                <i class="fas fa-check-circle"></i>
                <span><?php echo isset($_GET['updated']) ? 'Status berhasil diperbarui' : 'Brief berhasil dihapus'; ?></span>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }, 500);
        
        // Remove query parameters from URL
        history.replaceState({}, document.title, window.location.pathname);
        <?php endif; ?>
    </script>
    
    <style>
        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        .animate-slideIn {
            animation: slideIn 0.3s ease;
        }
    </style>
</body>
</html>
<?php mysqli_close($koneksi); ?>