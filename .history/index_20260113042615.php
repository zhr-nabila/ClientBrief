<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Agency Terpercaya</title>
    
    <!-- Meta Tags SEO -->
    <meta name="description" content="Transformasi digital untuk bisnis Anda. Solusi SEO, Social Media, Web Development, dan Google Ads dengan hasil terukur.">
    <meta name="keywords" content="digital agency, SEO, social media marketing, web development, google ads, digital marketing">
    <meta name="author" content="Z-STUDIO Digital Agency">
    <meta property="og:title" content="Z-STUDIO | Digital Agency Terpercaya">
    <meta property="og:description" content="Transformasi digital untuk bisnis Anda dengan hasil nyata.">
    <meta property="og:type" content="website">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✨</text></svg>">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <!-- Logo -->
            <a href="#home" class="logo">
                <div class="logo-icon">Z</div>
                <div class="logo-text">
                    <span class="logo-main">STUDIO</span>
                    <span class="logo-dot">.</span>
                </div>
            </a>
            
            <!-- Desktop Navigation -->
            <div class="nav-desktop">
                <div class="nav-menu">
                    <a href="#home" class="nav-link">Beranda</a>
                    <a href="#services" class="nav-link">Layanan</a>
                    <a href="#process" class="nav-link">Proses</a>
                    <a href="#cta" class="nav-link">Konsultasi</a>
                    <a href="#contact" class="nav-link">Kontak</a>
                </div>
                
                <!-- CTA Button -->
                <button onclick="startBrief()" class="nav-cta">
                    <i class="fas fa-rocket"></i>
                    <span>Mulai Projek</span>
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button class="mobile-toggle" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        <div class="mobile-container">
            <a href="#home" class="mobile-link" onclick="closeMobileMenu()">Beranda</a>
            <a href="#services" class="mobile-link" onclick="closeMobileMenu()">Layanan</a>
            <a href="#process" class="mobile-link" onclick="closeMobileMenu()">Proses</a>
            <a href="#cta" class="mobile-link" onclick="closeMobileMenu()">Konsultasi</a>
            <a href="#contact" class="mobile-link" onclick="closeMobileMenu()">Kontak</a>
            <button onclick="startBrief(); closeMobileMenu();" class="mobile-cta">
                Mulai Projek
            </button>
        </div>
    </div>
    
    <main>
        <!-- Hero Section -->
        <section id="home" class="hero">
            <div class="hero-background">
                <div class="bg-shape bg-shape-1"></div>
                <div class="bg-shape bg-shape-2"></div>
                <div class="bg-shape bg-shape-3"></div>
            </div>
            
            <div class="container">
                <div class="hero-content">
                    <!-- Badge -->
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        <span class="badge-text">Digital Agency Terpercaya</span>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="hero-title">
                        Transformasi Digital untuk <span class="text-gradient">Kesuksesan Bisnis</span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="hero-description">
                        Kami membantu bisnis berkembang dengan solusi digital yang inovatif, terukur, dan berorientasi pada hasil. Tingkatkan performa online Anda bersama tim ahli kami.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-actions">
                        <button onclick="startBrief()" class="btn btn-primary">
                            <i class="fas fa-calendar-check"></i>
                            Konsultasi Gratis
                        </button>
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-secondary">
                            <i class="fab fa-whatsapp"></i>
                            Chat via WhatsApp
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="hero-stats">
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-number">50+</div>
                                <div class="stat-label">Klien Puas</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">200+</div>
                                <div class="stat-label">Proyek Selesai</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">95%</div>
                                <div class="stat-label">Success Rate</div>
                            </div>
                            <div class="stat-card">
                                <div class="stat-number">24/7</div>
                                <div class="stat-label">Dukungan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Services Section -->
        <section id="services" class="services">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Layanan Unggulan Kami</h2>
                    <p class="section-subtitle">Solusi komprehensif untuk setiap kebutuhan digital Anda</p>
                </div>
                
                <div class="services-grid">
                    <!-- Service 1 -->
                    <div class="service-card" data-aos="fade-up">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="service-title">SEO Optimization</h3>
                        <p class="service-description">
                            Tingkatkan visibilitas website di hasil pencarian Google dengan strategi SEO terbaru.
                        </p>
                        <ul class="service-features">
                            <li>Technical SEO Audit</li>
                            <li>Keyword Research</li>
                            <li>On-Page Optimization</li>
                            <li>Monthly Performance Report</li>
                        </ul>
                    </div>
                    
                    <!-- Service 2 -->
                    <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <h3 class="service-title">Social Media Management</h3>
                        <p class="service-description">
                            Kelola dan optimalkan media sosial untuk engagement maksimal dan brand awareness.
                        </p>
                        <ul class="service-features">
                            <li>Content Strategy</li>
                            <li>Community Management</li>
                            <li>Performance Analytics</li>
                            <li>Paid Social Ads</li>
                        </ul>
                    </div>
                    
                    <!-- Service 3 -->
                    <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3 class="service-title">Web Development</h3>
                        <p class="service-description">
                            Website responsif dan performa tinggi untuk pengalaman pengguna terbaik.
                        </p>
                        <ul class="service-features">
                            <li>Custom Design</li>
                            <li>Mobile Responsive</li>
                            <li>CMS Integration</li>
                            <li>Maintenance Support</li>
                        </ul>
                    </div>
                    
                    <!-- Service 4 -->
                    <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-icon">
                            <i class="fas fa-ad"></i>
                        </div>
                        <h3 class="service-title">Google Ads</h3>
                        <p class="service-description">
                            Kampanye iklan terukur untuk konversi maksimal dengan ROI yang optimal.
                        </p>
                        <ul class="service-features">
                            <li>Campaign Setup</li>
                            <li>Keyword Optimization</li>
                            <li>A/B Testing</li>
                            <li>ROI Tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Process Section -->
        <section id="process" class="process">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Proses Kolaborasi</h2>
                    <p class="section-subtitle">Cara kami bekerja untuk kesuksesan proyek Anda</p>
                </div>
                
                <div class="process-steps">
                    <div class="process-step">
                        <div class="step-number">01</div>
                        <h3 class="step-title">Konsultasi</h3>
                        <p class="step-description">
                            Diskusi kebutuhan dan tujuan proyek untuk memahami visi Anda.
                        </p>
                    </div>
                    
                    <div class="process-step">
                        <div class="step-number">02</div>
                        <h3 class="step-title">Perencanaan</h3>
                        <p class="step-description">
                            Penyusunan strategi dan roadmap untuk mencapai target.
                        </p>
                    </div>
                    
                    <div class="process-step">
                        <div class="step-number">03</div>
                        <h3 class="step-title">Eksekusi</h3>
                        <p class="step-description">
                            Implementasi solusi dengan teknologi terbaru dan best practices.
                        </p>
                    </div>
                    
                    <div class="process-step">
                        <div class="step-number">04</div>
                        <h3 class="step-title">Evaluasi</h3>
                        <p class="step-description">
                            Monitoring hasil dan optimasi berkelanjutan untuk performa maksimal.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section id="cta" class="cta-section">
            <div class="container">
                <div class="cta-content">
                    <h2 class="cta-title">Siap Transformasi Digital Bisnis Anda?</h2>
                    <p class="cta-description">
                        Mulai proyek Anda sekarang dan dapatkan konsultasi strategis gratis dari tim ahli kami.
                    </p>
                    <button onclick="startBrief()" class="btn btn-primary btn-large">
                        <i class="fas fa-paper-plane"></i>
                        Mulai Sekarang
                    </button>
                </div>
            </div>
        </section>
        
        <!-- Project Brief Form (Hidden) -->
        <div class="brief-modal" id="briefModal">
            <div class="modal-container">
                <div class="modal-header">
                    <h2 class="modal-title">Project Brief Form</h2>
                    <button class="modal-close" onclick="closeBrief()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form id="projectForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                        <!-- Step 1: Contact Info -->
                        <div class="form-step active" id="step1">
                            <h3 class="step-title">Informasi Kontak</h3>
                            
                            <div class="form-group">
                                <label for="nama">Nama Lengkap / Perusahaan *</label>
                                <input type="text" id="nama" name="nama" class="form-input" placeholder="Masukkan nama lengkap atau perusahaan" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Aktif *</label>
                                <input type="email" id="email" name="email" class="form-input" placeholder="email@contoh.com" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="telepon">Nomor Telepon</label>
                                <input type="tel" id="telepon" name="telepon" class="form-input" placeholder="+62 812-3456-7890">
                            </div>
                            
                            <div class="form-buttons">
                                <button type="button" class="btn btn-next" onclick="nextStep(2)">
                                    Selanjutnya
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 2: Service Selection -->
                        <div class="form-step" id="step2">
                            <h3 class="step-title">Pilih Layanan</h3>
                            
                            <div class="service-options">
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="SEO Optimization" required>
                                    <div class="option-content">
                                        <div class="option-icon">
                                            <i class="fas fa-chart-line"></i>
                                        </div>
                                        <div class="option-text">
                                            <h4>SEO Optimization</h4>
                                            <p>Optimasi website untuk ranking Google</p>
                                        </div>
                                    </div>
                                </label>
                                
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="Social Media Management">
                                    <div class="option-content">
                                        <div class="option-icon">
                                            <i class="fab fa-instagram"></i>
                                        </div>
                                        <div class="option-text">
                                            <h4>Social Media Management</h4>
                                            <p>Kelola media sosial untuk engagement</p>
                                        </div>
                                    </div>
                                </label>
                                
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="Web Development">
                                    <div class="option-content">
                                        <div class="option-icon">
                                            <i class="fas fa-code"></i>
                                        </div>
                                        <div class="option-text">
                                            <h4>Web Development</h4>
                                            <p>Website custom dengan performa optimal</p>
                                        </div>
                                    </div>
                                </label>
                                
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="Google Ads">
                                    <div class="option-content">
                                        <div class="option-icon">
                                            <i class="fas fa-ad"></i>
                                        </div>
                                        <div class="option-text">
                                            <h4>Google Ads</h4>
                                            <p>Kampanye iklan terukur untuk konversi</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            
                            <div class="form-buttons">
                                <button type="button" class="btn btn-outline" onclick="prevStep(1)">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </button>
                                <button type="button" class="btn btn-next" onclick="nextStep(3)">
                                    Selanjutnya
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 3: Project Details -->
                        <div class="form-step" id="step3">
                            <h3 class="step-title">Detail Projek</h3>
                            
                            <div class="form-group">
                                <label for="pesan">Ceritakan tentang proyek Anda *</label>
                                <textarea id="pesan" name="pesan" class="form-textarea" rows="6" placeholder="Jelaskan tujuan proyek, target audience, timeline, dan informasi penting lainnya..." required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="deadline">Deadline yang Diharapkan</label>
                                <input type="date" id="deadline" name="deadline" class="form-input">
                            </div>
                            
                            <div class="form-group">
                                <label for="file_brief">Lampirkan File (Opsional)</label>
                                <div class="file-upload">
                                    <input type="file" id="file_brief" name="file_brief" accept=".pdf,.doc,.docx,.jpg,.png,.zip">
                                    <div class="upload-area">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <p>Klik untuk upload file</p>
                                        <small>PDF, DOC, JPG, PNG, ZIP (Maks. 10MB)</small>
                                    </div>
                                </div>
                                <div id="filePreview"></div>
                            </div>
                            
                            <div class="form-buttons">
                                <button type="button" class="btn btn-outline" onclick="prevStep(2)">
                                    <i class="fas fa-arrow-left"></i>
                                    Kembali
                                </button>
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i>
                                    Kirim Brief
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <!-- Progress Indicator -->
                    <div class="form-progress">
                        <div class="progress-bar">
                            <div class="progress-fill" id="progressFill"></div>
                        </div>
                        <div class="progress-steps">
                            <div class="progress-step active">1</div>
                            <div class="progress-step">2</div>
                            <div class="progress-step">3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact Section -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="contact-content">
                    <div class="contact-info">
                        <h2 class="section-title">Hubungi Kami</h2>
                        <p class="contact-description">
                            Mari berdiskusi tentang proyek Anda. Tim kami siap membantu mencapai tujuan digital Anda.
                        </p>
                        
                        <div class="contact-details">
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-text">
                                    <h3>Email</h3>
                                    <p>hello@zstudio.co.id</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-text">
                                    <h3>Telepon</h3>
                                    <p>+62 812 3456 7890</p>
                                </div>
                            </div>
                            
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-text">
                                    <h3>Lokasi</h3>
                                    <p>Jakarta, Indonesia</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="social-links">
                            <a href="#" class="social-link">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="#" class="social-link">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-logo">
                    <div class="logo">
                        <div class="logo-icon">Z</div>
                        <div class="logo-text">
                            <span class="logo-main">STUDIO</span>
                            <span class="logo-dot">.</span>
                        </div>
                    </div>
                    <p class="footer-tagline">
                        Digital Agency terpercaya untuk transformasi bisnis Anda.
                    </p>
                </div>
                
                <div class="footer-links">
                    <div class="link-group">
                        <h3>Perusahaan</h3>
                        <a href="#home">Beranda</a>
                        <a href="#services">Layanan</a>
                        <a href="#process">Proses</a>
                        <a href="#cta">Konsultasi</a>
                    </div>
                    
                    <div class="link-group">
                        <h3>Layanan</h3>
                        <a href="#services">SEO Optimization</a>
                        <a href="#services">Social Media</a>
                        <a href="#services">Web Development</a>
                        <a href="#services">Google Ads</a>
                    </div>
                    
                    <div class="link-group">
                        <h3>Legal</h3>
                        <a href="#">Kebijakan Privasi</a>
                        <a href="#">Syarat & Ketentuan</a>
                        <a href="#">FAQ</a>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p class="copyright">
                    &copy; 2024 Z-STUDIO. All rights reserved.
                </p>
                <div class="footer-actions">
                    <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-btn">
                        <i class="fab fa-whatsapp"></i>
                        Chat via WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
        
        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>