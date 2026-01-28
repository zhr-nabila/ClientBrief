<?php
// Start session
session_start();

// Include database connection
include 'koneksi.php';

// Get project ID and name from URL
$project_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$client_name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Klien';

// If no ID, redirect to homepage
if ($project_id === 0) {
    header("Location: index.php");
    exit();
}

// Fetch project details from database
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
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih | Z-STUDIO</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        .success-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            animation: cardSlideUp 0.5s ease;
        }
        
        @keyframes cardSlideUp {
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
            animation: iconPulse 2s infinite;
        }
        
        @keyframes iconPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .success-title {
            font-size: 2.5rem;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .success-message {
            font-size: 1.1rem;
            color: #64748b;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        
        .project-details {
            background: #f8fafc;
            border-radius: 16px;
            padding: 30px;
            margin: 30px 0;
            text-align: left;
        }
        
        .project-details h3 {
            color: #1e293b;
            margin-bottom: 20px;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .project-details h3 i {
            color: #3b82f6;
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
        
        .success-actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-top: 40px;
        }
        
        .success-actions .btn {
            width: 100%;
        }
        
        @media (min-width: 768px) {
            .success-card {
                padding: 80px 60px;
            }
            
            .success-actions {
                flex-direction: row;
            }
            
            .success-actions .btn {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="success-page">
        <div class="success-card">
            <!-- Success Icon -->
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            
            <!-- Title -->
            <h1 class="success-title">Brief Terkirim!</h1>
            
            <!-- Message -->
            <p class="success-message">
                Terima kasih <strong><?php echo $client_name; ?></strong>, 
                brief proyek Anda telah berhasil kami terima. Tim kami akan segera menghubungi Anda.
            </p>
            
            <!-- Project Details -->
            <div class="project-details">
                <h3><i class="fas fa-info-circle"></i> Detail Brief</h3>
                
                <div class="detail-item">
                    <span class="detail-label">Nomor Referensi</span>
                    <span class="detail-value">#<?php echo str_pad($project_id, 6, '0', STR_PAD_LEFT); ?></span>
                </div>
                
                <div class="detail-item">
                    <span class="detail-label">Layanan</span>
                    <span class="detail-value"><?php echo htmlspecialchars($project['jasa_pilihan']); ?></span>
                </div>
                
                <div class="detail-item">
                    <span class="detail-label">Waktu Kirim</span>
                    <span class="detail-value">
                        <?php echo date('d M Y, H:i', strtotime($project['tgl_input'])); ?> WIB
                    </span>
                </div>
                
                <div class="detail-item">
                    <span class="detail-label">Status</span>
                    <span class="detail-value" style="color: #f59e0b; font-weight: 600;">
                        <?php echo $project['status']; ?>
                    </span>
                </div>
            </div>
            
            <!-- Next Steps -->
            <div class="project-details">
                <h3><i class="fas fa-forward"></i> Langkah Selanjutnya</h3>
                <p style="color: #64748b; line-height: 1.6; margin-bottom: 0;">
                    1. Tim kami akan menghubungi Anda dalam 1x24 jam via email<br>
                    2. Jadwalkan sesi konsultasi dengan tim ahli kami<br>
                    3. Dapatkan proposal dan timeline proyek<br>
                    4. Mulai eksekusi proyek digital Anda
                </p>
            </div>
            
            <!-- Action Buttons -->
            <div class="success-actions">
                <a href="index.php" class="btn btn-primary">
                    <i class="fas fa-home"></i>
                    Kembali ke Beranda
                </a>
                
                <button onclick="window.print()" class="btn btn-secondary">
                    <i class="fas fa-print"></i>
                    Cetak Bukti
                </button>
                
                <a href="https://wa.me/6281234567890" target="_blank" class="btn" style="background: #25D366; color: white;">
                    <i class="fab fa-whatsapp"></i>
                    Chat WhatsApp
                </a>
            </div>
            
            <!-- Note -->
            <p style="margin-top: 30px; color: #94a3b8; font-size: 0.9rem;">
                <i class="fas fa-shield-alt"></i>
                Data Anda aman & terenkripsi. Kami menghargai privasi Anda.
            </p>
        </div>
    </div>
    
    <!-- Confetti Effect -->
    <script>
        // Simple confetti effect
        document.addEventListener('DOMContentLoaded', function() {
            const colors = ['#3b82f6', '#8b5cf6', '#10b981', '#f59e0b'];
            
            for (let i = 0; i < 100; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'fixed';
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = Math.random() * 10 + 5 + 'px';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-20px';
                confetti.style.opacity = Math.random() * 0.5 + 0.5;
                confetti.style.zIndex = '-1';
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
            }
        });
    </script>
</body>
</html>
<?php mysqli_close($koneksi); ?>