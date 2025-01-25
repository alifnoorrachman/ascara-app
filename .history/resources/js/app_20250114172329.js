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




