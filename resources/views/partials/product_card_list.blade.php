{{--
    Fichier : resources/views/partials/product_card_compact_list.blade.php
    Description : Affiche une liste de cartes produits dans un format compact et moderne,
    optimisé pour des grilles denses.
--}}
@foreach($products as $product)
<div class="flex flex-col overflow-hidden bg-white border border-gray-200 shadow-sm group rounded-xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-1.5">
    
    {{-- Section de l'image --}}
    <div class="relative overflow-hidden aspect-square">
        <a href="{{ $product['product_url'] }}" target="_blank" rel="noopener noreferrer" class="block w-full h-full">
            <img src="{{ $product['image_url'] }}" 
                 alt="Image de couverture pour {{ $product['title'] }}" 
                 class="object-cover w-full h-full transition-transform duration-500 ease-in-out group-hover:scale-110">
        </a>
        {{-- Badge de catégorie (discret, en haut à droite) --}}
        <div class="absolute px-2 py-1 text-xs font-bold text-white rounded-full top-3 right-3 bg-black/50 backdrop-blur-sm">
            {{ $product['category'] }}
        </div>
    </div>
    
    {{-- Section du contenu textuel --}}
    <div class="flex flex-col flex-grow p-4">
        
        {{-- Titre du produit (limité à 2 lignes) --}}
        <h3 class="flex-grow h-12 text-base font-bold text-gray-900">
            <a href="{{ $product['product_url'] }}" target="_blank" rel="noopener noreferrer" class="transition-colors hover:text-brand-orange">
                {{-- \Illuminate\Support\Str::limit est parfait pour couper proprement un texte long --}}
                {{ \Illuminate\Support\Str::limit($product['title'], 55) }}
            </a>
        </h3>
        
        {{-- Ligne de séparation subtile --}}
        <hr class="my-3 border-gray-100">

        {{-- Pied de la carte : Prix et bouton d'action --}}
        <div class="flex items-center justify-between">
            <span class="text-lg font-black text-gray-900">
                {{-- Logique pour afficher "Gratuit" de manière plus visible --}}
                @if(strtolower($product['price']) === 'gratuit')
                    <span class="text-green-600">Gratuit</span>
                @else
                    {{ $product['price'] }}
                @endif
            </span>
            
            {{-- Bouton d'action avec icône --}}
            <a href="{{ $product['product_url'] }}" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="p-2.5 text-white transition-all duration-300 bg-brand-orange rounded-full group-hover:bg-orange-500 group-hover:scale-110"
               aria-label="Voir le produit sur TPT">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m5-7H3"></path>
                </svg>
            </a>
        </div>
    </div>
</div>
@endforeach

