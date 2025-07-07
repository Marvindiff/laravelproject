import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
             keyframes: {
        'button-pulse': {
          '0%, 100%': { transform: 'scale(1)', boxShadow: '0 0 0px #00cfff' },
          '50%': { transform: 'scale(1.05)', boxShadow: '0 0 12px #00cfff' },
        },
      },
      animation: {
        'pulse-glow': 'button-pulse 1.8s ease-in-out infinite',
      },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
