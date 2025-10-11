@extends('layouts.app')

@section('title', 'Bienvenue')

@section('content')
  <!-- Breadcrumb navigation -->
  <nav class="text-sm text-gray-500 mb-6">
    <a href="#" class="hover:text-orange-600 hover:underline">Dropshipping Blog</a>
    <span class="mx-2">›</span>
    <a href="#" class="hover:text-orange-600 hover:underline">Dropshipping Tips & Strategies</a>
  </nav>

  <!-- Article principal -->
  <div class="flex flex-col lg:flex-row gap-8 mb-12">
    <!-- Contenu texte à gauche -->
    <div class="flex-1">
      <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
        6 eCommerce Business 
        Examples And How To Get Started
      </h1>
      
      <p class="text-lg text-gray-600 mb-6 leading-relaxed">
        Want to learn about eCommerce? Get to know the six eCommerce business examples and find the best platforms to get started right here.
      </p>
      
      <p class="text-sm text-gray-500 mb-6">13 minutes read</p>
      
      <a href="#" class="inline-flex items-center text-sm text-orange-600 hover:text-orange-700 hover:underline">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path>
        </svg>
        Copy link to this page
      </a>
    </div>

    <!-- Image à droite -->
    <div class="flex-1 lg:max-w-md">
      <img 
        src="{{ asset('images/ecommerce-hero.jpg') }}" 
        alt="6 eCommerce Business Examples" 
        class="w-full h-64 lg:h-80 object-cover rounded-lg shadow-lg"
      >
    </div>
  </div>

  <!-- Sections dynamiques masquées -->
  <div id="why-section" class="hidden-section bg-white p-8 rounded-lg shadow-lg mb-8">
    <h2 class="text-2xl font-bold mb-4">Pourquoi MonApp ?</h2>
    <p>Explications des bénéfices, cas d'utilisation, témoignages clients.</p>
  </div>

  <div id="integrations-section" class="hidden-section bg-white p-8 rounded-lg shadow-lg mb-8">
    <h2 class="text-2xl font-bold mb-4">Intégrations</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <div class="text-center">
        <img src="{{ asset('images/shopify-logo.png') }}" class="h-12 mx-auto mb-2" alt="Shopify">
        <p class="text-sm">Shopify</p>
      </div>
      <div class="text-center">
        <img src="{{ asset('images/facebook-logo.png') }}" class="h-12 mx-auto mb-2" alt="Facebook">
        <p class="text-sm">Facebook</p>
      </div>
      <!-- Ajoutez d'autres logos -->
    </div>
  </div>

  <div id="suppliers-section" class="hidden-section bg-white p-8 rounded-lg shadow-lg mb-8">
    <h2 class="text-2xl font-bold mb-4">Fournisseurs</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
      <div class="text-center">
        <img src="{{ asset('images/aliexpress-logo.png') }}" class="h-12 mx-auto mb-2" alt="AliExpress">
        <p class="text-sm">AliExpress</p>
      </div>
      <div class="text-center">
        <img src="{{ asset('images/banggood-logo.png') }}" class="h-12 mx-auto mb-2" alt="Banggood">
        <p class="text-sm">Banggood</p>
      </div>
    </div>
  </div>

  <div id="resources-section" class="hidden-section bg-white p-8 rounded-lg shadow-lg mb-8">
    <h2 class="text-2xl font-bold mb-4">Ressources</h2>
    <ul class="list-disc list-inside space-y-2">
      <li><a href="#" class="text-blue-600 hover:underline">Blog</a></li>
      <li><a href="#" class="text-blue-600 hover:underline">Help Center</a></li>
      <li><a href="#" class="text-blue-600 hover:underline">API Docs</a></li>
    </ul>
  </div>

  <div id="pricing-section" class="bg-gray-50 p-8 rounded-lg shadow-lg mb-8">
    <h2 class="text-2xl font-bold mb-4">Tarification</h2>
    <p>Plans, comparatifs, avantages de chaque offre.</p>
  </div>
@endsection

@push('scripts')
  <script>console.log('Page Welcome chargée avec succès');</script>
@endpush
