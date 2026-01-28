<!DOCTYPE html>
<html lang="id" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#050810">
    <title>Z-STUDIO | Digital Agency Premium</title>
    
    <!-- Preload critical resources -->
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" as="style">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css" as="style">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.css">
    
    <!-- Intl Tel Input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.1.0/css/intlTelInput.css">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom CSS -->
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
            -webkit-tap-highlight-color: transparent;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-dark);
            color: var(--text-primary);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* Hide scrollbar but keep functionality */
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        /* Glass effect */
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
        
        /* Responsive text */
        .responsive-heading {
            font-size: clamp(2rem, 5vw, 3.5rem);
        }
        
        .responsive-text {
            font-size: clamp(0.875rem, 2vw, 1rem);
        }
        
        /* Mobile touch improvements */
        @media (hover: none) and (pointer: coarse) {
            button, 
            a, 
            input[type="button"], 
            input[type="submit"] {
                min-height: 44px;
                min-width: 44px;
            }
            
            input, textarea, select {
                font-size: 16px; /* Prevents iOS zoom */
            }
        }
        
        /* Loading states */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }
        
        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Modal styles */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(8px);
            z-index: 1000;
            animation: fadeIn 0.3s ease;
        }
        
        .modal-content {
            animation: slideUp 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Form validation */
        .input-error {
            border-color: #ef4444 !important;
            background: rgba(239, 68, 68, 0.05) !important;
        }
        
        .input-success {
            border-color: #10b981 !important;
        }
        
        /* Status badges */
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .status-pending { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
        .status-disetujui { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
        .status-dalam-pengerjaan { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
        .status-selesai { background: rgba(34, 197, 94, 0.1); color: #22c55e; }
        .status-ditolak { background: rgba(239, 68, 68, 0.1); color: #ef4444; }
        
        /* Step indicator */
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
        
        /* File upload */
        .file-upload-area {
            transition: all 0.3s ease;
        }
        
        .file-upload-area.dragover {
            border-color: var(--accent);
            background: rgba(37, 99, 235, 0.05);
        }
        
        /* Responsive table */
        .responsive-table {
            display: block;
            overflow-x: auto;
            white-space: nowrap;
        }
        
        @media (min-width: 768px) {
            .responsive-table {
                display: table;
                white-space: normal;
            }
        }
        
        /* Loading spinner */
        .spinner {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
    </style>
    
    <!-- PWA Manifest -->
    <link rel="manifest" href="/manifest.json">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>
<body class="min-h-screen bg-[#050810]">
    
    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 glass py-4 px-4 md:px-6">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center space-x-3 no-underline">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center">
                    <i data-lucide="zap" class="w-5 h-5 text-white"></i>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-blue-400 to-blue-600 bg-clip-text text-transparent">
                    Z-STUDIO
                </span>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="#home" class="text-sm font-medium text-gray-300 hover:text-white transition-all">Home</a>
                <a href="#services" class="text-sm font-medium text-gray-300 hover:text-white transition-all">Services</a>
                <a href="#process" class="text-sm font-medium text-gray-300 hover:text-white transition-all">Process</a>
                <a href="#contact" class="text-sm font-medium text-gray-300 hover:text-white transition-all">Contact</a>
                
                <!-- Language Toggle -->
                <button id="languageToggle" class="text-sm font-medium text-gray-300 hover:text-white transition-all flex items-center space-x-2 px-3 py-2 rounded-lg hover:bg-white/5">
                    <i data-lucide="globe" class="w-4 h-4"></i>
                    <span>ID</span>
                </button>
                
                <!-- CTA Button -->
                <button onclick="openBriefModal()" 
                        class="px-6 py-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white text-sm font-medium hover:opacity-90 transition-all active:scale-95">
                    Start Project
                </button>
            </nav>
            
            <!-- Mobile Menu Button -->
            <button id="mobileMenuBtn" class="md:hidden text-gray-300 p-2">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="md:hidden mt-4 hidden glass rounded-xl p-4">
            <div class="space-y-3">
                <a href="#home" class="block py-3 px-4 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-all">Home</a>
                <a href="#services" class="block py-3 px-4 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-all">Services</a>
                <a href="#process" class="block py-3 px-4 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-all">Process</a>
                <a href="#contact" class="block py-3 px-4 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-all">Contact</a>
                
                <!-- Language Toggle Mobile -->
                <button id="languageToggleMobile" 
                        class="w-full py-3 px-4 rounded-lg text-gray-300 hover:text-white hover:bg-white/5 transition-all flex items-center justify-between">
                    <span>Language</span>
                    <span class="text-blue-400">ID</span>
                </button>
                
                <!-- CTA Button Mobile -->
                <button onclick="openBriefModal()" 
                        class="w-full py-3 rounded-lg bg-gradient-to-r from-blue-500 to-blue-700 text-white font-medium hover:opacity-90 transition-all active:scale-95">
                    Start Project
                </button>
            </div>
        </div>
    </header>

    <!-- Add main content sections from your original index.php here -->
    <!-- Hero, Services, Process, Footer sections remain the same -->
    
    <!-- Brief Modal -->
    <div id="briefModal" class="modal-overlay hidden items-center justify-center p-4">
        <div class="modal-content glass rounded-2xl max-w-2xl w-full max-h-[90vh] overflow-hidden">
            <!-- Modal content from original file -->
        </div>
    </div>

    <!-- Notification Container -->
    <div id="notificationContainer" class="fixed top-4 right-4 z-[9999] space-y-2 w-full max-w-sm"></div>
    
    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/lucide.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.1.0/js/intlTelInput.min.js"></script>
    
    <!-- Main JavaScript -->
    <script>
        class ZStudioApp {
            constructor() {
                this.currentStep = 1;
                this.totalSteps = 3;
                this.isMobileMenuOpen = false;
                this.isModalOpen = false;
                this.phoneInput = null;
                this.notificationTimeout = null;
                
                this.init();
            }
            
            init() {
                // Initialize Lucide icons
                lucide.createIcons();
                
                // Setup event listeners
                this.setupEventListeners();
                
                // Initialize phone input
                this.initPhoneInput();
                
                // Check for success message
                this.checkSuccessMessage();
                
                console.log('Z-STUDIO App initialized');
            }
            
            setupEventListeners() {
                // Mobile menu toggle
                document.getElementById('mobileMenuBtn').addEventListener('click', () => this.toggleMobileMenu());
                
                // Close mobile menu when clicking outside
                document.addEventListener('click', (e) => {
                    const mobileMenu = document.getElementById('mobileMenu');
                    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                    
                    if (this.isMobileMenuOpen && 
                        !mobileMenu.contains(e.target) && 
                        !mobileMenuBtn.contains(e.target)) {
                        this.closeMobileMenu();
                    }
                });
                
                // Language toggle
                document.getElementById('languageToggle')?.addEventListener('click', () => this.toggleLanguage());
                document.getElementById('languageToggleMobile')?.addEventListener('click', () => this.toggleLanguage());
                
                // Form step navigation
                document.querySelectorAll('[data-next-step]').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const step = parseInt(e.target.dataset.nextStep);
                        this.nextStep(step);
                    });
                });
                
                document.querySelectorAll('[data-prev-step]').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const step = parseInt(e.target.dataset.prevStep);
                        this.prevStep(step);
                    });
                });
                
                // File upload
                const fileInput = document.getElementById('fileInput');
                const fileUploadArea = document.getElementById('fileUploadArea');
                
                if (fileInput && fileUploadArea) {
                    fileInput.addEventListener('change', (e) => this.handleFileUpload(e));
                    
                    // Drag and drop
                    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                        fileUploadArea.addEventListener(eventName, (e) => {
                            e.preventDefault();
                            e.stopPropagation();
                        });
                    });
                    
                    ['dragenter', 'dragover'].forEach(eventName => {
                        fileUploadArea.addEventListener(eventName, () => {
                            fileUploadArea.classList.add('dragover');
                        });
                    });
                    
                    ['dragleave', 'drop'].forEach(eventName => {
                        fileUploadArea.addEventListener(eventName, () => {
                            fileUploadArea.classList.remove('dragover');
                        });
                    });
                    
                    fileUploadArea.addEventListener('drop', (e) => {
                        const files = e.dataTransfer.files;
                        if (files.length > 0) {
                            fileInput.files = files;
                            this.handleFileUpload({ target: fileInput });
                        }
                    });
                }
                
                // Form submission
                const form = document.getElementById('projectForm');
                if (form) {
                    form.addEventListener('submit', (e) => this.handleFormSubmit(e));
                }
                
                // Close modal with escape key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.isModalOpen) {
                        this.closeBriefModal();
                    }
                });
            }
            
            initPhoneInput() {
                const phoneInput = document.getElementById('phone');
                if (phoneInput) {
                    this.phoneInput = window.intlTelInput(phoneInput, {
                        initialCountry: 'id',
                        separateDialCode: true,
                        preferredCountries: ['id', 'us', 'gb', 'sg', 'my'],
                        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/20.1.0/js/utils.js"
                    });
                    
                    // Update hidden country code field
                    phoneInput.addEventListener('countrychange', () => {
                        document.getElementById('countryCode').value = '+' + this.phoneInput.getSelectedCountryData().dialCode;
                    });
                }
            }
            
            toggleMobileMenu() {
                const mobileMenu = document.getElementById('mobileMenu');
                this.isMobileMenuOpen = !this.isMobileMenuOpen;
                
                if (this.isMobileMenuOpen) {
                    mobileMenu.classList.remove('hidden');
                    mobileMenu.style.animation = 'slideDown 0.3s ease';
                    document.body.style.overflow = 'hidden';
                } else {
                    this.closeMobileMenu();
                }
            }
            
            closeMobileMenu() {
                const mobileMenu = document.getElementById('mobileMenu');
                mobileMenu.classList.add('hidden');
                this.isMobileMenuOpen = false;
                document.body.style.overflow = '';
            }
            
            openBriefModal(service = '') {
                const modal = document.getElementById('briefModal');
                modal.classList.remove('hidden');
                this.isModalOpen = true;
                document.body.style.overflow = 'hidden';
                
                // Reset to step 1
                this.showStep(1);
                
                // Pre-select service if provided
                if (service) {
                    const serviceInput = document.querySelector(`input[value="${service}"]`);
                    if (serviceInput) {
                        serviceInput.checked = true;
                    }
                }
                
                // Focus on first input
                setTimeout(() => {
                    const firstInput = document.querySelector('#step1 input');
                    if (firstInput) firstInput.focus();
                }, 300);
            }
            
            closeBriefModal() {
                const modal = document.getElementById('briefModal');
                modal.classList.add('hidden');
                this.isModalOpen = false;
                document.body.style.overflow = '';
                
                // Reset form
                this.resetForm();
            }
            
            showStep(step) {
                // Hide all steps
                document.querySelectorAll('.form-step').forEach(el => {
                    el.classList.add('hidden');
                });
                
                // Show current step
                const currentStep = document.getElementById(`step${step}`);
                if (currentStep) {
                    currentStep.classList.remove('hidden');
                }
                
                // Update progress indicator
                this.updateProgressIndicator(step);
                
                this.currentStep = step;
            }
            
            updateProgressIndicator(step) {
                document.querySelectorAll('.step-circle').forEach((circle, index) => {
                    if (index + 1 <= step) {
                        circle.classList.add('bg-blue-500', 'text-white', 'border-blue-500');
                        circle.classList.remove('bg-gray-900', 'text-gray-400', 'border-gray-800');
                    } else {
                        circle.classList.remove('bg-blue-500', 'text-white', 'border-blue-500');
                        circle.classList.add('bg-gray-900', 'text-gray-400', 'border-gray-800');
                    }
                });
            }
            
            nextStep(next) {
                if (this.validateCurrentStep()) {
                    if (next <= this.totalSteps) {
                        this.showStep(next);
                    }
                }
            }
            
            prevStep(prev) {
                if (prev >= 1) {
                    this.showStep(prev);
                }
            }
            
            validateCurrentStep() {
                const step = this.currentStep;
                
                if (step === 1) {
                    const name = document.querySelector('input[name="nama"]');
                    const email = document.querySelector('input[name="email"]');
                    
                    let isValid = true;
                    
                    // Validate name
                    if (!name.value.trim()) {
                        this.showInputError(name, 'Please enter your name or company');
                        isValid = false;
                    } else {
                        this.clearInputError(name);
                    }
                    
                    // Validate email
                    if (!email.value.trim()) {
                        this.showInputError(email, 'Please enter your email address');
                        isValid = false;
                    } else if (!this.isValidEmail(email.value)) {
                        this.showInputError(email, 'Please enter a valid email address');
                        isValid = false;
                    } else {
                        this.clearInputError(email);
                    }
                    
                    // Validate phone
                    if (!this.phoneInput || !this.phoneInput.isValidNumber()) {
                        const phoneInput = document.getElementById('phone');
                        this.showInputError(phoneInput, 'Please enter a valid phone number');
                        isValid = false;
                    } else {
                        const phoneInput = document.getElementById('phone');
                        this.clearInputError(phoneInput);
                    }
                    
                    return isValid;
                }
                
                if (step === 2) {
                    const selectedService = document.querySelector('input[name="jasa"]:checked');
                    if (!selectedService) {
                        this.showNotification('Please select a service', 'warning');
                        return false;
                    }
                    return true;
                }
                
                if (step === 3) {
                    const message = document.getElementById('pesan');
                    if (!message.value.trim()) {
                        this.showInputError(message, 'Please describe your project');
                        return false;
                    }
                    
                    if (message.value.trim().length < 20) {
                        this.showInputError(message, 'Please provide more details (minimum 20 characters)');
                        return false;
                    }
                    
                    this.clearInputError(message);
                    return true;
                }
                
                return true;
            }
            
            showInputError(input, message) {
                input.classList.add('input-error');
                this.showNotification(message, 'error');
                
                // Scroll to input on mobile
                if (window.innerWidth < 768) {
                    input.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                }
                
                // Focus on input
                input.focus();
                
                // Remove error after 3 seconds
                setTimeout(() => {
                    this.clearInputError(input);
                }, 3000);
            }
            
            clearInputError(input) {
                input.classList.remove('input-error');
                input.classList.add('input-success');
                setTimeout(() => {
                    input.classList.remove('input-success');
                }, 1000);
            }
            
            isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
            
            async handleFormSubmit(e) {
                e.preventDefault();
                
                // Validate all steps
                for (let i = 1; i <= this.totalSteps; i++) {
                    this.currentStep = i;
                    if (!this.validateCurrentStep()) {
                        this.showStep(i);
                        return;
                    }
                }
                
                // Update country code
                if (this.phoneInput) {
                    document.getElementById('countryCode').value = '+' + this.phoneInput.getSelectedCountryData().dialCode;
                }
                
                // Show loading state
                const submitBtn = e.target.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = `
                    <div class="spinner border-2 border-white border-t-transparent rounded-full w-5 h-5 mr-2"></div>
                    Submitting...
                `;
                submitBtn.disabled = true;
                
                try {
                    // Create FormData
                    const formData = new FormData(e.target);
                    
                    // Submit via fetch for better UX
                    const response = await fetch(e.target.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'Accept': 'application/json'
                        }
                    });
                    
                    if (response.ok) {
                        const result = await response.json();
                        if (result.success) {
                            window.location.href = `thanks.php?id=${result.project_id}&name=${encodeURIComponent(result.client_name)}`;
                        } else {
                            this.showNotification(result.message || 'Submission failed', 'error');
                        }
                    } else {
                        throw new Error('Network response was not ok');
                    }
                    
                } catch (error) {
                    console.error('Submission error:', error);
                    this.showNotification('Failed to submit form. Please try again.', 'error');
                    
                    // Fallback to traditional form submission
                    setTimeout(() => {
                        e.target.submit();
                    }, 100);
                    
                } finally {
                    // Restore button state
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }
            }
            
            handleFileUpload(e) {
                const file = e.target.files[0];
                const filePreview = document.getElementById('filePreview');
                
                if (!file) {
                    filePreview.classList.add('hidden');
                    return;
                }
                
                // Validate file
                const maxSize = 10 * 1024 * 1024; // 10MB
                const allowedTypes = [
                    'application/pdf',
                    'application/msword',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'image/jpeg',
                    'image/png',
                    'application/zip'
                ];
                
                if (file.size > maxSize) {
                    this.showNotification('File size too large. Maximum 10MB.', 'error');
                    e.target.value = '';
                    return;
                }
                
                if (!allowedTypes.includes(file.type)) {
                    this.showNotification('File type not supported. Please upload PDF, DOC, JPG, PNG, or ZIP.', 'error');
                    e.target.value = '';
                    return;
                }
                
                // Show file preview
                const fileSize = (file.size / (1024 * 1024)).toFixed(2);
                filePreview.innerHTML = `
                    <div class="glass rounded-xl p-4 flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <i data-lucide="file" class="w-5 h-5 text-blue-500"></i>
                            <div>
                                <p class="font-medium text-sm truncate max-w-[200px]">${file.name}</p>
                                <p class="text-gray-400 text-xs">${fileSize} MB</p>
                            </div>
                        </div>
                        <button type="button" onclick="app.removeFile()" class="text-gray-400 hover:text-white p-2">
                            <i data-lucide="x" class="w-4 h-4"></i>
                        </button>
                    </div>
                `;
                filePreview.classList.remove('hidden');
                lucide.createIcons();
            }
            
            removeFile() {
                const fileInput = document.getElementById('fileInput');
                const filePreview = document.getElementById('filePreview');
                
                fileInput.value = '';
                filePreview.classList.add('hidden');
                filePreview.innerHTML = '';
            }
            
            showNotification(message, type = 'info') {
                const container = document.getElementById('notificationContainer');
                
                // Create notification element
                const notification = document.createElement('div');
                notification.className = `glass rounded-xl p-4 flex items-start space-x-3 animate-slideInRight`;
                
                // Set icon based on type
                let icon = 'info';
                let iconColor = 'text-blue-500';
                
                switch(type) {
                    case 'success':
                        icon = 'check-circle';
                        iconColor = 'text-green-500';
                        break;
                    case 'error':
                        icon = 'alert-circle';
                        iconColor = 'text-red-500';
                        break;
                    case 'warning':
                        icon = 'alert-triangle';
                        iconColor = 'text-yellow-500';
                        break;
                }
                
                notification.innerHTML = `
                    <div class="${iconColor}">
                        <i data-lucide="${icon}" class="w-5 h-5"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm">${message}</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-gray-400 hover:text-white p-1">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                `;
                
                // Add to container
                container.appendChild(notification);
                lucide.createIcons();
                
                // Auto remove after 5 seconds
                setTimeout(() => {
                    if (notification.parentElement) {
                        notification.style.opacity = '0';
                        notification.style.transform = 'translateX(100%)';
                        setTimeout(() => {
                            if (notification.parentElement) {
                                notification.remove();
                            }
                        }, 300);
                    }
                }, 5000);
            }
            
            toggleLanguage() {
                const currentLang = document.querySelector('#languageToggle span').textContent;
                const newLang = currentLang === 'ID' ? 'EN' : 'ID';
                
                // Update both toggles
                document.querySelectorAll('[id^="languageToggle"] span').forEach(span => {
                    span.textContent = newLang;
                });
                
                this.showNotification(`Language switched to ${newLang}`, 'info');
                
                // In production, you would load translation files here
            }
            
            resetForm() {
                const form = document.getElementById('projectForm');
                if (form) {
                    form.reset();
                    this.showStep(1);
                    this.removeFile();
                    
                    // Reset phone input
                    if (this.phoneInput) {
                        this.phoneInput.setCountry('id');
                    }
                }
            }
            
            checkSuccessMessage() {
                const urlParams = new URLSearchParams(window.location.search);
                if (urlParams.has('success')) {
                    this.showNotification('Project submitted successfully!', 'success');
                    
                    // Clean URL
                    const cleanUrl = window.location.pathname;
                    window.history.replaceState({}, document.title, cleanUrl);
                }
            }
        }
        
        // Initialize app when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            window.app = new ZStudioApp();
        });
        
        // Expose functions to global scope for inline event handlers
        window.openBriefModal = (service = '') => window.app.openBriefModal(service);
        window.closeBriefModal = () => window.app.closeBriefModal();
        window.toggleMobileMenu = () => window.app.toggleMobileMenu();
        window.nextStep = (step) => window.app.nextStep(step);
        window.prevStep = (step) => window.app.prevStep(step);
        window.removeFile = () => window.app.removeFile();
    </script>
</body>
</html>