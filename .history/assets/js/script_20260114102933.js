let currentStep = 1;

function moveStep(step) {
    // Sembunyikan semua step
    document.querySelectorAll('.step').forEach(s => s.classList.remove('active'));
    
    // Tampilkan step tujuan
    const target = document.getElementById('step' + step);
    if(target) {
        target.classList.add('active');
        currentStep = step;
        
        // Update Progress Bar
        const progress = (step / 3) * 100;
        document.getElementById('progressBar').style.width = progress + '%';
    }
}

function openModal() {
    document.getElementById('briefModal').style.display = 'flex';
    moveStep(1);
}

function closeModal() {
    document.getElementById('briefModal').style.display = 'none';
}

// Inisialisasi Lucide Icons
document.addEventListener('DOMContentLoaded', () => {
    lucide.createIcons();
});

