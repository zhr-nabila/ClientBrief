// ===== CONFIGURATION =====
const APP_CONFIG = {
    currentStep: 1,
    totalSteps: 3,
    currentLang: 'id'
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
        "stat-projects": "Proyek",
        "stat-success": "Success Rate",
        "stat-support": "Support",
        
        // Services
        "services-title": "Layanan Kami",
        "services-subtitle": "Solusi lengkap untuk semua kebutuhan digital",
        "service-seo-title": "SEO Optimization",
        "service-seo-desc": "Optimasi website untuk ranking teratas di Google",
        "service-social-title": "Social Media",
        "service-social-desc": "Strategi konten kreatif untuk engagement maksimal",
        "service-web-title": "Web Development",
        "service-web-desc": "Website custom dengan performa optimal",
        "service-ads-title": "Google Ads",
        "service-ads-desc": "Kampanye iklan terukur untuk ROI maksimal",
        
        // Form
        "form-title": "Mulai Projek Anda",
        "form-subtitle": "Isi brief untuk mulai konsultasi",
        "step-1-title": "Informasi Kontak",
        "step-2-title": "Pilih Layanan",
        "step-3-title": "Detail Projek",
        "label-name": "Nama Lengkap",
        "label-email": "Email",
        "label-service": "Jenis Layanan",
        "label-message": "Deskripsi Projek",
        "label-file": "Upload File",
        "btn-next": "Selanjutnya",
        "btn-back": "Kembali",
        "btn-submit": "Kirim Brief",
        "btn-cancel": "Tutup",
        
        // CTA
        "cta-title": "Siap Transformasi Digital?",
        "cta-desc": "Mulai proyek Anda sekarang dan dapatkan konsultasi gratis",
        "cta-button": "Mulai Sekarang",
        
        // Footer
        "footer-company": "Z-STUDIO",
        "footer-tagline": "Digital Solutions Agency",
        "footer-address": "Jakarta, Indonesia",
        "footer-email": "hello@zstudio.co.id",
        "footer-phone": "+62 812 3456 7890",
        "footer-copyright": "© 2024 Z-STUDIO. All rights reserved."
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
        "stat-projects": "Projects",
        "stat-success": "Success Rate",
        "stat-support": "Support",
        
        // Services
        "services-title": "Our Services",
        "services-subtitle": "Complete solutions for all digital needs",
        "service-seo-title": "SEO Optimization",
        "service-seo-desc": "Website optimization for top Google rankings",
        "service-social-title": "Social Media",
        "service-social-desc": "Creative content strategy for maximum engagement",
        "service-web-title": "Web Development",
        "service-web-desc": "Custom websites with optimal performance",
        "service-ads-title": "Google Ads",
        "service-ads-desc": "Measurable ad campaigns for maximum ROI",
        
        // Form
        "form-title": "Start Your Project",
        "form-subtitle": "Fill the brief to start consultation",
        "step-1-title": "Contact Information",
        "step-2-title": "Select Service",
        "step-3-title": "Project Details",
        "label-name": "Full Name",
        "label-email": "Email",
        "label-service": "Service Type",
        "label-message": "Project Description",
        "label-file": "Upload File",
        "btn-next": "Next",
        "btn-back": "Back",
        "btn-submit": "Submit Brief",
        "btn-cancel": "Close",
        
        // CTA
        "cta-title": "Ready for Digital Transformation?",
        "cta-desc": "Start your project now and get free consultation",
        "cta-button": "Get Started",
        
        // Footer
        "footer-company": "Z-STUDIO",
        "footer-tagline": "Digital Solutions Agency",
        "footer-address": "Jakarta, Indonesia",
        "footer-email": "hello@zstudio.co.id",
        "footer-phone": "+62 812 3456 7890",
        "footer-copyright": "© 2024 Z-STUDIO. All rights reserved."
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
            
            // Handle placeholders for input fields
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
        if (lang === 'id') {
            btnId.classList.add('bg-blue-600', 'text-white');
            btnId.classList.remove('bg-gray-800', 'text-gray-400');
            btnEn.classList.add('bg-gray-800', 'text-gray-400');
            btnEn.classList.remove('bg-blue-600', 'text-white');
        } else {
            btnEn.classList.add('bg-blue-600', 'text-white');
            btnEn.classList.remove('bg-gray-800', 'text-gray-400');
            btnId.classList.add('bg-gray-800', 'text-gray-400');
            btnId.classList.remove('bg-blue-600', 'text-white');
        }
    }
}

// ===== FORM WIZARD SYSTEM =====
function initializeFormWizard() {
    // Set initial step
    goToStep(1);
    
    // Setup event listeners
    setupFormListeners();
}

