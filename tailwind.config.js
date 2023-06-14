/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/tw-elements/dist/js/**/*.js",
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily:{
        ubuntu: ['Ubuntu']
      },
      colors:{
        'deep-blue': '#181821',
        'light-blue': '#1F1F2B'
      }
    },
  },
  plugins: [],
}

