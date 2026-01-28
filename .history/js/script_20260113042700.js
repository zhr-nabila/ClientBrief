// ===== CONFIGURATION =====
const APP_CONFIG = {
    currentStep: 1,
    totalSteps: 3,
    isMobileMenuOpen: false,
    isModalOpen: false
};

// ===== MOBILE MENU FUNCTIONS =====
function toggleMobileMenu() {
    const mobileMenu = document.querySelector('.mobile-menu');
    APP_CONFIG.isMobileMenuOpen = !APP_CONFIG.isMobileMenuOpen;
    
    if (APP_CONFIG.isMobileMenuOpen) {
        mobileMenu.classList.add('active');
        document.body.style.overflow = 'hidden';
    } else {
        closeMobileMenu();
    }
}

function closeMobileMenu() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.classList.remove('active');
    APP_CONFIG.isMobileMenuOpen = false;
    document.body.style.overflow = '';
}

// Close mobile menu when clicking outside
document.addEventListener('click', function(event) {
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileToggle = document.querySelector('.mobile-toggle');
    
    if (APP_CONFIG.isMobileMenuOpen && 
        !mobileMenu.contains(event.target) && 
        !mobileToggle.contains(event.target)) {
        closeMobileMenu();
    }
});

// ===== BRIEF MODAL FUNCTIONS =====
function startBrief() {
    const modal = document.getElementById('briefModal');
    APP_CONFIG.isModalOpen = true;
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
    goToStep(1);
    
    // Focus on first input
    setTimeout(() => {
        const firstInput = document.querySelector('#step1 .form-input');
        if (firstInput) firstInput.focus();
    }, 300);
}

function closeBrief() {
    const modal = document.getElementById('briefModal');
    APP_CONFIG.isModalOpen = false;
    modal.classList.remove('active');
    document.body.style.overflow = '';
    
    // Reset form
    resetForm();
}

function resetForm() {
    const form = document.getElementById('projectForm');
    form.reset();
    APP_CONFIG.currentStep = 1;
    goToStep(1);
    
    // Clear file preview
    const filePreview = document.getElementById('filePreview');
    if (filePreview) filePreview.innerHTML = '';
}

// Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('briefModal');
    if (APP_CONFIG.isModalOpen && 
        event.target === modal) {
        closeBrief();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape' && APP_CONFIG.isModalOpen) {
        closeBrief();
    }
});

// ===== FORM WIZARD FUNCTIONS =====
function goToStep(step) {
    // Validate current step before proceeding
    if (step > APP_CONFIG.currentStep && !validateCurrentStep()) {
        return;
    }
    
    APP_CONFIG.currentStep = step;
    
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(stepEl => {
        stepEl.classList.remove('active');
    });
    
    // Show current step
    const currentStep = document.getElementById(`step${step}`);
    if (currentStep) {
        currentStep.classList.add('active');
    }
    
    // Update progress bar
    updateProgressBar(step);
    updateProgressSteps(step);
}

function nextStep(next) {
    if (next <= APP_CONFIG.totalSteps) {
        goToStep(next);
    }
}

function prevStep(prev) {
    if (prev >= 1) {
        goToStep(prev);
    }
}

function updateProgressBar(step) {
    const progressFill = document.getElementById('progressFill');
    if (progressFill) {
        const percentage = ((step - 1) / (APP_CONFIG.totalSteps - 1)) * 100;
        progressFill.style.width = `${percentage}%`;
    }
}

function updateProgressSteps(step) {
    document.querySelectorAll('.progress-step').forEach((stepEl, index) => {
        if (index + 1 <= step) {
            stepEl.classList.add('active');
        } else {
            stepEl.classList.remove('active');
        }
    });
}

function validateCurrentStep() {
    const step = APP_CONFIG.currentStep;
    
    if (step === 1) {
        const name = document.getElementById('nama');
        const email = document.getElementById('email');
        
        if (!name.value.trim()) {
            showError(name, 'Harap masukkan nama lengkap atau perusahaan');
            return false;
        }
        
        if (!email.value.trim()) {
            showError(email, 'Harap masukkan email aktif');
            return false;
        }
        
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.value)) {
            showError(email, 'Format email tidak valid');
            return false;
        }
        
        return true;
    }
    
    if (step === 2) {
        const selectedService = document.querySelector('input[name="jasa"]:checked');
        if (!selectedService) {
            showNotification('Harap pilih layanan yang diinginkan', 'warning');
            return false;
        }
        return true;
    }
    
    if (step === 3) {
        const message = document.getElementById('pesan');
        if (!message.value.trim()) {
            showError(message, 'Harap jelaskan detail proyek Anda');
            return false;
        }
        
        if (message.value.trim().length < 20) {
            showError(message, 'Harap jelaskan proyek dengan lebih detail (minimal 20 karakter)');
            return false;
        }
        
        return true;
    }
    
    return true;
}

function showError(input, message) {
    input.classList.add('error');
    showNotification(message, 'error');
    
    // Scroll to input
    input.scrollIntoView({ 
        behavior: 'smooth', 
        block: 'center' 
    });
    
    // Focus on input
    input.focus();
    
    // Remove error class after 3 seconds
    setTimeout(() => {
        input.classList.remove('error');
    }, 3000);
}

// ===== FORM SUBMISSION =====
document.getElementById('projectForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Validate all steps
    for (let i = 1; i <= APP_CONFIG.totalSteps; i++) {
        APP_CONFIG.currentStep = i;
        if (!validateCurrentStep()) {
            goToStep(i);
            return;
        }
    }
    
    // Show loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
    submitBtn.disabled = true;
    
    // Simulate submission delay
    setTimeout(() => {
        // Actual form submission
        this.submit();
    }, 1500);
});

