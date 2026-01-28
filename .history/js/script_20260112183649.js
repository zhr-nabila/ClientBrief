// ===== CONFIGURATION =====
const APP_CONFIG = {
    currentStep: 1,
    totalSteps: 3,
    currentLang: 'id',
    isMobileMenuOpen: false
};

// ===== TRANSLATIONS =====
const TRANSLATIONS = {
    id: {
        // Navigation
        "nav-home": "Beranda",
        "nav-services": "Layanan",
        "nav-about": "Tentang",
        "nav-contact": "Kontak",
        "nav-apply": "Mulai Projek",
        
        // Hero
        "hero-title": "TRANSFORMASI DIGITAL",
        "hero-subtitle": "Solusi Digital untuk Bisnis Modern",
        "hero-desc": "Kami menghadirkan inovasi digital yang membawa bisnis Anda ke level berikutnya dengan strategi terukur dan hasil nyata.",
        "hero-cta-primary": "Konsultasi Gratis",
        "hero-cta-secondary": "WhatsApp Kami",
        
        // Stats
        "stat-clients": "Klien",
        "stat-clients-desc": "Yang mempercayai kami",
        "stat-projects": "Proyek",
        "stat-projects-desc": "Telah diselesaikan",
        "stat-success": "Success Rate",
        "stat-success-desc": "Tingkat keberhasilan",
        "stat-support": "Support",
        "stat-support-desc": "24/7 ketersediaan",
        
        // Services
        "services-title": "Layanan Kami",
        "services-subtitle": "Solusi lengkap untuk semua kebutuhan digital",
        "service-seo-title": "SEO Optimization",
        "service-seo-desc": "Optimasi website untuk ranking teratas di Google dengan strategi terbaru.",
        "service-social-title": "Social Media",
        "service-social-desc": "Strategi konten kreatif untuk engagement maksimal di platform sosial.",
        "service-web-title": "Web Development",
        "service-web-desc": "Website custom dengan performa optimal dan keamanan terbaik.",
        "service-ads-title": "Google Ads",
        "service-ads-desc": "Kampanye iklan terukur untuk konversi maksimal dan ROI optimal.",
        
        // Form
        "form-title": "Mulai Projek Anda",
        "form-subtitle": "Isi brief untuk mulai konsultasi",
        "step-1-title": "Informasi Kontak",
        "step-2-title": "Pilih Layanan",
        "step-3-title": "Detail Projek",
        "label-name": "Nama Lengkap / Perusahaan",
        "label-email": "Email aktif Anda",
        "label-service": "Jenis Layanan",
        "label-message": "Ceritakan tentang proyek Anda...",
        "label-file": "Upload File (Opsional)",
        "file-hint": "Klik untuk upload file",
        "file-types": "PDF, DOC, JPG, PNG (Max 5MB)",
        "btn-next": "Selanjutnya",
        "btn-back": "Kembali",
        "btn-submit": "Kirim Brief",
        "btn-cancel": "Tutup",
        
        // CTA
        "cta-title": "Siap Transformasi Digital?",
        "cta-desc": "Mulai proyek Anda sekarang dan dapatkan konsultasi gratis dari ahli kami.",
        "cta-button": "Mulai Sekarang",
        
        // Footer
        "footer-company": "Z-STUDIO",
        "footer-tagline": "Digital Solutions Agency",
        "footer-address": "Jakarta, Indonesia",
        "footer-email": "hello@zstudio.co.id",
        "footer-phone": "+62 812 3456 7890",
        "footer-copyright": "© 2024 Z-STUDIO. All rights reserved.",
        "privacy": "Privacy",
        "terms": "Terms",
        "chat-whatsapp": "Chat via WhatsApp"
    },
    
    en: {
        // Navigation
        "nav-home": "Home",
        "nav-services": "Services",
        "nav-about": "About",
        "nav-contact": "Contact",
        "nav-apply": "Start Project",
        
        // Hero
        "hero-title": "DIGITAL TRANSFORMATION",
        "hero-subtitle": "Digital Solutions for Modern Business",
        "hero-desc": "We deliver digital innovation that takes your business to the next level with measurable strategies and tangible results.",
        "hero-cta-primary": "Free Consultation",
        "hero-cta-secondary": "WhatsApp Us",
        
        // Stats
        "stat-clients": "Clients",
        "stat-clients-desc": "Who trust us",
        "stat-projects": "Projects",
        "stat-projects-desc": "Completed",
        "stat-success": "Success Rate",
        "stat-success-desc": "Success rate",
        "stat-support": "Support",
        "stat-support-desc": "24/7 availability",
        
        // Services
        "services-title": "Our Services",
        "services-subtitle": "Complete solutions for all digital needs",
        "service-seo-title": "SEO Optimization",
        "service-seo-desc": "Website optimization for top Google rankings with latest strategies.",
        "service-social-title": "Social Media",
        "service-social-desc": "Creative content strategy for maximum engagement on social platforms.",
        "service-web-title": "Web Development",
        "service-web-desc": "Custom websites with optimal performance and best security.",
        "service-ads-title": "Google Ads",
        "service-ads-desc": "Measurable ad campaigns for maximum conversions and optimal ROI.",
        
        // Form
        "form-title": "Start Your Project",
        "form-subtitle": "Fill the brief to start consultation",
        "step-1-title": "Contact Information",
        "step-2-title": "Select Service",
        "step-3-title": "Project Details",
        "label-name": "Full Name / Company",
        "label-email": "Your active email",
        "label-service": "Service Type",
        "label-message": "Tell us about your project...",
        "label-file": "Upload File (Optional)",
        "file-hint": "Click to upload file",
        "file-types": "PDF, DOC, JPG, PNG (Max 5MB)",
        "btn-next": "Next",
        "btn-back": "Back",
        "btn-submit": "Submit Brief",
        "btn-cancel": "Close",
        
        // CTA
        "cta-title": "Ready for Digital Transformation?",
        "cta-desc": "Start your project now and get free consultation from our experts.",
        "cta-button": "Get Started",
        
        // Footer
        "footer-company": "Z-STUDIO",
        "footer-tagline": "Digital Solutions Agency",
        "footer-address": "Jakarta, Indonesia",
        "footer-email": "hello@zstudio.co.id",
        "footer-phone": "+62 812 3456 7890",
        "footer-copyright": "© 2024 Z-STUDIO. All rights reserved.",
        "privacy": "Privacy",
        "terms": "Terms",
        "chat-whatsapp": "Chat via WhatsApp"
    }
};

