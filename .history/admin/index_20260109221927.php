<?php 
session_start();
if(!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../koneksi.php'; 

// Fitur Hapus
if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM tb_projek WHERE id=$id");
    header("Location: index.php");
}

$query = "SELECT * FROM tb_projek ORDER BY tgl_input DESC";
$hasil = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Z-STUDIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#0b0f1a] text-gray-200">

    <div class="flex min-h-screen">
        <div class="w-72 bg-black/40 border-r border-white/5 p-6 flex flex-col justify-between">
            <div>
                <h1 class="text-2xl font-extrabold text-blue-500 mb-10 tracking-tighter italic">Z-STUDIO.</h1>
                <nav class="space-y-2">
                    <a href="index.php" class="flex items-center gap-3 bg-blue-600 text-white p-3 rounded-xl font-bold transition shadow-lg shadow-blue-600/20">
                        <i data-lucide="layout-dashboard" class="w-5 h-5"></i> Dashboard
                    </a>
                    <a href="../index.php" target="_blank" class="flex items-center gap-3 text-gray-400 p-3 hover:text-white hover:bg-white/5 rounded-xl transition">
                        <i data-lucide="external-link" class="w-5 h-5"></i> Lihat Website
                    </a>
                    <a href="export_excel.php" class="flex items-center gap-3 text-emerald-400 p-3 hover:bg-emerald-500/10 rounded-xl transition">
                        <i data-lucide="file-spreadsheet" class="w-5 h-5"></i> Export Excel
                    </a>
                </nav>
            </div>

            <a href="logout.php" class="flex items-center gap-3 text-red-400 p-3 hover:bg-red-500/10 rounded-xl transition font-bold">
                <i data-lucide="log-out" class="w-5 h-5"></i> Logout
            </a>
        </div>

        <div class="flex-1 p-8 overflow-y-auto">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white/5 border border-white/10 p-6 rounded-[2rem] backdrop-blur-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-blue-500/20 rounded-2xl text-blue-400">
                            <i data-lucide="users" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">Total Brief</p>
                    <h3 class="text-4xl font-bold text-white"><?= mysqli_num_rows($hasil) ?></h3>
                </div>

                <div class="bg-white/5 border border-white/10 p-6 rounded-[2rem]">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-yellow-500/20 rounded-2xl text-yellow-400">
                            <i data-lucide="clock" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">Perlu Diproses</p>
                    <?php 
                        $pending = mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Pending'");
                        echo "<h3 class='text-4xl font-bold text-yellow-500'>".mysqli_num_rows($pending)."</h3>";
                    ?>
                </div>

                <div class="bg-white/5 border border-white/10 p-6 rounded-[2rem]">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-3 bg-emerald-500/20 rounded-2xl text-emerald-400">
                            <i data-lucide="check-circle" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">Selesai</p>
                    <?php 
                        $done = mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Selesai'");
                        echo "<h3 class='text-4xl font-bold text-emerald-500'>".mysqli_num_rows($done)."</h3>";
                    ?>
                </div>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-[2.5rem] overflow-hidden backdrop-blur-md shadow-2xl">
                <div class="p-8 border-b border-white/5 flex justify-between items-center">
                    <h2 class="text-2xl font-bold">Brief Masuk</h2>
                    <span class="text-xs bg-white/10 px-4 py-2 rounded-full text-gray-400 font-bold uppercase tracking-tighter">Live Updates</span>
                </div>
                
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/5 text-gray-500 uppercase text-[10px] tracking-[0.2em] font-black">
                            <th class="px-8 py-5">Waktu</th>
                            <th class="px-8 py-5">Klien</th>
                            <th class="px-8 py-5 text-center">Layanan</th>
                            <th class="px-8 py-5 text-center">Status</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <?php if(mysqli_num_rows($hasil) == 0): ?>
                            <tr><td colspan="5" class="p-20 text-center text-gray-600 italic">Belum ada brief yang masuk...</td></tr>
                        <?php endif; ?>

                        <?php while($row = mysqli_fetch_assoc($hasil)): ?>
                        <tr class="hover:bg-white/[0.03] transition-all group">
                            <td class="px-8 py-6">
                                <span class="text-xs text-gray-500"><?= date('d M Y', strtotime($row['tgl_input'])) ?></span><br>
                                <span class="text-[10px] font-mono text-gray-600"><?= date('H:i', strtotime($row['tgl_input'])) ?> WIB</span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="font-bold text-white group-hover:text-blue-400 transition"><?= $row['nama_klien'] ?></div>
                                <div class="text-xs text-gray-500"><?= $row['email_klien'] ?></div>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <span class="bg-white/5 border border-white/10 text-gray-300 px-3 py-1.5 rounded-xl text-[10px] font-bold">
                                    <?= $row['jasa_pilihan'] ?>
                                </span>
                            </td>
                            <td class="px-8 py-6 text-center">
                                <form action="update_status.php" method="POST" class="inline-block">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <select name="status" onchange="this.form.submit()" 
                                        class="bg-[#161b2a] border border-white/10 text-[10px] font-bold rounded-xl px-3 py-2 outline-none focus:ring-2 focus:ring-blue-500 transition-all cursor-pointer 
                                        <?= $row['status'] == 'Selesai' ? 'text-emerald-400' : ($row['status'] == 'Proses' ? 'text-yellow-400' : 'text-blue-400') ?>">
                                        <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>PENDING</option>
                                        <option value="Proses" <?= $row['status'] == 'Proses' ? 'selected' : '' ?>>PROSES</option>
                                        <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>SELESAI</option>
                                    </select>
                                </form>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex justify-end gap-2">
                                    <button onclick="lihatDetail('<?= addslashes($row['kebutuhan_detail']) ?>')" 
                                        class="p-3 bg-white/5 hover:bg-blue-600 rounded-2xl transition group/btn" title="Detail Brief">
                                        <i data-lucide="eye" class="w-4 h-4 text-gray-400 group-hover/btn:text-white"></i>
                                    </button>
                                    
                                    <?php if($row['nama_file']): ?>
                                        <a href="../uploads/<?= $row['nama_file'] ?>" target="_blank" 
                                            class="p-3 bg-white/5 hover:bg-emerald-600 rounded-2xl transition group/btn" title="Download File">
                                            <i data-lucide="download-cloud" class="w-4 h-4 text-gray-400 group-hover/btn:text-white"></i>
                                        </a>
                                    <?php endif; ?>

                                    <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus brief ini secara permanen?')" 
                                        class="p-3 bg-white/5 hover:bg-red-600 rounded-2xl transition group/btn" title="Hapus">
                                        <i data-lucide="trash-2" class="w-4 h-4 text-gray-400 group-hover/btn:text-white"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Initialize Icons
        lucide.createIcons();

        // Modal Detail
        function lihatDetail(msg) {
            Swal.fire({
                title: 'Project Brief Detail',
                text: msg,
                icon: 'info',
                confirmButtonText: 'Tutup',
                confirmButtonColor: '#2563eb',
                background: '#111827',
                color: '#fff',
                customClass: {
                    popup: 'rounded-[2rem] border border-white/10 shadow-2xl'
                }
            });
        }
    </script>
</body>
</html>