// ===== FILE UPLOAD HANDLING =====
const fileInput = document.getElementById('file_brief');
const filePreview = document.getElementById('filePreview');

if (fileInput && filePreview) {
    fileInput.addEventListener('change', function(e) {
        if (this.files.length > 0) {
            const file = this.files[0];
            
            // Validate file size (max 10MB)
            const maxSize = 10 * 1024 * 1024; // 10MB
            if (file.size > maxSize) {
                showNotification('Ukuran file maksimal 10MB', 'error');
                this.value = '';
                filePreview.innerHTML = '';
                return;
            }
            
            // Validate file type
            const allowedTypes = ['application/pdf', 'application/msword', 
                                 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                 'image/jpeg', 'image/png', 'application/zip'];
            if (!allowedTypes.includes(file.type)) {
                showNotification('Format file tidak didukung. Harap upload PDF, DOC, JPG, PNG, atau ZIP', 'error');
                this.value = '';
                filePreview.innerHTML = '';
                return;
            }
            
            // Show file preview
            const fileSize = (file.size / (1024 * 1024)).toFixed(2);
            filePreview.innerHTML = `
                <div class="file-preview-item">
                    <i class="fas fa-file"></i>
                    <div>
                        <strong>${file.name}</strong>
                        <small>${fileSize} MB</small>
                    </div>
                </div>
            `;
        } else {
            filePreview.innerHTML = '';
        }
    });
}

// ===== NOTIFICATION SYSTEM =====
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => {
        notification.remove();
    });
    
    // Create notification
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    
    const icons = {
        success: 'check-circle',
        error: 'exclamation-circle',
        warning: 'exclamation-triangle',
        info: 'info-circle'
    };
    
    notification.innerHTML = `
        <div class="notification-icon">
            <i class="fas fa-${icons[type] || 'info-circle'}"></i>
        </div>
        <div class="notification-content">${message}</div>
        <button class="notification-close" onclick="this.parentElement.remove()">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    // Add styles if not already added
    if (!document.querySelector('#notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'notification-styles';
        styles.textContent = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background: white;
                border-radius: 12px;
                padding: 15px 20px;
                display: flex;
                align-items: center;
                gap: 15px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
                z-index: 99999;
                max-width: 400px;
                animation: slideInRight 0.3s ease;
                border-left: 4px solid #2563eb;
            }
            
            .notification-success {
                border-left-color: #10b981;
            }
            
            .notification-error {
                border-left-color: #ef4444;
            }
            
            .notification-warning {
                border-left-color: #f59e0b;
            }
            
            .notification-info {
                border-left-color: #2563eb;
            }
            
            .notification-icon {
                font-size: 1.2rem;
            }
            
            .notification-success .notification-icon {
                color: #10b981;
            }
            
            .notification-error .notification-icon {
                color: #ef4444;
            }
            
            .notification-warning .notification-icon {
                color: #f59e0b;
            }
            
            .notification-info .notification-icon {
                color: #2563eb;
            }
            
            .notification-content {
                flex: 1;
                font-size: 0.95rem;
                color: #334155;
            }
            
            .notification-close {
                background: none;
                border: none;
                color: #94a3b8;
                cursor: pointer;
                padding: 5px;
                border-radius: 6px;
                transition: all 0.2s ease;
            }
            
            .notification-close:hover {
                color: #64748b;
                background: #f1f5f9;
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
            
            @media (max-width: 768px) {
                .notification {
                    left: 20px;
                    right: 20px;
                    max-width: none;
                }
            }
        `;
        document.head.appendChild(styles);
    }
    
    document.body.appendChild(notification);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.remove();
        }
    }, 5000);
}

// ===== FORM INPUT VALIDATION =====
function setupFormValidation() {
    // Real-time email validation
    const emailInput = document.getElementById('email');
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (this.value && !emailRegex.test(this.value)) {
                this.classList.add('error');
                showNotification('Format email tidak valid', 'error');
            } else {
                this.classList.remove('error');
            }
        });
    }
    
    // Character counter for message
    const messageInput = document.getElementById('pesan');
    if (messageInput) {
        const counter = document.createElement('div');
        counter.className = 'char-counter';
        counter.style.fontSize = '0.8rem';
        counter.style.color = '#64748b';
        counter.style.marginTop = '5px';
        counter.style.textAlign = 'right';
        
        messageInput.parentElement.appendChild(counter);
        
        messageInput.addEventListener('input', function() {
            const length = this.value.length;
            counter.textContent = `${length} karakter`;
            
            if (length < 20) {
                counter.style.color = '#ef4444';
            } else if (length < 100) {
                counter.style.color = '#f59e0b';
            } else {
                counter.style.color = '#10b981';
            }
        });
    }
}

// ===== SMOOTH SCROLL FOR ANCHOR LINKS =====
function setupSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                
                // Close mobile menu if open
                if (APP_CONFIG.isMobileMenuOpen) {
                    closeMobileMenu();
                }
                
                // Smooth scroll to target
                const offset = 80; // Navbar height
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ===== NAVBAR SCROLL EFFECT =====
function setupNavbarScroll() {
    const navbar = document.querySelector('.navbar');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
}

// ===== INITIALIZE EVERYTHING =====
function initializeApp() {
    // Setup event listeners
    setupSmoothScroll();
    setupNavbarScroll();
    setupFormValidation();
    
    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    }
    
    console.log('Z-STUDIO Website initialized successfully!');
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', initializeApp);

// ===== EXPORT FUNCTIONS TO GLOBAL SCOPE =====
window.toggleMobileMenu = toggleMobileMenu;
window.closeMobileMenu = closeMobileMenu;
window.startBrief = startBrief;
window.closeBrief = closeBrief;
window.nextStep = nextStep;
window.prevStep = prevStep;