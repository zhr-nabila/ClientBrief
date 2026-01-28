<?php
// File: admin/export_excel.php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include '../includes/koneksi.php';

// Set headers for Excel download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=zstudio_projects_" . date('Y-m-d') . ".xls");
header("Pragma: no-cache");
header("Expires: 0");

// Query data
$sql = "SELECT 
    id,
    nama_klien,
    email_klien,
    no_telepon,
    jasa_pilihan,
    kebutuhan_detail,
    nama_file,
    status,
    DATE_FORMAT(tgl_input, '%d/%m/%Y %H:%i') as tgl_input,
    deadline,
    keterangan_admin
    FROM tb_projek 
    ORDER BY tgl_input DESC";

$result = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Z-STUDIO Project Briefs</h2>
    <p>Exported: <?php echo date('d/m/Y H:i'); ?></p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Project ID</th>
                <th>Client Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Service</th>
                <th>Status</th>
                <th>Submission Date</th>
                <th>Deadline</th>
                <th>File</th>
                <th>Admin Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td>#<?php echo str_pad($row['id'], 6, '0', STR_PAD_LEFT); ?></td>
                <td><?php echo htmlspecialchars($row['nama_klien']); ?></td>
                <td><?php echo htmlspecialchars($row['email_klien']); ?></td>
                <td><?php echo htmlspecialchars($row['no_telepon']); ?></td>
                <td><?php echo htmlspecialchars($row['jasa_pilihan']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td><?php echo $row['tgl_input']; ?></td>
                <td><?php echo $row['deadline']; ?></td>
                <td><?php echo $row['nama_file']; ?></td>
                <td><?php echo htmlspecialchars($row['keterangan_admin']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
<?php mysqli_close($koneksi); ?>