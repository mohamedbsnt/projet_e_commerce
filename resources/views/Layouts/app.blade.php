<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'E-Commerce Platform')</title>
    <meta name="description" content="@yield('description', 'Plateforme e-commerce moderne et performante')">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Styles compilés -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    
    <!-- Styles additionnels des vues enfants -->
    @stack('styles')
</head>
<body class="antialiased text-gray-900 bg-gray-50">
    
    <!-- Navigation principale avec dropdowns -->
    @include('partials.navbar')
    
    <!-- Contenu principal de chaque page -->
    <main>
        @yield('content')
    </main>
    
    <!-- Pied de page -->
    @include('partials.footer')
    
    <!-- Scripts JavaScript compilés -->
    <script src="{{ mix('js/app.js') }}"></script>
    
    <!-- Script global pour gérer les onglets et dropdowns -->
    <script>
        // Fonction principale pour basculer les sections et dropdowns
        function toggleSection(id) {
            // 1. Gestion des sections de contenu dans <main>
            document.querySelectorAll('.hidden-section').forEach(section => {
                section.classList.toggle('show', section.id === id);
            });
            
            // 2. Gestion des dropdown-panels sous le header
            document.querySelectorAll('.dropdown-panel').forEach(panel => {
                const targetKey = id.replace('-section', '');
                const shouldShow = panel.id.startsWith(targetKey + '-dropdown');
                panel.classList.toggle('hidden', !shouldShow);
            });
            
            // 3. Mise à jour de l'onglet actif (couleur rose)
            document.querySelectorAll('.tab-btn').forEach(button => {
                const isActive = button.getAttribute('data-target') === id;
                button.classList.toggle('text-brand-pink', isActive);
                button.classList.toggle('text-gray-700', !isActive);
            });
        }
        
        // Fonction pour gérer le menu mobile
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu) {
                mobileMenu.classList.toggle('hidden');
            }
        }
        
        // Initialisation au chargement de la page
        document.addEventListener('DOMContentLoaded', function() {
            // Activer la première section par défaut
            toggleSection('why-section');
            
            // Gestion du bouton menu mobile
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', toggleMobileMenu);
            }
            
            // Fermer les dropdowns quand on clique ailleurs
            document.addEventListener('click', function(event) {
                const isTabButton = event.target.closest('.tab-btn');
                const isDropdown = event.target.closest('.dropdown-panel');
                
                if (!isTabButton && !isDropdown) {
                    document.querySelectorAll('.dropdown-panel').forEach(panel => {
                        panel.classList.add('hidden');
                    });
                }
            });
            
            // Animation d'apparition pour les cartes hover
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-4');
                    }
                });
            }, observerOptions);
            
            // Observer les éléments avec animation
            document.querySelectorAll('.card-hover').forEach(element => {
                observer.observe(element);
                element.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-700');
            });
        });
    </script>
    
    <!-- Scripts additionnels des vues enfants -->
    @stack('scripts')
    
</body>
</html>
