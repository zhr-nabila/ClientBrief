// ===== TRANSLATIONS =====
const translations = {
    id: {
        // Navigation
        "nav-home": "Beranda",
        "nav-services": "Layanan",
        "nav-about": "Tentang",
        "nav-contact": "Kontak",
        "nav-apply": "Mulai Projek",
        
        // Hero Section
        "hero-1": "TRANSFORMASI DIGITAL",
        "hero-sub": "Untuk Bisnis Masa Depan",
        "hero-desc": "Kami membantu brand Anda tumbuh dengan solusi digital yang inovatif, terukur, dan berorientasi hasil.",
        "btn-apply-hero": "Konsultasi Gratis",
        
        // Services Section
        "services-title": "Layanan Kami",
        "services-subtitle": "Solusi lengkap untuk digital marketing",
        
        "serv-1-title": "SEO Optimization",
        "serv-1-desc": "Optimasi website untuk ranking Google teratas dengan strategi SEO terbaru.",
        "serv-2-title": "Social Media",
        "serv-2-desc": "Manajemen konten kreatif untuk engagement maksimal di platform sosial.",
        "serv-3-title": "Web Development",
        "serv-3-desc": "Pengembangan website custom dengan performa optimal dan keamanan terbaik.",
        "serv-4-title": "Google Ads",
        "serv-4-desc": "Kampanye iklan terukur untuk konversi maksimal dan ROI optimal.",
        
        // Form Section
        "form-title": "Brief Projek",
        "form-subtitle": "Isi formulir untuk mulai proyek",
        
        "form-step-1-title": "Informasi Anda",
        "form-step-1-desc": "Kami akan menghubungi Anda",
        "form-label-name": "Nama / Perusahaan",
        "form-label-email": "Email",
        
        "form-step-2-title": "Pilih Layanan",
        "form-step-2-desc": "Pilih layanan yang Anda butuhkan",
        
        "form-step-3-title": "Detail Projek",
        "form-step-3-desc": "Ceritakan tentang proyek Anda",
        "form-label-message": "Deskripsi proyek",
        "form-label-file": "Upload File",
        "form-label-file-desc": "Brief, referensi, atau dokumen pendukung",
        
        // Buttons
        "btn-next": "Lanjut →",
        "btn-back": "← Kembali",
        "btn-submit": "Kirim Brief",
        "btn-cancel": "Batalkan",
        "btn-download": "Download Proposal",
        "btn-contact": "WhatsApp Kami",
        
        // Stats
        "stats-clients": "Klien",
        "stats-projects": "Proyek",
        "stats-success": "Success Rate",
        "stats-support": "Support",
        
        // CTA
        "cta-title": "Siap Transformasi Digital?",
        "cta-desc": "Mulai proyek Anda sekarang dan dapatkan konsultasi gratis dari ahli kami.",
        "cta-button": "Mulai Sekarang",
        
        // Footer
        "footer-company": "Z-STUDIO",
        "footer-tagline": "Digital Solutions Agency",
        "footer-links": "Navigasi",
        "footer-services": "Layanan",
        "footer-contact": "Kontak",
        "footer-address": "Jakarta, Indonesia",
        "footer-email": "hello@zstudio.co.id",
        "footer-phone": "+62 812 3456 7890",
        "footer-copyright": "© 2024 Z-STUDIO. All rights reserved.",
        "footer-privacy": "Privacy Policy",
        "footer-terms": "Terms of Service"
    },
    
    en: {
        // Navigation
        "nav-home": "Home",
        "nav-services": "Services",
        "nav-about": "About",
        "nav-contact": "Contact",
        "nav-apply": "Start Project",
        
        // Hero Section
        "hero-1": "DIGITAL TRANSFORMATION",
        "hero-sub": "For Future Businesses",
        "hero-desc": "We help your brand grow with innovative, measurable, and results-oriented digital solutions.",
        "btn-apply-hero": "Free Consultation",
        
        // Services Section
        "services-title": "Our Services",
        "services-subtitle": "Complete digital marketing solutions",
        
        "serv-1-title": "SEO Optimization",
        "serv-1-desc": "Website optimization for top Google rankings with latest SEO strategies.",
        "serv-2-title": "Social Media",
        "serv-2-desc": "Creative content management for maximum engagement on social platforms.",
        "serv-3-title": "Web Development",
        "serv-3-desc": "Custom website development with optimal performance and top security.",
        "serv-4-title": "Google Ads",
        "serv-4-desc": "Measurable ad campaigns for maximum conversions and optimal ROI.",
        
        // Form Section
        "form-title": "Project Brief",
        "form-subtitle": "Fill the form to start your project",
        
        "form-step-1-title": "Your Information",
        "form-step-1-desc": "We'll contact you soon",
        "form-label-name": "Name / Company",
        "form-label-email": "Email",
        
        "form-step-2-title": "Select Service",
        "form-step-2-desc": "Choose the service you need",
        
        "form-step-3-title": "Project Details",
        "form-step-3-desc": "Tell us about your project",
        "form-label-message": "Project description",
        "form-label-file": "Upload File",
        "form-label-file-desc": "Brief, references, or supporting documents",
        
        // Buttons
        "btn-next": "Next →",
        "btn-back": "← Back",
        "btn-submit": "Submit Brief",
        "btn-cancel": "Cancel",
        "btn-download": "Download Proposal",
        "btn-contact": "WhatsApp Us",
        
        // Stats
        "stats-clients": "Clients",
        "stats-projects": "Projects",
        "stats-success": "Success Rate",
        "stats-support": "Support",
        
        // CTA
        "cta-title": "Ready for Digital Transformation?",
        "cta-desc": "Start your project now and get free consultation from our experts.",
        "cta-button": "Get Started",
        
        // Footer
        "footer-company": "Z-STUDIO",
        "footer-tagline": "Digital Solutions Agency",
        "footer-links": "Quick Links",
        "footer-services": "Services",
        "footer-contact": "Contact",
        "footer-address": "Jakarta, Indonesia",
        "footer-email": "hello@zstudio.co.id",
        "footer-phone": "+62 812 3456 7890",
        "footer-copyright": "© 2024 Z-STUDIO. All rights reserved.",
        "footer-privacy": "Privacy Policy",
        "footer-terms": "Terms of Service"
    }
};

