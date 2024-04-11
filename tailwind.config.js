const defaultTheme = require("tailwindcss/defaultTheme");

const colors = require('tailwindcss/colors')

module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                dark: {
                    bg: "#151823",
                    "eval-1": "#222738",
                    "eval-2": "#2A2F42",
                    "eval-3": "#2C3142",
                },
                
                'light-blue': colors.lightBlue,
                cyan: colors.cyan,
            },
            width: {
                120: '120%',
            },
            height: {
                120: '120%',
            },
            inset: {
                '-10': '-10%',
            },
            borderRadius: {
                100: '100%',
            },
            animation: {
                glow1: 'glow1 4s linear infinite',
                glow2: 'glow2 4s linear infinite',
                glow3: 'glow3 4s linear infinite',
                glow4: 'glow4 4s linear infinite',
            },
            keyframes: {
                glow1: {
                    '0%': { transform: 'translate(10%, 10%) scale(1)' },
                    '25%': { transform: 'translate(-10%, 10%) scale(1)' },
                    '50%': { transform: 'translate(-10%, -10%) scale(1)' },
                    '75%': { transform: 'translate(10%, -10%) scale(1)' },
                    '100%': { transform: 'translate(10%, 10%) scale(1)' },
                },
                glow2: {
                    '0%': { transform: 'translate(-10%, -10%) scale(1)' },
                    '25%': { transform: 'translate(10%, -10%) scale(1)' },
                    '50%': { transform: 'translate(10%, 10%) scale(1)' },
                    '75%': { transform: 'translate(-10%, 10%) scale(1)' },
                    '100%': { transform: 'translate(-10%, -10%) scale(1)' },
                },
                glow3: {
                    '0%': { transform: 'translate(-10%, 10%) scale(1)' },
                    '25%': { transform: 'translate(-10%, -10%) scale(1)' },
                    '50%': { transform: 'translate(10%, -10%) scale(1)' },
                    '75%': { transform: 'translate(10%, 10%) scale(1)' },
                    '100%': { transform: 'translate(-10%, 10%) scale(1)' },
                },
                glow4: {
                    '0%': { transform: 'translate(10%, -10%) scale(1)' },
                    '25%': { transform: 'translate(10%, 10%) scale(1)' },
                    '50%': { transform: 'translate(-10%, 10%) scale(1)' },
                    '75%': { transform: 'translate(-10%, -10%) scale(1)' },
                    '100%': { transform: 'translate(10%, -10%) scale(1)' },
                },
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("daisyui"),
    ],
};
