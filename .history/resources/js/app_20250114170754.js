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


    function applyTheme(themeName) {
        const themes = {
            default: {
                '--bg-color': '#ffffff',
                '--text-color': '#000000',
                '--font-family': 'sans-serif'
            },
            dark: {
                '--bg-color': '#1a1a1a',
                '--text-color': '#ffffff',
                '--font-family': 'sans-serif'
            },
            elegant: {
                '--bg-color': '#f5f5f5',
                '--text-color': '#2c3e50',
                '--font-family': 'Georgia, serif'
            }
        };
    
        const theme = themes[themeName];
        Object.entries(theme).forEach(([property, value]) => {
            document.documentElement.style.setProperty(property, value);
        });
    }
    
    function updateTheme(property, value) {
        const propertyMap = {
            'textColor': '--text-color',
            'bgColor': '--bg-color',
            'fontFamily': '--font-family'
        };
        
        document.documentElement.style.setProperty(propertyMap[property], value);
    }
    
    // Initialize with default theme
    document.addEventListener('DOMContentLoaded', () => {
        applyTheme('default');
    });

