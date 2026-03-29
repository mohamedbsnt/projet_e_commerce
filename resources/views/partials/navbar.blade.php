<nav class="sticky top-0 z-50 h-16 bg-white border-b border-gray-100 shadow-sm">
    <div class="container h-full px-6 mx-auto">
        <div class="flex items-center justify-between h-full">

            <!-- Logo -->
            <div class="flex items-center flex-shrink-0 h-full">
                <a href="{{ url('/') }}" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-8">
                </a>
            </div>

            <!-- Menu principal (Desktop) -->
            <div class="items-center hidden h-full space-x-8 lg:flex">
                

                <!-- Pourquoi nous -->
                <div class="relative flex items-center h-full">
                    <button onclick="toggleDropdown('why')"
                            id="btn-why"
                            class="flex items-center h-full px-2 space-x-1 font-medium text-gray-700 transition-colors duration-200 nav-btn hover:text-brand-orange hover:border-brand-orange focus:outline-none">
                        <span>Pourquoi nous ?</span>
                        <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>

                <!-- Boutique (NOUVEAU) -->
                <div class="relative flex items-center h-full">
                    <button onclick="toggleDropdown('store')"
                            id="btn-store"
                            class="flex items-center h-full px-2 space-x-1 font-medium text-gray-700 transition-colors duration-200 nav-btn hover:text-brand-orange hover:border-brand-orange focus:outline-none">
                        <span>Store</span>
                        <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>

                <!-- Intégrations -->
                <div class="relative flex items-center h-full">
                    <button onclick="toggleDropdown('integrations')"
                            id="btn-integrations"
                            class="flex items-center h-full px-2 space-x-1 font-medium text-gray-700 transition-colors duration-200 nav-btn hover:text-brand-orange hover:border-brand-orange focus:outline-none">
                        <span>Intégrations</span>
                        <svg class="w-4 h-4 transition-transform duration-200"fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>

                <!-- Fournisseurs -->
                <div class="relative flex items-center h-full">
                    <button onclick="toggleDropdown('suppliers')"
                            id="btn-suppliers"
                            class="flex items-center h-full px-2 space-x-1 font-medium text-gray-700 transition-colors duration-200 nav-btn hover:text-brand-orange hover:border-brand-orange focus:outline-none">
                        <span>Fournisseurs</span>
                        <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>

                <!-- Ressources -->
                <div class="relative flex items-center h-full">
                    <button onclick="toggleDropdown('resources')"
                            id="btn-resources"
                            class="flex items-center h-full px-2 space-x-1 font-medium text-gray-700 transition-colors duration-200 nav-btn hover:text-brand-orange hover:border-brand-orange focus:outline-none">
                        <span>Ressources</span>
                        <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                </div>

                <!-- Tarifs -->
                <a href="#pricing-section"
                   class="flex items-center h-full px-2 font-medium text-gray-700 transition-colors duration-200 hover:text-brand-orange hover:border-brand-orange">
                    Tarifs
                </a>
            </div>

            <!-- Actions utilisateur -->
            <div class="items-center hidden space-x-4 lg:flex">
                <a href="{{ route('login') }}" class="font-medium text-gray-700 transition-colors hover:text-gray-900">
                    Se connecter
                </a>
                <a href="{{ route('register') }}" class="btn-primary">
                    Commencer
                    <svg class="inline w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            </div>

            <!-- Bouton menu mobile -->
            <div class="flex items-center lg:hidden">
                <button id="mobile-menu-btn" class="p-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Contenu des Dropdowns -->
        @include('partials.dropdown_content')

        <!-- Menu Mobile -->
        <div id="mobile-menu" class="absolute left-0 right-0 z-40 hidden bg-white border-t border-gray-100 shadow-lg top-16 lg:hidden">
            <div class="flex flex-col p-4 space-y-4">
                <button onclick="toggleDropdown('why')" class="block w-full font-medium text-left text-gray-700 hover:text-brand-orange">Pourquoi nous ?</button>
                <a href="{{ url('/products') }}" class="block font-medium text-gray-700 hover:text-brand-orange">Store</a>
                <button onclick="toggleDropdown('integrations')" class="block w-full font-medium text-left text-gray-700 hover:text-gray-900">
                    Intégrations</button>
                <button onclick="toggleDropdown('suppliers')" class="block w-full font-medium text-left text-gray-700 hover:text-brand-orange">Fournisseurs</button>
                <button onclick="toggleDropdown('resources')" class="block w-full font-medium text-left text-gray-700 hover:text-brand-orange">Ressources</button>
                <a href="#pricing-section" class="block font-medium text-gray-700 hover:text-brand-orange">Tarifs</a>
                <hr class="border-gray-200">
                <a href="{{ route('login') }}" class="block font-medium text-gray-700 hover:text-gray-900">Se connecter</a>
                <a href="{{ route('register') }}" class="inline-block w-full text-center btn-primary">Commencer</a>
            </div>
        </div>
    </div>
</nav>
