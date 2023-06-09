/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      maxWidth: {
        '_25': '25%',
        '_50': '50%',
        '_75': '75%',
        '_90': '90%',
      }
    },
  },
  plugins: [],
}

