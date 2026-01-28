<?php
include 'auth.php';
include '../includes/koneksi.php';

$filter_status = $_GET['f'] ?? '';
$search        = $_GET['s'] ?? '';

$sql = "SELECT * FROM tb_projek WHERE 1=1";

if ($filter_status !== '') {
    $sql .= " AND status = '$filter_status'";
}

if ($search !== '') {
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

    <style>
        body {
            background: #050810;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: white;
        }
        .glass-card {
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.08);
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { scrollbar-width: none; }

        #imageModal.active {
            display: flex;
            animation: fadeIn .3s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0 }
            to { opacity: 1 }
        }
    </style>
</head>

<body class="p-6 md:p-12">

<div class="max-w-7xl mx-auto">

    <div class="flex flex-col md:flex-row justify-between gap-6 mb-12">
        <div>
            <h1 class="text-4xl font-black tracking-tighter uppercase">
                Project <span class="text-blue-500">Inbox</span>
            </h1>
            <p class="text-gray-500 mt-2">
                Selamat datang kembali, Admin.
            </p>
        </div>

        <a href="logout.php"
           class="flex items-center gap-2 px-6 py-3 bg-red-500/10 text-red-500 rounded-2xl hover:bg-red-500 hover:text-white transition-all font-bold text-sm">
            <i data-lucide="log-out" class="w-4 h-4"></i> Keluar
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="glass-card p-6 rounded-3xl flex items-center gap-5">
            <div class="w-12 h-12 bg-blue-500/20 rounded-2xl flex items-center justify-center text-blue-500">
                <i data-lucide="layers"></i>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Total Brief</p>
                <h3 class="text-2xl font-black"><?= $total_projek ?></h3>
            </div>
        </div>

        <div class="glass-card p-6 rounded-3xl flex items-center gap-5">
            <div class="w-12 h-12 bg-orange-500/20 rounded-2xl flex items-center justify-center text-orange-500">
                <i data-lucide="clock"></i>
            </div>
            <div>
                <p class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Pending</p>
                <h3 class="text-2xl font-black"><?= $pending ?></h3>
            </div>
        </div>

        <div class="glass-card p-6 rounded-3xl flex items-center gap-5">
            <div class="w-12 h-12 bg-green-500/20 rounded-2xl flex items-center justify-center text-green-400">
                <i data-lucide="check-circle"></i>
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
            <input type="text" name="s" value="<?= htmlspecialchars($search) ?>"
                   placeholder="Cari nama atau email klien..."
                   class="w-full bg-white/5 border border-white/10 rounded-2xl py-3 pl-12 pr-4 text-sm focus:outline-none focus:border-blue-500 text-white">
        </form>

        <div class="flex gap-2">
            <a href="index.php"
               class="px-5 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest <?= $filter_status==''?'bg-blue-600':'bg-white/5 text-gray-500 hover:bg-white/10' ?>">
                Semua
            </a>
            <a href="?f=Pending"
               class="px-5 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest <?= $filter_status=='Pending'?'bg-orange-600':'bg-white/5 text-gray-500 hover:bg-white/10' ?>">
                Pending
            </a>
            <a href="?f=Selesai"
               class="px-5 py-3 rounded-2xl text-[10px] font-black uppercase tracking-widest <?= $filter_status=='Selesai'?'bg-green-600':'bg-white/5 text-gray-500 hover:bg-white/10' ?>">
                Selesai
            </a>
        </div>
    </div>

    <div class="glass-card rounded-[32px] overflow-hidden">
        <div class="overflow-x-auto no-scrollbar">
            <table class="w-full">
                <thead class="bg-white/5 border-b border-white/5">
                <tr>
                    <th class="p-6 text-[10px] uppercase tracking-widest text-gray-400">Klien</th>
                    <th class="p-6 text-[10px] uppercase tracking-widest text-gray-400">Layanan</th>
                    <th class="p-6 text-[10px] uppercase tracking-widest text-gray-400">Status</th>
                    <th class="p-6 text-[10px] uppercase tracking-widest text-gray-400 text-right">Aksi</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                <?php if(mysqli_num_rows($query)): ?>
                    <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <tr class="hover:bg-white/[0.02] group">
                            <td class="p-6">
                                <div class="font-bold"><?= htmlspecialchars($row['nama_klien']) ?></div>
                                <div class="text-sm text-gray-500"><?= htmlspecialchars($row['email_klien']) ?></div>
                            </td>
                            <td class="p-6">
                                <div class="font-semibold"><?= $row['jasa_pilihan'] ?></div>
                                <div class="text-xs text-gray-600"><?= date('d M Y', strtotime($row['tgl_input'])) ?></div>
                            </td>
                            <td class="p-6">
                                <span class="px-4 py-1.5 rounded-full text-[10px] uppercase font-black bg-white/10">
                                    <?= $row['status'] ?>
                                </span>
                            </td>
                            <td class="p-6 text-right">
                                <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition">
                                    <button onclick="showDetail('<?= addslashes($row['kebutuhan_detail']) ?>')" class="p-3 bg-white/5 rounded-xl">
                                        <i data-lucide="eye"></i>
                                    </button>

                                    <?php if($row['nama_file']): ?>
                                        <button onclick="openPreview('../Uploads/<?= $row['nama_file'] ?>')" class="p-3 bg-white/5 rounded-xl">
                                            <i data-lucide="image"></i>
                                        </button>
                                    <?php endif; ?>

                                    <a href="hapus_projek.php?id=<?= $row['id'] ?>"
                                       onclick="return confirm('Hapus data ini?')"
                                       class="p-3 bg-white/5 rounded-xl text-red-500">
                                        <i data-lucide="trash-2"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="p-20 text-center text-gray-600 italic">Data tidak ditemukan</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<div id="imageModal" class="fixed inset-0 hidden items-center justify-center bg-black/90" onclick="closePreview()">
    <img id="modalImg" class="max-h-[80vh] rounded-2xl">
</div>

<script>
    lucide.createIcons();

    function showDetail(text) {
        alert(text);
    }

    function openPreview(src) {
        const modal = document.getElementById('imageModal');
        document.getElementById('modalImg').src = src;
        modal.classList.add('active');
        modal.classList.remove('hidden');
    }

    function closePreview() {
        const modal = document.getElementById('imageModal');
        modal.classList.remove('active');
        modal.classList.add('hidden');
    }
</script>

</body>
</html>
