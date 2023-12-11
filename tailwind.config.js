/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      margin: ['responsive', 'hover', 'focus', 'active'],
    },
  },
  plugins: [
    require('flowbite/plugin'),
  ],
}

