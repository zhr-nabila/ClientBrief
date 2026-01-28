<?php 
session_start();
if(!isset($_SESSION['admin_logged_in'])) { header("Location: login.php"); exit(); }
include '../includes/koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #050810; color: #fff; }
        .card { background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 24px; }
    </style>
</head>
<body class="p-4 md:p-10">

    <div class="max-w-6xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold italic tracking-tighter text-blue-500">ADMIN CONTROL.</h1>
                <p class="text-gray-500 text-sm">Kelola masuknya brief klien hari ini.</p>
            </div>
            <div class="flex gap-2">
                <a href="export_excel.php" class="bg-emerald-600/20 text-emerald-500 border border-emerald-500/20 px-4 py-2 rounded-xl text-xs font-bold">Export Excel</a>
                <a href="logout.php" class="bg-red-600/20 text-red-500 border border-red-500/20 px-4 py-2 rounded-xl text-xs font-bold">Keluar</a>
            </div>
        </div>

        <div class="card overflow-hidden overflow-x-auto shadow-2xl">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 text-[10px] font-bold text-gray-500 uppercase tracking-widest border-b border-white/5">
                        <th class="p-6">Waktu</th>
                        <th class="p-6">Klien</th>
                        <th class="p-6">Status</th>
                        <th class="p-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    <?php 
                    $query = mysqli_query($koneksi, "SELECT * FROM tb_projek ORDER BY tgl_input DESC");
                    while($r = mysqli_fetch_assoc($query)): ?>
                    <tr class="hover:bg-white/[0.02] transition">
                        <td class="p-6 text-xs text-gray-500"><?= date('d/m/y H:i', strtotime($r['tgl_input'])) ?></td>
                        <td class="p-6">
                            <div class="font-bold"><?= $r['nama_klien'] ?></div>
                            <div class="text-[10px] text-gray-500"><?= $r['email_klien'] ?></div>
                        </td>
                        <td class="p-6">
                            <form action="update_status.php" method="POST">
                                <input type="hidden" name="id" value="<?= $r['id'] ?>">
                                <select name="status" onchange="this.form.submit()" class="bg-[#0f121a] border border-white/10 rounded-lg p-1 text-[10px] font-bold">
                                    <option value="Pending" <?= $r['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Proses" <?= $r['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
                                    <option value="Selesai" <?= $r['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-6 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="../uploads/<?= $r['nama_file'] ?>" target="_blank" class="p-2 bg-blue-600 rounded-lg text-xs">📂</a>
                                <a href="?hapus=<?= $r['id'] ?>" class="p-2 bg-red-600 rounded-lg text-xs" onclick="return confirm('Hapus data?')">🗑️</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>