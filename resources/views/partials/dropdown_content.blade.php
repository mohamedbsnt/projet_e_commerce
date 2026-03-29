{{-- resources/views/partials/dropdown_content.blade.php --}}

{{-- WHY / POURQUOI NOUS - RESTRUCTURÉ AVEC 4 SUBSECTIONS --}}
<div id="why" class="hidden dropdown-panel">
    <div class="container px-6 py-8 mx-auto">
        <div class="grid gap-10 md:grid-cols-3">

            {{-- COLONNE 1 : LES 4 SUBSECTIONS --}}
            <div class="space-y-3">
                {{-- 1. Optimisation Grilles --}}
                <button
                    type="button"
                    onclick="toggleWhySubsection('optimization-grilles')"
                    class="flex items-start w-full p-4 space-x-3 text-left transition-all duration-200 bg-white border border-transparent rounded-lg cursor-pointer hover:bg-blue-50 hover:border-blue-200 hover:shadow-sm why-subsection"
                    data-subsection="optimization-grilles"
                >
                    <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full">
                        <span class="text-sm">⚙️</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-900">Optimisation Grilles</h3>
                        <p class="mt-1 text-xs text-gray-600">
                            Algorithmes avancés d'optimisation
                        </p>
                    </div>
                </button>

                {{-- 2. Traitements Images --}}
                <button
                    type="button"
                    onclick="toggleWhySubsection('traitements-images')"
                    class="flex items-start w-full p-4 space-x-3 text-left transition-all duration-200 bg-white border border-transparent rounded-lg cursor-pointer hover:bg-green-50 hover:border-green-200 hover:shadow-sm why-subsection"
                    data-subsection="traitements-images"
                >
                    <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-full">
                        <span class="text-sm">🖼️</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-900">Traitements Images</h3>
                        <p class="mt-1 text-xs text-gray-600">
                            Filtres et transformations avancées
                        </p>
                    </div>
                </button>

                {{-- 3. Détection Images --}}
                <button
                    type="button"
                    onclick="toggleWhySubsection('detection-images')"
                    class="flex items-start w-full p-4 space-x-3 text-left transition-all duration-200 bg-white border border-transparent rounded-lg cursor-pointer hover:bg-purple-50 hover:border-purple-200 hover:shadow-sm why-subsection"
                    data-subsection="detection-images"
                >
                    <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full">
                        <span class="text-sm">🎯</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-900">Détection Images</h3>
                        <p class="mt-1 text-xs text-gray-600">
                            Modèles de deep learning
                        </p>
                    </div>
                </button>

                {{-- 4. Segmentation Images --}}
                <button
                    type="button"
                    onclick="toggleWhySubsection('segmentation-images')"
                    class="flex items-start w-full p-4 space-x-3 text-left transition-all duration-200 bg-white border border-transparent rounded-lg cursor-pointer hover:bg-orange-50 hover:border-orange-200 hover:shadow-sm why-subsection"
                    data-subsection="segmentation-images"
                >
                    <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full">
                        <span class="text-sm">🔍</span>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-gray-900">Segmentation Images</h3>
                        <p class="mt-1 text-xs text-gray-600">
                            Analyse pixel par pixel
                        </p>
                    </div>
                </button>
            </div>

            {{-- COLONNE 2+3 : CONTENU DES SUBSECTIONS --}}
            <div class="space-y-6 md:col-span-2">

                {{-- 1. OPTIMISATION GRILLES --}}
                <div id="why-subsection-optimization-grilles" class="hidden why-subsection-content">
                    <div class="p-6 border border-blue-200 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100">
                        <div class="flex items-center mb-4 space-x-3">
                            <div class="flex items-center justify-center w-10 h-10 bg-blue-600 rounded-lg">
                                <span class="text-lg">⚙️</span>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">Optimisation Grilles</h2>
                        </div>
                        <p class="mb-4 text-sm text-gray-700">
                            Techniques META-HEURISTIQUES pour l'optimisation spatiale avancée.
                        </p>
                        <ul class="grid grid-cols-2 gap-3">
                            {{-- Algorithmes Génétiques -> LIEN CLIQUABLE --}}
                            <li>
                                <a href="{{ route('ai-shopify-store') }}"
                                   class="flex items-center p-3 space-x-2 transition bg-white border border-blue-100 rounded-lg hover:bg-blue-50 hover:border-blue-300">
                                    <span class="text-blue-600">✓</span>
                                    <span class="text-sm font-medium text-gray-900">Algorithmes Génétiques</span>
                                </a>
                            </li>
                        
                            <li class="flex items-center p-3 space-x-2 bg-white border border-blue-100 rounded-lg">
                                <span class="text-blue-600">✓</span>
                                <span class="text-sm font-medium text-gray-900">Recuit Simulé</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-blue-100 rounded-lg">
                                <span class="text-blue-600">✓</span>
                                <span class="text-sm font-medium text-gray-900">Recherche Tabou</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-blue-100 rounded-lg">
                                <span class="text-blue-600">✓</span>
                                <span class="text-sm font-medium text-gray-900">PSO (Particle Swarm)</span>
                            </li>
                        </ul>                        
                    </div>
                </div>

                {{-- 2. TRAITEMENTS IMAGES (SOUS-SOUS-SECTIONS EN 2 COLONNES) --}}
                <div id="why-subsection-traitements-images" class="hidden why-subsection-content">
                    <div class="p-6 border border-green-200 rounded-xl bg-gradient-to-br from-green-50 to-green-100">
                        <div class="flex items-center mb-4 space-x-3">
                            <div class="flex items-center justify-center w-10 h-10 bg-green-600 rounded-lg">
                                <span class="text-lg">🖼️</span>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">Traitements Images</h2>
                        </div>
                        <p class="mb-4 text-sm text-gray-700">
                            Filtres et transformations pour améliorer la qualité et les contrastes.
                        </p>
                        <ul class="grid grid-cols-2 gap-3">
                            <li class="flex items-center p-3 space-x-3 bg-white border border-green-100 rounded-lg">
                                <span class="text-green-600">→</span>
                                <span class="text-sm font-medium text-gray-900">Méthode détection de Canny</span>
                            </li>
                            <li class="flex items-center p-3 space-x-3 bg-white border border-green-100 rounded-lg">
                                <span class="text-green-600">→</span>
                                <span class="text-sm font-medium text-gray-900">CLAHE</span>
                            </li>
                            <li class="flex items-center p-3 space-x-3 bg-white border border-green-100 rounded-lg">
                                <span class="text-green-600">→</span>
                                <span class="text-sm font-medium text-gray-900">Filtre Gaussien</span>
                            </li>
                            <li class="flex items-center p-3 space-x-3 bg-white border border-green-100 rounded-lg">
                                <span class="text-green-600">→</span>
                                <span class="text-sm font-medium text-gray-900">Opérations morphologiques</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- 3. DÉTECTION IMAGES --}}
                <div id="why-subsection-detection-images" class="hidden why-subsection-content">
                    <div class="p-6 border border-purple-200 rounded-xl bg-gradient-to-br from-purple-50 to-purple-100">
                        <div class="flex items-center mb-4 space-x-3">
                            <div class="flex items-center justify-center w-10 h-10 bg-purple-600 rounded-lg">
                                <span class="text-lg">🎯</span>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">Détection Images (Deep Learning)</h2>
                        </div>
                        <p class="mb-4 text-sm text-gray-700">
                            Modèles neuraux avancés pour la détection d'objets et de parasites.
                        </p>
                        <ul class="grid grid-cols-2 gap-3">
                            <li class="flex items-center p-3 space-x-2 bg-white border border-purple-100 rounded-lg">
                                <span class="text-purple-600">▪</span>
                                <span class="text-sm font-medium text-gray-900">U-Net</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-purple-100 rounded-lg">
                                <span class="text-purple-600">▪</span>
                                <span class="text-sm font-medium text-gray-900">U-Net++</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-purple-100 rounded-lg">
                                <span class="text-purple-600">▪</span>
                                <span class="text-sm font-medium text-gray-900">V-Net</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-purple-100 rounded-lg">
                                <span class="text-purple-600">▪</span>
                                <span class="text-sm font-medium text-gray-900">V-Net++</span>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- 4. SEGMENTATION IMAGES --}}
                <div id="why-subsection-segmentation-images" class="hidden why-subsection-content">
                    <div class="p-6 border border-orange-200 rounded-xl bg-gradient-to-br from-orange-50 to-orange-100">
                        <div class="flex items-center mb-4 space-x-3">
                            <div class="flex items-center justify-center w-10 h-10 bg-orange-600 rounded-lg">
                                <span class="text-lg">🔍</span>
                            </div>
                            <h2 class="text-lg font-bold text-gray-900">Segmentation Instances (Mask R-CNN)</h2>
                        </div>
                        <p class="mb-4 text-sm text-gray-700">
                            Analyse granulaire : détection + segmentation pixel par pixel.
                        </p>
                        <ul class="grid grid-cols-2 gap-3">
                            <li class="flex items-center p-3 space-x-2 bg-white border border-orange-100 rounded-lg">
                                <span class="text-orange-600">◆</span>
                                <span class="text-sm font-medium text-gray-900">Faster R-CNN</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-orange-100 rounded-lg">
                                <span class="text-orange-600">◆</span>
                                <span class="text-sm font-medium text-gray-900">Mask R-CNN</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-orange-100 rounded-lg">
                                <span class="text-orange-600">◆</span>
                                <span class="text-sm font-medium text-gray-900">YOLOv8</span>
                            </li>
                            <li class="flex items-center p-3 space-x-2 bg-white border border-orange-100 rounded-lg">
                                <span class="text-orange-600">◆</span>
                                <span class="text-sm font-medium text-gray-900">YOLOv13</span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
{{-- STORE / BOUTIQUE --}}
<div id="store" class="hidden dropdown-panel">
    <div class="container px-6 py-8 mx-auto">
        <div class="grid gap-8 md:grid-cols-4">

            {{-- Produit Phare 1 --}}
            <a href="https://www.teacherspayteachers.com/Product/St-Patricks-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434" target="_blank" rel="noopener noreferrer" class="block p-4 transition-all duration-200 bg-white border border-transparent rounded-lg group hover:bg-gray-50 hover:border-gray-200 hover:shadow-sm">
                <img src="https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/St-Patrick-s-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434-1741562387/750f-13114434-1.jpg" alt="St. Patrick's Day Fun Pack" class="mb-3 rounded-md">
                <h3 class="font-semibold text-gray-900 group-hover:text-brand-orange">St. Patrick's Day Pack</h3>
                <p class="text-sm text-gray-600">Activités, jeux et puzzles.</p>
                <span class="text-sm font-bold text-green-600">Gratuit</span>
            </a>

            {{-- Produit Phare 2 --}}
            <a href="https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283" target="_blank" rel="noopener noreferrer" class="block p-4 transition-all duration-200 bg-white border border-transparent rounded-lg group hover:bg-gray-50 hover:border-gray-200 hover:shadow-sm">
                <img src="https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283-1752852811/750f-13987283-1.jpg" alt="Produit 2" class="mb-3 rounded-md">
                <h3 class="font-semibold text-gray-900 group-hover:text-brand-orange">Titre du Produit 2</h3>
                <p class="text-sm text-gray-600">Description courte.</p>
                <span class="text-sm font-bold text-brand-orange">4.99 €</span>
            </a>

            {{-- Produit Phare 3 --}}
            <a href="https://www.teacherspayteachers.com/Product/Groovy-Capybara-Valentines-Day-Cute-Animal-Valentine-for-Classroom-Crafts-15377933" target="_blank" rel="noopener noreferrer" class="block p-4 transition-all duration-200 bg-white border border-transparent rounded-lg group hover:bg-gray-50 hover:border-gray-200 hover:shadow-sm">
                <img src="https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/Groovy-Capybara-Valentine-s-Day-Cute-Animal-Valentine-for-Classroom-Crafts-15377933-1769403427/750f-15377933-1.jpg" alt="Produit 3" class="mb-3 rounded-md">
                <h3 class="font-semibold text-gray-900 group-hover:text-brand-orange">Titre du Produit 3</h3>
                <p class="text-sm text-gray-600">Description courte.</p>
                <span class="text-sm font-bold text-brand-orange">9.99 €</span>
            </a>

            {{-- Call to Action --}}
            <div class="flex flex-col items-center justify-center p-6 rounded-lg bg-gray-50">
                 <h3 class="mb-2 text-lg font-bold text-center text-gray-900">Explorez Tout</h3>
                 <p class="mb-4 text-sm text-center text-gray-600">Visitez notre boutique complète pour des dizaines d'autres ressources.</p>
                 <!-- Dans le dropdown "store" -->
         <a href="{{ route('products.index') }}" class="w-full text-center btn-primary">
          Voir tous les produits
         </a>

            </div>

        </div>
    </div>
