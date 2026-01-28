lucide.createIcons();

function showDetail(text) {
  alert("DETAIL KEBUTUHAN:\n\n" + text);
}

function openPreview(src) {
  const modal = document.getElementById("imageModal");
  const img = document.getElementById("modalImg");
  img.src = src;
  modal.classList.add("active");
  modal.classList.remove("hidden");
}

function closePreview() {
  const modal = document.getElementById("imageModal");
  modal.classList.remove("active");
  modal.classList.add("hidden");
}

// Enhanced image preview function
function openPreview(imagePath) {
    const modal = document.getElementById('imageModal');
    const modalImg = document.getElementById('modalImg');
    const loadingIndicator = document.getElementById('loadingIndicator');
    
    // Reset zoom
    currentZoom = 1;
    modalImg.style.transform = 'scale(1)';
    
    // Show loading
    if (loadingIndicator) {
        loadingIndicator.classList.remove('hidden');
    }
    
    // Set image source
    modalImg.src = imagePath;
    
    // Hide loading after image loads
    modalImg.onload = function() {
        if (loadingIndicator) {
            loadingIndicator.classList.add('hidden');
        }
        modal.classList.remove('hidden');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    };
    
    // Handle error
    modalImg.onerror = function() {
        if (loadingIndicator) {
            loadingIndicator.classList.add('hidden');
        }
        alert('Gagal memuat gambar. Pastikan file gambar tersedia.');
    };
}

// Close preview function
function closePreview() {
    const modal = document.getElementById('imageModal');
    modal.classList.remove('active');
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 400);
    document.body.style.overflow = 'auto';
}

// Show detail function (for text brief)
function showDetail(text) {
    alert('Detail Brief:\n\n' + text);
}

// Add ESC key support for modal
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closePreview();
    }
});

// Close modal when clicking outside
document.getElementById('imageModal')?.addEventListener('click', function(e) {
    if (e.target === this) {
        closePreview();
    }
});