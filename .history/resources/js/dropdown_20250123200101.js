document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownArrow = document.getElementById('dropdownArrow');
    const dropdownOptions = dropdownMenu.querySelectorAll('a');
    const brandText = dropdownButton.childNodes[0];
    const navbar = document.getElementById('navbar');
    const footer = document.querySelector('footer');
    const body = document.body;
    const logoElement = document.querySelector('.logo-container img'); // Select the logo image

    // Fungsi untuk mengatur tema
    function setTheme(theme) {
        // Hapus semua kelas tema yang ada
        [navbar, footer, body].forEach(element => {
            element.classList.remove('theme-menegement', 'theme-milan');
        });
        
        // Tambahkan kelas tema yang baru
        if (theme === 'Le Menegement') {
            [navbar, footer, body].forEach(element => {
                element.classList.add('theme-menegement');
                logoElement.classList.add('h-12'); // Menambahkan kelas tinggi lebih besar
            logoElement.classList.remove('h-10');
            });
            // Ganti logo untuk Le Menegement
            if (logoElement) logoElement.src = '../images/LogoLe.png';
        } else if (theme === 'teMilan') {
            [navbar, footer, body].forEach(element => {
                element.classList.add('theme-milan');
            });
            // Ganti logo untuk teMilan
            if (logoElement) logoElement.src = '../images/LogoTemilan.png';
        } else {
            // Logo default (Ascara)
            if (logoElement) logoElement.src = '../images/LogoAscara.png';
        }
        
        // Update copyright text
        const copyrightText = footer.querySelector('p');
        if (copyrightText) {
            copyrightText.textContent = `© 2024 ${theme}. All rights reserved.`;
        }
        
        // Simpan preferensi tema di localStorage
        localStorage.setItem('selectedTheme', theme);
        
        // Trigger smooth scroll untuk memaksa re-paint
        window.scrollBy(0, 0);
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