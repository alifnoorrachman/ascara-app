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



// Fungsi untuk toggle dropdown saat tombol diklik
function toggleThemeDropdown() {
    const themeDropdown = document.getElementById("themeDropdown");
    themeDropdown.classList.toggle("show"); // Toggle class 'show' untuk menampilkan/menyembunyikan dropdown
}

// Fungsi untuk mengganti tema
function changeTheme(color, font, text) {
    document.querySelector('.navbar').style.background = color;
    document.body.style.background = color;
    document.body.style.fontFamily = font;

    const themeButton = document.getElementById("themeButton");
    themeButton.innerHTML = `Change to Theme ${text} <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>`;

    // Menutup dropdown setelah memilih tema
    const themeDropdown = document.getElementById("themeDropdown");
    themeDropdown.classList.remove("show");
}

// Menutup dropdown jika klik di luar dropdown
document.addEventListener("click", function(event) {
    const dropdown = document.getElementById("themeDropdown");
    const button = document.getElementById("themeButton");
    
    if (!dropdown.contains(event.target) && !button.contains(event.target)) {
        dropdown.classList.remove("show");
    }
});

