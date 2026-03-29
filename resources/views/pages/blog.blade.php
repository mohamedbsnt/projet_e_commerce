@extends('layouts.app')

@section('title', 'Blog - Furniro')
@section('description', 'Découvrez nos derniers articles, conseils et actualités sur le monde de l\'éducation et de l\'e-commerce.')

@section('content')
<div x-data="{
    activeCategory: 'Tous',
    categories: ['Tous', 'Productivité', 'Pédagogie', 'Technologie'],
    posts: {{ json_encode($blogPosts) }}
}" class="bg-gray-50">
    <div class="container px-6 py-16 mx-auto">

        <!-- En-tête -->
        <div class="mb-12 text-center">
            <h1 class="text-5xl font-bold text-gray-800">Notre Blog</h1>
            <p class="mt-4 text-xl text-gray-500">Conseils, astuces et actualités pour les créateurs de contenu éducatif.</p>
        </div>

        <!-- AMÉLIORATION : Barre de filtres interactifs -->
        <div class="flex justify-center mb-12 space-x-2">
            <template x-for="category in categories" :key="category">
                <button
                    @click="activeCategory = category"
                    :class="activeCategory === category ? 'bg-brand-primary text-white' : 'bg-white text-gray-600 hover:bg-gray-100'"
                    class="px-6 py-2 font-semibold transition-colors rounded-full shadow-sm"
                    x-text="category">
                </button>
            </template>
        </div>
        
        <!-- Grille des articles -->
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-3">
            <template x-for="post in posts.filter(p => activeCategory === 'Tous' || p.category === activeCategory)" :key="post.slug">
                <article class="flex flex-col overflow-hidden transition-transform bg-white shadow-md rounded-2xl hover:-translate-y-2">
                    <a :href="'/blog/' + post.slug" class="block">
                        <img :src="post.image_url" :alt="post.title" class="object-cover w-full h-56">
                    </a>
                    <div class="flex flex-col flex-grow p-6">
                        <div class="mb-4">
                            <span class="text-sm font-semibold text-brand-primary" x-text="post.category"></span>
                            <span class="mx-2 text-sm text-gray-400">•</span>
                            <span class="text-sm text-gray-400" x-text="post.date"></span>
                        </div>
                        <h2 class="flex-grow mb-3 text-xl font-bold text-gray-800">
                            <a href="#" class="hover:text-brand-primary" x-text="post.title"></a>
                        </h2>
                                                <p class="mb-6 text-gray-600" x-text="post.excerpt"></p>
                        
                        <!-- AMÉLIORATION : Auteur et bouton "Lire la suite" -->
                        <div class="flex items-center justify-between pt-4 mt-auto border-t border-gray-100">
                            <div class="flex items-center">
                                <img :src="post.author_avatar" :alt="post.author_name" class="w-10 h-10 mr-3 rounded-full">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800" x-text="post.author_name"></p>
                                </div>
                            </div>
                            {{-- AMÉLIORATION : Le bouton "Lire la suite" --}}
                            <a :href="'/blog/' + post.slug" class="text-sm font-bold text-brand-primary hover:underline">
                                Lire la suite →
                            </a>
                        </div>
                    </div>
                </article>
            </template>
        </div>

    </div>
</div>
@endsection
