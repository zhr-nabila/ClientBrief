<?php
include 'auth.php';
include '../includes/koneksi.php';

$filter_status = isset($_GET['f']) ? $_GET['f'] : '';
$search = isset($_GET['s']) ? $_GET['s'] : '';

$sql = "SELECT * FROM tb_projek WHERE 1=1";

if ($filter_status != '') {
    $sql .= " AND status = '$filter_status'";
}
if ($search != '') {
    $sql .= " AND (nama_klien LIKE '%$search%' OR email_klien LIKE '%$search%')";
}

$sql .= " ORDER BY tgl_input DESC";
$query = mysqli_query($koneksi, $sql);

$total_projek = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM tb_projek"));
$pending      = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Pending'"));
$selesai      = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Selesai'"));
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="../css/style.css">
</head>

<body class="p-6 md:p-12">

    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
            <div>
                <h1 class="text-4xl font-black tracking-tighter uppercase">Project <span class="text-blue-500">Inbox</span></h1>
                <p class="text-gray-500 mt-2">Selamat datang kembali, Admin. Kelola brief klien Anda di sini.</p>
            </div>
            <a href="logout.php" class="flex items-center gap-2 px-6 py-3 bg-red-500/10 text-red-500 rounded-2xl hover:bg-red-500 hover:text-white transition-all font-bold text-sm text-center">
                <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
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

        <div class="flex flex-col md:flex-row gap-4 mb-6">
            <form method="GET" class="relative flex-1">
                <i data-lucide="search" class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"></i>
                <input type="text" name="s" value="<?= htmlspecialchars($search) ?>" placeholder="Cari nama atau email klien..."
                    class="w-full bg-white/5 border border-white/10 rounded-2xl py-3 pl-12 pr-4 text-sm focus:outline-none focus:border-blue-500 transition-all text-white">
            </form>

            <div class="flex gap-2">
                <a href="index.php" class="px-5 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest <?= $filter_status == '' ? 'bg-blue-600 text-white' : 'bg-white/5 text-gray-500 hover:bg-white/10' ?> transition-all flex items-center">Semua</a>
                <a href="index.php?f=Pending" class="px-5 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest <?= $filter_status == 'Pending' ? 'bg-orange-600 text-white' : 'bg-white/5 text-gray-500 hover:bg-white/10' ?> transition-all flex items-center">Pending</a>
                <a href="index.php?f=Selesai" class="px-5 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest <?= $filter_status == 'Selesai' ? 'bg-green-600 text-white' : 'bg-white/5 text-gray-500 hover:bg-white/10' ?> transition-all flex items-center">Selesai</a>
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
                                    </td>
                                    <td class="p-6">
                                        <div class="text-sm font-semibold"><?= htmlspecialchars($row['jasa_pilihan']) ?></div>
                                        <div class="text-[10px] text-gray-600 mt-1 uppercase tracking-widest italic">
                                            <?= date('d M Y', strtotime($row['tgl_input'])) ?>
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

                                            <?php if (isset($row['no_telepon'])): ?>
                                                <?php
                                                $wa_number = preg_replace('/[^0-9]/', '', $row['no_telepon']);
                                                if (substr($wa_number, 0, 1) === '0') $wa_number = '62' . substr($wa_number, 1);
                                                ?>
                                                <a href="https://wa.me/<?= $wa_number ?>" target="_blank" class="p-3 bg-white/5 rounded-xl hover:bg-green-600 transition-all text-green-400 hover:text-white" title="Chat WhatsApp">
                                                    <i data-lucide="message-square" class="w-4 h-4"></i>
                                                </a>
                                            <?php endif; ?>

                                            <button onclick="showDetail('<?= addslashes($row['kebutuhan_detail']) ?>')" class="p-3 bg-white/5 rounded-xl hover:bg-blue-600 transition-all" title="Detail Pesan">
                                                <i data-lucide="eye" class="w-4 h-4"></i>
                                            </button>

                                            <?php if (!empty($row['nama_file'])): ?>
                                                <button onclick="openPreview('../Uploads/<?= $row['nama_file'] ?>')" class="p-3 bg-white/5 rounded-xl hover:bg-green-600 transition-all text-green-400 hover:text-white" title="Lihat Referensi">
                                                    <i data-lucide="image" class="w-4 h-4"></i>
                                                </button>
                                            <?php else: ?>
                                                <button class="p-3 bg-white/5 rounded-xl opacity-30 cursor-not-allowed" title="Tidak ada gambar">
                                                    <i data-lucide="image-off" class="w-4 h-4"></i>
                                                </button>
                                            <?php endif; ?>

                                            <a href="hapus_projek.php?id=<?= $row['id'] ?>"
                                                onclick="return confirm('Hapus brief dari <?= htmlspecialchars($row['nama_klien']) ?>?')"
                                                class="p-3 bg-white/5 rounded-xl hover:bg-red-600 transition-all text-red-500 hover:text-white" title="Hapus">
                                                <i data-lucide="trash-2" class="w-4 h-4"></i>
                                            </a>

                                            <a href="edit_projek.php?id=<?= $row['id'] ?>" class="p-3 bg-white/5 rounded-xl hover:bg-white/20 transition-all" title="Edit Status">
                                                <i data-lucide="edit-3" class="w-4 h-4"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="p-20 text-center text-gray-600 italic">Data tidak ditemukan.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="imageModal" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-black/90 backdrop-blur-sm" onclick="closePreview()">
        <div class="relative max-w-4xl w-full flex flex-col items-center" onclick="event.stopPropagation()">
            <button onclick="closePreview()" class="absolute -top-12 right-0 text-white hover:text-red-500 transition-all flex items-center gap-2 font-bold uppercase tracking-widest text-xs">
                Tutup <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <img id="modalImg" src="" class="max-h-[80vh] w-auto rounded-2xl shadow-2xl border border-white/10">
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>