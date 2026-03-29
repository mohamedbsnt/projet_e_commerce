// tailwind.config.js

const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  /* =====================================================
     CONTENT — Fichiers à scanner pour les classes Tailwind
  ===================================================== */
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
  ],

  /* =====================================================
     THEME — Configuration du design system
  ===================================================== */
  theme: {
    // Configuration du container pour qu'il soit centré par défaut
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        sm: '1.5rem',
        lg: '2rem',
      },
    },

    // 'extend' permet d'ajouter des valeurs au thème par défaut de Tailwind
    extend: {
      /* ===== Polices de caractères ===== */
      fontFamily: {
        // Utilise Poppins comme police par défaut, avec des polices de secours
        sans: ['Poppins', ...defaultTheme.fontFamily.sans],
      },

      /* ===== Palette de Couleurs Unifiée ===== */
      colors: {
        // Palette du design "Furniture" (principale)
        'brand-primary': '#B88E2F',       // Doré/Orange
        'brand-primary-light': '#FFF3E3', // Fond clair
        'brand-gray-1': '#3A3A3A',         // Texte foncé
        'brand-gray-2': '#666666',         // Texte secondaire
        'brand-gray-3': '#B0B0B0',         // Prix barré
        'brand-green': '#2EC1AC',         // Badge "New"
        'brand-red': '#E97171',           // Badge Réduction

        // Ancienne palette (gardée pour la compatibilité)
        'brand-orange': '#f97316',        // L'orange vif original
        'brand-pink': '#ec4899',

        // Couleurs spécifiques à TPT
        'tpt-green': '#00a99d',
        'tpt-green-hover': '#008c82',
      },

      /* ===== Ombres personnalisées ===== */
      boxShadow: {
        soft: '0 4px 20px rgba(0,0,0,0.06)',
      },
    },
  },

  /* =====================================================
     PLUGINS — Ajout de fonctionnalités à Tailwind
  ===================================================== */
  plugins: [
    require('@tailwindcss/forms'),      // Améliore le style des formulaires par défaut
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
     // Pour le formatage de texte (prose)
  ],
};
