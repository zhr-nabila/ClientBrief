/* === GLOBAL STYLES === */
@import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    background: #000;
    color: #fff;
    overflow-x: hidden;
    background-image: 
        radial-gradient(at 40% 20%, rgba(59, 130, 246, 0.15) 0px, transparent 50%),
        radial-gradient(at 80% 0%, rgba(139, 92, 246, 0.1) 0px, transparent 50%),
        radial-gradient(at 0% 50%, rgba(236, 72, 153, 0.08) 0px, transparent 50%);
    background-attachment: fixed;
}

/* === TYPOGRAPHY === */
h1, h2, h3, h4, .font-display {
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 700;
    letter-spacing: -0.02em;
}

.gradient-text {
    background: linear-gradient(135deg, 
        #3b82f6 0%, 
        #8b5cf6 30%, 
        #ec4899 70%, 
        #f59e0b 100%);
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    background-size: 200% 200%;
    animation: gradientShift 8s ease infinite;
}

@keyframes gradientShift {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

/* === GLASSMORPHISM EFFECT === */
.glass-card {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(20px) saturate(180%);
    -webkit-backdrop-filter: blur(20px) saturate(180%);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: 28px;
    padding: 2.5rem 2rem;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.glass-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.05),
        transparent
    );
    transition: left 0.6s ease;
}

.glass-card:hover::before {
    left: 100%;
}

.glass-card:hover { 
    border-color: #3b82f6; 
    transform: translateY(-10px) scale(1.02);
    box-shadow: 
        0 20px 40px rgba(59, 130, 246, 0.15),
        0 0 60px rgba(59, 130, 246, 0.05),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
}

/* === NAVBAR === */
.nav-scrolled {
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(20px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

/* === FORM STYLES === */
.step { 
    display: none; 
    opacity: 0;
    transform: translateX(20px);
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}

.step.active { 
    display: block; 
    opacity: 1;
    transform: translateX(0);
    animation: slideIn 0.5s ease;
}

@keyframes slideIn {
    from { 
        opacity: 0;
        transform: translateX(30px);
    }
    to { 
        opacity: 1;
        transform: translateX(0);
    }
}

/* === INPUT STYLES === */
.form-input {
    background: rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 16px;
    padding: 1rem 1.5rem;
    color: white;
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
    background: rgba(0, 0, 0, 0.5);
}

/* === BUTTON STYLES === */
.btn-primary {
    background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 100%);
    color: white;
    font-weight: 600;
    padding: 1rem 2rem;
    border-radius: 16px;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.btn-primary::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.2),
        transparent
    );
    transition: left 0.6s ease;
}

.btn-primary:hover::before {
    left: 100%;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(59, 130, 246, 0.4);
}

.btn-secondary {
    background: transparent;
    color: #9ca3af;
    border: 1px solid rgba(255, 255, 255, 0.2);
    font-weight: 600;
    padding: 1rem 2rem;
    border-radius: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-secondary:hover {
    color: white;
    border-color: rgba(255, 255, 255, 0.4);
    background: rgba(255, 255, 255, 0.05);
}

/* === ANIMATIONS === */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.float-animation {
    animation: float 6s ease-in-out infinite;
}

@keyframes pulse-glow {
    0%, 100% { 
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.4);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 40px rgba(59, 130, 246, 0.8);
        transform: scale(1.05);
    }
}

.pulse-glow {
    animation: pulse-glow 3s ease-in-out infinite;
}

/* === SCROLLBAR === */
::-webkit-scrollbar {
    width: 10px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.02);
}

::-webkit-scrollbar-thumb {
    background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(to bottom, #2563eb, #7c3aed);
}

/* === RESPONSIVE === */
@media (max-width: 768px) {
    .glass-card {
        padding: 1.5rem;
    }
    
    h1 {
        font-size: 3rem !important;
    }
    
    h2 {
        font-size: 2rem !important;
    }
}