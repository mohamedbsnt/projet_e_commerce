@extends('layouts.app' )

{{-- Le titre de la page est dynamiquement défini par le titre de l'article --}}
@section('title', $post['title'] . ' - Blog Furniro')
@section('description', $post['excerpt'])

@section('content')
<div class="py-16 bg-white">
    <div class="container px-6 mx-auto">
        
        <!-- Fil d'Ariane -->
        <nav class="mb-8 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-brand-primary">Accueil</a>
            <span class="mx-2">›</span>
            <a href="{{ route('blog.index') }}" class="hover:text-brand-primary">Blog</a>
            <span class="mx-2">›</span>
            <span class="text-gray-700">{{ $post['title'] }}</span>
        </nav>

        <!-- En-tête de l'article -->
        <div class="max-w-4xl mx-auto mb-12 text-center">
            <p class="mb-2 font-semibold text-brand-primary">{{ $post['category'] }}</p>
            <h1 class="mb-4 text-4xl font-bold text-gray-800 md:text-5xl">{{ $post['title'] }}</h1>
            <p class="text-gray-500">{{ $post['date'] }} par {{ $post['author_name'] }}</p>
        </div>

        <!-- Image principale de l'article -->
        <div class="max-w-5xl mx-auto mb-12">
            <img src="{{ $post['image_url'] }}" alt="{{ $post['title'] }}" class="w-full h-auto max-h-[500px] object-cover rounded-2xl shadow-lg">
        </div>

        <!-- Contenu de l'article -->
        <div class="max-w-3xl mx-auto prose prose-lg prose-h2:text-3xl prose-h2:font-bold prose-p:leading-relaxed prose-a:text-brand-primary">
            {!! $post['content'] !!} {{-- On utilise {!! !!} pour interpréter le HTML du contenu --}}
        </div>

    </div>
</div>
@endsection
