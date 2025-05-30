module.exports = {
    darkMode: false,
    content: [
        "./*.php",
        "./template/*.php",
        "./node_modules/flowbite-react/**/*.js",

        // "./pages/**/*.{js,ts,jsx,tsx}",
        // "./components/**/*.{js,ts,jsx,tsx}",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("flowbite/plugin")],
}