<?php
include '../koneksi.php'; 

$query = "SELECT * FROM tb_projek ORDER BY tgl_input DESC";
$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Client Brief</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50">

    <div class="flex">
        <div class="w-64 min-h-screen bg-slate-900 text-white p-6 hidden md:block">
            <div class="text-xl font-bold mb-10 tracking-tighter">Z-STUDIO<span class="text-blue-500 text-2xl">.</span></div>
            <nav class="space-y-4">
                <a href="#" class="block py-2.5 px-4 rounded bg-blue-600 text-white">Dashboard</a>
                <a href="../index.php" class="block py-2.5 px-4 rounded text-slate-400 hover:bg-slate-800 transition">Lihat Web</a>
            </nav>
        </div>

        <div class="flex-1 p-6 md:p-10">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Incoming Project Briefs</h1>
                    <p class="text-slate-500 text-sm">Kelola semua permintaan projek masuk di sini.</p>
                </div>
                <div class="bg-white px-4 py-2 rounded-xl shadow-sm border border-slate-200 text-sm font-semibold">
                    Total: <?php echo mysqli_num_rows($hasil); ?> Briefs
                </div>
            </header>

            <div class="bg-white rounded-[24px] shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-slate-50 border-b border-slate-100">
                        <tr>
                            <th class="p-5 text-xs font-bold uppercase tracking-widest text-slate-400">Tanggal</th>
                            <th class="p-5 text-xs font-bold uppercase tracking-widest text-slate-400">Klien</th>
                            <th class="p-5 text-xs font-bold uppercase tracking-widest text-slate-400">Layanan</th>
                            <th class="p-5 text-xs font-bold uppercase tracking-widest text-slate-400">Detail Brief</th>
                            <th class="p-5 text-xs font-bold uppercase tracking-widest text-slate-400">File</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <?php while($row = mysqli_fetch_assoc($hasil)): ?>
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="p-5 text-sm text-slate-500">
                                <?php echo date('d M Y', strtotime($row['tgl_input'])); ?>
                            </td>
                            <td class="p-5">
                                <div class="font-bold text-slate-800"><?php echo $row['nama_klien']; ?></div>
                                <div class="text-xs text-slate-400"><?php echo $row['email_klien']; ?></div>
                            </td>
                            <td class="p-5">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-[10px] font-bold uppercase">
                                    <?php echo $row['jasa_pilihan']; ?>
                                </span>
                            </td>
                            <td class="p-5 text-sm text-slate-600 italic">
                                "<?php echo substr($row['kebutuhan_detail'], 0, 50); ?>..."
                            </td>
                            <td class="p-5">
                                <?php if($row['nama_file']): ?>
                                    <a href="../uploads/<?php echo $row['nama_file']; ?>" target="_blank" class="text-blue-600 hover:underline text-xs font-semibold flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                                        Download
                                    </a>
                                <?php else: ?>
                                    <span class="text-slate-300 text-xs italic">No File</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>