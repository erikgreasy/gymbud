/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
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
