function toggleTheme() {
    document.body.classList.toggle('light');
    localStorage.setItem(
        'theme',
        document.body.classList.contains('light') ? 'light' : 'dark'
    );
}

document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('theme') === 'light') {
        document.body.classList.add('light');
    }
});
