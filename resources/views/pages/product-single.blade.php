@extends('layouts.app')

{{-- Titre et description SEO --}}
@section('title', $product->title . ' - Furniro')
@section('description', strip_tags(substr($product->description ?? '', 0, 155)))

@section('content')
<div class="bg-white">
    <div class="container px-6 py-12 mx-auto">

        <!-- Fil d'Ariane -->
        <nav class="mb-8 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-brand-primary">Accueil</a>
            <span class="mx-2">›</span>
            <a href="{{ route('products.index') }}" class="hover:text-brand-primary">Produits</a>
            <span class="mx-2">›</span>
            <span class="text-gray-700">{{ $product->title }}</span>
        </nav>

        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
            <!-- Colonne de l'image -->
            <div>
                <img src="{{ $product->image_url }}" alt="{{ $product->title }}" 
                     class="object-cover w-full h-auto rounded-lg shadow-lg">
            </div>

            <!-- Colonne des informations -->
            <div>
                <h1 class="mb-2 text-4xl font-bold text-gray-800">{{ $product->title }}</h1>
                <p class="mb-4 text-gray-500">
                    Par <a href="#" class="font-semibold text-brand-primary">Brilliant Eduprints</a>
                </p>

                <!-- Évaluation -->
                <div class="flex items-center mb-6">
                    <div class="flex text-yellow-400">
                        @for ($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        @endfor
                    </div>
                    <span class="ml-2 text-sm text-gray-500">(2 avis)</span>
                </div>

                <!-- Prix -->
                <p class="mb-6 text-4xl font-bold text-gray-800">{{ $product->price }}</p>

                <!-- Actions -->
                <div class="flex items-center mb-8 space-x-4">
                    <a href="#" class="w-full px-8 py-4 font-bold text-center text-white rounded-lg shadow-md bg-brand-primary hover:bg-opacity-90">
                        Ajouter au panier
                    </a>
                    <button class="p-4 border border-gray-300 rounded-lg hover:bg-gray-100">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Spécifications -->
                @if(!empty($product->specs))
                <div class="pt-6 border-t border-gray-200">
                    <h3 class="mb-4 text-lg font-semibold text-gray-700">Spécifications</h3>
                    <div class="space-y-2 text-gray-600">
                        @foreach($product->specs as $key => $value)
                            <div class="flex justify-between">
                                <span class="font-medium">{{ $key }}</span>
                                <span>{{ $value }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Description -->
        @if(!empty($product->description))
        <div class="mt-16 prose prose-lg max-w-none">
            {!! $product->description !!}
        </div>
        @endif

        <!-- Produits associés -->
        @if($relatedProducts->isNotEmpty())
        <div class="mt-24">
            <h2 class="mb-8 text-3xl font-bold text-gray-800">Vous aimerez aussi</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                @foreach($relatedProducts as $related)
                    @include('components.product_card_showcase', ['product' => $related])
                @endforeach
            </div>
        </div>
        @endif

    </div>
</div>
@endsection