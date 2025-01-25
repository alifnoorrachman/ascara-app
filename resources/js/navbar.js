let lastScrollY = window.scrollY;
let ticking = false;

function updateNavbar() {
    const navbar = document.getElementById('navbar');
    
    // Scrolling down
    if (lastScrollY > window.scrollY) {
        navbar.style.transform = 'translateY(0)';
    } 
    // Scrolling up
    else {
        navbar.style.transform = 'translateY(-100%)';
    }
    
    lastScrollY = window.scrollY;
    ticking = false;
}

window.addEventListener('scroll', () => {
    if (!ticking) {
        window.requestAnimationFrame(() => {
            updateNavbar();
        });
        ticking = true;
    }
});