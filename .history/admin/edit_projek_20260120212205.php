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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        
        :root {
            --primary: #FE7F42;
            --primary-dark: #B32C1A;
        }
        
        body {
            background-color: #f8fafc;
            color: #1e293b;
        }
        
        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1);
        }
        
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 15px;
            color: #334155;
            background-color: white;
            transition: all 0.2s;
        }
        
        .form-input:hover {
            border-color: #94a3b8;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(254, 127, 66, 0.1);
        }
        
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2364758b' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
            padding-right: 40px;
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            font-weight: 600;
            padding: 14px 24px;
            border-radius: 8px;
            border: none;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.2s;
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
        }
        
        .label {
            font-size: 12px;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
            display: block;
        }
        
        .value {
            font-size: 16px;
            color: #1e293b;
            font-weight: 500;
        }
        
        .brief-text {
            color: #475569;
            line-height: 1.6;
            font-style: italic;
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
            border-left: 3px solid var(--primary);
        }
    </style>
</head>

<body class="min-h-screen p-6">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <a href="index.php" class="inline-flex items-center gap-2 text-gray-600 hover:text-gray-900 mb-6">
                <i data-lucide="arrow-left" class="w-4 h-4"></i>
                Kembali ke Dashboard
            </a>
            
            <h1 class="text-2xl font-bold text-gray-900">KELOLA PROJECT</h1>
        </div>

        <!-- Form Container -->
        <div class="card p-6">
            <form action="update_status.php" method="POST" class="space-y-8">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <!-- Client Info Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-8">
                        <!-- Nama Klien -->
                        <div>
                            <label class="label">NAMA KLIEN</label>
                            <div class="value text-lg"><?= htmlspecialchars($data['nama_klien']) ?></div>
                        </div>
                        
                        <!-- Layanan -->
                        <div>
                            <label class="label">LAYANAN</label>
                            <div class="value"><?= htmlspecialchars($data['jasa_pilihan']) ?></div>
                        </div>
                    </div>
                    
                    <!-- Right Column (Brief) -->
                    <div>
                        <label class="label">BRIEF KEBUTUHAN</label>
                        <div class="brief-text mt-2">"<?= htmlspecialchars($data['kebutuhan_detail']) ?>"</div>
                    </div>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200"></div>

                <!-- Status Update -->
                <div>
                    <label class="label mb-3">UPDATE STATUS PROYEK</label>
                    <select name="status" class="form-input" required>
                        <option value="Pending" <?= $data['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="Disetujui" <?= $data['status'] == 'Disetujui' ? 'selected' : '' ?>>Disetujui</option>
                        <option value="Dalam Pengerjaan" <?= $data['status'] == 'Dalam Pengerjaan' ? 'selected' : '' ?>>Dalam Pengerjaan</option>
                        <option value="Selesai" <?= $data['status'] == 'Selesai' ? 'selected' : '' ?>>Selesai</option>
                        <option value="Ditolak" <?= $data['status'] == 'Ditolak' ? 'selected' : '' ?>>Ditolak</option>
                    </select>
                </div>

                <!-- Admin Notes -->
                <div>
                    <label class="label mb-3">CATATAN ADMIN (INTERNAL)</label>
                    <textarea 
                        name="keterangan_admin" 
                        rows="4" 
                        class="form-input" 
                        placeholder="Tambahkan catatan progres di sini..."
                    ><?= htmlspecialchars($data['keterangan_admin']) ?></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="update_status" class="btn-primary">
                    Simpan Perubahan
                </button>
            </form>
        </div>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Simple form validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const select = document.querySelector('select[name="status"]');
            if (!select.value) {
                e.preventDefault();
                select.focus();
                select.style.borderColor = '#ef4444';
                setTimeout(() => {
                    select.style.borderColor = '#cbd5e1';
                }, 1000);
                return false;
            }
            return true;
        });
        
        // Add focus effects
        const formElements = document.querySelectorAll('.form-input');
        formElements.forEach(el => {
            el.addEventListener('focus', function() {
                this.style.borderColor = '#FE7F42';
                this.style.boxShadow = '0 0 0 3px rgba(254, 127, 66, 0.1)';
            });
            
            el.addEventListener('blur', function() {
                this.style.boxShadow = 'none';
            });
        });
    </script>
</body>

</html>