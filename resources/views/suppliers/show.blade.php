@extends('layouts.app')

@section('title', 'Produits du Fournisseur: ' . $supplierName)

@section('content')
<div class="bg-white">
    <div class="container px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <header class="mb-12 text-center">
            <p class="text-lg font-semibold text-brand-primary">Fournisseur</p>
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">
                {{ $supplierName }}
            </h1>
            <p class="max-w-2xl mx-auto mt-4 text-lg text-gray-600">
                Découvrez une sélection de produits populaires provenant directement de {{ $supplierName }}.
            </p>
        </header>

        @if($products->isNotEmpty())
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                {{-- On réutilise notre vue partielle de carte produit compacte ! --}}
                @include('partials.product_card_compact_list', ['products' => $products])
            </div>
        @else
            <div class="p-12 text-center bg-gray-50 rounded-xl">
                <h3 class="text-xl font-semibold text-gray-800">Aucun produit à afficher</h3>
                <p class="mt-2 text-gray-600">Nous n'avons pas pu récupérer les produits de ce fournisseur pour le moment. Veuillez réessayer plus tard.</p>
            </div>
        @endif
    </div>
</div>
@endsection
