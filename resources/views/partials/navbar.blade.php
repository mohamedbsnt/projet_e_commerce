<nav class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm">
  <div class="container px-6 mx-auto">
      <div class="flex items-center justify-between h-16">
          
          <!-- Logo -->
          <div class="flex-shrink-0">
              <a href="{{ url('/') }}" class="flex items-center">
                  <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-auto h-8">
              </a>
          </div>

          <!-- Menu principal (desktop) -->
          <div class="items-center hidden space-x-8 lg:flex">
              <div class="relative group">
                  <button onclick="toggleSection('why-section')" 
                          class="flex items-center py-2 space-x-1 font-medium text-gray-700 hover:text-gray-900">
                      <span>Pourquoi nous ?</span>
                      <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                      </svg>
                  </button>
              </div>

              <div class="relative group">
                  <button onclick="toggleSection('integrations-section')" 
                          class="flex items-center py-2 space-x-1 font-medium text-gray-700 hover:text-gray-900">
                      <span>Intégrations</span>
                      <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                      </svg>
                  </button>
              </div>

              <div class="relative group">
                  <button onclick="toggleSection('suppliers-section')" 
                          class="flex items-center py-2 space-x-1 font-medium text-gray-700 hover:text-gray-900">
                      <span>Fournisseurs</span>
                      <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                      </svg>
                  </button>
              </div>

              <div class="relative group">
                  <button onclick="toggleSection('resources-section')" 
                          class="flex items-center py-2 space-x-1 font-medium text-gray-700 hover:text-gray-900">
                      <span>Ressources</span>
                      <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                      </svg>
                  </button>
              </div>

              <a href="#pricing-section" class="py-2 font-medium text-gray-700 hover:text-gray-900">
                  Tarifs
              </a>
          </div>

          <!-- Actions utilisateur -->
          <div class="items-center hidden space-x-4 lg:flex">
              <a href="{{ route('login') }}" class="font-medium text-gray-700 hover:text-gray-900">
                  Se connecter
              </a>
              <a href="{{ route('register') }}" class="btn-primary">
                  Commencer
                  <svg class="inline w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                  </svg>
              </a>
          </div>

          <!-- Menu mobile -->
          <div class="lg:hidden">
              <button id="mobile-menu-btn" class="text-gray-700 hover:text-gray-900">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                  </svg>
              </button>
          </div>
      </div>

      <!-- Menu mobile dropdown -->
      <div id="mobile-menu" class="hidden py-4 border-t border-gray-100 lg:hidden">
          <div class="space-y-4">
              <button onclick="toggleSection('why-section')" class="block w-full font-medium text-left text-gray-700 hover:text-gray-900">
                  Pourquoi nous ?
              </button>
              <button onclick="toggleSection('integrations-section')" class="block w-full font-medium text-left text-gray-700 hover:text-gray-900">
                  Intégrations
              </button>
              <button onclick="toggleSection('suppliers-section')" class="block w-full font-medium text-left text-gray-700 hover:text-gray-900">
                  Fournisseurs
              </button>
              <button onclick="toggleSection('resources-section')" class="block w-full font-medium text-left text-gray-700 hover:text-gray-900">
                  Ressources
              </button>
              <a href="#pricing-section" class="block font-medium text-gray-700 hover:text-gray-900">
                  Tarifs
              </a>
              <hr class="border-gray-200">
              <a href="{{ route('login') }}" class="block font-medium text-gray-700 hover:text-gray-900">
                  Se connecter
              </a>
              <a href="{{ route('register') }}" class="inline-block btn-primary">
                  Commencer
              </a>
          </div>
      </div>
  </div>
</nav>
