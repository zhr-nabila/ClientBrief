<?php
include 'auth.php'; // Memastikan admin sudah login
include '../includes/koneksi.php'; // Koneksi ke database

// 1. Logika Pengambilan Data Statistik
$total_projek = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM tb_projek"));
$pending      = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Pending'"));
$selesai      = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Selesai'"));

// 2. Ambil data projek terbaru untuk tabel
$query = mysqli_query($koneksi, "SELECT * FROM tb_projek ORDER BY tgl_input DESC");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Z-STUDIO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { background-color: #050810; font-family: 'Plus Jakarta Sans', sans-serif; color: white; }
        .glass-card { background: rgba(255, 255, 255, 0.02); border: 1px solid rgba(255, 255, 255, 0.08); }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>

<body class="p-6 md:p-12">

    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
            <div>
                <h1 class="text-4xl font-black tracking-tighter uppercase">Project <span class="text-blue-500">Inbox</span></h1>
                <p class="text-gray-500 mt-2">Selamat datang kembali, Admin. Kelola brief klien Anda di sini.</p>
            </div>
            <a href="logout.php" class="flex items-center gap-2 px-6 py-3 bg-red-500/10 text-red-500 rounded-2xl hover:bg-red-500 hover:text-white transition-all font-bold text-sm">
                <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="glass-card p-6 rounded-[24px] flex items-center gap-5">
                <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center text-blue-500">
                    <i data-lucide="layers" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Total Brief</p>
                    <h3 class="text-2xl font-black"><?= $total_projek ?></h3>
                </div>
            </div>

            <div class="glass-card p-6 rounded-[24px] flex items-center gap-5">
                <div class="w-12 h-12 bg-orange-500/20 rounded-2xl flex items-center justify-center text-orange-500">
                    <i data-lucide="clock" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Menunggu</p>
                    <h3 class="text-2xl font-black"><?= $pending ?></h3>
                </div>
            </div>

            <div class="glass-card p-6 rounded-[24px] flex items-center gap-5">
                <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center text-green-400">
                    <i data-lucide="check-circle" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Selesai</p>
                    <h3 class="text-2xl font-black"><?= $selesai ?></h3>
                </div>
            </div>
        </div>

        <div class="glass-card rounded-[32px] overflow-hidden">
            <div class="overflow-x-auto no-scrollbar">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 border-b border-white/5">
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-gray-400 font-bold">Informasi Klien</th>
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-gray-400 font-bold">Layanan</th>
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-gray-400 font-bold">Status</th>
                            <th class="p-6 text-[10px] uppercase tracking-[0.2em] text-gray-400 font-bold text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <?php if (mysqli_num_rows($query) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                                <tr class="hover:bg-white/[0.02] transition-colors group">
                                    <td class="p-6">
                                        <div class="font-bold text-lg tracking-tight"><?= htmlspecialchars($row['nama_klien']) ?></div>
                                        <div class="text-sm text-gray-500 flex items-center gap-2 mt-1">
                                            <i data-lucide="mail" class="w-3 h-3"></i> <?= htmlspecialchars($row['email_klien']) ?>
                                        </div>
                                        <div class="text-[11px] text-blue-400 font-bold mt-1 tracking-wider uppercase">
                                            <?= htmlspecialchars($row['no_telepon']) ?>
                                        </div>
                                    </td>
                                    <td class="p-6">
                                        <div class="text-sm font-semibold"><?= htmlspecialchars($row['jasa_pilihan']) ?></div>
                                        <div class="text-[10px] text-gray-600 mt-1 uppercase tracking-widest">
                                            Masuk: <?= date('d M Y', strtotime($row['tgl_input'])) ?>
                                        </div>
                                    </td>
                                    <td class="p-6">
                                        <?php
                                        $statusClass = [
                                            'Pending' => 'bg-orange-500/10 text-orange-500',
                                            'Disetujui' => 'bg-green-500/10 text-green-500',
                                            'Ditolak' => 'bg-red-500/10 text-red-500',
                                            'Dalam Pengerjaan' => 'bg-blue-500/10 text-blue-500',
                                            'Selesai' => 'bg-purple-500/10 text-purple-500'
                                        ];
                                        $cls = $statusClass[$row['status']] ?? 'bg-gray-500/10 text-gray-500';
                                        ?>
                                        <span class="px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-tighter <?= $cls ?>">
                                            <?= $row['status'] ?>
                                        </span>
                                    </td>
                                    <td class="p-6 text-right">
                                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            
                                            <button onclick="showDetail('<?= addslashes($row['kebutuhan_detail']) ?>')" class="p-3 bg-white/5 rounded-xl hover:bg-blue-600 transition-all" title="Lihat Detail Brief">
                                                <i data-lucide="eye" class="w-4 h-4"></i>
                                            </button>

                                            <?php if (!empty($row['nama_file'])): ?>
                                                <a href="../Uploads/<?= $row['nama_file'] ?>" target="_blank" class="p-3 bg-white/5 rounded-xl hover:bg-green-600 transition-all text-green-400 hover:text-white" title="Lihat Foto Lampiran">
                                                    <i data-lucide="image" class="w-4 h-4"></i>
                                                </a>
                                            <?php else: ?>
                                                <button class="p-3 bg-white/5 rounded-xl opacity-30 cursor-not-allowed" title="Tidak ada lampiran">
                                                    <i data-lucide="image-off" class="w-4 h-4"></i>
                                                </button>
                                            <?php endif; ?>

                                            <a href="edit_projek.php?id=<?= $row['id'] ?>" class="p-3 bg-white/5 rounded-xl hover:bg-white/20 transition-all" title="Kelola Proyek">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="p-20 text-center text-gray-600 italic">Belum ada brief yang masuk.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();

        function showDetail(text) {
            alert("DETAIL KEBUTUHAN KLIEN:\n\n" + text);
        }
    </script>
</body>
</html>