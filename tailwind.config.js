/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "co-dark-blue": "#263B81",
                "co-pink": "#DB0056",
                "co-light-pink": "#FF73BD",
                "co-lighter-pink": "#FFA8DE",
                "co-sky": "#00CFE2",
                "sem-light-blue": "#0575E6",
                "sem-dark-blue": "#021B79",
                "semnas-dark-pink": "#ff57a0",
                "semnas-pink": "#ff76b5",
                "semnas-light-pink": "#ffb3e1",
            },
        },
    },
    plugins: [
        require("@tailwindcss/typography"),
        require("@tailwindcss/forms"),
        require("@tailwindcss/aspect-ratio"),
        require("@tailwindcss/container-queries"),
    ],
};
