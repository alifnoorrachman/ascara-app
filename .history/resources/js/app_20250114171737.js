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


// Fungsi untuk mengganti tema
function changeTheme(color, font, text) {
    // Mengubah warna dan font sesuai pilihan
    document.querySelector('.navbar').style.background = color;
    document.body.style.background = color;
    document.body.style.fontFamily = font;
    document.querySelector('.logo').textContent = text;

    // Mengubah teks tombol 'Change Theme' menjadi tema yang dipilih
    const themeButton = document.getElementById("themeButton");
    themeButton.querySelector("span").textContent = `Change to Theme ${text}`;

    // Mengubah teks default dropdown
    const currentTheme = document.getElementById("currentTheme");
    currentTheme.textContent = `Currently Active: Theme ${text}`;

    // Menutup dropdown setelah pemilihan tema
    const themeDropdown = document.querySelector(".theme-dropdown");
    themeDropdown.classList.remove("active");
}

// Fungsi untuk menampilkan dropdown ganti tema
function toggleThemeDropdown() {
    const themeDropdown = document.querySelector(".theme-dropdown");
    themeDropdown.classList.toggle("active");
}

// Set default theme saat halaman pertama kali dimuat
window.onload = function() {
    changeTheme('blue', 'Arial, sans-serif', 'A');
};
