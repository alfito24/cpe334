/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
  './resources/views/**/*.blade.php',
  ],
  theme: {
    fontFamily: {
        'poppins': ['Poppins'],
    },
    boxShadow: {
        'full': '0px 5px 50px 5px rgba(0, 0, 0, 0.25)',
    },
    extend: {},
  },
  plugins: [],
}