</div>

{{-- INTEGRATIONS --}}
<div id="integrations" class="hidden dropdown-panel">
    <div class="container px-6 mx-auto">
        <div class="p-8 mb-8 bg-white rounded-xl">
            <div class="grid grid-cols-2 gap-8 mb-8 md:grid-cols-4">
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/shopify.png') }}" alt="Shopify" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">Shopify</p>
                </div>
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/facebook.jpg') }}" alt="Facebook" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">Facebook</p>
                </div>
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/etsy.png') }}" alt="Etsy" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">Etsy</p>
                </div>
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/woocommerce.png') }}" alt="WooCommerce" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">WooCommerce</p>
                </div>
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/ebay.png') }}" alt="eBay" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">eBay</p>
                </div>
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/amazon.png') }}" alt="Amazon" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">Amazon</p>
                </div>
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/wix.png') }}" alt="Wix" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">Wix</p>
                </div>
                <div class="p-4 text-center card-hover">
                    <img src="{{ asset('images/logos/tiktok.png') }}" alt="TikTok Shop" class="h-12 mx-auto mb-3">
                    <p class="font-medium text-gray-900">TikTok Shop</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SUPPLIERS --}}
<div id="suppliers" class="hidden dropdown-panel">
    <div class="container px-6 mx-auto">
        <div class="p-8 mb-8 bg-white rounded-xl">
            <h2 class="mb-8 text-3xl font-bold text-gray-900">Nos fournisseurs de confiance</h2>

            <div class="grid gap-8 mb-8 md:grid-cols-2">
                {{-- Fournisseurs à gauche --}}
                <div>
                    <div class="grid grid-cols-2 gap-6 mb-6">

                        <a href="{{ route('supplier.show', ['slug' => 'aliexpress']) }}"
                           class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                            <img src="{{ asset('images/suppliers/aliexpress.png') }}" class="w-8 h-8">
                            <span class="font-medium">AliExpress</span>
                        </a>
                    
                        <a href="#"
                           class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                            <img src="{{ asset('images/suppliers/banggood.png') }}" class="w-8 h-8">
                            <span class="font-medium">Banggood</span>
                        </a>
                    
                        <a href="#"
                           class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                            <img src="{{ asset('images/suppliers/costway.png') }}" class="w-8 h-8">
                            <span class="font-medium">Costway</span>
                        </a>
                    
                        <a href="#"
                           class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                            <img src="{{ asset('images/suppliers/walmart.png') }}" class="w-8 h-8">
                            <span class="font-medium">Walmart</span>
                        </a>
                    
                    </div>
                    
                </div>

                {{-- Info à droite --}}
                <div class="space-y-6">
                    <div class="p-6 rounded-lg bg-blue-50">
                        <div class="flex items-center mb-3 space-x-3">
                            <div class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full">
                                <span class="font-bold text-blue-600">€</span>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">PAYÉ</div>
                                <div class="text-lg font-bold">€ 1,899</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full">
                                <span class="font-bold text-gray-600">€</span>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">SUIVANT</div>
                                <div class="text-lg font-bold">€ 4,679</div>
                            </div>
                        </div>
                    </div>

                    <div class="p-6 rounded-lg bg-green-50">
                        <h3 class="mb-2 font-semibold text-gray-900">Devenir fournisseur</h3>
                        <p class="mb-4 text-sm text-gray-600">
                            Rejoignez-nous en tant que fournisseur et vendez à plus de 100,000 vendeurs.
                        </p>
                        <a href="#" class="text-sm font-medium text-green-600 hover:underline">
                            En savoir plus →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- RESOURCES --}}
