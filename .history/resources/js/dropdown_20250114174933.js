// dropdown.js
document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('dropdownButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownArrow = document.getElementById('dropdownArrow');

    // Toggle dropdown when clicking the button
    dropdownButton.addEventListener('click', function(e) {
        e.stopPropagation(); // Prevent event from bubbling up
        dropdownMenu.classList.toggle('hidden');
        dropdownArrow.classList.toggle('rotate-180');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
            dropdownArrow.classList.remove('rotate-180');
        }
    });

    // Prevent dropdown from closing when clicking inside it
    dropdownMenu.addEventListener('click', function(e) {
        e.stopPropagation();
    });
});