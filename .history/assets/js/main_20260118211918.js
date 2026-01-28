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