function goToStep(stepNumber) {
    // Validate current step before proceeding
    if (stepNumber > APP_CONFIG.currentStep && !validateCurrentStep()) {
        return;
    }
    
    // Update current step
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
    
    // Update progress bar
    updateProgressBar(stepNumber);
    
    // Update step indicators
    updateStepIndicators(stepNumber);
    
    // Update step counter
    updateStepCounter(stepNumber);
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
        
        // Validate email format
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
    
    return true;
}

function showFormError(input, message) {
    // Add error styling
    input.classList.add('error');
    
    // Show error message
    showNotification(message, 'error');
    
    // Scroll to input
    input.scrollIntoView({ behavior: 'smooth', block: 'center' });
    
    // Focus on input
    input.focus();
    
    // Remove error styling after 3 seconds
    setTimeout(() => {
        input.classList.remove('error');
    }, 3000);
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
        if (index < step) {
            indicator.classList.add('active');
        } else {
            indicator.classList.remove('active');
        }
    });
}

function updateStepCounter(step) {
    const stepCounter = document.getElementById('step-counter');
    if (stepCounter) {
        stepCounter.textContent = `Step ${step} of ${APP_CONFIG.totalSteps}`;
    }
}

function setupFormListeners() {
    // File upload preview
    const fileInput = document.getElementById('file-upload');
    const fileName = document.getElementById('file-name');
    
    if (fileInput && fileName) {
        fileInput.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                const file = this.files[0];
                
                // Validate file size (5MB max)
                if (file.size > 5 * 1024 * 1024) {
                    showNotification('File size must be less than 5MB', 'error');
                    this.value = '';
                    fileName.classList.add('hidden');
                    return;
                }
                
                // Show file name
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
            
            // Validate all steps
            if (!validateCurrentStep()) {
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;
            
            // Submit form via AJAX (optional)
            // For now, we'll let the form submit normally
            
            // For better UX, you can add AJAX submission here
            // this.submit();
        });
    }
}

// ===== FORM VISIBILITY =====
function showForm() {
    // Hide all main sections
    document.querySelectorAll('section[id]:not(#form-section)').forEach(section => {
        section.style.display = 'none';
    });
    
    // Show form section
    const formSection = document.getElementById('form-section');
    formSection.style.display = 'block';
    
    // Scroll to form
    formSection.scrollIntoView({ behavior: 'smooth' });
    
    // Reset form to step 1
    APP_CONFIG.currentStep = 1;
    goToStep(1);
    
    // Focus on first input
    setTimeout(() => {
        const firstInput = formSection.querySelector('input');
        if (firstInput) firstInput.focus();
    }, 500);
}

function hideForm() {
    // Show all main sections
    document.querySelectorAll('section[id]:not(#form-section)').forEach(section => {
        section.style.display = 'block';
    });
    
    // Hide form section
    const formSection = document.getElementById('form-section');
    formSection.style.display = 'none';
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    // Reset form
    const form = document.querySelector('form');
    if (form) {
        form.reset();
        
        // Reset file preview
        const fileName = document.getElementById('file-name');
        if (fileName) {
            fileName.classList.add('hidden');
        }
    }
    
    // Reset to step 1
    APP_CONFIG.currentStep = 1;
    goToStep(1);
}

// ===== NOTIFICATION SYSTEM =====
function showNotification(message, type = 'info') {
    // Create notification element
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
    
    // Auto remove after 5 seconds
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
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// ===== COUNTER ANIMATION =====
function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const increment = target / 100;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current) + '+';
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target + '+';
            }
        };
        
        // Start when element is in viewport
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
    
    // Animate counters
    animateCounters();
    
    // Add notification styles
    addNotificationStyles();
    
    // Add error styles
    addErrorStyles();
    
    console.log('Z-STUDIO initialized successfully!');
}

function addNotificationStyles() {
    const style = document.createElement('style');
    style.textContent = `
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-width: 300px;
            max-width: 400px;
            z-index: 9999;
            animation: slideIn 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .notification-content {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex: 1;
        }
        
        .notification i {
            font-size: 1.25rem;
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
            color: #3b82f6;
        }
        
        .notification-close {
            background: transparent;
            border: none;
            color: #9ca3af;
            cursor: pointer;
            padding: 0.25rem;
            margin-left: 1rem;
            border-radius: 6px;
            transition: all 0.2s ease;
        }
        
        .notification-close:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        
        @keyframes slideIn {
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

function addErrorStyles() {
    const style = document.createElement('style');
    style.textContent = `
        .form-input.error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2) !important;
            animation: shake 0.5s ease;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
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

// ===== DOCUMENT READY =====
document.addEventListener('DOMContentLoaded', initializeApp);