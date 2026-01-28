<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include '../includes/koneksi.php';

// Set page title
$page_title = "Dashboard Admin - Z-STUDIO";

// Get statistics
$stats = [];
$today = date('Y-m-d');

// Total projects
$sql_total = "SELECT COUNT(*) as total FROM tb_projek";
$result_total = mysqli_query($koneksi, $sql_total);
$stats['total'] = mysqli_fetch_assoc($result_total)['total'];

// Today's projects
$sql_today = "SELECT COUNT(*) as today FROM tb_projek WHERE DATE(tgl_input) = '$today'";
$result_today = mysqli_query($koneksi, $sql_today);
$stats['today'] = mysqli_fetch_assoc($result_today)['today'];

// Projects by status
$sql_status = "SELECT status, COUNT(*) as count FROM tb_projek GROUP BY status";
$result_status = mysqli_query($koneksi, $sql_status);
$status_counts = [];
while ($row = mysqli_fetch_assoc($result_status)) {
    $status_counts[$row['status']] = $row['count'];
}

// Get filter parameters
$status_filter = isset($_GET['status']) ? mysqli_real_escape_string($koneksi, $_GET['status']) : '';
$search_query = isset($_GET['search']) ? mysqli_real_escape_string($koneksi, $_GET['search']) : '';

// Build query with filters
$sql = "SELECT * FROM tb_projek WHERE 1=1";

if (!empty($status_filter)) {
    $sql .= " AND status = '$status_filter'";
}

if (!empty($search_query)) {
    $sql .= " AND (nama_klien LIKE '%$search_query%' OR email_klien LIKE '%$search_query%' OR jasa_pilihan LIKE '%$search_query%')";
}

$sql .= " ORDER BY tgl_input DESC";

