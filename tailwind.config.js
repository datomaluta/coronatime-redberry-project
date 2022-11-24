/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        'brand-primary':'#2029F3',
        'brand-secondary':'#0FBA68',
        'brand-tertiary':'#EAD621',
        'dark-100':'#010414',
        'dark-60':'#808189',
        'dash-purple':'#2029F3',
      },
      fontFamily:{
        'inter':'Inter, sans-serif',
      },
      screens: {
        'lg': {'max': '1023px'},
        'sm':{'max':'639px'}
      },
    },
  },
  plugins: [],
}