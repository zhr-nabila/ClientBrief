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
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Project | ClientBrief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/base.css">
<link rel="stylesheet" href="../assets/css/components.css">
<link rel="stylesheet" href="../assets/css/admin.css">

</head>
<body class="p-6 md:p-12">
    <div class="max-w-3xl mx-auto">
        <a href="index.php" class="inline-flex items-center gap-2 text-gray-500 hover:text-white mb-8 transition-colors">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Kembali ke Dashboard
        </a>

        <h1 class="text-3xl font-black mb-8 uppercase tracking-tighter">Kelola <span class="text-blue-500">Project</span></h1>

        <div class="glass-card rounded-[32px] p-8">
            <form action="update_status.php" method="POST" class="space-y-6">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Nama Klien</label>
                        <div class="text-lg font-semibold mt-1"><?= $data['nama_klien'] ?></div>
                    </div>
                    <div>
                        <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Layanan</label>
                        <div class="text-lg font-semibold mt-1 text-blue-400"><?= $data['jasa_pilihan'] ?></div>
                    </div>
                </div>

                <hr class="border-white/5">

                <div>
                    <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Brief Kebutuhan</label>
                    <p class="text-gray-300 mt-2 leading-relaxed italic">"<?= $data['kebutuhan_detail'] ?>"</p>
                </div>

                <div>
                    <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-3 block">Update Status Proyek</label>
                    <select name="status" class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-white focus:outline-none focus:border-blue-500 transition-all">
                        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                        <option value="Dalam Pengerjaan" <?= $data['status'] == 'Dalam Pengerjaan' ? 'selected' : '' ?>>Dalam Pengerjaan</option>
                        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                </div>

                <div>
                    <label class="text-[10px] uppercase tracking-widest text-gray-500 font-bold mb-3 block">Catatan Admin (Internal)</label>
                    <textarea name="keterangan_admin" rows="4" class="w-full bg-white/5 border border-white/10 rounded-xl p-4 text-white focus:outline-none focus:border-blue-500 transition-all" placeholder="Tambahkan catatan progres di sini..."><?= $data['keterangan_admin'] ?></textarea>
                </div>

                <button type="submit" name="update_status" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl transition-all shadow-lg shadow-blue-600/20">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>lucide.createIcons();</script>
</body>
</html>