// ===== LANGUAGE SYSTEM =====
function changeLang(lang) {
    // Update all translatable elements
    document.querySelectorAll('[data-lang]').forEach(el => {
        const key = el.getAttribute('data-lang');
        if (translations[lang][key]) {
            el.innerText = translations[lang][key];
        }
    });
    
    // Save preference
    localStorage.setItem('zstudio_lang', lang);
    
    // Update button styles
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
function nextStep(stepNumber) {
    // Hide all steps
    document.querySelectorAll('.step').forEach(step => {
        step.classList.remove('active');
    });
    
    // Show current step
    const currentStep = document.querySelector(`.step[data-step="${stepNumber}"]`);
    if (currentStep) {
        currentStep.classList.add('active');
        
        // Update progress bar
        const progress = document.getElementById('progress-bar');
        if (progress) {
            const width = (stepNumber / 3) * 100;
            progress.style.width = `${width}%`;
        }
        
        // Smooth scroll to form
        const formSection = document.getElementById('form-section');
        if (formSection && stepNumber === 1) {
            formSection.scrollIntoView({ behavior: 'smooth' });
        }
    }
}

function startBrief() {
    // Hide hero and services
    document.getElementById('hero').classList.add('hidden');
    document.getElementById('services').classList.add('hidden');
    document.getElementById('stats').classList.add('hidden');
    document.getElementById('cta').classList.add('hidden');
    
    // Show form
    const formSection = document.getElementById('form-section');
    formSection.classList.remove('hidden');
    
    // Reset to step 1
    nextStep(1);
    
    // Smooth scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
    
    // Add entrance animation
    formSection.style.animation = 'slideIn 0.5s ease';
}

function cancelBrief() {
    // Show all sections
    document.getElementById('hero').classList.remove('hidden');
    document.getElementById('services').classList.remove('hidden');
    document.getElementById('stats').classList.remove('hidden');
    document.getElementById('cta').classList.remove('hidden');
    
    // Hide form
    document.getElementById('form-section').classList.add('hidden');
    
    // Reset form
    document.querySelector('form').reset();
    
    // Reset to step 1
    nextStep(1);
    
    // Smooth scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// ===== SCROLL EFFECTS =====
function initScrollEffects() {
    const navbar = document.querySelector('nav');
    const hero = document.getElementById('hero');
    
    window.addEventListener('scroll', () => {
        // Navbar effect
        if (window.scrollY > 50) {
            navbar.classList.add('nav-scrolled');
        } else {
            navbar.classList.remove('nav-scrolled');
        }
        
        // Parallax effect on hero
        if (hero) {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        }
    });
}

// ===== CURSOR TRAIL EFFECT =====
function initCursorTrail() {
    const trail = document.createElement('div');
    trail.className = 'cursor-trail';
    document.body.appendChild(trail);
    
    let mouseX = 0;
    let mouseY = 0;
    let trailX = 0;
    let trailY = 0;
    
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });
    
    function animateTrail() {
        // Calculate new position with delay
        trailX += (mouseX - trailX - 10) * 0.1;
        trailY += (mouseY - trailY - 10) * 0.1;
        
        // Update trail position
        trail.style.left = trailX + 'px';
        trail.style.top = trailY + 'px';
        
        requestAnimationFrame(animateTrail);
    }
    
    animateTrail();
}

// ===== INITIALIZATION =====
document.addEventListener('DOMContentLoaded', () => {
    // Set initial language
    const savedLang = localStorage.getItem('zstudio_lang') || 'id';
    changeLang(savedLang);
    
    // Initialize scroll effects
    initScrollEffects();
    
    // Initialize cursor trail (optional - bisa di-disable kalo berat)
    // initCursorTrail();
    
    // Add hover effects to service cards
    document.querySelectorAll('.glass-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('hover:shadow-xl');
        });
        
        card.addEventListener('mouseleave', () => {
            card.classList.remove('hover:shadow-xl');
        });
    });
    
    // Form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', (e) => {
            const requiredFields = form.querySelectorAll('[required]');
            let valid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    valid = false;
                    field.classList.add('border-red-500');
                    
                    // Remove error class after 3 seconds
                    setTimeout(() => {
                        field.classList.remove('border-red-500');
                    }, 3000);
                }
            });
            
            if (!valid) {
                e.preventDefault();
                
                // Show error message
                Swal.fire({
                    title: 'Form belum lengkap',
                    text: 'Harap isi semua field yang wajib diisi.',
                    icon: 'warning',
                    confirmButtonText: 'OK',
                    background: '#111827',
                    color: '#fff'
                });
            }
        });
    }
});

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
                counter.innerText = Math.ceil(current);
                setTimeout(updateCounter, 20);
            } else {
                counter.innerText = target + '+';
            }
        };
        
        // Start animation when element is in viewport
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