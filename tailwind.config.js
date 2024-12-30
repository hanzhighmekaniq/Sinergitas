import defaultTheme from "tailwindcss/defaultTheme";
import flowbitePlugin from "flowbite/plugin";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php", // Semua file blade
        "./resources/**/*.js",        // File JS dalam resources
        "./resources/**/*.vue",       // File Vue dalam resources
        "./node_modules/flowbite/**/*.js", // Komponen Flowbite
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", // View pagination default Laravel
    ],
    theme: {
        extend: {
            animation: {
                glow: "glow-animation 1.5s ease-in-out infinite", // Tambahkan animasi glow
            },
            keyframes: {
                "glow-animation": {
                    "0%": {
                        boxShadow: "0 0 5px rgba(255, 255, 255, 0.5)", // Awal glow
                    },
                    "50%": {
                        boxShadow: "0 0 20px rgba(255, 255, 255, 1)", // Tengah glow
                    },
                    "100%": {
                        boxShadow: "0 0 5px rgba(255, 255, 255, 0.5)", // Akhir glow
                    },
                },
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans], // Tambahkan font default Tailwind
                lexend: ["Lexend", "sans-serif"], // Font kustom
            },
        },
    },
    plugins: [
        flowbitePlugin, // Plugin Flowbite
    ],
};
