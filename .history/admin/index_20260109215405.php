<?php include '../koneksi.php'; 
$query = "SELECT * FROM tb_projek ORDER BY tgl_input DESC";
$hasil = mysqli_query($koneksi, $query);
?>
<body class="bg-gray-900 text-white">
    <div class="p-8">
        <h1 class="text-3xl font-bold mb-6">Project Management Dashboard</h1>
        <div class="overflow-x-auto bg-gray-800 rounded-xl p-4">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-400 border-b border-gray-700">
                        <th class="p-4">Klien</th>
                        <th class="p-4">Layanan</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($hasil)): ?>
                    <tr class="border-b border-gray-700 hover:bg-gray-750">
                        <td class="p-4">
                            <b><?= $row['nama_klien'] ?></b><br>
                            <span class="text-xs text-gray-500"><?= $row['email_klien'] ?></span>
                        </td>
                        <td class="p-4 text-sm"><?= $row['jasa_pilihan'] ?></td>
                        <td class="p-4">
                            <form action="update_status.php" method="POST">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <select name="status" onchange="this.form.submit()" class="bg-gray-700 text-xs rounded p-1">
                                    <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                                    <option value="Proses" <?= $row['status'] == 'Proses' ? 'selected' : '' ?>>Proses</option>
                                    <option value="Selesai" <?= $row['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                                </select>
                            </form>
                        </td>
                        <td class="p-4 flex gap-2">
                            <button onclick="showDetail('<?= htmlspecialchars($row['kebutuhan_detail']) ?>')" class="bg-blue-600 px-3 py-1 rounded text-xs">Detail</button>
                            <?php if($row['nama_file']): ?>
                                <a href="../uploads/<?= $row['nama_file'] ?>" class="text-green-400 text-xs mt-1">File</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showDetail(msg) {
            Swal.fire({ title: 'Brief Klien', text: msg, icon: 'info', confirmButtonColor: '#2563eb' });
        }
    </script>
</body>