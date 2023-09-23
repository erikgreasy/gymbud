import preset from './vendor/filament/support/tailwind.config.preset'

/** @type {import('tailwindcss').Config} */
module.exports = {
    presets: [preset],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#8b5cf6',
            },
            container: {
                center: true,
                padding: '1rem',
                screens: {
                    '2xl': '1140px',
                }
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
    ],
}
