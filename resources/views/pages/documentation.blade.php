@extends('layouts.app')

@section('title', 'Documentation - Furniro')
@section('description', 'Explorez nos guides complets, tutoriels et références API pour tirer le meilleur parti de notre plateforme.')

@section('content')
{{-- AMÉLIORATION : On initialise Alpine.js pour le scrollspy --}}
<div x-data="{ activeSection: 'introduction' }" 
     @scroll.window="
        let sections = document.querySelectorAll('main section');
        let currentSection = 'introduction';
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 150;
            if (window.scrollY >= sectionTop) {
                currentSection = section.id;
            }
        });
        activeSection = currentSection;
     " 
     class="bg-gray-50">
    <div class="container px-6 py-12 mx-auto">

        <!-- En-tête -->
        <div class="mb-12 text-center">
            <h1 class="text-5xl font-bold text-gray-800">Documentation</h1>
            <p class="mt-4 text-xl text-gray-500">Tout ce dont vous avez besoin pour commencer et maîtriser notre plateforme.</p>
        </div>

        <div class="flex flex-col gap-12 lg:flex-row">
            <!-- BARRE LATÉRALE DE NAVIGATION -->
            <aside class="lg:w-1/4">
                <div class="sticky top-24">
                    {{-- ... (barre de recherche identique) ... --}}
                    <nav class="space-y-6">
                        @foreach($categories as $categoryName => $articles)
                            <div>
                                <h3 class="mb-3 text-sm font-bold tracking-wider text-gray-400 uppercase">{{ $categoryName }}</h3>
                                <ul class="space-y-2">
                                    @foreach($articles as $article)
                                        <li>
                                            {{-- AMÉLIORATION : La classe change dynamiquement en fonction de la section active --}}
                                            <a href="#{{ $article['slug'] }}" 
                                               :class="{ 'bg-brand-primary/10 text-brand-primary font-bold': activeSection === '{{ $article['slug'] }}' }"
                                               class="block px-4 py-2 text-gray-600 transition-colors rounded-md hover:bg-brand-primary/10 hover:text-brand-primary">
                                                {{ $article['title'] }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </nav>
                </div>
            </aside>

            <!-- CONTENU PRINCIPAL DES ARTICLES -->
            <main class="lg:w-3/4">
                <div class="prose max-w-none prose-lg ...">
                    <section id="introduction" class="mb-16 scroll-mt-24">
                        <h2>Introduction</h2>
                        <p>Bienvenue dans la documentation de Furniro. Que vous soyez un nouvel utilisateur cherchant à comprendre les bases ou un développeur expérimenté souhaitant intégrer notre API, vous trouverez ici toutes les informations nécessaires.</p>
                        <p>Cette documentation est conçue pour être une ressource complète. Utilisez la barre de navigation sur la gauche pour explorer les différentes sections.</p>
                    </section>

                    <section id="installation" class="mb-16 scroll-mt-24">
                        <h2>Installation</h2>
                        <p>L'installation de notre plateforme est un processus simple. Suivez les étapes ci-dessous pour être opérationnel en quelques minutes.</p>
                        <ol>
                            <li><strong>Créez un compte :</strong> Rendez-vous sur notre page d'inscription et créez votre compte gratuit.</li>
                            <li><strong>Configurez votre boutique :</strong> Suivez l'assistant de configuration pour nommer votre boutique et définir vos préférences de base.</li>
                            <li><strong>Ajoutez votre premier produit :</strong> Utilisez notre interface intuitive pour ajouter votre premier produit. C'est aussi simple que ça !</li>
                        </ol>
                    </section>

                    <section id="product-management" class="mb-16 scroll-mt-24">
                        <h2>Gestion des Produits</h2>
                        <p>La gestion de vos produits est au cœur de notre plateforme. Vous pouvez ajouter, modifier et organiser vos produits facilement.</p>
                        <h3>Ajouter un produit</h3>
                        <p>Pour ajouter un nouveau produit, accédez à votre tableau de bord, cliquez sur "Produits" > "Ajouter un produit". Remplissez les champs requis tels que le titre, la description, le prix et les images.</p>
                        <h3>Catégories et tags</h3>
                        <p>Organisez vos produits en utilisant des catégories et des tags. Cela aide non seulement à la gestion de votre inventaire, mais permet également à vos clients de trouver plus facilement ce qu'ils cherchent.</p>
                    </section>

                    {{-- Vous pouvez continuer à ajouter des sections pour chaque article --}}

                </div>
            </main>
        </div>
    </div>
</div>
@endsection
