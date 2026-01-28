<?php
session_start();
if(!isset($_SESSION['admin_logged_in'])) exit();
include '../koneksi.php';

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data_Brief_ZStudio.xls");

$query = mysqli_query($koneksi, "SELECT * FROM tb_projek ORDER BY tgl_input DESC");
?>
<table border="1">
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Klien</th>
        <th>Email</th>
        <th>Jasa</th>
        <th>Detail Kebutuhan</th>
        <th>Status</th>
    </tr>
    <?php $no=1; while($r = mysqli_fetch_assoc($query)): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $r['tgl_input'] ?></td>
        <td><?= $r['nama_klien'] ?></td>
        <td><?= $r['email_klien'] ?></td>
        <td><?= $r['jasa_pilihan'] ?></td>
        <td><?= $r['kebutuhan_detail'] ?></td>
        <td><?= $r['status'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>