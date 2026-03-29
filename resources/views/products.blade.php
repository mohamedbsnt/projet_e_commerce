@extends('layouts.app')

@section('title', 'Shop - Furniro Premium Collection')

@section('content')

<style>
    /* Styles personnalisés pour les effets avancés */
    [x-cloak] { display: none !important; }

    /* 1. Indicateur de progression de lecture */
    #scroll-progress {
        position: fixed; top: 0; left: 0; width: 0%; height: 4px;
        background: linear-gradient(to right, #B88E2F, #e2c07d);
        z-index: 9999; transition: width 0.1s ease-out;
    }

    /* 2. Animation d'apparition des cartes de produits */
    .product-card { opacity: 0; transform: translateY(20px); transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1); }
    .product-card.show { opacity: 1; transform: translateY(0); }

    /* 3. Effet Glassmorphism pour le menu de filtre */
    .glass-dropdown {
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(184, 142, 47, 0.1);
    }

    /* 4. Style de pagination Furniro personnalisé */
    .furniro-pagination nav div:first-child { display: none !important; }
    .furniro-pagination a, .furniro-pagination span {
        width: 55px; height: 55px; display: inline-flex; align-items: center; justify-content: center;
        border-radius: 12px; margin: 0 8px; font-weight: 600; transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        background: #F9F1E7; color: #000; border: none;
    }
    .furniro-pagination a:hover { background: #B88E2F; color: #fff; transform: translateY(-3px); box-shadow: 0 10px 20px rgba(184, 142, 47, 0.2); }
    .furniro-pagination .bg-white { background: #B88E2F !important; color: #fff !important; }

    /* 5. Effet "magnétique" pour les boutons d'action principaux */
    .magnetic-btn { position: relative; overflow: hidden; transition: all 0.3s ease; }
    .magnetic-btn::after {
        content: ''; position: absolute; top: 50%; left: 50%; width: 300%; height: 300%;
        background: rgba(255,255,255,0.2); transition: all 0.5s ease;
        transform: translate(-50%, -50%) scale(0); border-radius: 50%;
    }
    .magnetic-btn:hover::after { transform: translate(-50%, -50%) scale(1); }
</style>

{{-- Barre de progression --}}
<div id="scroll-progress"></div>

{{-- Initialisation du composant Alpine.js --}}
<div x-data="{ 
        viewMode: 'grid', 
        filterOpen: false,
        init() {
            window.addEventListener('scroll', () => {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                document.getElementById('scroll-progress').style.width = (winScroll / height) * 100 + '%';
            });
            this.animateCards();
        },
        animateCards() {
            setTimeout(() => {
                const cards = document.querySelectorAll('.product-card');
                cards.forEach(card => card.classList.remove('show'));
                cards.forEach((card, index) => {
                    setTimeout(() => card.classList.add('show'), index * 100);
                });
            }, 100);
        }
    }" 
    x-init="init()" x-cloak class="min-h-screen bg-white">

    {{-- 1. HERO AVEC EFFET PARALLAXE --}}
    <section class="relative h-[350px] overflow-hidden flex items-center justify-center">
        <div class="absolute inset-0 transition-transform duration-1000 bg-fixed bg-center bg-cover" 
             style="background-image: url('https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?q=80&w=2070'  ); transform: scale(1.1);"></div>
        <div class="absolute inset-0 bg-white/20 backdrop-blur-[1px]"></div>
        <div class="relative z-10 text-center">
            <h1 class="mb-4 font-serif text-6xl font-bold tracking-tight text-black">Our Collection</h1>
            <nav class="flex items-center justify-center space-x-3 text-lg">
                <a href="{{ route('home') }}" class="font-bold transition hover:text-brand-primary">Home</a>
                <span class="font-black text-brand-primary">/</span>
                <span class="text-gray-500">Shop</span>
            </nav>
        </div>
    </section>

    {{-- 2. TOOLBAR INTERACTIVE (AVEC RECHERCHE ET FILTRE AMÉLIORÉ) --}}
    <div class="sticky top-0 z-40 bg-[#F9F1E7]/90 backdrop-blur-md border-b border-gray-200 py-6 shadow-sm">
        <div class="container flex flex-wrap items-center justify-between gap-8 px-6 mx-auto">
            <div class="flex items-center flex-grow space-x-10">
                {{-- Filtre avec Dropdown Glassmorphism Détaillé --}}
                <div class="relative">
                    <button @click="filterOpen = !filterOpen" class="flex items-center space-x-3 text-xl font-medium group">
                        <svg class="w-6 h-6 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/></svg>
                        <span>Smart Filter</span>
                    </button>
                    <div x-show="filterOpen" @click.away="filterOpen = false" x-transition class="glass-dropdown absolute left-0 mt-6 w-[800px] rounded-2xl shadow-2xl p-10 z-50">
                        <div class="grid grid-cols-4 gap-12">
                            {{-- Catégories --}}
                            <div>
                                <h4 class="mb-6 text-xs font-black tracking-widest uppercase text-brand-primary">Categories</h4>
                                <ul class="space-y-4 text-gray-600">
                                    <li><a href="#" class="hover:text-brand-primary">Math</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Coloring</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Art</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">History</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Geology</a></li>
                                </ul>
                            </div>
                            {{-- Niveaux de classe --}}
                            <div>
                                <h4 class="mb-6 text-xs font-black tracking-widest uppercase text-brand-primary">Classrooms</h4>
                                <ul class="space-y-4 text-gray-600">
                                    <li><a href="#" class="hover:text-brand-primary">Preschooler</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Grade 1</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Grade 2</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Grade 3</a></li>
                                </ul>
                            </div>
                            {{-- Prix --}}
                            <div>
                                <h4 class="mb-6 text-xs font-black tracking-widest uppercase text-brand-primary">Price</h4>
                                <ul class="space-y-4 text-gray-600">
                                    <li><a href="#" class="hover:text-brand-primary">Under $5</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">$5 - $10</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">$10 - $20</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Over $20</a></li>
                                </ul>
                            </div>
                            {{-- Type d'activité --}}
                            <div>
                                <h4 class="mb-6 text-xs font-black tracking-widest uppercase text-brand-primary">Activity Type</h4>
                                <ul class="space-y-4 text-gray-600">
                                    <li><a href="#" class="hover:text-brand-primary">Worksheets</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Games</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Projects</a></li>
                                    <li><a href="#" class="hover:text-brand-primary">Posters</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-px h-10 bg-gray-300"></div>

                {{-- Toggle Vue (Grid/List) --}}
                <div class="flex p-1 border border-gray-200 bg-white/50 rounded-xl">
                    <button @click="viewMode = 'grid'; animateCards()" :class="viewMode === 'grid' ? 'bg-white shadow-md text-brand-primary' : 'text-gray-400'" class="p-3 transition-all rounded-lg"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg></button>
                    <button @click="viewMode = 'list'; animateCards()" :class="viewMode === 'list' ? 'bg-white shadow-md text-brand-primary' : 'text-gray-400'" class="p-3 transition-all rounded-lg"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg></button>
                </div>
            </div>

            {{-- Barre de Recherche --}}
            <div class="relative flex-grow max-w-md">
                <input type="search" placeholder="Search for products..." class="w-full py-4 pl-12 pr-4 text-lg bg-white border-gray-200 shadow-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- 3. AFFICHAGE DES PRODUITS (Structure inchangée) --}}
    <main class="container px-6 py-20 mx-auto">
        {{-- ... Le code pour les vues GRILLE et LISTE reste le même que dans la version précédente ... --}}
        {{-- GRILLE --}}
        <div x-show="viewMode === 'grid'" class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
            @foreach($products as $product)
                <div class="product-card group bg-white rounded-2xl overflow-hidden border border-gray-50 hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)] transition-all duration-500">
                    <div class="relative overflow-hidden h-80">
                        <img src="{{ $product['image_url'] }}" alt="{{ $product['title'] }}" class="object-cover w-full h-full transition-transform duration-1000 group-hover:scale-110">
                        @if(isset($product['is_new']) && $product['is_new'])
                            <div class="absolute top-5 right-5 w-14 h-14 bg-[#2EC1AC] rounded-full flex items-center justify-center text-white font-bold text-lg">New</div>
                        @elseif(isset($product['discount']))
                            <div class="absolute top-5 right-5 w-14 h-14 bg-[#E97171] rounded-full flex items-center justify-center text-white font-bold text-lg">{{ $product['discount'] }}</div>
                        @endif
                        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center backdrop-blur-[3px] p-4">
                            <a href="{{ route('product.show', $product['slug']) }}"
                                class="px-10 py-4 mb-6 font-bold text-white transition-all duration-500 transform translate-y-4 rounded-full bg-brand-primary magnetic-btn group-hover:translate-y-0">
                                View Details
                             </a>
                            <div class="flex items-center space-x-6 text-base font-bold text-white transition-all duration-500 delay-100 transform translate-y-4 group-hover:translate-y-0">
                                <button class="flex items-center space-x-2 hover:text-brand-primary"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path></svg><span>Share</span></button>
                                <button class="flex items-center space-x-2 hover:text-brand-primary"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"></path></svg><span>Like</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-left">
                        <h3 class="mb-2 text-2xl font-bold text-gray-900 truncate">{{ $product['title'] }}</h3>
                        <p class="mb-3 font-medium text-gray-500">{{ $product['category'] }}</p>
                        <div class="flex items-baseline space-x-4">
                            <div class="text-2xl font-black text-gray-900">{{ $product['price'] }}</div>
                            @if(isset($product['old_price']) && $product['old_price'])
                                <div class="text-lg text-gray-400 line-through">{{ $product['old_price'] }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- LISTE --}}
        <div x-show="viewMode === 'list'" class="space-y-12">
            @foreach($products as $product)
                <div class="flex flex-col overflow-hidden transition-all duration-500 bg-white border border-gray-100 product-card lg:flex-row rounded-3xl hover:shadow-2xl group">
                    <div class="w-full lg:w-[450px] h-[350px] overflow-hidden relative">
                        <img src="{{ $product['image_url'] }}" alt="{{ $product['title'] }}" class="object-cover w-full h-full transition-transform duration-1000 group-hover:scale-105">
                        @if(isset($product['discount']))
                            <div class="absolute top-6 left-6 px-4 py-2 bg-[#E97171] text-white text-sm font-bold rounded-lg shadow-lg">{{ $product['discount'] }} OFF</div>
                        @endif
                    </div>
                    <div class="flex flex-col justify-between flex-grow p-12">
                        <div class="space-y-6">
                            <div class="flex items-start justify-between">
                                <h3 class="text-4xl font-bold leading-tight text-gray-900">{{ $product['title'] }}</h3>
                                <div class="flex-shrink-0 ml-8 text-right">
                                    <div class="text-4xl font-black text-brand-primary">{{ $product['price'] }}</div>
                                    @if(isset($product['old_price']) && $product['old_price'])
                                        <div class="text-xl text-gray-400 line-through">{{ $product['old_price'] }}</div>
                                    @endif
                                </div>
                            </div>
                            <p class="max-w-2xl text-xl leading-relaxed text-gray-500">Elevate your classroom experience with this premium resource. Meticulously crafted for engagement and long-term learning success.</p>
                        </div>
                        <div class="flex items-center pt-10 space-x-8 border-t border-gray-100">
                            <a href="{{ route('product.show', $product['slug']) }}" class="py-5 font-bold text-white transition-all shadow-xl magnetic-btn px-14 bg-brand-primary rounded-2xl shadow-brand-primary/30 hover:-translate-y-1">Purchase Now</a>
                            <button class="flex items-center space-x-3 font-bold text-gray-400 transition-colors hover:text-brand-primary">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                <span>Save for later</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- PAGINATION --}}
        <div class="flex justify-center mt-32 furniro-pagination">
            {{ $products->links() }}
        </div>
    </main>

    {{-- 4. FOOTER FEATURES (AVEC ICÔNES SVG) --}}
    <section class="bg-[#FAF3EA] py-24 border-t border-gray-100">
        <div class="container grid grid-cols-1 gap-16 px-6 mx-auto md:grid-cols-2 lg:grid-cols-4">
            {{-- High Quality --}}
            <div class="flex items-center space-x-6 cursor-default group">
                <div class="p-4 transition-transform bg-white shadow-sm rounded-2xl group-hover:scale-110">
                    <svg class="w-12 h-12 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div><h4 class="mb-1 text-2xl font-bold">High Quality</h4><p class="font-medium text-gray-400">Premium Materials</p></div>
            </div>
            {{-- Warranty --}}
            <div class="flex items-center space-x-6 cursor-default group">
                <div class="p-4 transition-transform bg-white shadow-sm rounded-2xl group-hover:scale-110">
                    <svg class="w-12 h-12 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div><h4 class="mb-1 text-2xl font-bold">Warranty</h4><p class="font-medium text-gray-400">2-Year Protection</p></div>
            </div>
            {{-- Free Shipping --}}
            <div class="flex items-center space-x-6 cursor-default group">
                <div class="p-4 transition-transform bg-white shadow-sm rounded-2xl group-hover:scale-110">
                    <svg class="w-12 h-12 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 2h8a1 1 0 001-1z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16h2a2 2 0 002-2V7a2 2 0 00-2-2h-2v11z"></path></svg>
                </div>
                <div><h4 class="mb-1 text-2xl font-bold">Free Shipping</h4><p class="font-medium text-gray-400">On orders over $150</p></div>
            </div>
            {{-- 24/7 Support --}}
            <div class="flex items-center space-x-6 cursor-default group">
                <div class="p-4 transition-transform bg-white shadow-sm rounded-2xl group-hover:scale-110">
                    <svg class="w-12 h-12 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </div>
                <div><h4 class="mb-1 text-2xl font-bold">24/7 Support</h4><p class="font-medium text-gray-400">Dedicated assistance</p></div>
            </div>
        </div>
    </section>
</div>
@endsection
