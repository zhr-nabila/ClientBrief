<?php
// File: admin/index.php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/koneksi.php';

// Handle status updates
if (isset($_GET['update_status']) && isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = mysqli_real_escape_string($koneksi, $_GET['status']);
    
    $sql = "UPDATE tb_projek SET status = ? WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "si", $status, $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("Location: index.php?updated=1");
    exit();
}

// Handle deletions
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    
    // Get file name if exists
    $sql = "SELECT nama_file FROM tb_projek WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $nama_file);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
    
    // Delete file if exists
    if ($nama_file && file_exists("../uploads/$nama_file")) {
        unlink("../uploads/$nama_file");
    }
    
    // Delete from database
    $sql = "DELETE FROM tb_projek WHERE id = ?";
    $stmt = mysqli_prepare($koneksi, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("Location: index.php?deleted=1");
    exit();
}

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
?>
<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Z-STUDIO</title>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --bg-dark: #050810;
            --bg-card: rgba(255, 255, 255, 0.02);
            --border: rgba(255, 255, 255, 0.08);
            --accent: #2563eb;
        }
        
        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        html::-webkit-scrollbar {
            display: none;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-dark);
            color: white;
        }
        
        .glass {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border);
        }
        
        .sidebar {
            width: 280px;
            transition: transform 0.3s ease;
        }
        
        .main-content {
            margin-left: 280px;
            transition: margin-left 0.3s ease;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                left: 0;
                top: 0;
                height: 100vh;
                z-index: 50;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .table-container {
                overflow-x: auto;
            }
        }
        
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .status-pending { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
        .status-disetujui { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .status-dalam-pengerjaan { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
        .status-selesai { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
        .status-ditolak { background: rgba(239, 68, 68, 0.1); color: #ef4444; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar" class="sidebar glass fixed left-0 top-0 h-screen overflow-y-auto">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                    <i data-lucide="shield" class="w-5 h-5 text-white"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg">Admin Panel</h1>
                    <p class="text-xs text-gray-400">Z-STUDIO</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="p-4">
            <div class="space-y-2">
                <a href="index.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-blue-500/10 text-blue-400">
                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="../index.php" target="_blank" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5">
                    <i data-lucide="external-link" class="w-5 h-5"></i>
                    <span>View Website</span>
                </a>
                
                <a href="export_excel.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-400 hover:text-white hover:bg-white/5">
                    <i data-lucide="file-spreadsheet" class="w-5 h-5"></i>
                    <span>Export Excel</span>
                </a>
                
                <div class="pt-4 mt-4 border-t border-gray-800">
                    <a href="logout.php" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-red-400 hover:text-red-300 hover:bg-red-500/10">
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </nav>
        
        <!-- Stats -->
        <div class="p-4 mt-8">
            <h3 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Statistics</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-400">Total Projects</span>
                        <span class="font-semibold"><?php echo $stats['total']; ?></span>
                    </div>
                    <div class="h-1 bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full bg-blue-500 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-2">
                        <span class="text-gray-400">Today</span>
                        <span class="font-semibold"><?php echo $stats['today']; ?></span>
                    </div>
                    <div class="h-1 bg-gray-800 rounded-full overflow-hidden">
                        <div class="h-full bg-green-500 rounded-full" style="width: <?php echo min(100, ($stats['today'] / max($stats['total'], 1)) * 100); ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content min-h-screen">
        <!-- Top Bar -->
        <div class="glass px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn" class="md:hidden text-gray-300">
                        <i data-lucide="menu" class="w-6 h-6"></i>
                    </button>
                    
                    <div>
                        <h1 class="text-xl font-bold">Project Briefs</h1>
                        <p class="text-sm text-gray-400">Manage client project submissions</p>
                    </div>
                </div>
                
                <div class="text-right">
                    <p class="text-sm text-gray-400"><?php echo date('l, d F Y'); ?></p>
                    <p class="text-xs text-gray-500"><?php echo date('H:i'); ?> WIB</p>
                </div>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="glass rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-blue-500/10">
                            <i data-lucide="inbox" class="w-6 h-6 text-blue-500"></i>
                        </div>
                        <span class="text-sm text-gray-400">Total</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-1"><?php echo $stats['total']; ?></h3>
                    <p class="text-gray-400 text-sm">Projects</p>
                </div>
                
                <div class="glass rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-yellow-500/10">
                            <i data-lucide="clock" class="w-6 h-6 text-yellow-500"></i>
                        </div>
                        <span class="text-sm text-gray-400">Today</span>
                    </div>
                    <h3 class="text-3xl font-bold mb-1"><?php echo $stats['today']; ?></h3>
                    <p class="text-gray-400 text-sm">New Submissions</p>
                </div>
                
                <div class="glass rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-green-500/10">
                            <i data-lucide="check-circle" class="w-6 h-6 text-green-500"></i>
                        </div>
                        <span class="text-sm text-gray-400">Approved</span>
                    </div>
                    <?php
                    $sql_approved = "SELECT COUNT(*) as count FROM tb_projek WHERE status = 'Disetujui'";
                    $result_approved = mysqli_query($koneksi, $sql_approved);
                    $approved = mysqli_fetch_assoc($result_approved)['count'];
                    ?>
                    <h3 class="text-3xl font-bold mb-1"><?php echo $approved; ?></h3>
                    <p class="text-gray-400 text-sm">Projects</p>
                </div>
                
                <div class="glass rounded-2xl p-6">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 rounded-xl bg-purple-500/10">
                            <i data-lucide="trending-up" class="w-6 h-6 text-purple-500"></i>
                        </div>
                        <span class="text-sm text-gray-400">In Progress</span>
                    </div>
                    <?php
                    $sql_progress = "SELECT COUNT(*) as count FROM tb_projek WHERE status = 'Dalam Pengerjaan'";
                    $result_progress = mysqli_query($koneksi, $sql_progress);
                    $progress = mysqli_fetch_assoc($result_progress)['count'];
                    ?>
                    <h3 class="text-3xl font-bold mb-1"><?php echo $progress; ?></h3>
                    <p class="text-gray-400 text-sm">Active</p>
                </div>
            </div>
        </div>
        
        <!-- Filters -->
        <div class="px-6">
            <div class="glass rounded-2xl p-6">
                <div class="flex flex-col md:flex-row gap-4 justify-between items-center">
                    <!-- Search -->
                    <div class="flex-1 w-full">
                        <form method="GET" class="flex gap-2">
                            <div class="flex-1 relative">
                                <i data-lucide="search" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5"></i>
                                <input type="text" 
                                       name="search" 
                                       placeholder="Search by name, email, or service..."
                                       value="<?php echo htmlspecialchars($search_query); ?>"
                                       class="w-full pl-12 pr-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none">
                            </div>
                            <button type="submit" class="px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium">
                                Search
                            </button>
                            <?php if (!empty($search_query) || !empty($status_filter)): ?>
                            <a href="index.php" class="px-4 py-3 rounded-xl border border-gray-800 text-gray-400 hover:text-white">
                                Reset
                            </a>
                            <?php endif; ?>
                        </form>
                    </div>
                    
                    <!-- Status Filter -->
                    <div class="flex gap-2">
                        <a href="index.php" 
                           class="px-4 py-2 rounded-xl <?php echo empty($status_filter) ? 'bg-blue-500 text-white' : 'border border-gray-800 text-gray-400 hover:text-white'; ?>">
                            All
                        </a>
                        <a href="index.php?status=Pending" 
                           class="px-4 py-2 rounded-xl <?php echo $status_filter == 'Pending' ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' : 'border border-gray-800 text-gray-400 hover:text-white'; ?>">
                            Pending
                        </a>
                        <a href="index.php?status=Disetujui" 
                           class="px-4 py-2 rounded-xl <?php echo $status_filter == 'Disetujui' ? 'bg-blue-500/20 text-blue-400 border border-blue-500/30' : 'border border-gray-800 text-gray-400 hover:text-white'; ?>">
                            Approved
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Projects Table -->
        <div class="p-6">
            <div class="glass rounded-2xl overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-800">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-semibold">Client Submissions</h2>
                            <p class="text-sm text-gray-400">Total: <?php echo mysqli_num_rows($result); ?> projects</p>
                        </div>
                        <a href="export_excel.php" class="px-4 py-2 rounded-xl bg-gradient-to-r from-green-500 to-green-700 text-white font-medium flex items-center space-x-2">
                            <i data-lucide="file-spreadsheet" class="w-5 h-5"></i>
                            <span>Export Excel</span>
                        </a>
                    </div>
                </div>
                
                <!-- Table -->
                <div class="table-container">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-800">
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-400">Client</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-400">Service</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-400">Date</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-400">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-semibold text-gray-400">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) == 0): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="w-16 h-16 rounded-full bg-gray-900 flex items-center justify-center mx-auto mb-4">
                                        <i data-lucide="inbox" class="w-8 h-8 text-gray-600"></i>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-400 mb-2">No projects found</h3>
                                    <p class="text-gray-500 text-sm">Client submissions will appear here</p>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr class="border-b border-gray-800 hover:bg-white/5">
                                <!-- Client Info -->
                                <td class="px-6 py-4">
                                    <div class="font-medium"><?php echo htmlspecialchars($row['nama_klien']); ?></div>
                                    <div class="text-sm text-gray-400"><?php echo htmlspecialchars($row['email_klien']); ?></div>
                                </td>
                                
                                <!-- Service -->
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-300"><?php echo htmlspecialchars($row['jasa_pilihan']); ?></span>
                                </td>
                                
                                <!-- Date -->
                                <td class="px-6 py-4">
                                    <div class="text-sm"><?php echo date('d M Y', strtotime($row['tgl_input'])); ?></div>
                                    <div class="text-xs text-gray-400"><?php echo date('H:i', strtotime($row['tgl_input'])); ?></div>
                                </td>
                                
                                <!-- Status -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <span class="status-badge status-<?php echo strtolower(str_replace(' ', '-', $row['status'])); ?>">
                                            <?php echo $row['status']; ?>
                                        </span>
                                        
                                        <!-- Status Dropdown -->
                                        <div class="relative">
                                            <button type="button" onclick="toggleDropdown('status-<?php echo $row['id']; ?>')" 
                                                    class="text-gray-400 hover:text-white">
                                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                                            </button>
                                            
                                            <div id="status-<?php echo $row['id']; ?>" class="absolute left-0 mt-1 glass rounded-xl shadow-lg z-10 hidden">
                                                <div class="py-2 w-48">
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Pending" 
                                                       class="flex items-center space-x-3 px-4 py-2 text-sm hover:bg-white/5 <?php echo $row['status'] == 'Pending' ? 'text-yellow-400' : 'text-gray-400'; ?>">
                                                        <i data-lucide="clock" class="w-4 h-4"></i>
                                                        <span>Pending</span>
                                                    </a>
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Disetujui" 
                                                       class="flex items-center space-x-3 px-4 py-2 text-sm hover:bg-white/5 <?php echo $row['status'] == 'Disetujui' ? 'text-blue-400' : 'text-gray-400'; ?>">
                                                        <i data-lucide="check-circle" class="w-4 h-4"></i>
                                                        <span>Approved</span>
                                                    </a>
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Dalam%20Pengerjaan" 
                                                       class="flex items-center space-x-3 px-4 py-2 text-sm hover:bg-white/5 <?php echo $row['status'] == 'Dalam Pengerjaan' ? 'text-purple-400' : 'text-gray-400'; ?>">
                                                        <i data-lucide="settings" class="w-4 h-4"></i>
                                                        <span>In Progress</span>
                                                    </a>
                                                    <a href="index.php?update_status=1&id=<?php echo $row['id']; ?>&status=Selesai" 
                                                       class="flex items-center space-x-3 px-4 py-2 text-sm hover:bg-white/5 <?php echo $row['status'] == 'Selesai' ? 'text-green-400' : 'text-gray-400'; ?>">
                                                        <i data-lucide="flag" class="w-4 h-4"></i>
                                                        <span>Completed</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                
                                <!-- Actions -->
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <!-- View -->
                                        <button onclick="viewProject(<?php echo $row['id']; ?>)" 
                                                class="p-2 rounded-lg hover:bg-white/5 text-gray-400 hover:text-white">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                        </button>
                                        
                                        <!-- Download File -->
                                        <?php if ($row['nama_file']): ?>
                                        <a href="../uploads/<?php echo $row['nama_file']; ?>" 
                                           download
                                           class="p-2 rounded-lg hover:bg-white/5 text-gray-400 hover:text-white">
                                            <i data-lucide="download" class="w-4 h-4"></i>
                                        </a>
                                        <?php endif; ?>
                                        
                                        <!-- Delete -->
                                        <button onclick="confirmDelete(<?php echo $row['id']; ?>)" 
                                                class="p-2 rounded-lg hover:bg-white/5 text-gray-400 hover:text-red-400">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- View Modal -->
    <div id="viewModal" class="fixed inset-0 bg-black/80 z-50 hidden items-center justify-center p-4">
        <div class="glass rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-hidden">
            <div class="p-6 border-b border-gray-800 flex justify-between items-center">
                <h3 class="text-xl font-bold">Project Details</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            <div id="modalContent" class="p-6 overflow-y-auto max-h-[calc(90vh-120px)]">
                <!-- Content loaded by JavaScript -->
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
    <script>
        // Initialize icons
        lucide.createIcons();
        
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
        
        // Toggle dropdown
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.classList.toggle('hidden');
            
            // Close other dropdowns
            document.querySelectorAll('[id^="status-"]').forEach(el => {
                if (el.id !== id) {
                    el.classList.add('hidden');
                }
            });
        }
        
        // View project details
        async function viewProject(id) {
            try {
                const response = await fetch(`get_project.php?id=${id}`);
                const project = await response.json();
                
                // Build modal content
                const content = `
                    <div class="space-y-6">
                        <!-- Client Info -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-400 mb-4">CLIENT INFORMATION</h4>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="text-xs text-gray-500">Name</p>
                                    <p class="font-medium">${project.nama_klien}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Email</p>
                                    <p class="font-medium">${project.email_klien}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Phone</p>
                                    <p class="font-medium">${project.no_telepon}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Submission Date</p>
                                    <p class="font-medium">${new Date(project.tgl_input).toLocaleString()}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Project Details -->
                        <div>
                            <h4 class="text-sm font-semibold text-gray-400 mb-4">PROJECT DETAILS</h4>
                            <div class="space-y-4">
                                <div>
                                    <p class="text-xs text-gray-500">Service</p>
                                    <p class="font-medium">${project.jasa_pilihan}</p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Status</p>
                                    <span class="status-badge status-${project.status.toLowerCase().replace(' ', '-')}">
                                        ${project.status}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 mb-2">Project Description</p>
                                    <div class="glass-light rounded-xl p-4">
                                        <p class="text-sm whitespace-pre-line">${project.kebutuhan_detail}</p>
                                    </div>
                                </div>
                                ${project.deadline ? `
                                <div>
                                    <p class="text-xs text-gray-500">Deadline</p>
                                    <p class="font-medium">${new Date(project.deadline).toLocaleDateString()}</p>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                        
                        <!-- File Attachment -->
                        ${project.nama_file ? `
                        <div>
                            <h4 class="text-sm font-semibold text-gray-400 mb-4">ATTACHED FILE</h4>
                            <div class="glass-light rounded-xl p-4 flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <i data-lucide="file" class="w-5 h-5 text-blue-500"></i>
                                    <div>
                                        <p class="font-medium text-sm">${project.nama_file}</p>
                                        <p class="text-gray-400 text-xs">../uploads/${project.nama_file}</p>
                                    </div>
                                </div>
                                <a href="../uploads/${project.nama_file}" 
                                   download
                                   class="px-4 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-medium">
                                    Download
                                </a>
                            </div>
                        </div>
                        ` : ''}
                    </div>
                `;
                
                document.getElementById('modalContent').innerHTML = content;
                document.getElementById('viewModal').classList.remove('hidden');
                lucide.createIcons();
                
            } catch (error) {
                console.error('Error:', error);
                alert('Failed to load project details');
            }
        }
        
        // Close modal
        function closeModal() {
            document.getElementById('viewModal').classList.add('hidden');
        }
        
        // Confirm delete
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this project? This action cannot be undone.')) {
                window.location.href = `index.php?delete=${id}`;
            }
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('[id^="status-"]') && !event.target.closest('[onclick*="toggleDropdown"]')) {
                document.querySelectorAll('[id^="status-"]').forEach(dropdown => {
                    dropdown.classList.add('hidden');
                });
            }
        });
        
        // Show success notification if updated
        <?php if (isset($_GET['updated']) || isset($_GET['deleted'])): ?>
        document.addEventListener('DOMContentLoaded', function() {
            const message = <?php echo isset($_GET['updated']) ? "'Status updated successfully'" : "'Project deleted successfully'"; ?>;
            
            const notification = document.createElement('div');
            notification.className = 'fixed top-4 right-4 glass px-6 py-3 rounded-xl flex items-center space-x-3 z-50';
            notification.innerHTML = `
                <i data-lucide="check-circle" class="w-5 h-5 text-green-500"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            lucide.createIcons();
            
            setTimeout(() => {
                notification.remove();
                // Remove query parameter from URL
                history.replaceState({}, document.title, window.location.pathname);
            }, 3000);
        });
        <?php endif; ?>
    </script>
</body>
</html>
<?php mysqli_close($koneksi); ?>