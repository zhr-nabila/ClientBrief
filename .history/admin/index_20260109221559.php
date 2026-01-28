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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Admin Dashboard | Z-STUDIO</title>
</head>
<body class="bg-[#0b0f1a] text-gray-200 font-['Plus_Jakarta_Sans']">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-blue-600/10 border border-blue-500/20 p-6 rounded-3xl">
        <p class="text-gray-400 text-xs font-bold uppercase mb-1">Total Brief</p>
        <h3 class="text-3xl font-bold"><?= mysqli_num_rows($hasil) ?></h3>
    </div>
    <div class="bg-yellow-600/10 border border-yellow-500/20 p-6 rounded-3xl">
        <p class="text-gray-400 text-xs font-bold uppercase mb-1">Perlu Diproses</p>
        <?php 
            $pending = mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Pending'");
            echo "<h3 class='text-3xl font-bold text-yellow-500'>".mysqli_num_rows($pending)."</h3>";
        ?>
    </div>
    <div class="bg-green-600/10 border border-green-500/20 p-6 rounded-3xl">
        <p class="text-gray-400 text-xs font-bold uppercase mb-1">Selesai</p>
        <?php 
            $done = mysqli_query($koneksi, "SELECT id FROM tb_projek WHERE status='Selesai'");
            echo "<h3 class='text-3xl font-bold text-green-500'>".mysqli_num_rows($done)."</h3>";
        ?>
    </div>
</div>
    <div class="flex min-h-screen">
        <div class="w-64 bg-black/40 border-r border-white/5 p-6">
            <h1 class="text-xl font-extrabold text-blue-500 mb-10 tracking-tighter">ADMIN PANEL</h1>
            <nav class="space-y-4">
                <a href="index.php" class="block bg-blue-600/20 text-blue-400 p-3 rounded-xl font-bold border border-blue-500/30">Brief Masuk</a>
                <a href="../index.php" class="block text-gray-400 p-3 hover:text-white transition">Lihat Website</a>
            </nav>
        </div>

        <div class="flex-1 p-10">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-bold">Daftar Brief Klien</h2>
                    <p class="text-gray-500">Kelola permintaan proyek yang masuk secara real-time.</p>
                </div>
                <div class="bg-blue-600 px-4 py-2 rounded-lg text-sm font-bold">Total: <?= mysqli_num_rows($hasil) ?></div>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-3xl overflow-hidden shadow-2xl backdrop-blur-md">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-white/5 text-gray-400 uppercase text-xs tracking-widest font-bold">
                            <th class="p-5">Waktu</th>
                            <th class="p-5">Klien</th>
                            <th class="p-5">Layanan</th>
                            <th class="p-5">Status</th>
                            <th class="p-5 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        <?php while($row = mysqli_fetch_assoc($hasil)): ?>
                        <tr class="hover:bg-white/[0.02] transition">
                            <td class="p-5 text-sm"><?= date('d/m/y H:i', strtotime($row['tgl_input'])) ?></td>
                            <td class="p-5">
                                <div class="font-bold text-white"><?= $row['nama_klien'] ?></div>
                                <div class="text-xs text-gray-500"><?= $row['email_klien'] ?></div>
                            </td>
                            <td class="p-5">
                                <span class="bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full text-[10px] font-bold"><?= $row['jasa_pilihan'] ?></span>
                            </td>
                            <td class="p-5">
                                <form action="update_status.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <select name="status" onchange="this.form.submit()" class="bg-gray-800 border-none text-xs rounded-lg p-2 focus:ring-2 focus:ring-blue-500 outline-none">
                                        <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                        <option value="Proses" <?= $row['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
                                        <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                </form>
                            </td>
                            <td class="p-5">
                                <div class="flex justify-center gap-2">
                                    <button onclick="lihatDetail('<?= addslashes($row['kebutuhan_detail']) ?>')" class="p-2 bg-gray-700 hover:bg-gray-600 rounded-lg transition" title="Detail">
                                        👁️
                                    </button>
                                    <?php if($row['nama_file']): ?>
                                        <a href="../uploads/<?= $row['nama_file'] ?>" target="_blank" class="p-2 bg-blue-600 rounded-lg">📂</a>
                                    <?php endif; ?>
                                    <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Hapus data ini?')" class="p-2 bg-red-600 rounded-lg">🗑️</a>
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
        function lihatDetail(msg) {
            Swal.fire({
                title: 'Detail Kebutuhan Klien',
                text: msg,
                icon: 'info',
                confirmButtonColor: '#2563eb',
                background: '#1f2937',
                color: '#fff'
            });
        }
    </script>
</body>
</html>