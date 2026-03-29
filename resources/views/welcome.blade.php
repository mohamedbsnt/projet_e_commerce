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
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:italic,wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
    .font-serif { font-family: 'Playfair Display', serif; }
    .font-sans { font-family: 'Plus Jakarta Sans', sans-serif; }
    .card-hover:hover { transform: translateY(-10px ); transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1); }
    </style>

    <!-- Article principal / Hero Section -->
    <div class="flex flex-col lg:flex-row gap-8 mb-16 bg-[#ffd3d3] p-8 rounded-3xl shadow-sm">
        <!-- Contenu texte -->
        <div class="flex flex-col justify-center lg:w-2/5">
            <h1 class="mb-6 text-4xl font-extrabold leading-tight text-gray-900 lg:text-5xl">
                6 Exemples Business E-Commerce Et Comment Commencer
            </h1>
            
            <p class="mb-6 text-lg leading-relaxed text-gray-700">
                Vous voulez vous lancer dans l'e-commerce ? Découvrez six exemples de business e-commerce et trouvez les meilleures plateformes pour démarrer votre activité ici.
            </p>
            
            <div class="flex items-center mb-8 space-x-4">
                <span class="px-3 py-1 text-xs font-bold tracking-wider text-white uppercase rounded-full bg-brand-orange">Nouveau</span>
                <p class="text-sm font-medium text-gray-500">13 minutes de lecture</p>
            </div>
            
            <button onclick="copyToClipboard()" class="inline-flex items-center self-start px-4 py-2 text-sm font-semibold transition-colors bg-white border border-orange-100 rounded-lg shadow-sm text-brand-orange hover:bg-orange-50">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                </svg>
                Partager cet article
            </button>
        </div>

        <!-- Image principale -->
        <div class="lg:w-3/5">
            <img 
                src="https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?q=80&w=2070" 
                alt="6 Exemples Business E-Commerce" 
                class="w-full h-96 lg:h-[500px] object-cover rounded-2xl shadow-xl border-4 border-white"
                loading="lazy"
            >
        </div>
    </div>

    {{-- SECTION DES PRODUITS --}}
    <section class="px-4 py-24 bg-white sm:px-6 lg:px-8">
        <div class="container mx-auto">
            
            {{-- Titre de la section --}}
            <div class="mb-16 text-center">
                <h2 class="text-5xl font-bold text-[#3A3A3A]">Our Products</h2>
                <div class="w-24 h-1 mx-auto mt-4 rounded-full bg-brand-primary"></div>
            </div>
    
            {{-- Grille de produits --}}
            @if(isset($showcaseProducts) && $showcaseProducts->isNotEmpty())
                <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($showcaseProducts as $product)
                    
                        @include('components.product_card_showcase', ['product' => $product])
                    @endforeach
                </div>
            @else
                <div class="py-20 text-center bg-gray-50 rounded-3xl">
                    <p class="text-xl text-gray-500">Aucun produit à afficher pour le moment.</p>
                    
                </div>
            @endif
    
            {{-- Bouton "Show More" --}}
            <div class="mt-20 text-center">
                <a href="{{ route('products.index') }}" class="inline-block px-16 py-4 font-bold transition-all transform border-2 shadow-lg text-brand-primary border-brand-primary hover:bg-brand-primary hover:text-white hover:-translate-y-1 hover:shadow-brand-primary/20">
                    Show More
                </a>
            </div>
    
        </div>
    </section>


        {{-- ===================================================================== --}}
    {{-- NOUVELLE SECTION PRODUITS - AJOUTÉE COMME DEMANDÉ --}}
    {{-- ===================================================================== --}}
    <section class="py-24 bg-white">
        <div class="container mx-auto">
            <div class="flex items-center justify-between mb-12">
                <h2 class="text-4xl font-bold text-gray-800">You might also like</h2>
                <div class="flex items-center gap-4">
                    <button class="p-3 text-gray-600 transition-colors bg-gray-100 rounded-full prev-btn hover:bg-brand-primary hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button class="p-3 text-gray-600 transition-colors bg-gray-100 rounded-full next-btn hover:bg-brand-primary hover:text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>

            @isset($showcaseProducts )
                @if($showcaseProducts->isNotEmpty())
                    <!-- Swiper Carrousel -->
                    <div class="swiper product-swiper">
                        <div class="swiper-wrapper">
                            @foreach($showcaseProducts as $product)
                                <div class="swiper-slide">
                                    {{-- On inclut le composant de carte produit que vous avez déjà --}}
                                    @include('components.product_card_showcase', ['product' => $product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="py-20 text-center bg-gray-50 rounded-3xl">
                        <p class="text-xl text-gray-500">Aucun produit à afficher pour le moment.</p>
                    </div>
                @endif
            @else
                <div class="py-20 text-center border border-yellow-200 bg-yellow-50 rounded-3xl">
                    <p class="text-xl text-yellow-700">Note pour le développeur : La variable '$showcaseProducts' n'est pas définie.</p>
                </div>
            @endisset
        </div>
    </section>
    <section class="py-24 bg-[#FDFDFD] font-sans">
        <div class="px-6 mx-auto max-w-7xl">
            <!-- Header de la section -->
            <div class="flex flex-col items-end justify-between mb-16 md:flex-row" data-aos="fade-up">
                <div class="max-w-2xl">
                    <div class="flex items-center mb-4 space-x-3">
                        <span class="px-3 py-1 bg-brand-primary/10 text-brand-primary text-[10px] font-bold uppercase tracking-widest rounded-full">Nouveau</span>
                        <span class="text-xs text-gray-400">13 minutes de lecture</span>
                    </div>
                    <h2 class="mb-6 font-serif text-5xl leading-tight md:text-6xl">
                        6 Exemples Business E-Commerce   
    
                        <span class="italic text-gray-400">& Comment Commencer</span>
                    </h2>
                    <p class="text-lg leading-relaxed text-gray-500">
                        Vous voulez vous lancer dans l'e-commerce ? Découvrez nos études de cas et trouvez les meilleures plateformes pour démarrer votre activité ici.
                    </p>
                </div>
                <button class="flex items-center pb-1 mt-8 space-x-2 text-sm font-bold transition-all border-b-2 border-black md:mt-0 hover:text-brand-primary hover:border-brand-primary">
                    <span>PARTAGER L'ARTICLE</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
                </button>
            </div>
    
            <!-- Grille de services/exemples -->
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Card 1: B2C Business -->
                <div class="group card-hover bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500">
                    <div class="flex items-center justify-center w-16 h-16 mb-8 transition-colors duration-500 bg-brand-primary/5 rounded-2xl group-hover:bg-brand-primary group-hover:text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <h3 class="mb-4 font-serif text-2xl">Modèle B2C Direct</h3>
                    <p class="mb-8 text-sm leading-relaxed text-gray-500">Vendez directement vos produits éducatifs aux parents et enseignants avec une marge optimisée.</p>
                    <a href="#" class="flex items-center text-xs font-bold tracking-widest uppercase group-hover:text-brand-primary">
                        Découvrir <svg class="w-4 h-4 ml-2 transition-transform transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
    
                <!-- Card 2: Dropshipping -->
                <div class="group card-hover bg-black p-10 rounded-[2.5rem] text-white shadow-xl transition-all duration-500">
                    <div class="flex items-center justify-center w-16 h-16 mb-8 transition-colors duration-500 bg-white/10 rounded-2xl group-hover:bg-brand-primary">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="mb-4 font-serif text-2xl">Dropshipping Global</h3>
                    <p class="mb-8 text-sm leading-relaxed text-gray-400">Intégrez AliExpress ou Walmart sans stock physique et automatisez vos commandes.</p>
                    <a href="#" class="flex items-center text-xs font-bold tracking-widest uppercase text-brand-primary">
                        En savoir plus <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
    
                <!-- Card 3: Abonnement -->
                <div class="group card-hover bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-2xl transition-all duration-500">
                    <div class="flex items-center justify-center w-16 h-16 mb-8 transition-colors duration-500 bg-brand-primary/5 rounded-2xl group-hover:bg-brand-primary group-hover:text-white">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="mb-4 font-serif text-2xl">Modèle par Abonnement</h3>
                    <p class="mb-8 text-sm leading-relaxed text-gray-500">Créez des revenus récurrents en proposant des ressources mensuelles exclusives.</p>
                    <a href="#" class="flex items-center text-xs font-bold tracking-widest uppercase group-hover:text-brand-primary">
                        Explorer <svg class="w-4 h-4 ml-2 transition-transform transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Section Tarifs -->
    <section id="pricing-section" class="px-8 py-20 mb-8 shadow-inner bg-gradient-to-br from-gray-50 to-gray-100 rounded-3xl">
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-extrabold text-gray-900 lg:text-4xl">Choisissez votre plan</h2>
            <div class="w-24 h-1.5 mb-6 mx-auto rounded-full bg-brand-orange"></div>
            <p class="max-w-2xl mx-auto text-lg text-gray-600">
                Démarrez gratuitement et montez en gamme selon vos besoins. Tous les plans incluent notre support premium.
            </p>
        </div>
        
        <div class="grid max-w-6xl gap-8 mx-auto md:grid-cols-3">
            <!-- Plan Starter -->
            <div class="p-8 transition-shadow bg-white border border-gray-100 shadow-sm rounded-2xl hover:shadow-md">
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Starter</h3>
                    <div class="text-4xl font-black text-gray-900">Gratuit</div>
                    <p class="mt-2 font-medium text-gray-500">Pour débuter</p>
                </div>
                <ul class="mb-8 space-y-4">
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Jusqu'à 25 produits
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        1 intégration
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support email
                    </li>
                </ul>
                <button class="w-full px-6 py-3 font-bold text-gray-700 transition-colors bg-gray-100 rounded-xl hover:bg-gray-200">
                    Commencer gratuitement
                </button>
            </div>

            <!-- Plan Pro -->
            <div class="relative z-10 p-8 transform bg-white border-2 shadow-xl border-brand-orange rounded-2xl lg:scale-105">
                <div class="absolute transform -translate-x-1/2 -top-5 left-1/2">
                    <span class="px-6 py-1.5 text-xs font-black uppercase tracking-widest text-white rounded-full bg-brand-orange shadow-lg">
                        Plus populaire
                    </span>
                </div>
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Pro</h3>
                    <div class="text-4xl font-black text-gray-900">29€<span class="text-lg font-normal text-gray-500">/mois</span></div>
                    <p class="mt-2 font-medium text-gray-500">Pour les entrepreneurs</p>
                </div>
                <ul class="mb-8 space-y-4">
                    <li class="flex items-center font-medium text-gray-700">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Jusqu'à 2,500 produits
                    </li>
                    <li class="flex items-center font-medium text-gray-700">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Intégrations illimitées
                    </li>
                    <li class="flex items-center font-medium text-gray-700">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support prioritaire
                    </li>
                    <li class="flex items-center font-medium text-gray-700">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Automatisation avancée
                    </li>
                </ul>
                <button class="w-full px-6 py-3 font-bold text-white transition-all shadow-lg bg-brand-orange rounded-xl hover:bg-orange-600 shadow-orange-200">
                    Essayer Pro
                </button>
            </div>

            <!-- Plan Enterprise -->
            <div class="p-8 transition-shadow bg-white border border-gray-100 shadow-sm rounded-2xl hover:shadow-md">
                <div class="mb-6 text-center">
                    <h3 class="mb-2 text-xl font-bold text-gray-900">Enterprise</h3>
                    <div class="text-4xl font-black text-gray-900">Sur mesure</div>
                    <p class="mt-2 font-medium text-gray-500">Pour les grandes entreprises</p>
                </div>
                <ul class="mb-8 space-y-4">
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Produits illimités
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        API dédiée
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Support 24/7
                    </li>
                </ul>
                <button class="w-full px-6 py-3 font-bold text-gray-700 transition-colors bg-gray-100 rounded-xl hover:bg-gray-200">
                    Nous contacter
                </button>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white border-t border-gray-50">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="grid items-center grid-cols-1 gap-20 md:grid-cols-2">
                <!-- Image Style Dribbble (Asymétrique) -->
                <div class="relative" data-aos="fade-right">
                    <div class="aspect-[4/5] bg-gray-100 rounded-[3rem] overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=2070" class="object-cover w-full h-full transition-all duration-1000 grayscale hover:grayscale-0" alt="Service">
                    </div>
                    <div class="absolute -bottom-10 -right-10 bg-brand-primary p-12 rounded-[2rem] text-white hidden md:block">
                        <p class="font-serif text-4xl italic">100%</p>
                        <p class="text-xs tracking-widest uppercase opacity-80">Support Client</p>
                    </div>
                </div>
    
                <!-- Texte -->
                <div data-aos="fade-left">
                    <span class="text-brand-primary font-bold text-xs tracking-[0.3em] uppercase mb-6 block">Services de Qualité</span>
                    <h2 class="mb-8 font-serif text-5xl leading-tight">Nous donnons vie à votre vision éducative.</h2>
                    
                    <div class="space-y-10">
                        <div class="flex space-x-6">
                            <div class="flex-shrink-0 font-serif text-2xl italic text-gray-300">01</div>
                            <div>
                                <h4 class="mb-2 text-xl font-bold">Sourcing Éthique</h4>
                                <p class="text-sm leading-relaxed text-gray-500">Nous travaillons main dans la main avec AliExpress et Walmart pour vous garantir les meilleurs prix sans compromis.</p>
                            </div>
                        </div>
                        <div class="flex space-x-6">
                            <div class="flex-shrink-0 font-serif text-2xl italic text-gray-300">02</div>
                            <div>
                                <h4 class="mb-2 text-xl font-bold">Design sur Mesure</h4>
                                <p class="text-sm leading-relaxed text-gray-500">Chaque ressource est testée et validée par notre équipe créative pour un rendu professionnel.</p>
                            </div>
                        </div>
                    </div>
    
                    <button class="px-10 py-5 mt-12 text-sm font-bold text-white transition-all duration-500 transform bg-black rounded-full hover:bg-brand-primary hover:scale-105">
                        DÉCOUVRIR TOUS NOS SERVICES
                    </button>
                </div>
            </div>
        </div>
    </section>
    

</div>
@endsection

@push('scripts')
<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Lien copié dans le presse-papier !');
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Animation d'apparition des éléments
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-10');
            }
        });
    }, observerOptions);
    
    // On observe les cartes et les sections
    document.querySelectorAll('.product-card, section').forEach(el => {
        el.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-700', 'ease-out');
        observer.observe(el);
    });
});
</script>
@endpush