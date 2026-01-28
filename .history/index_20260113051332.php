<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Solusi Digital untuk Bisnis Berkembang</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Z-STUDIO menghadirkan solusi digital komprehensif untuk transformasi bisnis Anda. Layanan SEO, Social Media Marketing, Web Development, dan Google Ads dengan hasil terukur.">
    <meta name="keywords" content="agency digital, digital marketing, jasa pembuatan website, SEO, social media management, Google Ads, branding digital">
    <meta name="author" content="Z-STUDIO">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Z-STUDIO | Solusi Digital untuk Bisnis Berkembang">
    <meta property="og:description" content="Tingkatkan performa digital bisnis Anda dengan strategi yang terukur dan hasil yang nyata.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="assets/images/og-image.jpg">
    
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="assets/images/favicon/site.webmanifest">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Flag Icons for Country Selector -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-white text-gray-800 font-sans">
    <!-- Loader -->
    <div id="loader" class="fixed inset-0 bg-white z-50 flex items-center justify-center transition-opacity duration-500">
        <div class="text-center">
            <div class="w-16 h-16 border-4 border-blue-600 border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-gray-600">Memuat...</p>
        </div>
    </div>

    <!-- Header & Navigation -->
    <header class="fixed top-0 left-0 right-0 z-40 bg-white/90 backdrop-blur-md shadow-sm transition-all duration-300">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <a href="#home" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center">
                        <span class="text-white font-bold text-xl">Z</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-lg bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Z-STUDIO</span>
                        <span class="text-xs text-gray-500">Digital Solutions</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="#home" class="nav-link">Beranda</a>
                    <a href="#services" class="nav-link">Layanan</a>
                    <a href="#portfolio" class="nav-link">Portfolio</a>
                    <a href="#process" class="nav-link">Proses</a>
                    <a href="#testimonials" class="nav-link">Testimoni</a>
                    <a href="#contact" class="nav-link">Kontak</a>
                    
                    <!-- Language Selector -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 px-4 py-2 rounded-lg border border-gray-200 hover:border-blue-500 transition">
                            <i class="fas fa-globe text-gray-600"></i>
                            <span class="text-sm font-medium">ID</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-lg border border-gray-200 py-2 hidden group-hover:block">
                            <button class="w-full px-4 py-2 text-left hover:bg-gray-50 flex items-center space-x-2">
                                <span class="flag-icon flag-icon-id"></span>
                                <span>Indonesia</span>
                            </button>
                            <button class="w-full px-4 py-2 text-left hover:bg-gray-50 flex items-center space-x-2">
                                <span class="flag-icon flag-icon-gb"></span>
                                <span>English</span>
                            </button>
                        </div>
                    </div>
                    
                    <button onclick="openBriefModal()" class="btn-primary">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Mulai Proyek
                    </button>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden text-gray-700">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="lg:hidden mt-4 py-4 border-t border-gray-200 hidden">
                <div class="flex flex-col space-y-4">
                    <a href="#home" class="mobile-nav-link">Beranda</a>
                    <a href="#services" class="mobile-nav-link">Layanan</a>
                    <a href="#portfolio" class="mobile-nav-link">Portfolio</a>
                    <a href="#process" class="mobile-nav-link">Proses</a>
                    <a href="#testimonials" class="mobile-nav-link">Testimoni</a>
                    <a href="#contact" class="mobile-nav-link">Kontak</a>
                    
                    <div class="pt-4 border-t border-gray-200">
                        <button onclick="openBriefModal()" class="btn-primary w-full">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Mulai Proyek
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section id="home" class="pt-32 pb-20 bg-gradient-to-br from-blue-50 via-white to-purple-50 relative overflow-hidden">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="relative" data-aos="fade-right">
                        <!-- Badge -->
                        <div class="inline-flex items-center space-x-2 bg-blue-100 text-blue-700 px-4 py-2 rounded-full mb-6">
                            <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                            <span class="text-sm font-medium">Agency Digital Terpercaya</span>
                        </div>
                        
                        <!-- Title -->
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">
                            Tingkatkan <span class="text-gradient">Performansi Digital</span> Bisnis Anda
                        </h1>
                        
                        <!-- Description -->
                        <p class="text-lg text-gray-600 mb-8 leading-relaxed">
                            Kami menghadirkan solusi digital yang terukur dan berorientasi pada hasil. Dengan strategi yang tepat, kami membantu bisnis Anda berkembang pesat di era digital.
                        </p>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-12">
                            <button onclick="openBriefModal()" class="btn-primary">
                                <i class="fas fa-calendar-check mr-2"></i>
                                Konsultasi Gratis
                            </button>
                            <a href="https://wa.me/6281234567890" target="_blank" class="btn-secondary">
                                <i class="fab fa-whatsapp mr-2"></i>
                                Chat via WhatsApp
                            </a>
                        </div>
                        
                        <!-- Trust Indicators -->
                        <div class="flex items-center space-x-6 text-sm text-gray-500">
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Strategi Terukur</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Tim Berpengalaman</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i class="fas fa-check-circle text-green-500"></i>
                                <span>Garansi Hasil</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Hero Image -->
                    <div class="relative" data-aos="fade-left">
                        <div class="relative z-10">
                            <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                                 alt="Digital Marketing Team" 
                                 class="rounded-2xl shadow-2xl">
                        </div>
                        <!-- Floating Elements -->
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-yellow-400 rounded-full opacity-20"></div>
                        <div class="absolute -bottom-4 -left-4 w-32 h-32 bg-purple-500 rounded-full opacity-20"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section id="services" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Layanan Unggulan Kami</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Solusi komprehensif untuk setiap kebutuhan digital bisnis Anda</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Service 1 -->
                    <div class="service-card" data-aos="fade-up">
                        <div class="service-icon bg-gradient-to-br from-blue-500 to-blue-700">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="service-title">SEO Optimization</h3>
                        <p class="service-description">Tingkatkan visibilitas website Anda di hasil pencarian Google dengan strategi SEO terbaru.</p>
                        <ul class="space-y-2 mt-4">
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Technical SEO Audit
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Keyword Research
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                On-Page Optimization
                            </li>
                        </ul>
                        <button onclick="openBriefModal('SEO Optimization')" class="service-btn">
                            Selengkapnya
                        </button>
                    </div>
                    
                    <!-- Service 2 -->
                    <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-icon bg-gradient-to-br from-purple-500 to-purple-700">
                            <i class="fab fa-instagram"></i>
                        </div>
                        <h3 class="service-title">Social Media</h3>
                        <p class="service-description">Kelola dan optimalkan media sosial untuk engagement maksimal dan brand awareness.</p>
                        <ul class="space-y-2 mt-4">
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Content Strategy
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Community Management
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Performance Analytics
                            </li>
                        </ul>
                        <button onclick="openBriefModal('Social Media Management')" class="service-btn">
                            Selengkapnya
                        </button>
                    </div>
                    
                    <!-- Service 3 -->
                    <div class="service-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-icon bg-gradient-to-br from-green-500 to-green-700">
                            <i class="fas fa-code"></i>
                        </div>
                        <h3 class="service-title">Web Development</h3>
                        <p class="service-description">Website responsif dan performa tinggi untuk pengalaman pengguna terbaik.</p>
                        <ul class="space-y-2 mt-4">
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Custom Design
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Mobile Responsive
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                CMS Integration
                            </li>
                        </ul>
                        <button onclick="openBriefModal('Web Development')" class="service-btn">
                            Selengkapnya
                        </button>
                    </div>
                    
                    <!-- Service 4 -->
                    <div class="service-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-icon bg-gradient-to-br from-red-500 to-red-700">
                            <i class="fas fa-ad"></i>
                        </div>
                        <h3 class="service-title">Google Ads</h3>
                        <p class="service-description">Kampanye iklan terukur untuk konversi maksimal dengan ROI yang optimal.</p>
                        <ul class="space-y-2 mt-4">
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                Campaign Setup
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                A/B Testing
                            </li>
                            <li class="flex items-center text-sm text-gray-600">
                                <i class="fas fa-check text-green-500 mr-2"></i>
                                ROI Tracking
                            </li>
                        </ul>
                        <button onclick="openBriefModal('Google Ads')" class="service-btn">
                            Selengkapnya
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Process Section -->
        <section id="process" class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16" data-aos="fade-up">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Proses Kolaborasi Kami</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Kami bekerja secara sistematis untuk memastikan kesuksesan proyek Anda</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Step 1 -->
                    <div class="text-center" data-aos="fade-up">
                        <div class="step-number">01</div>
                        <h3 class="text-xl font-semibold mb-3">Konsultasi</h3>
                        <p class="text-gray-600">Diskusi mendalam untuk memahami kebutuhan dan tujuan bisnis Anda.</p>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="step-number">02</div>
                        <h3 class="text-xl font-semibold mb-3">Perencanaan</h3>
                        <p class="text-gray-600">Penyusunan strategi dan roadmap berdasarkan analisis mendalam.</p>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="step-number">03</div>
                        <h3 class="text-xl font-semibold mb-3">Eksekusi</h3>
                        <p class="text-gray-600">Implementasi dengan teknologi terbaru dan best practices.</p>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="step-number">04</div>
                        <h3 class="text-xl font-semibold mb-3">Evaluasi</h3>
                        <p class="text-gray-600">Monitoring hasil dan optimasi berkelanjutan untuk performa maksimal.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="container mx-auto px-6 text-center">
                <div class="max-w-3xl mx-auto" data-aos="zoom-in">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Transformasi Digital Bisnis Anda?</h2>
                    <p class="text-blue-100 mb-8 text-lg">Konsultasi gratis dengan tim ahli kami. Diskusikan proyek Anda tanpa komitmen.</p>
                    <button onclick="openBriefModal()" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-xl font-semibold text-lg transition shadow-lg hover:shadow-xl">
                        <i class="fas fa-rocket mr-2"></i>
                        Mulai Proyek Sekarang
                    </button>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Hubungi Kami</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Mari berdiskusi tentang bagaimana kami dapat membantu bisnis Anda berkembang</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Contact Info -->
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Lokasi</h3>
                                <p class="text-gray-600">Jakarta, Indonesia</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-envelope text-purple-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Email</h3>
                                <p class="text-gray-600">hello@zstudio.co.id</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-phone text-green-600"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold mb-1">Telepon</h3>
                                <p class="text-gray-600">+62 812 3456 7890</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Quick Contact Form -->
                    <div class="md:col-span-2">
                        <form id="quickContactForm" class="space-y-4">
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-2">Nama Lengkap</label>
                                    <input type="text" class="form-input" placeholder="Masukkan nama Anda" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Email</label>
                                    <input type="email" class="form-input" placeholder="email@contoh.com" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Pesan</label>
                                <textarea class="form-textarea" rows="4" placeholder="Tulis pesan Anda..." required></textarea>
                            </div>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-500 rounded-lg flex items-center justify-center">
                            <span class="font-bold">Z</span>
                        </div>
                        <span class="text-xl font-bold">Z-STUDIO</span>
                    </div>
                    <p class="text-gray-400 text-sm mb-6">Membantu bisnis berkembang melalui solusi digital yang inovatif dan terukur.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold mb-4">Perusahaan</h3>
                    <ul class="space-y-2">
                        <li><a href="#home" class="footer-link">Beranda</a></li>
                        <li><a href="#services" class="footer-link">Layanan</a></li>
                        <li><a href="#process" class="footer-link">Proses</a></li>
                        <li><a href="#contact" class="footer-link">Kontak</a></li>
                    </ul>
                </div>
                
                <!-- Services -->
                <div>
                    <h3 class="font-semibold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="#services" class="footer-link">SEO Optimization</a></li>
                        <li><a href="#services" class="footer-link">Social Media</a></li>
                        <li><a href="#services" class="footer-link">Web Development</a></li>
                        <li><a href="#services" class="footer-link">Google Ads</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="font-semibold mb-4">Tetap Terhubung</h3>
                    <p class="text-gray-400 text-sm mb-4">Dapatkan tips dan insight digital marketing langsung ke email Anda.</p>
                    <form class="space-y-2">
                        <input type="email" placeholder="Email Anda" class="w-full px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 focus:border-blue-500 outline-none">
                        <button type="submit" class="btn-primary w-full">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; 2024 Z-STUDIO. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Brief Modal -->
    <div id="briefModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-2xl font-bold">Project Brief Form</h2>
                <button onclick="closeBriefModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
            
            <form id="projectForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="p-6 space-y-6 overflow-y-auto max-h-[calc(90vh-120px)]">
                <!-- Progress Steps -->
                <div class="flex justify-between mb-8 relative">
                    <div class="step-indicator active">
                        <div class="step-circle">1</div>
                        <span class="step-label">Informasi</span>
                    </div>
                    <div class="step-indicator">
                        <div class="step-circle">2</div>
                        <span class="step-label">Layanan</span>
                    </div>
                    <div class="step-indicator">
                        <div class="step-circle">3</div>
                        <span class="step-label">Detail</span>
                    </div>
                    <div class="absolute top-4 left-0 right-0 h-1 bg-gray-200 -z-10">
                        <div id="progressBar" class="h-1 bg-blue-600 transition-all duration-300" style="width: 33.33%"></div>
                    </div>
                </div>
                
                <!-- Step 1 -->
                <div id="step1" class="form-step">
                    <h3 class="text-xl font-semibold mb-6">Informasi Kontak</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Nama Lengkap / Perusahaan *</label>
                            <input type="text" name="nama" class="form-input" placeholder="Masukkan nama lengkap atau perusahaan" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Email Aktif *</label>
                            <input type="email" name="email" class="form-input" placeholder="email@contoh.com" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Nomor Telepon *</label>
                            <div class="flex gap-2">
                                <div class="relative w-32">
                                    <select name="country_code" class="form-input pl-10">
                                        <option value="+62">🇮🇩 +62</option>
                                        <option value="+1">🇺🇸 +1</option>
                                        <option value="+44">🇬🇧 +44</option>
                                        <option value="+60">🇲🇾 +60</option>
                                        <option value="+65">🇸🇬 +65</option>
                                        <option value="+81">🇯🇵 +81</option>
                                        <option value="+82">🇰🇷 +82</option>
                                    </select>
                                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                </div>
                                <input type="tel" name="telepon" class="form-input flex-1" placeholder="812-3456-7890" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-8">
                        <button type="button" onclick="nextStep(2)" class="btn-primary">
                            Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div id="step2" class="form-step hidden">
                    <h3 class="text-xl font-semibold mb-6">Pilih Layanan</h3>
                    <div class="space-y-3">
                        <label class="service-option">
                            <input type="radio" name="jasa" value="SEO Optimization" required>
                            <div class="option-content">
                                <div class="option-icon bg-blue-100 text-blue-600">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="option-text">
                                    <h4>SEO Optimization</h4>
                                    <p>Optimasi website untuk ranking Google yang lebih baik</p>
                                </div>
                            </div>
                        </label>
                        
                        <label class="service-option">
                            <input type="radio" name="jasa" value="Social Media Management">
                            <div class="option-content">
                                <div class="option-icon bg-purple-100 text-purple-600">
                                    <i class="fab fa-instagram"></i>
                                </div>
                                <div class="option-text">
                                    <h4>Social Media Management</h4>
                                    <p>Kelola dan optimalkan performa media sosial</p>
                                </div>
                            </div>
                        </label>
                        
                        <label class="service-option">
                            <input type="radio" name="jasa" value="Web Development">
                            <div class="option-content">
                                <div class="option-icon bg-green-100 text-green-600">
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
                                <div class="option-icon bg-red-100 text-red-600">
                                    <i class="fas fa-ad"></i>
                                </div>
                                <div class="option-text">
                                    <h4>Google Ads</h4>
                                    <p>Kampanye iklan terukur untuk konversi maksimal</p>
                                </div>
                            </div>
                        </label>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(1)" class="btn-outline">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </button>
                        <button type="button" onclick="nextStep(3)" class="btn-primary">
                            Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Step 3 -->
                <div id="step3" class="form-step hidden">
                    <h3 class="text-xl font-semibold mb-6">Detail Projek</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Ceritakan tentang proyek Anda *</label>
                            <textarea name="pesan" class="form-textarea" rows="4" placeholder="Jelaskan tujuan, target audience, budget, dan informasi penting lainnya..." required></textarea>
                            <div class="text-right text-xs text-gray-500 mt-1">
                                <span id="charCount">0</span> karakter
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Deadline yang Diharapkan</label>
                            <input type="date" name="deadline" class="form-input">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Lampirkan File (Opsional)</label>
                            <div class="file-upload">
                                <input type="file" name="file_brief" accept=".pdf,.doc,.docx,.jpg,.png,.zip">
                                <div class="upload-area">
                                    <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                                    <p>Klik untuk upload file</p>
                                    <small class="text-gray-500">PDF, DOC, JPG, PNG, ZIP (Maks. 10MB)</small>
                                </div>
                            </div>
                            <div id="filePreview" class="mt-2 hidden">
                                <div class="flex items-center justify-between bg-blue-50 p-3 rounded-lg">
                                    <div class="flex items-center space-x-3">
                                        <i class="fas fa-file text-blue-500"></i>
                                        <div>
                                            <p class="font-medium text-sm" id="fileName"></p>
                                            <p class="text-xs text-gray-500" id="fileSize"></p>
                                        </div>
                                    </div>
                                    <button type="button" onclick="removeFile()" class="text-red-500">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(2)" class="btn-outline">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </button>
                        <button type="submit" name="submit" class="btn-primary" id="submitBtn">
                            <i class="fas fa-paper-plane mr-2"></i> Kirim Brief
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/main.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });

        // Hide loader
        window.addEventListener('load', function() {
            document.getElementById('loader').style.opacity = '0';
            setTimeout(() => {
                document.getElementById('loader').style.display = 'none';
            }, 500);
        });

        // Form wizard functionality
        let currentStep = 1;
        const totalSteps = 3;

        function nextStep(step) {
            if (validateStep(currentStep)) {
                document.getElementById(`step${currentStep}`).classList.add('hidden');
                document.getElementById(`step${step}`).classList.remove('hidden');
                updateProgress(step);
                currentStep = step;
            }
        }

        function prevStep(step) {
            document.getElementById(`step${currentStep}`).classList.add('hidden');
            document.getElementById(`step${step}`).classList.remove('hidden');
            updateProgress(step);
            currentStep = step;
        }

        function updateProgress(step) {
            const progress = (step - 1) / (totalSteps - 1) * 100;
            document.getElementById('progressBar').style.width = `${progress}%`;
            
            document.querySelectorAll('.step-indicator').forEach((el, index) => {
                if (index + 1 <= step) {
                    el.classList.add('active');
                } else {
                    el.classList.remove('active');
                }
            });
        }

        function validateStep(step) {
            // Validation logic here
            return true;
        }

        // Modal functions
        function openBriefModal(service = '') {
            if (service) {
                document.querySelector(`input[value="${service}"]`).checked = true;
            }
            document.getElementById('briefModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeBriefModal() {
            document.getElementById('briefModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            resetForm();
        }

        function resetForm() {
            document.getElementById('projectForm').reset();
            currentStep = 1;
            updateProgress(1);
            document.querySelectorAll('.form-step').forEach((el, index) => {
                el.classList.toggle('hidden', index !== 0);
            });
        }

        // Character counter
        document.querySelector('textarea[name="pesan"]').addEventListener('input', function(e) {
            document.getElementById('charCount').textContent = e.target.value.length;
        });

        // File upload preview
        document.querySelector('input[name="file_brief"]').addEventListener('change', function(e) {
            if (this.files.length > 0) {
                const file = this.files[0];
                const fileSize = (file.size / (1024 * 1024)).toFixed(2);
                
                document.getElementById('fileName').textContent = file.name;
                document.getElementById('fileSize').textContent = `${fileSize} MB`;
                document.getElementById('filePreview').classList.remove('hidden');
            }
        });

        function removeFile() {
            document.querySelector('input[name="file_brief"]').value = '';
            document.getElementById('filePreview').classList.add('hidden');
        }

        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileBtn = document.getElementById('mobileMenuBtn');
            
            if (!mobileMenu.contains(e.target) && !mobileBtn.contains(e.target) && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });

        // Form submission
        document.getElementById('projectForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mengirim...';
            submitBtn.disabled = true;
            
            // Form will submit normally
        });
    </script>
</body>
</html>