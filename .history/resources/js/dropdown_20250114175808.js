// Fungsi untuk menangani dropdown menu dan perubahan teks
document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownArrow = document.getElementById('dropdownArrow');
    const dropdownOptions = dropdownMenu.querySelectorAll('a');
    const brandText = dropdownButton.childNodes[0]; // Mengambil text node "ASCARA"

    // Toggle dropdown menu
    dropdownButton.addEventListener('click', function() {
        const isHidden = dropdownMenu.classList.contains('hidden');
        dropdownMenu.classList.toggle('hidden');
        
        // Rotasi arrow
        if (isHidden) {
            dropdownArrow.style.transform = 'rotate(180deg)';
        } else {
            dropdownArrow.style.transform = 'rotate(0)';
        }
    });

    // Menangani klik pada opsi dropdown
    dropdownOptions.forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const selectedText = this.textContent;
            
            // Mengubah teks sesuai dengan opsi yang dipilih
            brandText.textContent = selectedText + ' ';
            
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
});