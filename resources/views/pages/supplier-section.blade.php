@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#FDFDFD] font-sans selection:bg-black selection:text-white">
    <!-- Navigation Contextuelle -->
    <nav class="flex items-center justify-between px-6 py-8 mx-auto max-w-7xl">
        <a href="/" class="text-xs font-bold tracking-[0.3em] uppercase hover:text-brand-primary transition-colors">← Retour au Store</a>
        <div class="flex items-center space-x-2">
            <span class="w-2 h-2 rounded-full" style="background-color: {{ $config['color'] }}"></span>
            <span class="text-xs font-medium tracking-widest uppercase">{{ $config['name'] }} Official Partner</span>
        </div>
    </nav>

    <!-- Hero Section Style Dribbble -->
    <header class="grid items-center grid-cols-1 gap-16 px-6 pt-12 pb-24 mx-auto max-w-7xl lg:grid-cols-12">
        <div class="lg:col-span-7" data-aos="fade-right">
            <h1 class="text-7xl md:text-9xl font-serif leading-[0.9] mb-10 tracking-tighter">
                {{ $config['name'] }}  

                <span class="italic text-gray-300">Collection</span>
            </h1>
            <p class="max-w-md mb-12 text-lg leading-relaxed text-gray-500">
                {{ $config['description'] }}
            </p>
            <div class="flex items-center space-x-8">
                <button class="px-10 py-5 text-sm font-bold text-white transition-transform duration-500 bg-black rounded-full shadow-xl hover:scale-105 shadow-black/10">
                    EXPLORER LA GAMME
                </button>
                <div class="hidden md:block">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-1">Tagline</p>
                    <p class="font-serif text-xl italic">"{{ $config['tagline'] }}"</p>
                </div>
            </div>
        </div>
        <div class="relative lg:col-span-5" data-aos="fade-left">
            <div class="aspect-[3/4] rounded-[4rem] overflow-hidden rotate-3 hover:rotate-0 transition-all duration-1000 shadow-2xl">
                <img src="{{ $config['hero_image'] }}" class="object-cover w-full h-full transition-transform duration-1000 scale-110 hover:scale-100" alt="Hero">
            </div>
            <!-- Badge Flottant -->
            <div class="absolute -bottom-6 -left-6 bg-white p-8 rounded-[2rem] shadow-xl flex items-center space-x-4">
                <div class="flex items-center justify-center w-12 h-12 text-white rounded-full" style="background-color: {{ $config['color'] }}">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"></path></svg>
                </div>
                <div>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Vérifié par</p>
                    <p class="font-bold">Furniro Quality Control</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Grille de Produits Asymétrique -->
    <section class="bg-white py-32 rounded-t-[5rem] shadow-[0_-30px_60px_-15px_rgba(0,0,0,0.05)]">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="flex items-end justify-between mb-20">
                <h2 class="font-serif text-4xl">Articles Vedettes</h2>
                <div class="flex space-x-4">
                    <button class="p-4 transition-colors border border-gray-100 rounded-full hover:bg-gray-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button class="p-4 transition-colors border border-gray-100 rounded-full hover:bg-gray-50">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-24">
                @foreach($products as $product)
                <div class="cursor-pointer group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="relative aspect-[4/5] bg-[#F7F7F7] rounded-[3rem] overflow-hidden mb-8 transition-all duration-700 group-hover:rounded-[1rem] group-hover:shadow-2xl">
                        <img src="{{ $product['image_url'] }}" class="object-cover w-full h-full transition-transform duration-1000 group-hover:scale-110" alt="{{ $product['title'] }}">
                        <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-500 opacity-0 bg-black/20 group-hover:opacity-100">
                            <span class="px-8 py-3 text-xs font-bold tracking-widest uppercase transition-transform duration-500 transform translate-y-4 bg-white rounded-full group-hover:translate-y-0">Aperçu Rapide</span>
                        </div>
                    </div>
                    <div class="flex items-start justify-between px-2">
                        <div>
                            <h3 class="mb-2 text-xl font-medium">{{ $product['title'] }}</h3>
                            <p class="text-xs font-bold tracking-widest text-gray-400 uppercase">{{ $product['category'] }}</p>
                        </div>
                        <span class="font-serif text-xl italic">${{ number_format($product['price'], 2) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
