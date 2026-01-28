let currentLang = 'ID';

document.addEventListener('DOMContentLoaded', () => {
    if (window.lucide) lucide.createIcons();
});

/* THEME */
function toggleTheme() {
    document.body.classList.toggle('light-mode');
    const icon = document.getElementById('themeIcon');
    const isLight = document.body.classList.contains('light-mode');
    if (icon) {
        icon.setAttribute('data-lucide', isLight ? 'sun' : 'moon');
        lucide.createIcons();
    }
}

/* LANDING */
function startJourney() {
    document.getElementById('landing-page').classList.remove('active');
    setTimeout(() => {
        document.getElementById('landing-page').style.display = 'none';
        document.getElementById('form-container').classList.add('active');
    }, 300);
}
