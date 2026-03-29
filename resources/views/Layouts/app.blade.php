<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js" defer></script>
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
    {{-- DÉTAIL 2 : Chargement des styles de Livewire. --}}
    {{-- Doit être dans le <head> pour éviter les "sauts" d'affichage (FOUC ). --}}
    @livewireStyles
    
    <!-- Styles compilés -->
    <link href="{{ mix('css/app.css' ) }}" rel="stylesheet">
    
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
    
    @livewireScripts
    <!-- Scripts JavaScript compilés -->
    <script src="{{ mix('js/app.js') }}"></script>
    
    <!-- Script global pour gérer les onglets et dropdowns -->
    <script>
        // Fonction principale pour basculer les sections et dropdowns
        function toggleDropdown(id) {
            const targetPanel = document.getElementById(id);
            
            // Fermer tous les autres dropdowns
            document.querySelectorAll('.dropdown-panel').forEach(panel => {
                if (panel.id !== id) {
                    panel.classList.add('hidden');
                }
            });
            
            // Basculer l'affichage du dropdown cible
            if (targetPanel) {
                targetPanel.classList.toggle('hidden');
            }
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
            // Aucune section n'est activée par défaut, les dropdowns sont cachés.
            
            // Gestion du bouton menu mobile
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', toggleMobileMenu);
            }
            
            // Fermer les dropdowns quand on clique ailleurs
            document.addEventListener('click', function(event) {
                const isTabButton = event.target.closest('button[onclick^="toggleDropdown"]');
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
    <x-chatbot />

    {{-- Scripts additionnels des vues enfants (déjà correct) --}}
    @stack('scripts')

</body>
</html>