// ===== LANGUAGE SYSTEM =====
function changeLanguage(lang) {
    APP_CONFIG.currentLang = lang;
    localStorage.setItem('zstudio_lang', lang);
    
    // Update all translatable elements
    document.querySelectorAll('[data-lang]').forEach(element => {
        const key = element.getAttribute('data-lang');
        if (TRANSLATIONS[lang] && TRANSLATIONS[lang][key]) {
            element.textContent = TRANSLATIONS[lang][key];
            
            if (element.hasAttribute('placeholder')) {
                element.setAttribute('placeholder', TRANSLATIONS[lang][key]);
            }
        }
    });
    
    // Update language buttons
    updateLanguageButtons(lang);
    
    // Show notification
    showNotification(`Language changed to ${lang === 'id' ? 'Indonesian' : 'English'}`, 'success');
}

function updateLanguageButtons(lang) {
    const btnId = document.getElementById('btn-id');
    const btnEn = document.getElementById('btn-en');
    
    if (btnId && btnEn) {
        btnId.classList.toggle('active', lang === 'id');
        btnEn.classList.toggle('active', lang === 'en');
    }
}

// ===== MOBILE MENU =====
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuBtn = document.getElementById('mobile-menu-btn');
    
    APP_CONFIG.isMobileMenuOpen = !APP_CONFIG.isMobileMenuOpen;
    
    if (APP_CONFIG.isMobileMenuOpen) {
        mobileMenu.classList.add('active');
        menuBtn.innerHTML = '<i class="fas fa-times"></i>';
        document.body.style.overflow = 'hidden';
    } else {
        mobileMenu.classList.remove('active');
        menuBtn.innerHTML = '<i class="fas fa-bars"></i>';
        document.body.style.overflow = '';
    }
}

function closeMobileMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const menuBtn = document.getElementById('mobile-menu-btn');
    
    mobileMenu.classList.remove('active');
    menuBtn.innerHTML = '<i class="fas fa-bars"></i>';
    APP_CONFIG.isMobileMenuOpen = false;
    document.body.style.overflow = '';
}

// ===== FORM WIZARD SYSTEM =====
function initializeFormWizard() {
    goToStep(1);
    setupFormListeners();
}

function goToStep(stepNumber) {
    if (stepNumber > APP_CONFIG.currentStep && !validateCurrentStep()) {
        return;
    }
    
    APP_CONFIG.currentStep = stepNumber;
    
    // Hide all steps
    document.querySelectorAll('.step').forEach(step => {
        step.classList.remove('active');
    });
    
    // Show current step
    const currentStepElement = document.querySelector(`.step[data-step="${stepNumber}"]`);
    if (currentStepElement) {
        currentStepElement.classList.add('active');
    }
    
    // Update progress
    updateProgressBar(stepNumber);
    updateStepIndicators(stepNumber);
}

function validateCurrentStep() {
    const currentStep = APP_CONFIG.currentStep;
    
    if (currentStep === 1) {
        const name = document.querySelector('input[name="nama"]');
        const email = document.querySelector('input[name="email"]');
        
        if (!name.value.trim()) {
            showFormError(name, 'Please enter your name');
            return false;
        }
        
        if (!email.value.trim()) {
            showFormError(email, 'Please enter your email');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            showFormError(email, 'Please enter a valid email address');
            return false;
        }
    }
    
    if (currentStep === 2) {
        const selectedService = document.querySelector('input[name="jasa"]:checked');
        if (!selectedService) {
            showNotification('Please select a service', 'warning');
            return false;
        }
    }
    
    if (currentStep === 3) {
        const message = document.querySelector('textarea[name="pesan"]');
        if (!message.value.trim()) {
            showFormError(message, 'Please describe your project');
            return false;
        }
    }
    
    return true;
}

function updateProgressBar(step) {
    const progressFill = document.querySelector('.progress-fill');
    if (progressFill) {
        const percentage = ((step - 1) / (APP_CONFIG.totalSteps - 1)) * 100;
        progressFill.style.width = `${percentage}%`;
    }
}

function updateStepIndicators(step) {
    document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
        const stepNumber = index + 1;
        if (stepNumber <= step) {
            indicator.classList.add('active');
        } else {
            indicator.classList.remove('active');
        }
    });
}

function setupFormListeners() {
    // File upload
    const fileInput = document.getElementById('file-upload');
    const fileName = document.getElementById('file-name');
    
    if (fileInput && fileName) {
        fileInput.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                const file = this.files[0];
                
                if (file.size > 5 * 1024 * 1024) {
                    showNotification('File size must be less than 5MB', 'error');
                    this.value = '';
                    fileName.classList.add('hidden');
                    return;
                }
                
                fileName.textContent = `Selected: ${file.name}`;
                fileName.classList.remove('hidden');
            } else {
                fileName.classList.add('hidden');
            }
        });
    }
    
    // Form submission
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            if (!validateCurrentStep()) {
                return;
            }
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                this.submit();
            }, 1500);
        });
    }
}

function showFormError(input, message) {
    input.classList.add('error');
    showNotification(message, 'error');
    
    input.scrollIntoView({ 
        behavior: 'smooth', 
        block: 'center' 
    });
    
    input.focus();
    
    setTimeout(() => {
        input.classList.remove('error');
    }, 3000);
}