<div id="resources" class="hidden dropdown-panel">
    <div class="container px-6 mx-auto">
        <div class="p-8 mb-8 bg-white rounded-xl">
            <h2 class="mb-8 text-3xl font-bold text-gray-900">Ressources et Documentation</h2>

            <div class="grid gap-8 md:grid-cols-3">
                <div class="p-6 rounded-lg bg-gradient-to-br from-blue-50 to-blue-100">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 bg-blue-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900">Documentation</h3>
                    <p class="mb-4 text-sm text-gray-600">Guides complets et références API</p>
                    
                    {{-- CORRECTION FINALE : On utilise la route 'documentation.index' que nous avons créée. --}}
                    <a href="{{ route('documentation.index') }}" class="text-sm font-medium text-blue-600 hover:underline">Consulter →</a>
                </div>

                <div class="p-6 rounded-lg bg-gradient-to-br from-green-50 to-green-100">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 bg-green-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900">Centre d'aide</h3>
                    <p class="mb-4 text-sm text-gray-600">Support technique et FAQ</p>
                    <a href="{{ route('help-center.index') }}" class="text-sm font-medium text-green-600 hover:underline">Accéder →</a>
                </div>

                <div class="p-6 rounded-lg bg-gradient-to-br from-purple-50 to-purple-100">
                    <div class="flex items-center justify-center w-12 h-12 mb-4 bg-purple-600 rounded-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 font-semibold text-gray-900">Blog</h3>
                    <p class="mb-4 text-sm text-gray-600">Actualités et conseils e-commerce</p>
                    <a href="{{ route('blog.index') }}" class="text-sm font-medium text-purple-600 hover:underline">Lire →</a>
                </div>
            </div>
        </div>
    </div>
</div>
