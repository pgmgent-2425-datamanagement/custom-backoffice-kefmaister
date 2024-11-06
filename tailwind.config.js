/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./views/**/*.php", // Adjust this path to where your PHP files are located
    "./public/**/*.js", // Adjust if you have JS files using Tailwind classes
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
