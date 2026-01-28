<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Briefing Project - Digital Studio</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f9;
            color: #333;
        }
        .form-container {
            max-width: 600px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .header-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: #1a1a1a;
        }
        .btn-primary {
            background-color: #2563eb;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #1d4ed8;
        }
        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            color: #4b5563;
        }
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #d1d5db;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
            border-color: #2563eb;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <div class="text-center mb-5">
            <h2 class="header-title">Project Brief</h2>
            <p class="text-muted">Bantu kami mengenal proyek impianmu lebih dalam.</p>
        </div>

        <form action="simpan_brief.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-4">
                <label class="form-label">Nama Kamu / Perusahaan</label>
                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Email Aktif</label>
                <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
            </div>

            <div class="mb-4">
                <label class="form-label">Layanan yang Dicari</label>
                <select name="jasa" class="form-select" required>
                    <option value="" selected disabled>Pilih layanan...</option>
                    <option value="Web Design">Web Design & Dev</option>
                    <option value="Branding">Branding Identity</option>
                    <option value="Marketing">Digital Marketing</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">Apa yang ingin kamu buat?</label>
                <textarea name="pesan" class="form-control" rows="5" placeholder="Ceritain sedikit tentang proyeknya..."></textarea>
            </div>

            <div class="mb-4">
                <label class="form-label">Lampiran Dokumen (Opsional)</label>
                <input type="file" name="file_brief" class="form-control">
                <div class="form-text">Bisa berupa gambar referensi atau PDF.</div>
            </div>

            <div class="d-grid mt-5">
                <button type="submit" name="submit" class="btn btn-primary">Kirim Penjelasan Proyek</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>