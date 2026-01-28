<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Solutions Agency</title>
    
    <!-- Meta Tags -->
    <meta name="description" content="Solusi digital marketing untuk bisnis modern. SEO, Social Media, Web Development, dan Google Ads.">
    <meta name="keywords" content="digital marketing, SEO, social media, web development, google ads">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✨</text></svg>">
    
    <style>
        /* Additional inline styles */
        .hero-bg {
            background: radial-gradient(ellipse at 50% 50%, rgba(59, 130, 246, 0.1) 0%, transparent 50%),
                       radial-gradient(ellipse at 20% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%),
                       radial-gradient(ellipse at 80% 20%, rgba(236, 72, 153, 0.05) 0%, transparent 50%);
        }
        
        .service-card:hover .service-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .form-container {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(20px);
        }
        
        .stats-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
        }
    </style>
</head>
<body class="text-white antialiased">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 p-6 transition-all duration-300">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-4 px-6">
            <!-- Logo -->
            <a href="#hero" class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                    <span class="text-white font-bold text-xl">Z</span>
                </div>
                <span class="text-xl font-bold tracking-tighter">
                    <span class="text-blue-400">STUDIO</span>
                    <span class="text-purple-500">.</span>
                </span>
            </a>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="#hero" class="text-sm font-medium hover:text-blue-400 transition-colors" data-lang="nav-home">Beranda</a>
                <a href="#services" class="text-sm font-medium hover:text-blue-400 transition-colors" data-lang="nav-services">Layanan</a>
                <a href="#stats" class="text-sm font-medium hover:text-blue-400 transition-colors" data-lang="nav-about">Tentang</a>
                <a href="#contact" class="text-sm font-medium hover:text-blue-400 transition-colors" data-lang="nav-contact">Kontak</a>
                
                <!-- Language Switcher -->
                <div class="flex items-center gap-2">
                    <div class="flex bg-gray-900 rounded-full p-1 border border-gray-800">
                        <button onclick="changeLang('id')" id="btn-id" 
                                class="px-3 py-1 rounded-full text-xs font-medium transition-all hover:scale-105" 
                                title="Bahasa Indonesia">
                            ID
                        </button>
                        <button onclick="changeLang('en')" id="btn-en" 
                                class="px-3 py-1 rounded-full text-xs font-medium transition-all hover:scale-105" 
                                title="English">
                            EN
                        </button>
                    </div>
                </div>
                
                <!-- CTA Button -->
                <button onclick="startBrief()" 
                        class="btn-primary px-6 py-2.5 rounded-xl text-sm font-semibold"
                        data-lang="nav-apply">
                    Mulai Projek
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-gray-400 hover:text-white">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden mt-4 bg-gray-900/95 backdrop-blur-xl rounded-2xl border border-white/10 p-6">
            <div class="flex flex-col space-y-4">
                <a href="#hero" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-home">Beranda</a>
                <a href="#services" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-services">Layanan</a>
                <a href="#stats" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-about">Tentang</a>
                <a href="#contact" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-contact">Kontak</a>
                
                <div class="pt-4 border-t border-white/10">
                    <div class="flex justify-center gap-2 mb-4">
                        <button onclick="changeLang('id')" class="px-4 py-2 bg-blue-600 rounded-lg text-sm font-medium">ID</button>
                        <button onclick="changeLang('en')" class="px-4 py-2 bg-gray-800 rounded-lg text-sm font-medium">EN</button>
                    </div>
                    
                    <button onclick="startBrief()" class="btn-primary w-full py-3 rounded-xl font-semibold" data-lang="nav-apply">
                        Mulai Projek
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="min-h-screen relative flex items-center justify-center px-6 pt-20">
        <!-- Animated Background -->
        <div class="absolute inset-0 hero-bg"></div>
        
        <!-- Floating Elements -->
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>
        
        <div class="relative z-10 max-w-6xl mx-auto text-center">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 rounded-full px-4 py-2 mb-8 backdrop-blur-sm"
                 data-aos="fade-down">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium">Digital Agency</span>
            </div>
            
            <!-- Main Headline -->
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold mb-6 tracking-tight"
                data-aos="fade-up"
                data-aos-delay="100">
                <span class="block">TRANSFORMASI</span>
                <span class="block gradient-text mt-2">DIGITAL</span>
            </h1>
            
            <!-- Description -->
            <p class="text-xl text-gray-300 mb-10 max-w-2xl mx-auto leading-relaxed"
               data-aos="fade-up"
               data-aos-delay="200"
               data-lang="hero-desc">
                Kami membantu brand Anda tumbuh dengan solusi digital yang inovatif, terukur, dan berorientasi hasil.
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center"
                 data-aos="fade-up"
                 data-aos-delay="300">
                <button onclick="startBrief()"
                        class="btn-primary px-8 py-4 rounded-full text-lg font-semibold hover:scale-105 transition-transform"
                        data-lang="hero-cta-primary">
                    Konsultasi Gratis →
                </button>
                
                <a href="https://wa.me/6281234567890"
                   target="_blank"
                   class="flex items-center gap-2 px-8 py-4 rounded-full text-lg font-semibold border border-gray-700 hover:border-gray-600 hover:bg-white/5 transition-all"
                   data-lang="hero-cta-secondary">
                    <i class="fab fa-whatsapp text-green-400"></i>
                    WhatsApp Kami
                </a>
            </div>
            
            <!-- Stats -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-20 max-w-3xl mx-auto"
                 data-aos="fade-up"
                 data-aos-delay="400">
                <div class="stats-card glass-card p-6">
                    <div class="text-3xl font-bold text-white mb-2 counter" data-target="250">250+</div>
                    <div class="text-gray-400 text-sm uppercase tracking-wider" data-lang="stat-clients">Klien</div>
                </div>
                <div class="stats-card glass-card p-6">
                    <div class="text-3xl font-bold text-white mb-2 counter" data-target="500">500+</div>
                    <div class="text-gray-400 text-sm uppercase tracking-wider" data-lang="stat-projects">Proyek</div>
                </div>
                <div class="stats-card glass-card p-6">
                    <div class="text-3xl font-bold text-white mb-2 counter" data-target="98">98%</div>
                    <div class="text-gray-400 text-sm uppercase tracking-wider" data-lang="stat-success">Success Rate</div>
                </div>
                <div class="stats-card glass-card p-6">
                    <div class="text-3xl font-bold text-white mb-2">24/7</div>
                    <div class="text-gray-400 text-sm uppercase tracking-wider" data-lang="stat-support">Support</div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2">
            <a href="#services" class="text-gray-400 hover:text-white transition-colors animate-bounce">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-32 px-6 relative">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 gradient-text" data-lang="services-title">Layanan Kami</h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto" data-lang="services-subtitle">
                    Solusi lengkap untuk semua kebutuhan digital Anda
                </p>
            </div>
            
            <!-- Services Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- SEO Service -->
                <div class="glass-card group service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-icon w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500/20 to-blue-500/5 flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fas fa-search text-blue-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 group-hover:text-blue-400 transition-colors" data-lang="service-seo-title">SEO Optimization</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="service-seo-desc">
                        Optimasi website untuk ranking teratas di Google dengan strategi terbaru.
                    </p>
                </div>
                
                <!-- Social Media Service -->
                <div class="glass-card group service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-icon w-14 h-14 rounded-2xl bg-gradient-to-br from-purple-500/20 to-purple-500/5 flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fab fa-instagram text-purple-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 group-hover:text-purple-400 transition-colors" data-lang="service-social-title">Social Media</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="service-social-desc">
                        Strategi konten kreatif untuk engagement maksimal di platform sosial.
                    </p>
                </div>
                
                <!-- Web Development Service -->
                <div class="glass-card group service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-icon w-14 h-14 rounded-2xl bg-gradient-to-br from-green-500/20 to-green-500/5 flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fas fa-code text-green-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 group-hover:text-green-400 transition-colors" data-lang="service-web-title">Web Development</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="service-web-desc">
                        Website custom dengan performa optimal dan keamanan terbaik.
                    </p>
                </div>
                
                <!-- Google Ads Service -->
                <div class="glass-card group service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-icon w-14 h-14 rounded-2xl bg-gradient-to-br from-yellow-500/20 to-yellow-500/5 flex items-center justify-center mb-6 transition-transform duration-300">
                        <i class="fas fa-chart-line text-yellow-500 text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 group-hover:text-yellow-400 transition-colors" data-lang="service-ads-title">Google Ads</h3>
                    <p class="text-gray-400 text-sm leading-relaxed" data-lang="service-ads-desc">
                        Kampanye iklan terukur untuk konversi maksimal dan ROI optimal.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section (Hidden by default) -->
    <section id="form-section" class="hidden py-20 px-6 bg-black/30 backdrop-blur-sm min-h-screen">
        <div class="max-w-2xl mx-auto">
            <!-- Close Button -->
            <button onclick="cancelBrief()"
                    class="fixed top-6 right-6 z-50 w-12 h-12 rounded-full bg-gray-900/80 backdrop-blur-sm border border-gray-700 flex items-center justify-center text-gray-400 hover:text-white hover:border-red-500 transition-all group"
                    title="Tutup form">
                <i class="fas fa-times text-xl"></i>
                <span class="absolute -top-8 right-0 bg-gray-900 text-xs px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
                    Tutup
                </span>
            </button>

            <!-- Form Container -->
            <div class="form-container rounded-3xl border border-gray-800 p-8 shadow-2xl">
                <!-- Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold mb-2 gradient-text" data-lang="form-title">Mulai Projek Anda</h2>
                    <p class="text-gray-400" data-lang="form-subtitle">Isi brief untuk mulai konsultasi</p>
                </div>
                
                <!-- Progress Bar -->
                <div class="mb-8">
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
                        <h3 class="text-xl font-bold mb-6" data-lang="step-1-title">Informasi Kontak</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <input type="text"
                                       name="nama"
                                       class="form-input"
                                       placeholder="Nama Lengkap / Perusahaan"
                                       required
                                       data-lang="label-name">
                            </div>
                            
                            <div>
                                <input type="email"
                                       name="email"
                                       class="form-input"
                                       placeholder="Email aktif Anda"
                                       required
                                       data-lang="label-email">
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <button type="button"
                                    onclick="nextStep(2)"
                                    class="btn-primary w-full py-4 rounded-xl font-semibold"
                                    data-lang="btn-next">
                                Selanjutnya →
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Service Selection -->
                    <div class="step" data-step="2">
                        <h3 class="text-xl font-bold mb-6" data-lang="step-2-title">Pilih Layanan</h3>
                        
                        <div class="space-y-3">
                            <?php
                            $services = [
                                "SEO" => "from-blue-500/20 to-blue-500/5 border-blue-500/30",
                                "Social Media" => "from-purple-500/20 to-purple-500/5 border-purple-500/30",
                                "Web Development" => "from-green-500/20 to-green-500/5 border-green-500/30",
                                "Google Ads" => "from-yellow-500/20 to-yellow-500/5 border-yellow-500/30"
                            ];
                            
                            foreach ($services as $service => $gradient):
                            ?>
                            <label class="flex items-center p-4 rounded-xl border cursor-pointer transition-all hover:scale-[1.02] bg-gradient-to-r <?= $gradient ?>">
                                <input type="radio" name="jasa" value="<?= $service ?>" class="hidden peer" required>
                                <span class="w-5 h-5 border-2 border-gray-400 rounded-full mr-4 peer-checked:bg-white peer-checked:border-white transition-all"></span>
                                <span class="font-medium"><?= $service ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="flex gap-4 mt-8">
                            <button type="button"
                                    onclick="nextStep(1)"
                                    class="btn-secondary flex-1 py-4 rounded-xl font-semibold"
                                    data-lang="btn-back">
                                ← Kembali
                            </button>
                            <button type="button"
                                    onclick="nextStep(3)"
                                    class="btn-primary flex-1 py-4 rounded-xl font-semibold"
                                    data-lang="btn-next">
                                Selanjutnya →
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Project Details -->
                    <div class="step" data-step="3">
                        <h3 class="text-xl font-bold mb-6" data-lang="step-3-title">Detail Projek</h3>
                        
                        <div class="space-y-6">
                            <div>
                                <textarea name="pesan"
                                          rows="5"
                                          class="form-input"
                                          placeholder="Ceritakan tentang proyek Anda..."
                                          data-lang="label-message"></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-3" data-lang="label-file">Upload File (Opsional)</label>
                                <div class="border-2 border-dashed border-gray-700 rounded-xl p-8 text-center transition-colors hover:border-blue-500">
                                    <input type="file"
                                           name="file_brief"
                                           class="hidden"
                                           id="file-upload">
                                    <label for="file-upload" class="cursor-pointer">
                                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-500 mb-4"></i>
                                        <p class="text-gray-400" data-lang="label-file">Klik untuk upload file</p>
                                        <p class="text-gray-500 text-sm mt-2">PDF, DOC, JPG, PNG (Max 5MB)</p>
                                    </label>
                                </div>
                                <div id="file-name" class="text-sm text-gray-400 mt-3 hidden"></div>
                            </div>
                        </div>
                        
                        <div class="flex gap-4 mt-8">
                            <button type="button"
                                    onclick="nextStep(2)"
                                    class="btn-secondary flex-1 py-4 rounded-xl font-semibold"
                                    data-lang="btn-back">
                                ← Kembali
                            </button>
                            <button type="submit"
                                    name="submit"
                                    class="btn-primary flex-1 py-4 rounded-xl font-semibold bg-gradient-to-r from-green-500 to-emerald-600"
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
    <section id="cta" class="py-32 px-6 relative">
        <div class="max-w-4xl mx-auto text-center relative">
            <!-- Background Elements -->
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-20 -right-20 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl"></div>
            
            <div data-aos="zoom-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-6" data-lang="cta-title">Siap Transformasi Digital?</h2>
                <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto" data-lang="cta-desc">
                    Mulai proyek Anda sekarang dan dapatkan konsultasi gratis dari ahli kami.
                </p>
                
                <button onclick="startBrief()"
                        class="btn-primary px-12 py-5 rounded-full text-lg font-semibold animate-pulse-glow"
                        data-lang="cta-button">
                    Mulai Sekarang
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="py-16 px-6 border-t border-white/10">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-2xl font-bold text-blue-500 mb-4" data-lang="footer-company">Z-STUDIO</h3>
                    <p class="text-gray-400 text-sm mb-4" data-lang="footer-tagline">Digital Solutions Agency</p>
                    <p class="text-gray-500 text-sm" data-lang="footer-address">Jakarta, Indonesia</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold mb-4 text-gray-300">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#hero" class="text-gray-400 hover:text-blue-400 transition text-sm">Beranda</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-blue-400 transition text-sm">Layanan</a></li>
                        <li><a href="#cta" class="text-gray-400 hover:text-blue-400 transition text-sm">Konsultasi</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div>
                    <h4 class="font-bold mb-4 text-gray-300">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-gray-400 hover:text-blue-400 transition text-sm">SEO</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-purple-400 transition text-sm">Social Media</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-green-400 transition text-sm">Web Development</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-yellow-400 transition text-sm">Google Ads</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="font-bold mb-4 text-gray-300">Kontak</h4>
                    <ul class="space-y-3">
                        <li class="text-gray-400 text-sm">
                            <i class="fas fa-envelope mr-2 text-blue-400"></i>
                            <span data-lang="footer-email">hello@zstudio.co.id</span>
                        </li>
                        <li class="text-gray-400 text-sm">
                            <i class="fas fa-phone mr-2 text-green-400"></i>
                            <span data-lang="footer-phone">+62 812 3456 7890</span>
                        </li>
                        <li class="mt-4">
                            <a href="https://wa.me/6281234567890"
                               target="_blank"
                               class="inline-flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm transition-all">
                                <i class="fab fa-whatsapp"></i>
                                <span>Chat via WhatsApp</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div class="mt-12 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-500 text-sm" data-lang="footer-copyright">
                    © 2024 Z-STUDIO. All rights reserved.
                </p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-500 hover:text-white text-sm transition">Privacy</a>
                    <a href="#" class="text-gray-500 hover:text-white text-sm transition">Terms</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/script.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
        
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
            
            // Change icon
            const icon = this.querySelector('i');
            if (menu.classList.contains('hidden')) {
                icon.className = 'fas fa-bars text-xl';
            } else {
                icon.className = 'fas fa-times text-xl';
            }
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobile-menu');
            const menuBtn = document.getElementById('mobile-menu-btn');
            
            if (!menu.contains(event.target) && !menuBtn.contains(event.target) && !menu.classList.contains('hidden')) {
                menu.classList.add('hidden');
                menuBtn.querySelector('i').className = 'fas fa-bars text-xl';
            }
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                // Close mobile menu if open
                const mobileMenu = document.getElementById('mobile-menu');
                const menuBtn = document.getElementById('mobile-menu-btn');
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    menuBtn.querySelector('i').className = 'fas fa-bars text-xl';
                }
            });
        });
    </script>
</body>
</html>