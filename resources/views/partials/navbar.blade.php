<nav class="bg-white border-b border-gray-100">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
      <a href="{{ url('/') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
      </a>
  
      <ul class="hidden lg:flex items-center space-x-8 text-gray-700">
        <li>
          <button onclick="toggleSection('why-section')" class="flex items-center space-x-1 hover:text-gray-900 focus:outline-none">
            <span>Why MonApp?</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </li>
        <li>
          <button onclick="toggleSection('integrations-section')" class="flex items-center space-x-1 hover:text-gray-900 focus:outline-none">
            <span>Integrations</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </li>
        <li>
          <button onclick="toggleSection('suppliers-section')" class="flex items-center space-x-1 hover:text-gray-900 focus:outline-none">
            <span>Suppliers</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </li>
        <li>
          <button onclick="toggleSection('resources-section')" class="flex items-center space-x-1 hover:text-gray-900 focus:outline-none">
            <span>Resources</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </button>
        </li>
        <li>
          <a href="#pricing-section" class="hover:text-gray-900 font-medium">Pricing</a>
        </li>
      </ul>
  
      <div class="flex items-center space-x-6">
        <a href="#" class="text-gray-700 hover:text-gray-900 font-medium">Sign In</a>
        <a href="#" class="bg-pink-500 hover:bg-pink-600 text-white font-semibold px-5 py-2 rounded-lg flex items-center space-x-2">
          <span>GET STARTED</span>
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/>
          </svg>
        </a>
      </div>
  
      <button class="lg:hidden text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </nav>
  