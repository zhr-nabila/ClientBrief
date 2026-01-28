// Fungsi untuk mulai isi form dari Landing Page
function startBrief() {
    document.getElementById('hero').classList.add('hidden');
    document.getElementById('form-section').classList.remove('hidden');
    window.scrollTo(0, 0);
}

// Fungsi untuk navigasi antar step form
function nextStep(step) {
    // Ambil semua elemen dengan class 'step'
    const steps = document.querySelectorAll('.step');
    const progress = document.getElementById('progress');
    
    // Sembunyikan semua, lalu tampilkan yang diminta
    steps.forEach((s, index) => {
        s.classList.toggle('active', index === (step - 1));
    });

    // Update bar progress (kita bagi 3 karena ada 3 step)
    const percent = (step / 3) * 100;
    progress.style.width = percent + '%';
    
    // Scroll ke atas otomatis biar enak diliat
    window.scrollTo(0, 0);
}

// Efek Navbar saat Scroll
window.addEventListener('scroll', function() {
    const nav = document.getElementById('navbar');
    if (window.scrollY > 50) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});

function startBrief() {
    document.getElementById('hero').classList.add('hidden');
    document.getElementById('services').classList.add('hidden');
    document.getElementById('form-section').classList.remove('hidden');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Tambahkan logika nextStep yang kemarin di sini juga...