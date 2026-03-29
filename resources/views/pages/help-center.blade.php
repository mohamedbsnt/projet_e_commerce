@extends('layouts.app')

@section('title', 'Centre d\'aide - Furniro')
@section('description', 'Trouvez des réponses à vos questions sur nos produits, votre compte, et plus encore.')

@section('content')
<div class="bg-white">
    <div class="container px-6 py-16 mx-auto">

        <!-- En-tête -->
        <div class="mb-16 text-center">
            <h1 class="text-5xl font-bold text-gray-800">Centre d'aide</h1>
            <p class="mt-4 text-xl text-gray-500">Comment pouvons-nous vous aider ?</p>
            <div class="max-w-2xl mx-auto mt-8">
                <input type="search" placeholder="Posez votre question..." class="w-full px-6 py-4 text-lg border border-gray-200 rounded-full bg-gray-50 focus:ring-2 focus:ring-brand-primary focus:border-transparent">
            </div>
        </div>

        <!-- Grille de la FAQ -->
        <div class="max-w-4xl mx-auto">
            @foreach($faqItems as $category => $items)
                <div class="mb-12">
                    <h2 class="pb-4 mb-6 text-2xl font-bold text-gray-800 border-b border-gray-200">{{ $category }}</h2>
                    <div class="space-y-8">
                        @foreach($items as $item)
                            {{-- AMÉLIORATION : On ajoute x-collapse pour une transition fluide --}}
                            <div x-data="{ open: false }" class="pb-8 border-b border-gray-100">
                                <button @click="open = !open" class="flex items-center justify-between w-full text-lg font-semibold text-left text-gray-700 hover:text-brand-primary">
                                    <span>{{ $item['question'] }}</span>
                                    {{-- AMÉLIORATION : L'icône tourne avec une transition --}}
                                    <svg class="w-6 h-6 transition-transform transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                                {{-- AMÉLIORATION : x-show.transition.opacity.duration.500ms ajoute un effet de fondu --}}
                                <div x-show="open" x-collapse class="mt-4 leading-relaxed text-gray-600">
                                    <p>{{ $item['answer'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
