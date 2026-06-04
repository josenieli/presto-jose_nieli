import '../css/app.css';
import 'bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const button = document.getElementById('theme-toggle');
    const icon = document.getElementById('theme-icon');
    const text = document.getElementById('theme-text');
    const html = document.documentElement;

    const updateButton = (theme) => {
        if (theme === 'dark') {
            icon.className = 'fa-regular fa-sun';
            text.textContent = 'Chiaro';
        } else {
            icon.className = 'fa-solid fa-moon';
            text.textContent = 'Scuro';
        }
    };

    const savedTheme = localStorage.getItem('theme') || 'dark';
    html.setAttribute('data-bs-theme', savedTheme);
    updateButton(savedTheme);

    button?.addEventListener('click', () => {
        const currentTheme = html.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        html.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        updateButton(newTheme);
    });
});