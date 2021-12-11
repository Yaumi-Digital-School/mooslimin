const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue', s
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    '100': '#D2FCD3',
                    '200': '#A6FAB1',
                    '300': '#78F294',
                    '400': '#55E685',
                    '500': '#22D670',
                    '600': '#18B86D',
                    '700': '#119A67',
                    '800': '#0A7C5D',
                    '900': '#066656',
                }
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};