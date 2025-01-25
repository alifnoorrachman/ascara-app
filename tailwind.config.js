import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import { plugin } from 'alpinejs';
import { form } from 'framer-motion/client';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/css/**/*.css',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                colorOne: '#282723',
                colorTwo: '#6F7575',
                colorThree: '#4C5035',
                colorFour: '#763D2A',
                colorFive: '#BD8D5C',
                colorSix: '#C1B5A5',
                colorNetral: '#FDFAF1',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite-typography'),
        require('@tailwindcss/typography'),
        forms,
    ],
};

