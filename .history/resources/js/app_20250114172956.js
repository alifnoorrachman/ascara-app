import './bootstrap';
import './navbar.js';
import Alpine from 'alpinejs';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';


window.Alpine = Alpine;

Alpine.start();


ClassicEditor
    .create(document.querySelector('#content'))
    .catch(error => {
        console.error(error);
    });



// Fungsi untuk toggle dropdown
function toggleThemeDropdown() {
    const dropdown = document.getElementById('themeDropdown');
    const currentDisplay = window.getComputedStyle(dropdown).display;
    
    // Toggle dropdown visibility
    dropdown.style.display = currentDisplay === 'none' ? 'block' : 'none';
    
    // Menutup dropdown ketika mengklik di luar
    document.addEventListener('click', function closeDropdown(e) {
        const themeButton = document.getElementById('themeButton');
        const dropdown = document.getElementById('themeDropdown');
        
        if (!themeButton.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.style.display = 'none';
            document.removeEventListener('click', closeDropdown);
        }
    });
}

// Fungsi untuk mengubah theme
function changeTheme(color, font, themeName) {
    // Menyimpan preferensi theme ke localStorage
    localStorage.setItem('themeColor', color);
    localStorage.setItem('themeFont', font);
    localStorage.setItem('themeName', themeName);
    
    // Mengupdate tampilan
    applyTheme(color, font);
    
    // Mengupdate text current theme
    document.getElementById('currentTheme').textContent = `Currently Active: Theme ${themeName}`;
    
    // Menutup dropdown setelah memilih theme
    document.getElementById('themeDropdown').style.display = 'none';
}

// Fungsi untuk menerapkan theme
function applyTheme(color, font) {
    document.documentElement.style.setProperty('--color-one', color);
    document.body.style.fontFamily = font;
}

// Menerapkan theme yang tersimpan saat halaman dimuat
document.addEventListener('DOMContentLoaded', function() {
    const savedColor = localStorage.getItem('themeColor') || 'blue';
    const savedFont = localStorage.getItem('themeFont') || 'Arial, sans-serif';
    const savedThemeName = localStorage.getItem('themeName') || 'A';
    
    applyTheme(savedColor, savedFont);
    document.getElementById('currentTheme').textContent = `Currently Active: Theme ${savedThemeName}`;
});

// Menutup dropdown ketika scroll
let lastScrollTop = 0;
window.addEventListener('scroll', function() {
    const dropdown = document.getElementById('themeDropdown');
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
    
    if (currentScroll > lastScrollTop) {
        dropdown.style.display = 'none';
    }
    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});
