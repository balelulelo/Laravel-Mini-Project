import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {

            darkMode: 'false',

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

            colors: {
                'primary': { 
                    DEFAULT: '#82B2C0',
                    '50': '#f3f7f8', 
                    '100': '#e2ebee',
                    '200': '#cddde5',
                    '300': '#b1cbd6',
                    '400': '#93b9c9',
                    '500': '#82B2C0', 
                    '600': '#6c9aab',
                    '700': '#5a8293',
                    '800': '#4d6b7b',
                    '900': '#425b68',
                    '950': '#2c3e4a',
                },
                'bg-base': '#F5E6D2', 
                'bg-light': '#84DCC6', 
            },
        },
    },
    plugins: [forms],
};
