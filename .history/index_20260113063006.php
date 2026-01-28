<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Z-STUDIO | Digital Agency</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css">
    
    <!-- Intl Tel Input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.1.0/css/intlTelInput.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        :root {
            --bg-dark: #050810;
            --bg-card: rgba(255, 255, 255, 0.02);
            --border: rgba(255, 255, 255, 0.08);
            --accent: #2563eb;
            --text-primary: rgba(255, 255, 255, 0.95);
            --text-secondary: rgba(255, 255, 255, 0.6);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html {
            scroll-behavior: smooth;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        html::-webkit-scrollbar {
            display: none;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            overflow-x: hidden;
        }
        
        .glass {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--border);
        }
        
        .glass-light {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .step-indicator {
            position: relative;
            z-index: 1;
        }
        
        .step-indicator::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--border);
            z-index: -1;
        }
        
        .form-step {
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .loading-spinner {
            width: 24px;
            height: 24px;
            border: 2px solid transparent;
            border-top-color: currentColor;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .iti {
            width: 100%;
        }
        
        .iti__flag-container {
            background: transparent !important;
        }
        
        .iti__selected-flag {
            background: transparent !important;
        }
    </style>
</head>
<body class="min-h-screen bg-[#050810]">
    
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 glass py-4 px-6">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                    <i data-lucide="zap" class="w-5 h-5 text-white"></i>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">
                    Z-STUDIO
                </span>
            </div>
            
            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#home" class="text-sm font-medium text-gray-300 hover:text-white transition">Home</a>
                <a href="#services" class="text-sm font-medium text-gray-300 hover:text-white transition">Services</a>
                <a href="#process" class="text-sm font-medium text-gray-300 hover:text-white transition">Process</a>
                <a href="#contact" class="text-sm font-medium text-gray-300 hover:text-white transition">Contact</a>
                
                <!-- Language Toggle -->
                <button id="languageToggle" class="text-sm font-medium text-gray-300 hover:text-white transition flex items-center space-x-2">
                    <i data-lucide="globe" class="w-4 h-4"></i>
                    <span>ID</span>
                </button>
                
                <!-- CTA Button -->
                <button onclick="openBriefModal()" class="px-6 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-medium hover:opacity-90 transition">
                    Start Project
                </button>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-gray-300">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden mt-4 hidden">
            <div class="space-y-4">
                <a href="#home" class="block text-gray-300 hover:text-white transition">Home</a>
                <a href="#services" class="block text-gray-300 hover:text-white transition">Services</a>
                <a href="#process" class="block text-gray-300 hover:text-white transition">Process</a>
                <a href="#contact" class="block text-gray-300 hover:text-white transition">Contact</a>
                <button onclick="openBriefModal()" class="w-full py-3 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium">
                    Start Project
                </button>
            </div>
        </div>
    </header>
    
    <!-- Hero Section -->
    <section id="home" class="pt-32 pb-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <!-- Badge -->
                    <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full glass-light mb-8">
                        <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                        <span class="text-sm text-blue-400">Premium Digital Agency</span>
                    </div>
                    
                    <!-- Title -->
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Transform Your Digital<br>
                        <span class="bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">
                            Presence
                        </span>
                    </h1>
                    
                    <!-- Description -->
                    <p class="text-lg text-gray-400 mb-10 leading-relaxed max-w-2xl">
                        We craft exceptional digital experiences with precision and purpose. 
                        Our data-driven strategies deliver measurable results for forward-thinking businesses.
                    </p>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button onclick="openBriefModal()" 
                                class="px-8 py-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium hover:opacity-90 transition flex items-center justify-center space-x-2">
                            <i data-lucide="calendar" class="w-5 h-5"></i>
                            <span>Schedule Consultation</span>
                        </button>
                        
                        <a href="#process" 
                           class="px-8 py-4 rounded-xl glass font-medium hover:bg-white/5 transition flex items-center justify-center space-x-2">
                            <i data-lucide="play-circle" class="w-5 h-5"></i>
                            <span>View Process</span>
                        </a>
                    </div>
                </div>
                
                <!-- Right Content -->
                <div class="relative">
                    <div class="glass rounded-3xl p-1">
                        <div class="rounded-2xl overflow-hidden">
                            <div class="h-64 bg-gradient-to-br from-blue-900/30 to-purple-900/30 flex items-center justify-center">
                                <div class="text-center">
                                    <i data-lucide="layout-dashboard" class="w-16 h-16 text-blue-500 mx-auto mb-4"></i>
                                    <p class="text-gray-400">Digital Solutions Dashboard</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Elements -->
                    <div class="absolute -top-6 -right-6 w-32 h-32 rounded-full bg-blue-500/10 blur-xl"></div>
                    <div class="absolute -bottom-6 -left-6 w-32 h-32 rounded-full bg-purple-500/10 blur-xl"></div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Services Section -->
    <section id="services" class="py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Our Services</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">Comprehensive digital solutions tailored to your business objectives</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                $services = [
                    [
                        'icon' => 'search',
                        'title' => 'SEO Optimization',
                        'desc' => 'Increase organic visibility and drive qualified traffic',
                        'features' => ['Technical SEO Audit', 'Keyword Strategy', 'On-Page Optimization']
                    ],
                    [
                        'icon' => 'instagram',
                        'title' => 'Social Media',
                        'desc' => 'Build brand presence and engage your audience',
                        'features' => ['Content Strategy', 'Community Management', 'Performance Analytics']
                    ],
                    [
                        'icon' => 'code',
                        'title' => 'Web Development',
                        'desc' => 'High-performance websites with optimal user experience',
                        'features' => ['Custom Design', 'Mobile Responsive', 'CMS Integration']
                    ],
                    [
                        'icon' => 'trending-up',
                        'title' => 'Google Ads',
                        'desc' => 'Data-driven campaigns for maximum ROI',
                        'features' => ['Campaign Setup', 'A/B Testing', 'ROI Tracking']
                    ]
                ];
                
                foreach ($services as $service):
                ?>
                <div class="glass rounded-2xl p-6 hover:bg-white/5 transition group">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center mb-6">
                        <i data-lucide="<?php echo $service['icon']; ?>" class="w-6 h-6 text-blue-500"></i>
                    </div>
                    
                    <h3 class="text-xl font-semibold mb-3"><?php echo $service['title']; ?></h3>
                    <p class="text-gray-400 text-sm mb-6"><?php echo $service['desc']; ?></p>
                    
                    <ul class="space-y-3 mb-8">
                        <?php foreach ($service['features'] as $feature): ?>
                        <li class="flex items-center text-sm">
                            <i data-lucide="check" class="w-4 h-4 text-green-500 mr-2"></i>
                            <span class="text-gray-300"><?php echo $feature; ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    
                    <button onclick="openBriefModal('<?php echo $service['title']; ?>')" 
                            class="w-full py-3 rounded-lg border border-gray-800 text-gray-400 hover:text-white hover:border-blue-500 transition text-sm font-medium">
                        Learn More
                    </button>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <!-- Process Section -->
    <section id="process" class="py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">Our Process</h2>
                <p class="text-gray-400 max-w-2xl mx-auto">A systematic approach to ensure project success</p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php
                $steps = [
                    ['number' => '01', 'title' => 'Consultation', 'desc' => 'Deep dive into your business goals and requirements'],
                    ['number' => '02', 'title' => 'Planning', 'desc' => 'Strategic roadmap development based on analysis'],
                    ['number' => '03', 'title' => 'Execution', 'desc' => 'Implementation using latest technologies and best practices'],
                    ['number' => '04', 'title' => 'Evaluation', 'desc' => 'Continuous monitoring and optimization for peak performance']
                ];
                
                foreach ($steps as $step):
                ?>
                <div class="text-center">
                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center mx-auto mb-6">
                        <span class="text-2xl font-bold"><?php echo $step['number']; ?></span>
                    </div>
                    <h3 class="text-xl font-semibold mb-3"><?php echo $step['title']; ?></h3>
                    <p class="text-gray-400"><?php echo $step['desc']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto glass rounded-3xl p-12 text-center">
            <h2 class="text-4xl font-bold mb-6">Ready to Elevate Your Digital Presence?</h2>
            <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto">Schedule a free consultation with our experts. Discuss your project with no commitment.</p>
            <button onclick="openBriefModal()" 
                    class="px-10 py-4 rounded-xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium hover:opacity-90 transition text-lg">
                Start Your Project
            </button>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="py-12 px-6 border-t border-gray-900">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                            <i data-lucide="zap" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="text-xl font-bold">Z-STUDIO</span>
                    </div>
                    <p class="text-gray-400 text-sm">Transforming businesses through innovative digital solutions.</p>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white transition text-sm">Home</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition text-sm">Services</a></li>
                        <li><a href="#process" class="text-gray-400 hover:text-white transition text-sm">Process</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition text-sm">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-gray-400 hover:text-white transition text-sm">SEO Optimization</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition text-sm">Social Media</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition text-sm">Web Development</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white transition text-sm">Google Ads</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-semibold mb-4">Contact</h4>
                    <ul class="space-y-3">
                        <li class="flex items-center space-x-3">
                            <i data-lucide="mail" class="w-4 h-4 text-gray-400"></i>
                            <span class="text-gray-400 text-sm">hello@zstudio.co.id</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i data-lucide="phone" class="w-4 h-4 text-gray-400"></i>
                            <span class="text-gray-400 text-sm">+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center space-x-3">
                            <i data-lucide="map-pin" class="w-4 h-4 text-gray-400"></i>
                            <span class="text-gray-400 text-sm">Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-900 mt-12 pt-8 text-center">
                <p class="text-gray-500 text-sm">&copy; 2024 Z-STUDIO. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <!-- Brief Modal -->
    <div id="briefModal" class="fixed inset-0 bg-black/80 z-50 hidden items-center justify-center p-4">
        <div class="glass rounded-3xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Header -->
            <div class="p-6 border-b border-gray-800 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-bold">Project Brief</h2>
                    <p class="text-gray-400 text-sm">Complete the form to start your project</p>
                </div>
                <button onclick="closeBriefModal()" class="text-gray-400 hover:text-white">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            
            <!-- Form -->
            <form id="projectForm" action="simpan_brief.php" method="POST" enctype="multipart/form-data" class="p-6 space-y-6 overflow-y-auto max-h-[calc(90vh-120px)]">
                <!-- Progress Steps -->
                <div class="step-indicator flex justify-between mb-8">
                    <?php for($i = 1; $i <= 3; $i++): ?>
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-gray-900 border border-gray-800 flex items-center justify-center mb-2 step-circle" data-step="<?php echo $i; ?>">
                            <span class="text-gray-400"><?php echo $i; ?></span>
                        </div>
                        <span class="text-xs text-gray-500">
                            <?php echo $i == 1 ? 'Information' : ($i == 2 ? 'Services' : 'Details'); ?>
                        </span>
                    </div>
                    <?php endfor; ?>
                </div>
                
                <!-- Step 1: Information -->
                <div id="step1" class="form-step">
                    <h3 class="text-xl font-semibold mb-6">Contact Information</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Full Name / Company *</label>
                            <input type="text" name="nama" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none" placeholder="Enter your name or company" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Email Address *</label>
                            <input type="email" name="email" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none" placeholder="email@example.com" required>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Phone Number *</label>
                            <input type="tel" id="phone" name="telepon" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none" required>
                            <input type="hidden" name="country_code" id="countryCode">
                        </div>
                    </div>
                    
                    <div class="flex justify-end mt-8">
                        <button type="button" onclick="nextStep(2)" class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium">
                            Next Step
                        </button>
                    </div>
                </div>
                
                <!-- Step 2: Services -->
                <div id="step2" class="form-step hidden">
                    <h3 class="text-xl font-semibold mb-6">Select Service</h3>
                    <div class="space-y-3">
                        <?php foreach ($services as $service): ?>
                        <label class="block cursor-pointer">
                            <input type="radio" name="jasa" value="<?php echo $service['title']; ?>" class="hidden peer">
                            <div class="p-4 rounded-xl border border-gray-800 peer-checked:border-blue-500 peer-checked:bg-blue-500/5 hover:bg-white/5 transition">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center">
                                        <i data-lucide="<?php echo $service['icon']; ?>" class="w-5 h-5 text-blue-500"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium"><?php echo $service['title']; ?></h4>
                                        <p class="text-sm text-gray-400"><?php echo $service['desc']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(1)" class="px-6 py-3 rounded-lg border border-gray-800 text-gray-400 hover:text-white">
                            Previous
                        </button>
                        <button type="button" onclick="nextStep(3)" class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium">
                            Next Step
                        </button>
                    </div>
                </div>
                
                <!-- Step 3: Details -->
                <div id="step3" class="form-step hidden">
                    <h3 class="text-xl font-semibold mb-6">Project Details</h3>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-2">Project Description *</label>
                            <textarea name="pesan" rows="4" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none" placeholder="Describe your project goals, target audience, budget, and timeline..." required></textarea>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Expected Deadline</label>
                            <input type="date" name="deadline" class="w-full px-4 py-3 rounded-xl bg-gray-900 border border-gray-800 focus:border-blue-500 outline-none">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium mb-2">Attach File (Optional)</label>
                            <div class="relative">
                                <input type="file" name="file_brief" id="fileInput" class="hidden" accept=".pdf,.doc,.docx,.jpg,.png,.zip">
                                <div onclick="document.getElementById('fileInput').click()" class="border-2 border-dashed border-gray-800 rounded-xl p-8 text-center cursor-pointer hover:border-blue-500 transition">
                                    <i data-lucide="upload-cloud" class="w-12 h-12 text-gray-600 mx-auto mb-4"></i>
                                    <p class="text-gray-400">Click to upload file</p>
                                    <p class="text-gray-500 text-sm mt-2">PDF, DOC, JPG, PNG, ZIP (Max 10MB)</p>
                                </div>
                            </div>
                            <div id="filePreview" class="mt-2 hidden">
                                <!-- File preview will be inserted here -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex justify-between mt-8">
                        <button type="button" onclick="prevStep(2)" class="px-6 py-3 rounded-lg border border-gray-800 text-gray-400 hover:text-white">
                            Previous
                        </button>
                        <button type="submit" name="submit" class="px-6 py-3 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium flex items-center space-x-2">
                            <span id="submitText">Submit Brief</span>
                            <div id="submitSpinner" class="loading-spinner hidden"></div>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.1.0/js/intlTelInput.min.js"></script>
    
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Mobile menu toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
        
        // International telephone input
        const phoneInput = document.getElementById('phone');
        const iti = window.intlTelInput(phoneInput, {
            initialCountry: 'id',
            separateDialCode: true,
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.1.0/js/utils.js"
        });
        
        // Update hidden country code field
        phoneInput.addEventListener('countrychange', function() {
            document.getElementById('countryCode').value = '+' + iti.getSelectedCountryData().dialCode;
        });
        
        // Form wizard functionality
        let currentStep = 1;
        
        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(el => {
                el.classList.add('hidden');
            });
            
            // Show current step
            document.getElementById(`step${step}`).classList.remove('hidden');
            
            // Update progress indicator
            document.querySelectorAll('.step-circle').forEach((circle, index) => {
                if (index + 1 <= step) {
                    circle.classList.add('bg-blue-500', 'text-white', 'border-blue-500');
                    circle.classList.remove('bg-gray-900', 'text-gray-400', 'border-gray-800');
                } else {
                    circle.classList.remove('bg-blue-500', 'text-white', 'border-blue-500');
                    circle.classList.add('bg-gray-900', 'text-gray-400', 'border-gray-800');
                }
            });
            
            currentStep = step;
        }
        
        function nextStep(step) {
            // Validate current step
            if (validateStep(currentStep)) {
                showStep(step);
            }
        }
        
        function prevStep(step) {
            showStep(step);
        }
        
        function validateStep(step) {
            if (step === 1) {
                const name = document.querySelector('input[name="nama"]');
                const email = document.querySelector('input[name="email"]');
                
                if (!name.value.trim()) {
                    showError(name, 'Please enter your name');
                    return false;
                }
                
                if (!email.value.trim() || !isValidEmail(email.value)) {
                    showError(email, 'Please enter a valid email');
                    return false;
                }
                
                if (!phoneInput.value.trim() || !iti.isValidNumber()) {
                    showError(phoneInput, 'Please enter a valid phone number');
                    return false;
                }
                
                return true;
            }
            
            if (step === 2) {
                const service = document.querySelector('input[name="jasa"]:checked');
                if (!service) {
                    showNotification('Please select a service');
                    return false;
                }
                return true;
            }
            
            return true;
        }
        
        function isValidEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }
        
        function showError(input, message) {
            input.classList.add('border-red-500');
            showNotification(message, 'error');
            
            setTimeout(() => {
                input.classList.remove('border-red-500');
            }, 3000);
        }
        
        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 glass px-6 py-3 rounded-xl flex items-center space-x-3 z-50 animate-slideIn`;
            
            const icon = type === 'error' ? 'alert-circle' : 'info';
            
            notification.innerHTML = `
                <i data-lucide="${icon}" class="w-5 h-5 ${type === 'error' ? 'text-red-500' : 'text-blue-500'}"></i>
                <span>${message}</span>
            `;
            
            document.body.appendChild(notification);
            lucide.createIcons();
            
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }
        
        // Modal functions
        function openBriefModal(service = '') {
            document.getElementById('briefModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            
            if (service) {
                const serviceInput = document.querySelector(`input[value="${service}"]`);
                if (serviceInput) {
                    serviceInput.checked = true;
                }
            }
            
            // Reset form to step 1
            showStep(1);
        }
        
        function closeBriefModal() {
            document.getElementById('briefModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        
        // File upload preview
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const filePreview = document.getElementById('filePreview');
            if (this.files.length > 0) {
                const file = this.files[0];
                const fileSize = (file.size / (1024 * 1024)).toFixed(2);
                
                filePreview.innerHTML = `
                    <div class="glass rounded-xl p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <i data-lucide="file" class="w-5 h-5 text-blue-500"></i>
                            <div>
                                <p class="font-medium text-sm">${file.name}</p>
                                <p class="text-gray-400 text-xs">${fileSize} MB</p>
                            </div>
                        </div>
                        <button type="button" onclick="removeFile()" class="text-gray-400 hover:text-white">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                filePreview.classList.remove('hidden');
                lucide.createIcons();
            }
        });
        
        function removeFile() {
            document.getElementById('fileInput').value = '';
            document.getElementById('filePreview').classList.add('hidden');
            document.getElementById('filePreview').innerHTML = '';
        }
        
        // Form submission
        document.getElementById('projectForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validate all steps
            for (let i = 1; i <= 3; i++) {
                if (!validateStep(i)) {
                    showStep(i);
                    return;
                }
            }
            
            // Update country code before submission
            document.getElementById('countryCode').value = '+' + iti.getSelectedCountryData().dialCode;
            
            // Show loading state
            const submitBtn = document.querySelector('button[type="submit"]');
            const submitText = document.getElementById('submitText');
            const submitSpinner = document.getElementById('submitSpinner');
            
            submitText.textContent = 'Submitting...';
            submitSpinner.classList.remove('hidden');
            submitBtn.disabled = true;
            
            // Submit form
            setTimeout(() => {
                this.submit();
            }, 1000);
        });
        
        // Language toggle
        document.getElementById('languageToggle').addEventListener('click', function() {
            const isID = this.querySelector('span').textContent === 'ID';
            this.querySelector('span').textContent = isID ? 'EN' : 'ID';
            
            // In a real implementation, you would load translation strings here
            // For now, we'll just toggle some text
            if (isID) {
                // Switch to English
                document.querySelectorAll('[data-translate]').forEach(el => {
                    const key = el.getAttribute('data-translate');
                    // You would fetch translations from a JSON file
                });
            } else {
                // Switch to Indonesian
                document.querySelectorAll('[data-translate]').forEach(el => {
                    const key = el.getAttribute('data-translate');
                    // You would fetch translations from a JSON file
                });
            }
        });
        
        // Close modal when clicking outside
        document.getElementById('briefModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBriefModal();
            }
        });
        
        // Initialize with step 1
        showStep(1);
    </script>
</body>
</html>