// ===== FORM VISIBILITY =====
function showForm() {
    // Close mobile menu if open
    if (APP_CONFIG.isMobileMenuOpen) {
        closeMobileMenu();
    }
    
    // Hide main content
    document.querySelectorAll('main > section').forEach(section => {
        section.style.display = 'none';
    });
    
    // Show form
    const formSection = document.getElementById('form-section');
    formSection.style.display = 'block';
    
    // Reset form
    APP_CONFIG.currentStep = 1;
    goToStep(1);
    
    // Smooth scroll to form
    setTimeout(() => {
        formSection.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
        });
    }, 100);
}

function hideForm() {
    // Show main content
    document.querySelectorAll('main > section').forEach(section => {
        section.style.display = 'block';
    });
    
    // Hide form
    const formSection = document.getElementById('form-section');
    formSection.style.display = 'none';
    
    // Reset form
    const form = document.querySelector('form');
    if (form) {
        form.reset();
        const fileName = document.getElementById('file-name');
        if (fileName) fileName.classList.add('hidden');
    }
    
    // Reset to step 1
    APP_CONFIG.currentStep = 1;
    goToStep(1);
    
    // Scroll to top
    window.scrollTo({ 
        top: 0, 
        behavior: 'smooth' 
    });
}

// ===== NOTIFICATION SYSTEM =====
function showNotification(message, type = 'info') {
    // Create notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${getNotificationIcon(type)}"></i>
            <span>${message}</span>
        </div>
        <button onclick="this.parentElement.remove()" class="notification-close">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add to body
    document.body.appendChild(notification);
    
    // Auto remove
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

function getNotificationIcon(type) {
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    return icons[type] || 'info-circle';
}

// ===== NAVIGATION EFFECTS =====
function setupNavigation() {
    // Navbar scroll effect
    const navbar = document.querySelector('nav');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                
                // Close mobile menu if open
                if (APP_CONFIG.isMobileMenuOpen) {
                    closeMobileMenu();
                }
                
                // Smooth scroll
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// ===== ANIMATIONS =====
function setupAnimations() {
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }
    
    // Add intersection observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observe elements
    document.querySelectorAll('.service-card, .stats-card').forEach(el => {
        observer.observe(el);
    });
}

// ===== INITIALIZATION =====
function initializeApp() {
    // Set initial language
    const savedLang = localStorage.getItem('zstudio_lang') || 'id';
    changeLanguage(savedLang);
    
    // Setup navigation
    setupNavigation();
    
    // Initialize form wizard
    initializeFormWizard();
    
    // Setup animations
    setupAnimations();
    
    // Add notification styles
    addNotificationStyles();
    
    console.log('Z-STUDIO initialized successfully!');
}

function addNotificationStyles() {
    const style = document.createElement('style');
    style.textContent = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(15, 32, 39, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(48, 233, 254, 0.2);
            border-radius: 12px;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 300px;
            max-width: 400px;
            z-index: 9999;
            animation: slideInRight 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .notification-content {
            display: flex;
            align-items: center;
            gap: 12px;
            flex: 1;
        }
        
        .notification i {
            font-size: 1.2rem;
        }
        
        .notification-success i {
            color: #10b981;
        }
        
        .notification-error i {
            color: #ef4444;
        }
        
        .notification-warning i {
            color: #f59e0b;
        }
        
        .notification-info i {
            color: #0DB8D3;
        }
        
        .notification-close {
            background: transparent;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 5px;
            margin-left: 10px;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        
        .notification-close:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    `;
    document.head.appendChild(style);
}

// ===== EXPORT FUNCTIONS =====
window.changeLang = changeLanguage;
window.nextStep = (step) => goToStep(step);
window.prevStep = () => goToStep(APP_CONFIG.currentStep - 1);
window.startBrief = showForm;
window.cancelBrief = hideForm;
window.toggleMobileMenu = toggleMobileMenu;
window.closeMobileMenu = closeMobileMenu;

// ===== DOCUMENT READY =====
document.addEventListener('DOMContentLoaded', initializeApp);