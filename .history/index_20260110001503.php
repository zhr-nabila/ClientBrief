<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Solutions Agency</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Solusi digital marketing untuk bisnis modern. SEO, Social Media, Web Development, dan Google Ads.">
    <meta name="keywords" content="digital marketing, SEO, social media, web development, google ads">
    <meta name="author" content="Z-STUDIO">
    
    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
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
    <nav>
        <div class="nav-content">
            <!-- Logo -->
            <a href="#hero" class="logo">
                <div class="logo-icon">Z</div>
                <div class="logo-text">
                    <span>STUDIO</span>
                    <span style="color: #30E9FE;">.</span>
                </div>
            </a>
            
            <!-- Desktop Navigation -->
            <div class="desktop-nav">
                <div class="nav-links">
                    <a href="#hero" class="nav-link" data-lang="nav-home">Beranda</a>
                    <a href="#services" class="nav-link" data-lang="nav-services">Layanan</a>
                    <a href="#cta" class="nav-link" data-lang="nav-about">Konsultasi</a>
                    <a href="#contact" class="nav-link" data-lang="nav-contact">Kontak</a>
                </div>
                
                <!-- Language Switcher -->
                <div class="lang-switcher">
                    <button onclick="changeLang('id')" id="btn-id" class="lang-btn active">ID</button>
                    <button onclick="changeLang('en')" id="btn-en" class="lang-btn">EN</button>
                </div>
                
                <!-- CTA Button -->
                <button onclick="startBrief()" class="nav-cta" data-lang="nav-apply">
                    Mulai Projek
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu">
        <div class="mobile-links">
            <a href="#hero" class="nav-link" onclick="closeMobileMenu()" data-lang="nav-home">Beranda</a>
            <a href="#services" class="nav-link" onclick="closeMobileMenu()" data-lang="nav-services">Layanan</a>
            <a href="#cta" class="nav-link" onclick="closeMobileMenu()" data-lang="nav-about">Konsultasi</a>
            <a href="#contact" class="nav-link" onclick="closeMobileMenu()" data-lang="nav-contact">Kontak</a>
        </div>
        
        <div class="mobile-actions">
            <div class="lang-switcher" style="margin-bottom: 20px;">
                <button onclick="changeLang('id'); closeMobileMenu();" id="btn-id-mobile" class="lang-btn active">ID</button>
                <button onclick="changeLang('en'); closeMobileMenu();" id="btn-en-mobile" class="lang-btn">EN</button>
            </div>
            
            <button onclick="startBrief(); closeMobileMenu();" class="nav-cta" data-lang="nav-apply">
                Mulai Projek
            </button>
        </div>
    </div>
    
    <main>
        <!-- Hero Section -->
        <section id="hero">
            <div class="hero-bg-elements">
                <div class="bg-element-1"></div>
                <div class="bg-element-2"></div>
                <div class="bg-element-3"></div>
            </div>
            
            <div class="container">
                <div class="hero-content">
                    <!-- Badge -->
                    <div class="hero-badge">
                        <span class="badge-dot"></span>
                        <span class="badge-text">Digital Agency</span>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="hero-title" data-aos="fade-up" data-aos-delay="100">
                        <span class="title-gradient" data-lang="hero-title">TRANSFORMASI DIGITAL</span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="hero-description" data-aos="fade-up" data-aos-delay="200" data-lang="hero-desc">
                        Kami membantu brand Anda tumbuh dengan solusi digital yang inovatif, terukur, dan berorientasi hasil.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="hero-buttons" data-aos="fade-up" data-aos-delay="300">
                        <button onclick="startBrief()" class="btn-primary" data-lang="hero-cta-primary">
                            <i class="fas fa-calendar-check"></i>
                            Konsultasi Gratis
                        </button>
                        
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn-secondary" data-lang="hero-cta-secondary">
                            <i class="fab fa-whatsapp"></i>
                            WhatsApp Kami
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="stats-section" data-aos="fade-up" data-aos-delay="400">
                        <div class="stats-grid">
                            <div class="stats-card">
                                <h3 class="stats-title" data-lang="stat-clients">Klien</h3>
                                <p class="stats-desc" data-lang="stat-clients-desc">Yang mempercayai kami</p>
                            </div>
                            
                            <div class="stats-card">
                                <h3 class="stats-title" data-lang="stat-projects">Proyek</h3>
                                <p class="stats-desc" data-lang="stat-projects-desc">Telah diselesaikan</p>
                            </div>
                            
                            <div class="stats-card">
                                <h3 class="stats-title" data-lang="stat-success">Success Rate</h3>
                                <p class="stats-desc" data-lang="stat-success-desc">Tingkat keberhasilan</p>
                            </div>
                            
                            <div class="stats-card">
                                <h3 class="stats-title" data-lang="stat-support">Support</h3>
                                <p class="stats-desc" data-lang="stat-support-desc">24/7 ketersediaan</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Scroll Indicator -->
                    <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="500">
                        <p class="scroll-text">Scroll untuk lanjut</p>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Services Section -->
        <section id="services">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="text-gradient" data-lang="services-title">Layanan Kami</h2>
                    <p data-lang="services-subtitle">Solusi lengkap untuk semua kebutuhan digital</p>
                </div>
                
                <div class="services-grid">
                    <!-- SEO Service -->
                    <div class="service-card service-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="service-title" data-lang="service-seo-title">SEO Optimization</h3>
                        <p class="service-desc" data-lang="service-seo-desc">
                            Optimasi website untuk ranking teratas di Google dengan strategi terbaru.
                        </p>
                    </div>
                    
                    <!-- Social Media Service -->
                    <div class="service-card service-2" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-icon">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <h3 class="service-title" data-lang="service-social-title">Social Media</h3>
                        <p class="service-desc" data-lang="service-social-desc">
                            Strategi konten kreatif untuk engagement maksimal di platform sosial.
                        </p>
                    </div>
                    
                    <!-- Web Development Service -->
                    <div class="service-card service-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3 class="service-title" data-lang="service-web-title">Web Development</h3>
                        <p class="service-desc" data-lang="service-web-desc">
                            Website custom dengan performa optimal dan keamanan terbaik.
                        </p>
                    </div>
                    
                    <!-- Google Ads Service -->
                    <div class="service-card service-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="service-title" data-lang="service-ads-title">Google Ads</h3>
                        <p class="service-desc" data-lang="service-ads-desc">
                            Kampanye iklan terukur untuk konversi maksimal dan ROI optimal.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Form Section (Hidden by default) -->
        <section id="form-section">
            <div class="container">
                <!-- Close Button -->
                <button onclick="cancelBrief()" class="form-close-btn" title="Tutup form">
                    <i class="fas fa-times"></i>
                </button>
                
                <!-- Form Container -->
                <div class="form-container">
                    <!-- Header -->
                    <div class="form-header">
                        <h2 class="text-gradient" data-lang="form-title">Mulai Projek Anda</h2>
                        <p data-lang="form-subtitle">Isi brief untuk mulai konsultasi</p>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="progress-fill"></div>
                        </div>
                        
                        <!-- Step Indicators -->
                        <div class="step-indicators">
                            <div class="step-indicator active">
                                <div class="step-number">1</div>
                                <div class="step-label" data-lang="step-1-title">Info</div>
                            </div>
                            <div class="step-indicator">
                                <div class="step-number">2</div>
                                <div class="step-label" data-lang="step-2-title">Layanan</div>
                            </div>
                            <div class="step-indicator">
                                <div class="step-number">3</div>
                                <div class="step-label" data-lang="step-3-title">Detail</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Form -->
                    <form action="simpan_brief.php" method="POST" enctype="multipart/form-data">
                        <!-- Step 1: Contact Info -->
                        <div class="step active" data-step="1">
                            <h3 class="text-gradient mb-6" data-lang="step-1-title">Informasi Kontak</h3>
                            
                            <div class="space-y-6">
                                <div class="form-group">
                                    <input type="text" 
                                           name="nama" 
                                           class="form-input" 
                                           placeholder="Nama Lengkap / Perusahaan"
                                           required
                                           data-lang="label-name">
                                </div>
                                
                                <div class="form-group">
                                    <input type="email" 
                                           name="email" 
                                           class="form-input" 
                                           placeholder="Email aktif Anda"
                                           required
                                           data-lang="label-email">
                                </div>
                            </div>
                            
                            <div class="form-buttons mt-8">
                                <button type="button" 
                                        onclick="nextStep(2)" 
                                        class="btn-next"
                                        data-lang="btn-next">
                                    Selanjutnya →
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 2: Service Selection -->
                        <div class="step" data-step="2">
                            <h3 class="text-gradient mb-6" data-lang="step-2-title">Pilih Layanan</h3>
                            
                            <div class="service-options">
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="SEO" required>
                                    <span class="checkmark"></span>
                                    <span class="service-option-text">SEO Optimization</span>
                                </label>
                                
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="Social Media">
                                    <span class="checkmark"></span>
                                    <span class="service-option-text">Social Media Management</span>
                                </label>
                                
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="Web Development">
                                    <span class="checkmark"></span>
                                    <span class="service-option-text">Web Development</span>
                                </label>
                                
                                <label class="service-option">
                                    <input type="radio" name="jasa" value="Google Ads">
                                    <span class="checkmark"></span>
                                    <span class="service-option-text">Google Ads</span>
                                </label>
                            </div>
                            
                            <div class="form-buttons mt-8">
                                <button type="button" 
                                        onclick="nextStep(1)" 
                                        class="btn-back"
                                        data-lang="btn-back">
                                    ← Kembali
                                </button>
                                <button type="button" 
                                        onclick="nextStep(3)" 
                                        class="btn-next"
                                        data-lang="btn-next">
                                    Selanjutnya →
                                </button>
                            </div>
                        </div>
                        
                        <!-- Step 3: Project Details -->
                        <div class="step" data-step="3">
                            <h3 class="text-gradient mb-6" data-lang="step-3-title">Detail Projek</h3>
                            
                            <div class="space-y-6">
                                <div class="form-group">
                                    <textarea name="pesan" 
                                              class="form-input" 
                                              rows="5"
                                              placeholder="Ceritakan tentang proyek Anda..."
                                              data-lang="label-message"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" data-lang="label-file">Upload File (Opsional)</label>
                                    <div class="file-upload-area" onclick="document.getElementById('file-upload').click()">
                                        <div class="file-upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <p class="text-gray-400 mb-2" data-lang="file-hint">Klik untuk upload file</p>
                                        <p class="text-gray-500 text-sm" data-lang="file-types">PDF, DOC, JPG, PNG (Max 5MB)</p>
                                    </div>
                                    <input type="file" 
                                           name="file_brief" 
                                           class="hidden" 
                                           id="file-upload">
                                    <div id="file-name" class="text-sm text-gray-400 mt-3 hidden"></div>
                                </div>
                            </div>
                            
                            <div class="form-buttons mt-8">
                                <button type="button" 
                                        onclick="nextStep(2)" 
                                        class="btn-back"
                                        data-lang="btn-back">
                                    ← Kembali
                                </button>
                                <button type="submit" 
                                        name="submit" 
                                        class="btn-submit"
                                        data-lang="btn-submit">
                                    <i class="fas fa-paper-plane mr-2"></i>
                                    Kirim Brief
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        
        <!-- CTA Section -->
        <section id="cta">
            <div class="cta-bg"></div>
            <div class="container">
                <div class="cta-content" data-aos="zoom-in">
                    <h2 class="cta-title" data-lang="cta-title">Siap Transformasi Digital?</h2>
                    <p class="cta-description" data-lang="cta-desc">
                        Mulai proyek Anda sekarang dan dapatkan konsultasi gratis dari ahli kami.
                    </p>
                    <button onclick="startBrief()" class="cta-button" data-lang="cta-button">
                        Mulai Sekarang
                    </button>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer id="contact">
            <div class="container">
                <div class="footer-content">
                    <!-- Company Info -->
                    <div class="footer-column">
                        <h3 class="text-gradient" data-lang="footer-company">Z-STUDIO</h3>
                        <p class="footer-contact" data-lang="footer-tagline">Digital Solutions Agency</p>
                        <p class="footer-contact">
                            <i class="fas fa-map-marker-alt"></i>
                            <span data-lang="footer-address">Jakarta, Indonesia</span>
                        </p>
                    </div>
                    
                    <!-- Quick Links -->
                    <div class="footer-column">
                        <h3>Navigasi</h3>
                        <ul class="footer-links">
                            <li><a href="#hero" onclick="closeMobileMenu()" data-lang="nav-home">Beranda</a></li>
                            <li><a href="#services" onclick="closeMobileMenu()" data-lang="nav-services">Layanan</a></li>
                            <li><a href="#cta" onclick="closeMobileMenu()" data-lang="nav-about">Konsultasi</a></li>
                            <li><a href="#contact" onclick="closeMobileMenu()" data-lang="nav-contact">Kontak</a></li>
                        </ul>
                    </div>
                    
                    <!-- Services -->
                    <div class="footer-column">
                        <h3>Layanan</h3>
                        <ul class="footer-links">
                            <li><a href="#services" onclick="closeMobileMenu()">SEO Optimization</a></li>
                            <li><a href="#services" onclick="closeMobileMenu()">Social Media</a></li>
                            <li><a href="#services" onclick="closeMobileMenu()">Web Development</a></li>
                            <li><a href="#services" onclick="closeMobileMenu()">Google Ads</a></li>
                        </ul>
                    </div>
                    
                    <!-- Contact -->
                    <div class="footer-column">
                        <h3>Kontak</h3>
                        <div class="footer-contact">
                            <p>
                                <i class="fas fa-envelope"></i>
                                <span data-lang="footer-email">hello@zstudio.co.id</span>
                            </p>
                            <p>
                                <i class="fas fa-phone"></i>
                                <span data-lang="footer-phone">+62 812 3456 7890</span>
                            </p>
                            <a href="https://wa.me/6281234567890" 
                               target="_blank" 
                               class="whatsapp-btn"
                               data-lang="chat-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                Chat via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Bar -->
                <div class="footer-bottom">
                    <p class="copyright" data-lang="footer-copyright">
                        © 2024 Z-STUDIO. All rights reserved.
                    </p>
                    <div class="footer-legal">
                        <a href="#" data-lang="privacy">Privacy</a>
                        <a href="#" data-lang="terms">Terms</a>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="js/script.js"></script>
    
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    once: true,
                    offset: 100
                });
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuBtn = document.getElementById('mobile-menu-btn');
            
            if (mobileMenu && menuBtn) {
                if (!mobileMenu.contains(event.target) && !menuBtn.contains(event.target) && mobileMenu.classList.contains('active')) {
                    closeMobileMenu();
                }
            }
        });
        
        // Close form when pressing Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const formSection = document.getElementById('form-section');
                if (formSection.style.display === 'block') {
                    hideForm();
                }
            }
        });
    </script>
</body>
</html>