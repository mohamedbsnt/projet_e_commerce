{{--
    Fichier: resources/views/partials/product_card_shop.blade.php
    Version: FINALE ET CORRIGÉE
    Description: Affiche UNE SEULE carte produit avec le style "Furniro".
    Contient la correction pour le dimensionnement des images.
--}}

<div class="relative flex flex-col text-left bg-gray-100 group">
    
    {{-- Conteneur de l'image --}}
    {{-- La classe 'aspect-square' force un ratio 1:1 (carré), ce qui garantit une grille uniforme et des images "petites". --}}
    <div class="relative overflow-hidden aspect-square">
        <a href="{{ $product['product_url'] ?? '#' }}" target="_blank" rel="noopener noreferrer" aria-label="Voir les détails pour {{ $product['title'] ?? 'Produit' }}">
            
            {{-- L'IMAGE --}}
            {{-- CORRECTION CRUCIALE : Ces classes forcent l'image à remplir son conteneur sans se déformer. --}}
            <img src="{{ $product['image_url'] ?? 'https://via.placeholder.com/400' }}" 
                 alt="Image de {{ $product['title'] ?? 'Produit' }}" 
                 class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105">
        </a>
        
        {{-- Badges (Nouveau / Promo ) --}}
        <div class="absolute top-4 right-4">
            @if(isset($product['is_new']) && $product['is_new'])
                <div class="flex items-center justify-center w-12 h-12 text-white bg-green-400 rounded-full">
                    <span class="text-sm font-semibold">New</span>
                </div>
            @elseif(isset($product['discount']) && $product['discount'])
                <div class="flex items-center justify-center w-12 h-12 font-semibold text-white bg-red-400 rounded-full">
                    {{ $product['discount'] }}
                </div>
            @endif
        </div>

        {{-- Actions qui apparaissent au survol --}}
        <div class="absolute inset-0 flex flex-col items-center justify-center p-4 space-y-4 transition-opacity duration-300 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100">
            <button class="w-4/5 px-4 py-3 font-semibold bg-white text-brand-primary hover:bg-gray-200">
                Add to cart
            </button>
            <div class="flex space-x-6 text-sm font-semibold text-white">
                <button class="flex items-center space-x-1 hover:underline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684z"></path></svg>
                    <span>Share</span>
                </button>
                <button class="flex items-center space-x-1 hover:underline">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <span>Like</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Informations sous l'image --}}
    <div class="p-4 bg-gray-100">
        <h3 class="text-2xl font-semibold text-brand-gray-1">{{ $product['title'] ?? 'Titre du produit' }}</h3>
        <p class="mt-1 text-gray-500">{{ $product['category'] ?? 'Catégorie' }}</p>
        <div class="flex items-baseline mt-3 space-x-3">
            <p class="text-xl font-bold text-brand-gray-1">{{ $product['price'] ?? 'N/A' }}</p>
            @if(isset($product['old_price']) && $product['old_price'])
                <p class="text-base text-gray-400 line-through">{{ $product['old_price'] }}</p>
            @endif
        </div>
    </div>
</div>
