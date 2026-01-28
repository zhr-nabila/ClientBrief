<?php
// Start session
session_start();

// Include database connection
include 'includes/koneksi.php';

// Get project ID and name from URL
$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$client_name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Klien';

// If no ID, redirect to homepage
if ($project_id === 0) {
    header("Location: index.php");
    exit();
}

// Fetch project details
$query = "SELECT * FROM tb_projek WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "i", $project_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$project = mysqli_fetch_assoc($result);

if (!$project) {
    header("Location: index.php");
    exit();
}

// Format dates
$submission_date = date('d F Y, H:i', strtotime($project['tgl_input']));
$submission_time = date('H:i', strtotime($project['tgl_input']));

// Get service icon
$service_icons = [
    'SEO Optimization' => 'fas fa-search',
    'Social Media Management' => 'fab fa-instagram',
    'Web Development' => 'fas fa-code',
    'Google Ads' => 'fas fa-ad'
];
$service_icon = $service_icons[$project['jasa_pilihan']] ?? 'fas fa-cube';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih | Z-STUDIO</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .success-card {
            background: white;
            border-radius: 24px;
            padding: 60px 40px;
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            animation: slideUp 0.5s ease;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #10b981, #34d399);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            color: white;
            font-size: 2.5rem;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .project-details {
            background: #f8fafc;
            border-radius: 16px;
            padding: 30px;
            margin: 30px 0;
            text-align: left;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .detail-item:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            color: #64748b;
            font-weight: 500;
        }
        
        .detail-value {
            color: #1e293b;
            font-weight: 600;
        }
        
        .steps {
            text-align: left;
            margin: 30px 0;
        }
        
        .step {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 20px;
        }
        
        .step-number {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #2563eb, #7c3aed);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.875rem;
            flex-shrink: 0;
        }
        
        .step-content h4 {
            font-weight: 600;
            margin-bottom: 4px;
            color: #1e293b;
        }
        
        .step-content p {
            color: #64748b;
            font-size: 0.875rem;
            margin: 0;
        }
        
        @media (max-width: 768px) {
            .success-card {
                padding: 40px 24px;
            }
        }
    </style>
</head>
<body>
    <div class="success-card">
        <!-- Success Icon -->
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        
        <!-- Title -->
        <h1 class="text-3xl font-bold mb-3 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
            Brief Terkirim!
        </h1>
        
        <!-- Message -->
        <p class="text-gray-600 mb-6">
            Terima kasih <span class="font-semibold"><?php echo $client_name; ?></span>, 
            brief proyek Anda telah berhasil kami terima.
        </p>
        
        <!-- Project Details -->
        <div class="project-details">
            <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <i class="fas fa-info-circle text-blue-500"></i>
                Detail Brief
            </h3>
            
            <div class="detail-item">
                <span class="detail-label">Nomor Referensi</span>
                <span class="detail-value">#<?php echo str_pad($project_id, 6, '0', STR_PAD_LEFT); ?></span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Layanan</span>
                <span class="detail-value flex items-center gap-2">
                    <i class="<?php echo $service_icon; ?>"></i>
                    <?php echo htmlspecialchars($project['jasa_pilihan']); ?>
                </span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Waktu Kirim</span>
                <span class="detail-value"><?php echo $submission_date; ?> WIB</span>
            </div>
            
            <div class="detail-item">
                <span class="detail-label">Status</span>
                <span class="detail-value">
                    <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                        <?php echo $project['status']; ?>
                    </span>
                </span>
            </div>
        </div>
        
        <!-- Next Steps -->
        <div class="steps">
            <h3 class="font-semibold text-gray-700 mb-4 flex items-center gap-2">
                <i class="fas fa-forward text-purple-500"></i>
                Langkah Selanjutnya
            </h3>
            
            <div class="step">
                <div class="step-number">1</div>
                <div class="step-content">
                    <h4>Konfirmasi via Email</h4>
                    <p>Tim kami akan mengirimkan konfirmasi via email dalam 1x24 jam.</p>
                </div>
            </div>
            
            <div class="step">
                <div class="step-number">2</div>
                <div class="step-content">
                    <h4>Sesi Konsultasi</h4>
                    <p>Jadwalkan sesi konsultasi gratis dengan tim ahli kami.</p>
                </div>
            </div>
            
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-content">
                    <h4>Proposal & Timeline</h4>
                    <p>Dapatkan proposal detail dan timeline pelaksanaan proyek.</p>
                </div>
            </div>
            
            <div class="step">
                <div class="step-number">4</div>
                <div class="step-content">
                    <h4>Mulai Eksekusi</h4>
                    <p>Tim kami akan mulai bekerja pada proyek digital Anda.</p>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-8">
            <a href="index.php" class="btn-primary flex items-center justify-center gap-2">
                <i class="fas fa-home"></i>
                Beranda
            </a>
            
            <button onclick="window.print()" class="btn-secondary flex items-center justify-center gap-2">
                <i class="fas fa-print"></i>
                Cetak
            </button>
            
            <a href="https://wa.me/6281234567890" target="_blank" class="flex items-center justify-center gap-2 px-6 py-3 bg-green-600 text-white rounded-xl hover:bg-green-700 transition font-medium">
                <i class="fab fa-whatsapp"></i>
                WhatsApp
            </a>
        </div>
        
        <!-- Note -->
        <p class="text-sm text-gray-500 mt-8 flex items-center justify-center gap-2">
            <i class="fas fa-shield-alt text-gray-400"></i>
            Data Anda aman & terenkripsi
        </p>
    </div>
    
    <!-- Confetti Effect -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const colors = ['#3b82f6', '#8b5cf6', '#10b981', '#f59e0b'];
            
            for (let i = 0; i < 100; i++) {
                setTimeout(() => {
                    const confetti = document.createElement('div');
                    confetti.style.position = 'fixed';
                    confetti.style.width = Math.random() * 10 + 5 + 'px';
                    confetti.style.height = Math.random() * 10 + 5 + 'px';
                    confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                    confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                    confetti.style.left = Math.random() * 100 + 'vw';
                    confetti.style.top = '-20px';
                    confetti.style.opacity = Math.random() * 0.5 + 0.5;
                    confetti.style.zIndex = '9999';
                    confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
                    
                    document.body.appendChild(confetti);
                    
                    // Animate
                    setTimeout(() => {
                        confetti.style.transition = `transform ${Math.random() * 3 + 2}s ease-in, top ${Math.random() * 3 + 2}s linear`;
                        confetti.style.transform = `translate(${Math.random() * 100 - 50}px, ${window.innerHeight + 100}px) rotate(${Math.random() * 720}deg)`;
                        confetti.style.opacity = '0';
                    }, Math.random() * 500);
                    
                    // Remove after animation
                    setTimeout(() => {
                        if (confetti.parentElement) {
                            confetti.remove();
                        }
                    }, 5000);
                }, i * 30);
            }
        });
    </script>
</body>
</html>
<?php mysqli_close($koneksi); ?>