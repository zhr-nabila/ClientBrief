lucide.createIcons();

// Ganti fungsi showDetail dengan popup custom
function showDetail(text) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm';
    modal.innerHTML = `
        <div class="bg-[#1A141A] border border-[#B32C1A]/30 rounded-2xl max-w-2xl w-full p-8 animate-slideUp">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-black text-white">Detail Kebutuhan</h3>
                <button onclick="this.closest('.fixed').remove()" class="p-2 hover:bg-white/10 rounded-lg transition-colors">
                    <i data-lucide="x" class="w-5 h-5 text-gray-400"></i>
                </button>
            </div>
            <div class="bg-[#2A1617]/60 p-6 rounded-xl border border-[#B32C1A]/20">
                <p class="text-gray-300 whitespace-pre-line leading-relaxed">${text}</p>
            </div>
            <div class="mt-6 flex justify-end">
                <button onclick="this.closest('.fixed').remove()" class="px-6 py-2 bg-[#FE7F42] text-white rounded-xl font-bold hover:bg-[#B32C1A] transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    `;
    document.body.appendChild(modal);
    lucide.createIcons();
}

// Fungsi untuk preview multiple files
function openFilePreview(files) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm';
    
    let fileListHTML = '';
    files.forEach(file => {
        const ext = file.split('.').pop().toLowerCase();
        const isImage = ['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(ext);
        const isPDF = ext === 'pdf';
        
        fileListHTML += `
            <div class="flex items-center justify-between p-4 bg-white/5 rounded-xl border border-white/10">
                <div class="flex items-center gap-3">
                    <i data-lucide="${isImage ? 'image' : isPDF ? 'file-text' : 'file'}" 
                       class="w-5 h-5 ${isImage ? 'text-green-500' : isPDF ? 'text-red-500' : 'text-blue-500'}"></i>
                    <span class="text-sm truncate">${file}</span>
                </div>
                <div class="flex gap-2">
                    ${isImage ? `
                        <button onclick="openPreview('../Uploads/${file}')" 
                                class="p-2 hover:bg-white/10 rounded-lg transition-colors" 
                                title="Preview">
                            <i data-lucide="eye" class="w-4 h-4"></i>
                        </button>
                    ` : ''}
                    <a href="../Uploads/${file}" 
                       download="${file}" 
                       class="p-2 hover:bg-white/10 rounded-lg transition-colors" 
                       title="Download">
                        <i data-lucide="download" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
        `;
    });
    
    modal.innerHTML = `
        <div class="bg-[#1A141A] border border-[#B32C1A]/30 rounded-2xl max-w-2xl w-full p-8 animate-slideUp max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-black text-white">File Referensi (${files.length})</h3>
                <button onclick="this.closest('.fixed').remove()" class="p-2 hover:bg-white/10 rounded-lg transition-colors">
                    <i data-lucide="x" class="w-5 h-5 text-gray-400"></i>
                </button>
            </div>
            <div class="space-y-3">
                ${fileListHTML}
            </div>
            <div class="mt-6 flex justify-end">
                <button onclick="this.closest('.fixed').remove()" class="px-6 py-2 bg-[#FE7F42] text-white rounded-xl font-bold hover:bg-[#B32C1A] transition-colors">
                    Tutup
                </button>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    lucide.createIcons();
}

// Fungsi openPreview untuk gambar (existing, tetap dipertahankan)
function openPreview(src) {
    const modal = document.createElement('div');
    modal.className = 'fixed inset-0 z-[10000] flex items-center justify-center p-4 bg-black/90 backdrop-blur-sm';
    modal.onclick = function(e) {
        if (e.target === this) closePreview();
    };
    
    modal.innerHTML = `
        <div class="relative max-w-4xl max-h-[90vh]">
            <button onclick="closePreview()" 
                    class="absolute -top-12 right-0 text-white hover:text-red-500 transition-all flex items-center gap-2 font-bold uppercase tracking-widest text-xs z-10">
                Tutup <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <img src="${src}" class="rounded-2xl shadow-2xl border border-white/10 max-h-[80vh] w-auto object-contain">
        </div>
    `;
    
    document.body.appendChild(modal);
    lucide.createIcons();
}

function closePreview() {
    const modal = document.querySelector('.fixed.z-\\[10000\\]');
    if (modal) modal.remove();
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

