<?php
include 'auth.php';
include '../includes/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM tb_projek WHERE id = $id"));

if (isset($_POST['update'])) {
    $status = $_POST['status'];
    $deadline = $_POST['deadline'];
    $catatan = mysqli_real_escape_string($koneksi, $_POST['keterangan_admin']);

    $update = "UPDATE tb_projek SET status='$status', deadline='$deadline', keterangan_admin='$catatan' WHERE id=$id";
    if (mysqli_query($koneksi, $update)) {
        header("Location: index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Projek | Z-STUDIO</title>
</head>
<body class="bg-[#050810] text-white p-10 font-sans">
    <div class="max-w-2xl mx-auto bg-white/5 p-10 rounded-[32px] border border-white/10">
        <h2 class="text-2xl font-bold mb-8">Update Status Projek</h2>
        <form method="POST" class="space-y-6">
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Status Projek</label>
                <select name="status" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none text-white">
                    <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                    <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Set Deadline</label>
                <input type="date" name="deadline" value="<?= $data['deadline'] ?>" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-500 uppercase mb-2">Catatan Admin</label>
                <textarea name="keterangan_admin" rows="4" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl outline-none"><?= $data['keterangan_admin'] ?></textarea>
            </div>
            <div class="flex gap-4">
                <a href="index.php" class="w-1/3 text-center py-4 text-gray-500 font-bold">Batal</a>
                <button type="submit" name="update" class="w-2/3 bg-blue-600 py-4 rounded-2xl font-bold hover:bg-blue-700 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>