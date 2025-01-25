import _ from 'lodash';
const throttledScroll = _.throttle(function() {
    window.addEventListener('scroll', function () {
        const section = document.querySelector('.parallax-section');
        const scrollOffset = window.scrollY; // Posisi scroll saat ini
        const sectionHeight = section.offsetHeight; // Tinggi dari section
        const viewportHeight = window.innerHeight; // Tinggi dari viewport
    
        // Menghitung faktor skala untuk ukuran container dan teks
        const scaleFactor = Math.max(1 - (scrollOffset / sectionHeight), 0.7); // Mengurangi ukuran dengan scroll
        const fontSizeFactor = Math.max(1 - (scrollOffset / sectionHeight * 0.5), 0.6); // Mengurangi ukuran font dengan scroll
        
        // Membuat efek floating dengan translateY dan scale
        let translateValue = -(scrollOffset * 0.2); // Menggerakkan section lebih lambat untuk efek floating
        section.style.transform = `translateY(${translateValue}px) scale(${scaleFactor})`; // Menambahkan efek mengapung
        section.style.opacity = Math.max(1 - scrollOffset / (sectionHeight * 0.5), 0.5); // Menambahkan efek fade out pada scroll
    
        // Mengatur ukuran teks
        section.querySelector('h1').style.fontSize = `${fontSizeFactor * 250}px`; // Menyesuaikan ukuran teks
    });
}, 100);

window.addEventListener('scroll', throttledScroll);
