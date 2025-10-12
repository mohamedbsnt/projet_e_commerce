@extends('layouts.app')

@section('title', '6 Exemples Business E-Commerce Et Comment Commencer')
@section('description', 'Découvrez 6 exemples de business e-commerce et trouvez les meilleures plateformes pour démarrer votre activité en ligne.')

@section('content')
<div class="container px-6 py-8 mx-auto">
    
    <!-- Breadcrumb -->
    <nav class="mb-8 text-sm text-gray-500 breadcrumb">
        <a href="#" class="hover:text-brand-orange hover:underline">Blog E-Commerce</a>
        <span class="mx-2">›</span>
        <a href="#" class="hover:text-brand-orange hover:underline">Conseils & Stratégies E-Commerce</a>
    </nav>

    <!-- Article principal avec proportions AutoDS -->
    <div class="flex flex-col lg:flex-row gap-8 mb-16 bg-[#ffd3d3] p-8 rounded-lg">
        <!-- Contenu texte - Réduit à 40% -->
        <div class="lg:w-2/5">
            <h1 class="mb-6 text-4xl font-bold leading-tight text-gray-900 lg:text-5xl">
                6 Exemples Business E-Commerce Et Comment Commencer
            </h1>
            
            <p class="mb-6 text-lg leading-relaxed text-gray-600">
                Vous voulez vous lancer dans l'e-commerce ? Découvrez six exemples de business e-commerce et trouvez les meilleures plateformes pour démarrer votre activité ici.
            </p>
            
            <p class="mb-6 text-sm text-gray-500">13 minutes de lecture</p>
            
            <a href="#" class="inline-flex items-center mb-8 text-sm text-brand-orange hover:text-orange-700 hover:underline">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                </svg>
                Copier le lien de cette page
            </a>
        </div>

        <!-- Image principale - Agrandie à 60% -->
        <div class="lg:w-3/5">
            <img 
                src="{{ asset('images/ecommerce-hero.jpg') }}" 
                alt="6S Exemples Business E-Commerce" 
                class="w-full h-96 lg:h-[500px] object-cover rounded-lg shadow-lg"
                loading="lazy"
            >
        </div>
    </div>

    <!-- Sections dynamiques -->
    <!-- Onglets de navigation -->
    <!-- Section Pourquoi nous -->
    <section id="why-section" class="p-8 mb-8 bg-white shadow-lg hidden-section rounded-xl">
        <div class="prose max-w-none">
            <h2 class="mb-6 text-3xl font-bold text-gray-900">Pourquoi choisir notre plateforme ?</h2>
            
            <div class="grid gap-8 mb-8 md:grid-cols-2">
                <div class="space-y-4">
                    <div class="flex items-start space-x-4">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-green-100 rounded-full">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Recherche de produits</h3>
                            <p class="text-gray-600">Découvrez des produits gagnants grâce à nos outils de recherche avancés</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Automatisation IA</h3>
                            <p class="text-gray-600">Automatisez vos processus avec notre IA intégrée</p>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-start space-x-4">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-purple-100 rounded-full">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 7.172V5L8 4z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Gestion de l'inventaire</h3>
                            <p class="text-gray-600">Surveillez et optimisez votre stock en temps réel</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start space-x-4">
                        <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-orange-100 rounded-full">
                            <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900">Optimisation des prix</h3>
                            <p class="text-gray-600">Maximisez vos profits avec notre système de tarification dynamique</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Intégrations -->
    <section id="integrations-section" class="p-8 mb-8 bg-white shadow-lg hidden-section rounded-xl">
        <h2 class="mb-8 text-3xl font-bold text-center text-gray-900">Intégrations compatibles</h2>
        
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
    </section>

    <!-- Section Fournisseurs -->
    <section id="suppliers-section" class="p-8 mb-8 bg-white shadow-lg hidden-section rounded-xl">
        <h2 class="mb-8 text-3xl font-bold text-gray-900">Nos fournisseurs de confiance</h2>
        
        <div class="grid gap-8 mb-8 md:grid-cols-2">
            <!-- Fournisseurs à gauche -->
            <div>
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                        <img src="{{ asset('images/suppliers/aliexpress.png') }}" alt="AliExpress" class="w-8 h-8">
                        <span class="font-medium">AliExpress</span>
                    </div>
                    <div class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                        <img src="{{ asset('images/suppliers/banggood.png') }}" alt="Banggood" class="w-8 h-8">
                        <span class="font-medium">Banggood</span>
                    </div>
                    <div class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                        <img src="{{ asset('images/suppliers/costway.png') }}" alt="Costway" class="w-8 h-8">
                        <span class="font-medium">Costway</span>
                    </div>
                    <div class="flex items-center p-4 space-x-3 transition-shadow border rounded-lg hover:shadow-md">
                        <img src="{{ asset('images/suppliers/walmart.png') }}" alt="Walmart" class="w-8 h-8">
                        <span class="font-medium">Walmart</span>
                    </div>
                </div>
                
                <div class="p-6 rounded-lg bg-gray-50">
                    <h3 class="mb-2 font-semibold text-gray-900">Nos fournisseurs supportés</h3>
                    <p class="text-sm text-gray-600">
                        Parcourez les produits tendance de nos fournisseurs de confiance et partenaires mondiaux.
                    </p>
                </div>
            </div>
            
            <!-- Info à droite -->
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
    </section>

    <!-- Section Ressources -->
    <section id="resources-section" class="p-8 mb-8 bg-white shadow-lg hidden-section rounded-xl">
        <h2 class="mb-8 text-3xl font-bold text-gray-900">Ressources et Documentation</h2>
        
        <div class="grid gap-8 md:grid-cols-3">
            <div class="p-6 rounded-lg bg-gradient-to-br from-blue-50 to-blue-100">
                <div class="flex items-center justify-center w-12 h-12 mb-4 bg-blue-600 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                </div>
                <h3 class="mb-2 font-semibold text-gray-900">Documentation</h3>
                <p class="mb-4 text-sm text-gray-600">Guides complets et références API</p>
                <a href="#" class="text-sm font-medium text-blue-600 hover:underline">Consulter →</a>
            </div>
            
            <div class="p-6 rounded-lg bg-gradient-to-br from-green-50 to-green-100">
                <div class="flex items-center justify-center w-12 h-12 mb-4 bg-green-600 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <h3 class="mb-2 font-semibold text-gray-900">Centre d'aide</h3>
                <p class="mb-4 text-sm text-gray-600">Support technique et FAQ</p>
                <a href="#" class="text-sm font-medium text-green-600 hover:underline">Accéder →</a>
            </div>
            
            <div class="p-6 rounded-lg bg-gradient-to-br from-purple-50 to-purple-100">
                <div class="flex items-center justify-center w-12 h-12 mb-4 bg-purple-600 rounded-lg">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                </div>
                <h3 class="mb-2 font-semibold text-gray-900">Blog</h3>
                <p class="mb-4 text-sm text-gray-600">Actualités et conseils e-commerce</p>
                <a href="#" class="text-sm font-medium text-purple-600 hover:underline">Lire →</a>
            </div>
        </div>
    </section>

    <!-- Section Tarifs -->
    <section id="pricing-section" class="p-8 mb-8 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl">
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900">Choisissez votre plan</h2>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Démarrez gratuitement et montez en gamme selon vos besoins. Tous les plans incluent notre support premium.
            </p>
        </div>
        
        <div class="grid max-w-5xl gap-8 mx-auto md:grid-cols-3">
            <!-- Plan Starter -->
            <div class="p-8 bg-white border shadow-lg rounded-xl">
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-semibold text-gray-900">Starter</h3>
                    <div class="text-3xl font-bold text-gray-900">Gratuit</div>
                    <p class="mt-2 text-gray-600">Pour débuter</p>
                </div>
                <ul class="mb-8 space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Jusqu'à 25 produits
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        1 intégration
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support email
                    </li>
                </ul>
                <button class="w-full btn-secondary">
                    Commencer gratuitement
                </button>
            </div>

            <!-- Plan Pro -->
            <div class="relative p-8 bg-white border-2 shadow-xl rounded-xl border-brand-pink">
                <div class="absolute transform -translate-x-1/2 -top-4 left-1/2">
                    <span class="px-4 py-1 text-sm font-medium text-white rounded-full bg-brand-pink">
                        Plus populaire
                    </span>
                </div>
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-semibold text-gray-900">Pro</h3>
                    <div class="text-3xl font-bold text-gray-900">29€<span class="text-lg font-normal text-gray-600">/mois</span></div>
                    <p class="mt-2 text-gray-600">Pour les entrepreneurs</p>
                </div>
                <ul class="mb-8 space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Jusqu'à 2,500 produits
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Intégrations illimitées
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support prioritaire
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Automatisation avancée
                    </li>
                </ul>
                <button class="w-full btn-primary">
                    Essayer Pro
                </button>
            </div>

            <!-- Plan Enterprise -->
            <div class="p-8 bg-white border shadow-lg rounded-xl">
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-semibold text-gray-900">Enterprise</h3>
                    <div class="text-3xl font-bold text-gray-900">Sur mesure</div>
                    <p class="mt-2 text-gray-600">Pour les grandes entreprises</p>
                </div>
                <ul class="mb-8 space-y-3">
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Produits illimités
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        API dédiée
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support 24/7
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Manager dédié
                    </li>
                </ul>
                <button class="w-full btn-secondary">
                    Nous contacter
                </button>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animation d'apparition des sections
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
    
    document.querySelectorAll('.card-hover').forEach(el => {
        observer.observe(el);
        el.classList.add('opacity-0', 'translate-y-4', 'transition-all', 'duration-700');
    });
});
</script>

@endpush
