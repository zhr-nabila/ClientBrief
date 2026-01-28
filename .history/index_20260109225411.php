<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Solutions Agency</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>✨</text></svg>">
    
    <script>
        // Tailwind Configuration
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'space': ['Space Grotesk', 'sans-serif'],
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-glow': 'pulse-glow 3s ease-in-out infinite',
                        'gradient': 'gradient 8s ease infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        'pulse-glow': {
                            '0%, 100%': { 
                                boxShadow: '0 0 20px rgba(59, 130, 246, 0.4)',
                                transform: 'scale(1)'
                            },
                            '50%': { 
                                boxShadow: '0 0 40px rgba(59, 130, 246, 0.8)',
                                transform: 'scale(1.05)'
                            },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-black text-white font-inter overflow-x-hidden">

    <!-- Navigation -->
    <nav class="fixed w-full z-50 p-6 transition-all duration-500">
        <div class="max-w-7xl mx-auto flex justify-between items-center bg-black/40 backdrop-blur-xl border border-white/10 rounded-2xl p-4 px-8 hover:border-blue-500/30 transition-all duration-300">
            <a href="#hero" class="text-2xl font-bold text-blue-500 tracking-tighter hover:text-blue-400 transition-colors">
                Z-STUDIO<span class="text-purple-500">.</span>
            </a>
            
            <div class="hidden md:flex items-center space-x-8">
                <a href="#hero" class="text-sm font-medium hover:text-blue-400 transition-all duration-300 hover:scale-105" data-lang="nav-home">Beranda</a>
                <a href="#services" class="text-sm font-medium hover:text-blue-400 transition-all duration-300 hover:scale-105" data-lang="nav-services">Layanan</a>
                <a href="#stats" class="text-sm font-medium hover:text-blue-400 transition-all duration-300 hover:scale-105" data-lang="nav-about">Tentang</a>
                
                <div class="flex bg-gray-900 rounded-full p-1 border border-gray-800">
                    <button onclick="changeLang('id')" id="btn-id" class="px-3 py-1.5 rounded-full text-xs font-medium transition-all duration-300 hover:scale-105" title="Bahasa Indonesia">
                        ID
                    </button>
                    <button onclick="changeLang('en')" id="btn-en" class="px-3 py-1.5 rounded-full text-xs font-medium transition-all duration-300 hover:scale-105" title="English">
                        EN
                    </button>
                </div>
                
                <button onclick="startBrief()" 
                        class="btn-primary px-6 py-2.5 rounded-xl text-sm font-bold flex items-center gap-2 group"
                        data-lang="nav-apply">
                    <span>Mulai Projek</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </button>
            </div>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden text-gray-400 hover:text-white">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden mt-4 bg-black/90 backdrop-blur-xl rounded-2xl border border-white/10 p-6">
            <div class="flex flex-col space-y-4">
                <a href="#hero" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-home">Beranda</a>
                <a href="#services" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-services">Layanan</a>
                <a href="#stats" class="text-sm font-medium hover:text-blue-400 transition" data-lang="nav-about">Tentang</a>
                
                <div class="flex justify-center space-x-4 py-4">
                    <button onclick="changeLang('id')" class="px-4 py-2 bg-gray-800 rounded-lg text-sm">ID</button>
                    <button onclick="changeLang('en')" class="px-4 py-2 bg-blue-600 rounded-lg text-sm">EN</button>
                </div>
                
                <button onclick="startBrief()" class="btn-primary w-full py-3 rounded-xl font-bold" data-lang="nav-apply">
                    Mulai Projek
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="min-h-screen relative flex flex-col items-center justify-center text-center px-6 pt-20 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 z-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-pink-500/10 rounded-full blur-3xl animate-pulse delay-500"></div>
        </div>
        
        <div class="relative z-10 max-w-6xl mx-auto">
            <!-- Badge -->
            <div class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500/20 to-purple-500/20 border border-blue-500/30 rounded-full px-4 py-2 mb-8 backdrop-blur-sm" data-aos="fade-down">
                <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                <span class="text-sm font-medium" data-lang="hero-sub">Untuk Bisnis Masa Depan</span>
            </div>
            
            <!-- Main Headline -->
            <h1 class="text-5xl md:text-8xl font-bold mb-6 gradient-text tracking-tighter leading-tight" 
                data-aos="fade-up" 
                data-aos-delay="200"
                data-lang="hero-1">
                TRANSFORMASI<br>DIGITAL
            </h1>
            
            <!-- Description -->
            <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-2xl mx-auto leading-relaxed" 
               data-aos="fade-up" 
               data-aos-delay="400"
               data-lang="hero-desc">
                Kami membantu brand Anda tumbuh dengan solusi digital yang inovatif, terukur, dan berorientasi hasil.
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center" data-aos="fade-up" data-aos-delay="600">
                <button onclick="startBrief()" 
                        class="btn-primary px-10 py-4 rounded-full font-bold text-lg group relative overflow-hidden"
                        data-lang="btn-apply-hero">
                    <span class="relative z-10 flex items-center gap-2">
                        <span>Konsultasi Gratis</span>
                        <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </button>
                
                <a href="https://wa.me/6281234567890" 
                   target="_blank"
                   class="btn-secondary px-8 py-4 rounded-full font-bold text-lg flex items-center gap-2 hover:scale-105 transition-transform">
                    <i class="fab fa-whatsapp text-green-400"></i>
                    <span data-lang="btn-contact">WhatsApp Kami</span>
                </a>
            </div>
            
            <!-- Stats Preview -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-20 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="800">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text counter" data-target="250">250+</div>
                    <div class="text-gray-400 text-sm uppercase tracking-widest mt-2" data-lang="stats-clients">Klien</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text counter" data-target="500">500+</div>
                    <div class="text-gray-400 text-sm uppercase tracking-widest mt-2" data-lang="stats-projects">Proyek</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text counter" data-target="98">98%</div>
                    <div class="text-gray-400 text-sm uppercase tracking-widest mt-2" data-lang="stats-success">Success Rate</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold gradient-text">24/7</div>
                    <div class="text-gray-400 text-sm uppercase tracking-widest mt-2" data-lang="stats-support">Support</div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#services" class="text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-32 px-6 relative">
        <div class="max-w-7xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 gradient-text tracking-tighter" data-lang="services-title">Layanan Kami</h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto" data-lang="services-subtitle">Solusi lengkap untuk digital marketing</p>
            </div>
            
            <!-- Services Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Service 1: SEO -->
                <div class="glass-card group" 
                     data-aos="fade-up" 
                     data-aos-delay="100"
                     onmouseenter="this.querySelector('.service-icon').classList.add('animate-pulse')"
                     onmouseleave="this.querySelector('.service-icon').classList.remove('animate-pulse')">
                    <div class="mb-6">
                        <div class="service-icon w-14 h-14 bg-gradient-to-br from-blue-500/20 to-blue-500/5 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-search text-blue-500 text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-blue-400 transition-colors" data-lang="serv-1-title">SEO Optimization</h3>
                        <p class="text-gray-400 text-sm leading-relaxed" data-lang="serv-1-desc">Optimasi website untuk ranking Google teratas dengan strategi SEO terbaru.</p>
                    </div>
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <span class="text-blue-400 text-sm font-medium inline-flex items-center gap-2">
                            <span>Learn more</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </div>
                
                <!-- Service 2: Social Media -->
                <div class="glass-card group" 
                     data-aos="fade-up" 
                     data-aos-delay="200"
                     onmouseenter="this.querySelector('.service-icon').classList.add('animate-pulse')"
                     onmouseleave="this.querySelector('.service-icon').classList.remove('animate-pulse')">
                    <div class="mb-6">
                        <div class="service-icon w-14 h-14 bg-gradient-to-br from-purple-500/20 to-purple-500/5 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fab fa-instagram text-purple-500 text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-purple-400 transition-colors" data-lang="serv-2-title">Social Media</h3>
                        <p class="text-gray-400 text-sm leading-relaxed" data-lang="serv-2-desc">Manajemen konten kreatif untuk engagement maksimal di platform sosial.</p>
                    </div>
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <span class="text-purple-400 text-sm font-medium inline-flex items-center gap-2">
                            <span>Learn more</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </div>
                
                <!-- Service 3: Web Development -->
                <div class="glass-card group" 
                     data-aos="fade-up" 
                     data-aos-delay="300"
                     onmouseenter="this.querySelector('.service-icon').classList.add('animate-pulse')"
                     onmouseleave="this.querySelector('.service-icon').classList.remove('animate-pulse')">
                    <div class="mb-6">
                        <div class="service-icon w-14 h-14 bg-gradient-to-br from-green-500/20 to-green-500/5 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-code text-green-500 text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-green-400 transition-colors" data-lang="serv-3-title">Web Development</h3>
                        <p class="text-gray-400 text-sm leading-relaxed" data-lang="serv-3-desc">Pengembangan website custom dengan performa optimal dan keamanan terbaik.</p>
                    </div>
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <span class="text-green-400 text-sm font-medium inline-flex items-center gap-2">
                            <span>Learn more</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </div>
                
                <!-- Service 4: Google Ads -->
                <div class="glass-card group" 
                     data-aos="fade-up" 
                     data-aos-delay="400"
                     onmouseenter="this.querySelector('.service-icon').classList.add('animate-pulse')"
                     onmouseleave="this.querySelector('.service-icon').classList.remove('animate-pulse')">
                    <div class="mb-6">
                        <div class="service-icon w-14 h-14 bg-gradient-to-br from-yellow-500/20 to-yellow-500/5 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                            <i class="fas fa-chart-line text-yellow-500 text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-3 group-hover:text-yellow-400 transition-colors" data-lang="serv-4-title">Google Ads</h3>
                        <p class="text-gray-400 text-sm leading-relaxed" data-lang="serv-4-desc">Kampanye iklan terukur untuk konversi maksimal dan ROI optimal.</p>
                    </div>
                    <div class="mt-6 pt-6 border-t border-white/10">
                        <span class="text-yellow-400 text-sm font-medium inline-flex items-center gap-2">
                            <span>Learn more</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="py-20 px-6 bg-gradient-to-b from-transparent to-black/50">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Add more stats if needed -->
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section id="form-section" class="hidden py-32 px-6">
        <div class="max-w-2xl mx-auto relative">
            <!-- Close Button -->
            <button onclick="cancelBrief()" 
                    class="absolute -top-12 right-0 flex items-center gap-2 text-gray-400 hover:text-white transition-all group">
                <span class="text-xs font-bold tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-all">Batal</span>
                <i class="fas fa-times-circle text-2xl"></i>
            </button>

            <!-- Form Container -->
            <div class="bg-gray-900/50 backdrop-blur-md p-8 md:p-10 rounded-[40px] border border-white/10 shadow-2xl">
                <!-- Progress Bar -->
                <div class="mb-8">
                    <div class="h-2 w-full bg-gray-800 rounded-full overflow-hidden">
                        <div id="progress-bar" class="h-full bg-gradient-to-r from-blue-500 to-purple-500 transition-all duration-500 rounded-full" style="width: 33%"></div>
                    </div>
                </div>

                <!-- Form -->
                <form action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="space-y-8">
                    <!-- Step 1: Contact Info -->
                    <div class="step active" data-step="1">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-2" data-lang="form-step-1-title">Informasi Anda</h2>
                            <p class="text-gray-400 text-sm" data-lang="form-step-1-desc">Kami akan menghubungi Anda</p>
                        </div>
                        
                        <div class="space-y-4">
                            <input type="text" 
                                   name="nama" 
                                   placeholder="Nama / Perusahaan" 
                                   class="form-input"
                                   required
                                   data-lang="form-label-name">
                            
                            <input type="email" 
                                   name="email" 
                                   placeholder="Email" 
                                   class="form-input"
                                   required
                                   data-lang="form-label-email">
                        </div>
                        
                        <div class="mt-8">
                            <button type="button" 
                                    onclick="nextStep(2)" 
                                    class="btn-primary w-full py-4 rounded-2xl font-bold flex items-center justify-center gap-2"
                                    data-lang="btn-next">
                                <span>Lanjut</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Service Selection -->
                    <div class="step" data-step="2">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-2" data-lang="form-step-2-title">Pilih Layanan</h2>
                            <p class="text-gray-400 text-sm" data-lang="form-step-2-desc">Pilih layanan yang Anda butuhkan</p>
                        </div>
                        
                        <div class="grid gap-3">
                            <?php 
                            $services = [
                                "SEO" => "bg-blue-500/10 border-blue-500/20 text-blue-400",
                                "Social Media" => "bg-purple-500/10 border-purple-500/20 text-purple-400",
                                "Web Maintenance" => "bg-green-500/10 border-green-500/20 text-green-400",
                                "Google Ads" => "bg-yellow-500/10 border-yellow-500/20 text-yellow-400"
                            ];
                            
                            foreach($services as $service => $colorClass): ?>
                            <label class="flex items-center p-4 border rounded-2xl cursor-pointer transition-all duration-300 hover:scale-[1.02] <?php echo $colorClass; ?>">
                                <input type="radio" name="jasa" value="<?= $service ?>" class="hidden peer" required>
                                <span class="w-5 h-5 border-2 border-gray-400 rounded-full mr-4 peer-checked:bg-current peer-checked:border-transparent transition-all duration-300"></span>
                                <span class="font-medium"><?= $service ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                        
                        <div class="flex gap-4 mt-8">
                            <button type="button" 
                                    onclick="nextStep(1)" 
                                    class="btn-secondary w-1/3 py-4 rounded-2xl font-bold"
                                    data-lang="btn-back">
                                Kembali
                            </button>
                            <button type="button" 
                                    onclick="nextStep(3)" 
                                    class="btn-primary w-2/3 py-4 rounded-2xl font-bold flex items-center justify-center gap-2"
                                    data-lang="btn-next">
                                <span>Lanjut</span>
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Project Details -->
                    <div class="step" data-step="3">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold mb-2" data-lang="form-step-3-title">Detail Projek</h2>
                            <p class="text-gray-400 text-sm" data-lang="form-step-3-desc">Ceritakan tentang proyek Anda</p>
                        </div>
                        
                        <div class="space-y-4">
                            <textarea name="pesan" 
                                      rows="5" 
                                      class="form-input" 
                                      placeholder="Jelaskan proyek Anda..."
                                      data-lang="form-label-message"></textarea>
                            
                            <div>
                                <label class="block text-xs text-gray-500 mb-2 uppercase tracking-widest font-bold" data-lang="form-label-file">
                                    Upload File
                                </label>
                                <p class="text-xs text-gray-400 mb-3" data-lang="form-label-file-desc">
                                    Brief, referensi, atau dokumen pendukung
                                </p>
                                <input type="file" 
                                       name="file_brief" 
                                       class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-gray-800 file:text-gray-300 hover:file:bg-gray-700 transition-all">
                            </div>
                        </div>
                        
                        <div class="flex gap-4 mt-8">
                            <button type="button" 
                                    onclick="nextStep(2)" 
                                    class="btn-secondary w-1/3 py-4 rounded-2xl font-bold"
                                    data-lang="btn-back">
                                Kembali
                            </button>
                            <button type="submit" 
                                    name="submit" 
                                    class="btn-primary w-2/3 py-4 rounded-2xl font-bold bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700"
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
    <section id="cta" class="py-32 px-6">
        <div class="max-w-4xl mx-auto text-center relative">
            <!-- Background Elements -->
            <div class="absolute -top-10 -left-10 w-40 h-40 bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-purple-500/10 rounded-full blur-3xl"></div>
            
            <div data-aos="zoom-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-6" data-lang="cta-title">Siap Transformasi Digital?</h2>
                <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto" data-lang="cta-desc">
                    Mulai proyek Anda sekarang dan dapatkan konsultasi gratis dari ahli kami.
                </p>
                
                <button onclick="startBrief()" 
                        class="btn-primary px-12 py-5 rounded-full font-bold text-lg animate-pulse-glow"
                        data-lang="cta-button">
                    Mulai Sekarang
                </button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-6 border-t border-white/10">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-2xl font-bold text-blue-500 mb-4" data-lang="footer-company">Z-STUDIO</h3>
                    <p class="text-gray-400 text-sm mb-4" data-lang="footer-tagline">Digital Solutions Agency</p>
                    <p class="text-gray-500 text-xs" data-lang="footer-address">Jakarta, Indonesia</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold mb-4 text-gray-300" data-lang="footer-links">Navigasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#hero" class="text-gray-400 hover:text-blue-400 transition text-sm" data-lang="nav-home">Beranda</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-blue-400 transition text-sm" data-lang="nav-services">Layanan</a></li>
                        <li><a href="#stats" class="text-gray-400 hover:text-blue-400 transition text-sm" data-lang="nav-about">Tentang</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div>
                    <h4 class="font-bold mb-4 text-gray-300" data-lang="footer-services">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-blue-400 transition text-sm" data-lang="serv-1-title">SEO Optimization</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-purple-400 transition text-sm" data-lang="serv-2-title">Social Media</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-green-400 transition text-sm" data-lang="serv-3-title">Web Development</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-yellow-400 transition text-sm" data-lang="serv-4-title">Google Ads</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h4 class="font-bold mb-4 text-gray-300" data-lang="footer-contact">Kontak</h4>
                    <ul class="space-y-2">
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
                                <span>WhatsApp</span>
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
                    <a href="#" class="text-gray-500 hover:text-white text-sm transition" data-lang="footer-privacy">Privacy Policy</a>
                    <a href="#" class="text-gray-500 hover:text-white text-sm transition" data-lang="footer-terms">Terms of Service</a>
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
        
        // Initialize Lucide Icons
        lucide.createIcons();
        
        // Mobile Menu Toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
        
        // Counter Animation
        document.addEventListener('DOMContentLoaded', function() {
            const counters = document.querySelectorAll('.counter');
            
            counters.forEach(counter => {
                const updateCounter = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText.replace('+', '');
                    const increment = target / 200;
                    
                    if (count < target) {
                        counter.innerText = Math.ceil(count + increment) + '+';
                        setTimeout(updateCounter, 10);
                    } else {
                        counter.innerText = target + '+';
                    }
                };
                
                // Trigger when in viewport
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            updateCounter();
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                
                observer.observe(counter);
            });
        });
        
        // Form validation
        document.querySelector('form')?.addEventListener('submit', function(e) {
            const currentStep = this.querySelector('.step.active');
            const requiredFields = currentStep.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('border-red-500', 'shake');
                    
                    setTimeout(() => {
                        field.classList.remove('shake');
                    }, 500);
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                
                Swal.fire({
                    title: 'Oops!',
                    text: 'Harap isi semua field yang wajib.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    background: '#111827',
                    color: '#fff',
                    confirmButtonColor: '#3b82f6'
                });
            }
        });
        
        // Add shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
            .shake {
                animation: shake 0.5s ease;
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>