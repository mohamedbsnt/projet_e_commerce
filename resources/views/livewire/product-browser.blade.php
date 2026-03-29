{{--
    Ce composant Livewire gère TOUTE l'interactivité de la page /products.
    Il est responsable de la recherche, du filtrage, du tri et de la pagination.
--}}
<div x-data="{ 
    viewMode: 'grid', 
    filterOpen: false,
    // La fonction animateCards est conservée pour les effets visuels
    animateCards() {
        this.$nextTick(() => {
            const cards = document.querySelectorAll('.product-card');
            cards.forEach(card => card.classList.remove('show'));
            setTimeout(() => {
                cards.forEach((card, index) => {
                    setTimeout(() => card.classList.add('show'), index * 50);
                });
            }, 50);
        });
    }
}" 
x-init="animateCards()" 
@products-updated.window="animateCards()" {{-- On écoute l'événement de Livewire pour relancer l'animation --}}
x-cloak 
class="min-h-screen bg-white">

{{-- 1. HERO (Identique à la version précédente) --}}
<section class="relative h-[350px] overflow-hidden flex items-center justify-center">
    <div class="absolute inset-0 transition-transform duration-1000 bg-fixed bg-center bg-cover" 
         style="background-image: url('https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?q=80&w=2070' ); transform: scale(1.1);"></div>
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

{{-- 2. TOOLBAR INTERACTIVE (Connectée à Livewire) --}}
<div class="sticky top-0 z-40 py-6 border-b border-gray-200 shadow-sm bg-brand-background/90 backdrop-blur-md">
    <div class="container flex flex-wrap items-center justify-between gap-8 px-6 mx-auto">
        <div class="flex items-center flex-grow space-x-10">
            {{-- Filtre avec Dropdown --}}
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
                                <li><button wire:click="filterByCategory('Math')" class="hover:text-brand-primary">Math</button></li>
                                <li><button wire:click="filterByCategory('Coloring')" class="hover:text-brand-primary">Coloring</button></li>
                                <li><button wire:click="filterByCategory('Art')" class="hover:text-brand-primary">Art</button></li>
                            </ul>
                        </div>
                        {{-- ... (autres filtres) ... --}}
                    </div>
                </div>
            </div>
            <div class="w-px h-10 bg-gray-300"></div>
            {{-- Toggle Vue --}}
            <div class="flex p-1 border border-gray-200 bg-white/50 rounded-xl">
                <button @click="viewMode = 'grid'" :class="viewMode === 'grid' ? 'bg-white shadow-md text-brand-primary' : 'text-gray-400'" class="p-3 transition-all rounded-lg"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg></button>
                <button @click="viewMode = 'list'" :class="viewMode === 'list' ? 'bg-white shadow-md text-brand-primary' : 'text-gray-400'" class="p-3 transition-all rounded-lg"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg></button>
            </div>
        </div>
        {{-- Barre de Recherche --}}
        <div class="relative flex-grow max-w-md">
            <input wire:model.debounce.500ms="search" type="search" placeholder="Search for products..." class="w-full py-4 pl-12 pr-4 text-lg bg-white border-gray-200 shadow-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
        </div>
    </div>
</div>

{{-- 3. AFFICHAGE DES PRODUITS --}}
<main class="container px-6 py-20 mx-auto">
    {{-- GRILLE --}}
    <div x-show="viewMode === 'grid'" class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
        @foreach($products as $product)
            <div wire:key="grid-{{ $product->id }}" class="product-card group bg-white rounded-2xl overflow-hidden border border-gray-50 hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)] transition-all duration-500">
                <div class="relative overflow-hidden h-80">
                    <img src="{{ $product->image_url }}" alt="{{ $product->title }}" class="object-cover w-full h-full transition-transform duration-1000 group-hover:scale-110">
                    {{-- ... (badges) ... --}}
                    <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center backdrop-blur-[3px] p-4">
                        {{-- CORRECTION : Le lien pointe maintenant vers la route 'product.show' --}}
                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="px-10 py-4 mb-6 font-bold text-white transition-all duration-500 transform translate-y-4 rounded-full bg-brand-primary magnetic-btn group-hover:translate-y-0">View Details</a>
                        {{-- ... (autres boutons) ... --}}
                    </div>
                </div>
                <div class="p-6 text-left">
                    <h3 class="mb-2 text-2xl font-bold text-gray-900 truncate">{{ $product->title }}</h3>
                    <p class="mb-3 font-medium text-gray-500">{{ $product->category }}</p>
                    <div class="text-2xl font-black text-gray-900">{{ $product->price > 0 ? $product->price . ' €' : 'Gratuit' }}</div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- LISTE --}}
    <div x-show="viewMode === 'list'" class="space-y-12">
        @foreach($products as $product)
            <div wire:key="list-{{ $product->id }}" class="flex flex-col overflow-hidden transition-all duration-500 bg-white border border-gray-100 product-card lg:flex-row rounded-3xl hover:shadow-2xl group">
                <div class="w-full lg:w-[450px] h-[350px] overflow-hidden relative">
                    <img src="{{ $product->image_url }}" alt="{{ $product->title }}" class="object-cover w-full h-full transition-transform duration-1000 group-hover:scale-105">
                </div>
                <div class="flex flex-col justify-between flex-grow p-12">
                    <div class="space-y-6">
                        <h3 class="text-4xl font-bold leading-tight text-gray-900">{{ $product->title }}</h3>
                        <p class="max-w-2xl text-xl leading-relaxed text-gray-500">Elevate your classroom experience with this premium resource. Meticulously crafted for engagement and long-term learning success.</p>
                    </div>
                    <div class="flex items-center pt-10 space-x-8 border-t border-gray-100">
                        {{-- CORRECTION : Le lien pointe maintenant vers la route 'product.show' --}}
                        <a href="{{ route('product.show', ['slug' => $product->slug]) }}" class="py-5 font-bold text-white transition-all shadow-xl magnetic-btn px-14 bg-brand-primary rounded-2xl shadow-brand-primary/30 hover:-translate-y-1">Purchase Now</a>
                        {{-- ... (autres boutons) ... --}}
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

{{-- 4. FOOTER (Identique) --}}
<section class="py-24 border-t border-gray-100 bg-brand-background">
    {{-- ... (contenu du footer) ... --}}
</section>
</div>
