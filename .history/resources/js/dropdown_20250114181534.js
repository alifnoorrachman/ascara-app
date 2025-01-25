document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownArrow = document.getElementById('dropdownArrow');
    const dropdownOptions = dropdownMenu.querySelectorAll('a');
    const brandText = dropdownButton.childNodes[0];
    const navbar = document.getElementById('navbar');
    const footer = document.querySelector('footer');

    // Fungsi untuk mengatur tema
    function setTheme(theme) {
        // Hapus semua kelas tema yang ada
        navbar.classList.remove('theme-menegement', 'theme-milan');
        footer.classList.remove('theme-menegement', 'theme-milan');
        
        // Tambahkan kelas tema yang baru
        if (theme === 'Le Menegement') {
            navbar.classList.add('theme-menegement');
            footer.classList.add('theme-menegement');
        } else if (theme === 'teMilan') {
            navbar.classList.add('theme-milan');
            footer.classList.add('theme-milan');
        }
        
        // Update copyright text
        const copyrightText = footer.querySelector('p');
        if (copyrightText) {
            copyrightText.textContent = `© 2024 ${theme}. All rights reserved.`;
        }
        
        // Simpan preferensi tema di localStorage
        localStorage.setItem('selectedTheme', theme);
    }

    // Toggle dropdown menu
    dropdownButton.addEventListener('click', function() {
        const isHidden = dropdownMenu.classList.contains('hidden');
        dropdownMenu.classList.toggle('hidden');
        dropdownArrow.style.transform = isHidden ? 'rotate(180deg)' : 'rotate(0)';
    });

    // Menangani klik pada opsi dropdown
    dropdownOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const selectedText = this.textContent;
            
            // Mengubah teks dan tema
            brandText.textContent = selectedText + ' ';
            setTheme(selectedText);
            
            // Menutup dropdown
            dropdownMenu.classList.add('hidden');
            dropdownArrow.style.transform = 'rotate(0)';
        });
    });

    // Menutup dropdown ketika mengklik di luar
    document.addEventListener('click', function(e) {
        if (!dropdownButton.contains(e.target)) {
            dropdownMenu.classList.add('hidden');
            dropdownArrow.style.transform = 'rotate(0)';
        }
    });

    // Memuat tema yang tersimpan saat halaman dimuat
    const savedTheme = localStorage.getItem('selectedTheme');
    if (savedTheme) {
        setTheme(savedTheme);
        brandText.textContent = savedTheme + ' ';
    }
});