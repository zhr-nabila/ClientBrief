<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih | Z-STUDIO</title>
    
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-dark: #0F2027;
            --primary-blue: #0DB8D3;
            --primary-deep: #1B7FDC;
            --secondary-light: #30E9FE;
            --accent-green: #259745;
            --text-light: #CCDDCF;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0F2027 0%, #11212D 50%, #0F2027 100%);
            min-height: 100vh;
            color: var(--text-light);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 80%, rgba(13, 184, 211, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(48, 233, 254, 0.15) 0%, transparent 50%);
            z-index: -1;
        }
        
        .success-container {
            max-width: 500px;
            width: 100%;
            text-align: center;
            background: rgba(15, 32, 39, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(48, 233, 254, 0.2);
            border-radius: 25px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: containerAppear 0.6s ease;
        }
        
        @keyframes containerAppear {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .success-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, var(--accent-green), #2ECC71);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 2.5rem;
            color: white;
            animation: iconPulse 2s infinite;
        }
        
        @keyframes iconPulse {
            0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(37, 151, 69, 0.4); }
            50% { transform: scale(1.05); box-shadow: 0 0 0 20px rgba(37, 151, 69, 0); }
        }
        
        h1 {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-light));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 20px;
        }
        
        .thank-you-text {
            font-size: 1.2rem;
            margin-bottom: 10px;
            color: var(--text-light);
        }
        
        .client-name {
            color: var(--primary-blue);
            font-weight: 700;
        }
        
        .info-box {
            background: rgba(48, 233, 254, 0.1);
            border: 1px solid rgba(48, 233, 254, 0.2);
            border-radius: 15px;
            padding: 25px;
            margin: 30px 0;
            text-align: left;
        }
        
        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .info-item:last-child {
            margin-bottom: 0;
        }
        
        .info-icon {
            color: var(--primary-blue);
            font-size: 1.2rem;
            min-width: 24px;
        }
        
        .info-text h3 {
            font-size: 1rem;
            color: white;
            margin-bottom: 5px;
        }
        
        .info-text p {
            font-size: 0.9rem;
            color: var(--text-light);
            opacity: 0.8;
        }
        
        .actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        
        .btn {
            padding: 16px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--primary-deep));
            color: white;
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(13, 184, 211, 0.4);
        }
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--text-light);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--primary-blue);
        }
        
        .btn-whatsapp {
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
        }
        
        .btn-whatsapp:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
        }
        
        .security-note {
            margin-top: 25px;
            font-size: 0.85rem;
            color: var(--text-light);
            opacity: 0.6;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        @media (max-width: 480px) {
            .success-container {
                padding: 40px 25px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .success-icon {
                width: 80px;
                height: 80px;
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <!-- Success Icon -->
        <div class="success-icon">
            <i class="fas fa-check"></i>
        </div>
        
        <!-- Success Message -->
        <h1>BRIEF TERKIRIM!</h1>
        
        <p class="thank-you-text">
            Terima kasih <span class="client-name"><?= htmlspecialchars($_GET['name'] ?? 'Klien') ?></span>, 
            brief proyek Anda telah berhasil kami terima.
        </p>
        
        <!-- Info Box -->
        <div class="info-box">
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="info-text">
                    <h3>Tim akan menghubungi Anda</h3>
                    <p>Dalam 1x24 jam via email</p>
                </div>
            </div>
            
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info-text">
                    <h3>Notifikasi telah dikirim</h3>
                    <p>Ke admin@zstudio.com</p>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="actions">
            <a href="index.php" class="btn btn-primary">
                <i class="fas fa-home"></i>
                Kembali ke Beranda
            </a>
            
            <button onclick="window.print()" class="btn btn-secondary">
                <i class="fas fa-print"></i>
                Cetak Bukti Brief
            </button>
            
            <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-whatsapp">
                <i class="fab fa-whatsapp"></i>
                Chat via WhatsApp
            </a>
        </div>
        
        <!-- Security Note -->
        <p class="security-note">
            <i class="fas fa-shield-alt"></i>
            Data Anda aman & terenkripsi
        </p>
    </div>
    
    <script>
        // Create confetti effect
        function createConfetti() {
            const colors = ['#0DB8D3', '#1B7FDC', '#30E9FE', '#259745'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.style.position = 'fixed';
                confetti.style.width = Math.random() * 10 + 5 + 'px';
                confetti.style.height = confetti.style.width;
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.borderRadius = Math.random() > 0.5 ? '50%' : '0';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.top = '-20px';
                confetti.style.opacity = '0';
                confetti.style.zIndex = '-1';
                
                document.body.appendChild(confetti);
                
                // Animate
                const animation = confetti.animate([
                    { 
                        transform: 'translateY(0) rotate(0deg)', 
                        opacity: 1 
                    },
                    { 
                        transform: `translateY(${window.innerHeight + 100}px) rotate(${Math.random() * 360}deg)`, 
                        opacity: 0 
                    }
                ], {
                    duration: Math.random() * 3000 + 2000,
                    easing: 'cubic-bezier(0.215, 0.61, 0.355, 1)'
                });
                
                // Remove after animation
                animation.onfinish = () => confetti.remove();
            }
        }
        
        // Create confetti on load
        document.addEventListener('DOMContentLoaded', () => {
            createConfetti();
        });
    </script>
</body>
</html>