$result = mysqli_query($koneksi, $sql);
$total_filtered = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --secondary: #7c3aed;
            --accent: #10b981;
            --dark: #0f172a;
            --light: #f8fafc;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }
        
        .sidebar {
            background: linear-gradient(180deg, var(--dark) 0%, #1e293b 100%);
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            z-index: 40;
            transition: transform 0.3s ease;
        }
        
        .main-content {
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .overlay {
                display: none;
                position: fixed;
                inset: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 30;
            }
            
            .overlay.active {
                display: block;
            }
        }
        
        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }
        
        .status-badge {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        
        .status-pending { background: #fef3c7; color: #92400e; }
        .status-ditolak { background: #fee2e2; color: #991b1b; }
        .status-disetujui { background: #dbeafe; color: #1e40af; }
        .status-dalam-pengerjaan { background: #f3e8ff; color: #7c3aed; }
        .status-selesai { background: #d1fae5; color: #065f46; }
        
        .project-row {
            transition: background-color 0.2s ease;
        }
        
        .project-row:hover {
            background: #f8fafc;
        }
        
        .action-btn {
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }
        
        .action-btn:hover {
            background: #f1f5f9;
        }
        
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 50;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .modal.active {
            display: flex;
        }
        
        .modal-content {
            background: white;
            border-radius: 20px;
            max-width: 800px;
            width: 100%;
            max-height: 90vh;
            overflow: hidden;
        }
    </style>
    
    <script>
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
    <!-- Mobile Overlay -->
    <div id="overlay" class="overlay" onclick="toggleSidebar()"></div>
    
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <!-- Logo -->
        <div class="p-6 border-b border-white/10">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center">
                    <span class="text-white font-bold text-lg">Z</span>
                </div>
                <div>
                    <h1 class="font-bold text-lg">Z-STUDIO</h1>
                    <p class="text-sm text-gray-400">Admin Panel</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="p-4">
            <div class="space-y-2">
                <a href="index.php" class="flex items-center space-x-3 px-4 py-3 bg-white/10 rounded-xl text-white">
                    <i class="fas fa-tachometer-alt w-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="../index.php" target="_blank" class="flex items-center space-x-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl transition">
                    <i class="fas fa-external-link-alt w-5"></i>
                    <span>Lihat Website</span>
                </a>
                
                <a href="export_excel.php" class="flex items-center space-x-3 px-4 py-3 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl transition">
                    <i class="fas fa-file-excel w-5"></i>
                    <span>Export Excel</span>
                </a>
                
                <div class="pt-4 mt-4 border-t border-white/10">
                    <a href="logout.php" class="flex items-center space-x-3 px-4 py-3 text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-xl transition">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </nav>
        
        <!-- Stats -->
        <div class="p-4 mt-8">
            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Statistik</h3>
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Total Projek</span>
                        <span class="font-semibold"><?php echo $stats['total']; ?></span>
                    </div>
                    <div class="h-1 bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full bg-primary rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-400">Hari Ini</span>
                        <span class="font-semibold"><?php echo $stats['today']; ?></span>
                    </div>
                    <div class="h-1 bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full bg-accent rounded-full" style="width: <?php echo min(100, ($stats['today'] / max($stats['total'], 1)) * 100); ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="bg-white border-b border-gray-200 px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Mobile Menu Button -->
                    <button onclick="toggleSidebar()" class="lg:hidden text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Dashboard Admin</h1>
                        <p class="text-sm text-gray-600">Kelola brief proyek dari klien</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="text-right hidden md:block">
                        <p class="text-sm text-gray-600"><?php echo date('l, d F Y'); ?></p>
                        <p class="text-xs text-gray-500"><?php echo date('H:i'); ?> WIB</p>
                    </div>
                    <div class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold">A</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Projects -->
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 rounded-xl">
                            <i class="fas fa-inbox text-blue-600 text-xl"></i>
                        </div>
                        <span class="text-sm text-gray-500">Total</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $stats['total']; ?></h3>
                    <p class="text-gray-600">Brief Projek</p>
                </div>
                
                <!-- Today's Projects -->
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-yellow-100 rounded-xl">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                        <span class="text-sm text-gray-500">Hari Ini</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $stats['today']; ?></h3>
                    <p class="text-gray-600">Baru Masuk</p>
                </div>
                
                <!-- Pending -->
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-orange-100 rounded-xl">
                            <i class="fas fa-hourglass-half text-orange-600 text-xl"></i>
                        </div>
                        <span class="text-sm text-gray-500">Pending</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $status_counts['Pending'] ?? 0; ?></h3>
                    <p class="text-gray-600">Perlu Diproses</p>
                </div>
                
                <!-- Completed -->
                <div class="stat-card">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-green-100 rounded-xl">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                        <span class="text-sm text-gray-500">Selesai</span>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-800 mb-1"><?php echo $status_counts['Selesai'] ?? 0; ?></h3>
                    <p class="text-gray-600">Proyek Selesai</p>
                </div>
            </div>
        </div>
        
        <!-- Filters -->
        <div class="px-6">
            <div class="bg-white rounded-2xl p-6 shadow border border-gray-200">
                <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
                    <!-- Search -->
                    <div class="flex-1 w-full">
                        <form method="GET" class="flex gap-2">
                            <div class="flex-1 relative">
                                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                <input type="text" 
                                       name="search" 
                                       placeholder="Cari nama, email, atau layanan..."
                                       value="<?php echo htmlspecialchars($search_query); ?>"
                                       class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-primary focus:border-transparent outline-none">
                            </div>
                            <button type="submit" class="px-6 py-3 bg-primary text-white rounded-xl hover:bg-blue-700 transition font-medium">
                                Cari
                            </button>
                            <?php if (!empty($search_query) || !empty($status_filter)): ?>
                            <a href="index.php" class="px-4 py-3 border border-gray-300 rounded-xl hover:bg-gray-50 transition font-medium">
                                Reset
                            </a>
                            <?php endif; ?>
                        </form>
                    </div>
                    
                    <!-- Status Filter -->
                    <div class="flex gap-2">
                        <a href="index.php" 
                           class="px-4 py-2 rounded-xl <?php echo empty($status_filter) ? 'bg-primary text-white' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'; ?>">
                            Semua
                        </a>
                        <a href="index.php?status=Pending" 
                           class="px-4 py-2 rounded-xl <?php echo $status_filter == 'Pending' ? 'bg-yellow-100 text-yellow-800 border border-yellow-300' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'; ?>">
                            Pending
                        </a>
                        <a href="index.php?status=Disetujui" 
                           class="px-4 py-2 rounded-xl <?php echo $status_filter == 'Disetujui' ? 'bg-blue-100 text-blue-800 border border-blue-300' : 'border border-gray-300 text-gray-700 hover:bg-gray-50'; ?>">
                            Disetujui
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Projects Table -->
        <div class="p-6">
            <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800">Brief Projek Masuk</h2>
                            <p class="text-sm text-gray-600">Total: <?php echo $total_filtered; ?> proyek</p>
                        </div>
                        <a href="export_excel.php" class="px-4 py-2 bg-green-600 text-white rounded-xl hover:bg-green-700 transition font-medium flex items-center gap-2">
                            <i class="fas fa-file-excel"></i>
                            Export Excel
                        </a>
                    </div>
                </div>
                
                <!-- Table -->
                <?php if ($total_filtered == 0): ?>
                <div class="px-6 py-16 text-center">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Belum ada brief yang masuk</h3>
                    <p class="text-gray-500">Saat klien mengisi form, data akan muncul di sini.</p>
                </div>
                <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-gray-50 border-b border-gray-200">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Klien</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Layanan</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Tanggal</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="project-row border-b border-gray-200 last:border-b-0">
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
                                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm bg-blue-50 text-blue-700 font-medium">
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
                                        <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                            <?php echo $row['status']; ?>
                                        </span>
                                        
                                        <!-- Status Dropdown -->
                                        <div class="relative">
                                            <button type="button" onclick="toggleStatusDropdown(<?php echo $row['id']; ?>)" 
                                                    class="action-btn text-gray-400 hover:text-gray-600">
                                                <i class="fas fa-chevron-down text-sm"></i>
                                            </button>
                                            
                                            <div id="status-dropdown-<?php echo $row['id']; ?>" 
                                                 class="absolute left-0 mt-1 w-48 bg-white rounded-xl shadow-lg border border-gray-200 z-10 hidden">
                                                <div class="py-2">
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Pending" 
                                                       class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 <?php echo $row['status'] == 'Pending' ? 'text-yellow-600 font-medium' : 'text-gray-700'; ?>">
                                                        <i class="fas fa-clock text-sm"></i>
                                                        <span>Pending</span>
                                                    </a>
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Disetujui" 
                                                       class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 <?php echo $row['status'] == 'Disetujui' ? 'text-blue-600 font-medium' : 'text-gray-700'; ?>">
                                                        <i class="fas fa-check text-sm"></i>
                                                        <span>Disetujui</span>
                                                    </a>
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Dalam%20Pengerjaan" 
                                                       class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 <?php echo $row['status'] == 'Dalam Pengerjaan' ? 'text-purple-600 font-medium' : 'text-gray-700'; ?>">
                                                        <i class="fas fa-cogs text-sm"></i>
                                                        <span>Diproses</span>
                                                    </a>
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Selesai" 
                                                       class="flex items-center gap-3 px-4 py-2 hover:bg-gray-50 <?php echo $row['status'] == 'Selesai' ? 'text-green-600 font-medium' : 'text-gray-700'; ?>">
                                                        <i class="fas fa-flag-checkered text-sm"></i>
                                                        <span>Selesai</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <!-- View -->
                                        <button onclick="viewProject(<?php echo $row['id']; ?>)" 
                                                class="action-btn text-blue-600 hover:text-blue-700"
                                                title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        
                                        <!-- Download -->
                                        <?php if ($row['nama_file']): ?>
                                        <a href="../uploads/<?php echo $row['nama_file']; ?>" 
                                           target="_blank"
                                           class="action-btn text-green-600 hover:text-green-700"
                                           title="Download File">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <?php endif; ?>
                                        
                                        <!-- Delete -->
                                        <button onclick="confirmDelete(<?php echo $row['id']; ?>)" 
                                                class="action-btn text-red-600 hover:text-red-700"
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
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- View Modal -->
    <div id="viewModal" class="modal">
        <div class="modal-content">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h3 class="text-xl font-bold">Detail Brief</h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            <div id="modalContent" class="p-6 max-h-[calc(90vh-120px)] overflow-y-auto">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
    
    <!-- JavaScript -->
    <script>
        // Toggle sidebar on mobile
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            const overlay = document.getElementById('overlay');
            
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
            
            if (sidebar.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            
            if (window.innerWidth <= 768 && 
                overlay.classList.contains('active') && 
                !sidebar.contains(event.target)) {
                toggleSidebar();
            }
        });
        
        // Toggle status dropdown
        function toggleStatusDropdown(id) {
            const dropdown = document.getElementById(`status-dropdown-${id}`);
            dropdown.classList.toggle('hidden');
            
            // Close other dropdowns
            document.querySelectorAll('.status-dropdown').forEach(d => {
                if (d.id !== `status-dropdown-${id}`) {
                    d.classList.add('hidden');
                }
            });
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.status-dropdown') && !event.target.closest('[onclick*="toggleStatusDropdown"]')) {
                document.querySelectorAll('.status-dropdown').forEach(dropdown => {
                    dropdown.classList.add('hidden');
                });
            }
        });
        
        // View project details
        async function viewProject(id) {
            try {
                const response = await fetch(`get_project.php?id=${id}`);
                const data = await response.json();
                
                if (data.error) {
                    alert(data.error);
                    return;
                }
                
                // Format date
                const date = new Date(data.tgl_input);
                const formattedDate = date.toLocaleDateString('id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: '2-digit',
                    minute: '2-digit'
                });
                
                // Build modal content
                const modalContent = `
                    <div class="space-y-6">
                        <!-- Client Info -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500 mb-3">Informasi Klien</h4>
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
                                    <label class="text-xs text-gray-400">Tanggal Input</label>
                                    <p class="font-medium">${formattedDate}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Project Details -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-500 mb-3">Detail Projek</h4>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs text-gray-400">Layanan</label>
                                    <p class="font-medium">${data.jasa_pilihan}</p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-400">Status</label>
                                    <p class="font-medium">
                                        <span class="status-badge status-${data.status.toLowerCase().replace(' ', '-')}">
                                            ${data.status}
                                        </span>
                                    </p>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-400">Kebutuhan Detail</label>
                                    <div class="mt-2 p-4 bg-gray-50 rounded-xl">
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
                            <h4 class="text-sm font-semibold text-gray-500 mb-3">File Lampiran</h4>
                            <div class="flex items-center justify-between p-4 bg-blue-50 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-file text-blue-500"></i>
                                    <div>
                                        <p class="font-medium">${data.nama_file}</p>
                                        <p class="text-xs text-gray-500">${window.location.origin}/uploads/${data.nama_file}</p>
                                    </div>
                                </div>
                                <a href="../uploads/${data.nama_file}" 
                                   download
                                   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                    Download
                                </a>
                            </div>
                        </div>
                        ` : ''}
                    </div>
                `;
                
                // Update modal content
                document.getElementById('modalContent').innerHTML = modalContent;
                
                // Show modal
                document.getElementById('viewModal').classList.add('active');
                document.body.style.overflow = 'hidden';
                
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil data');
            }
        }
        
        // Close modal
        function closeModal() {
            document.getElementById('viewModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        // Confirm delete
        function confirmDelete(id) {
            if (confirm('Apakah Anda yakin ingin menghapus brief ini? Tindakan ini tidak dapat dibatalkan.')) {
                window.location.href = `index.php?delete=${id}`;
            }
        }
        
        // Show notification if updated
        <?php if (isset($_GET['updated']) || isset($_GET['deleted'])): ?>
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                const notification = document.createElement('div');
                notification.className = 'fixed top-4 right-4 bg-green-600 text-white px-6 py-3 rounded-xl shadow-lg z-50 flex items-center gap-3 animate-fadeIn';
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
        });
        <?php endif; ?>
        
        // Animation for notification
        const style = document.createElement('style');
        style.textContent = `
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-20px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .animate-fadeIn {
                animation: fadeIn 0.3s ease;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
<?php mysqli_close($koneksi); ?>