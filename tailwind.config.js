module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
      colors: {
        'brand-orange': '#ea580c',
        'brand-pink':   '#ec4899',
        'light-red':    '#ffe3e3',
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
};
