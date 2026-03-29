@extends('layouts.app')

@section('title', '6 Exemples Business E-Commerce Et Comment Commencer')
@section('description', 'Découvrez 6 exemples de business e-commerce et trouvez les meilleures plateformes pour démarrer votre activité en ligne.')

@section('content')
<div class="container px-6 py-8 mx-auto">
    
    <!-- Breadcrumb (Fil d'Ariane) -->
    <nav class="mb-8 text-sm text-gray-500">
        {{-- CORRECTION : Utilisation de la route 'home' pour un lien fonctionnel --}}
        <a href="{{ route('home') }}" class="hover:text-brand-primary hover:underline">Accueil</a>
        <span class="mx-2">›</span>
        <span class="text-gray-700">Conseils & Stratégies E-Commerce</span>
    </nav>

    <!-- Article principal / Hero Section -->
    {{-- CORRECTION : Unification des couleurs avec 'brand-primary' --}}
    <div class="flex flex-col gap-8 p-8 mb-16 lg:flex-row bg-brand-primary/10 rounded-3xl">
        <!-- Contenu texte -->
        <div class="flex flex-col justify-center lg:w-2/5">
            <h1 class="mb-6 text-4xl font-extrabold leading-tight text-gray-900 lg:text-5xl">
                6 Exemples Business E-Commerce Et Comment Commencer
            </h1>
            
            <p class="mb-6 text-lg leading-relaxed text-gray-700">
                Vous voulez vous lancer dans l'e-commerce ? Découvrez six exemples de business e-commerce et trouvez les meilleures plateformes pour démarrer votre activité ici.
            </p>
            
            <div class="flex items-center mb-8 space-x-4">
                <span class="px-3 py-1 text-xs font-bold tracking-wider text-white uppercase rounded-full bg-brand-primary">Nouveau</span>
                <p class="text-sm font-medium text-gray-500">13 minutes de lecture</p>
            </div>
            
            {{-- CORRECTION : Le bouton est maintenant fonctionnel grâce au script ci-dessous --}}
            <button onclick="copyArticleLink()" class="inline-flex items-center self-start px-4 py-2 text-sm font-semibold transition-colors bg-white border border-gray-200 rounded-lg shadow-sm text-brand-primary hover:bg-brand-primary/5">
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
                class="w-full h-96 lg:h-[500px] object-cover rounded-2xl shadow-xl"
                loading="lazy"
            >
        </div>
    </div>

    {{-- ===================================================================== --}}
    {{-- CORRECTION MAJEURE : Section "Our Products" supprimée --}}
    {{-- ===================================================================== --}}
    {{--
        EXPLICATION : Cette section a été retirée car elle est redondante.
        Le but de cette page est de présenter un article de blog. Afficher une grille de
        produits ici crée une confusion pour l'utilisateur. La section "Our Products"
        a sa place sur la page d'accueil (`welcome.blade.php` ), pas ici.
        Cela résout également l'erreur fatale potentielle de la variable '$showcaseProducts'
        qui n'est pas définie pour cette route.
    --}}

    {{-- ===================================================================== --}}
    {{-- CORRECTION MAJEURE : Section "Tarifs" supprimée --}}
    {{-- ===================================================================== --}}
    {{--
        EXPLICATION : De même, la section des tarifs est une information de premier niveau
        qui a sa propre page ('/pricing') ou qui peut être sur la page d'accueil.
        L'inclure dans chaque article de blog alourdit la page et distrait le lecteur
        de l'objectif principal : lire l'article.
    --}}

    {{-- Vous pouvez ajouter ici le contenu réel de votre article de blog --}}
    <article class="max-w-4xl mx-auto prose lg:prose-xl">
        <h2>Introduction à l'E-commerce</h2>
        <p>
            Le commerce électronique, ou e-commerce, est l'achat et la vente de biens ou de services via Internet, et le transfert d'argent et de données pour exécuter ces transactions. L'e-commerce est souvent utilisé pour désigner la vente de produits physiques en ligne, mais il peut également décrire tout type de transaction commerciale facilitée par Internet.
        </p>
        
        <h3>Exemple 1 : Le Dropshipping</h3>
        <p>
            Le dropshipping est un modèle commercial où un vendeur n'a pas besoin de garder les produits en stock. Au lieu de cela, lorsqu'un client passe une commande, le vendeur achète l'article auprès d'un tiers et le fait expédier directement au client.
        </p>
        
        {{-- ... Ajoutez le reste de votre article ici ... --}}
    </article>

</div>
@endsection

@push('scripts')
{{-- CORRECTION : Le script est maintenant propre et fonctionnel --}}
<script>
    // Fonction pour le bouton "Partager"
    function copyArticleLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            // Idéalement, remplacez alert() par une notification plus subtile
            alert('Lien de l'article copié dans le presse-papier !');
        });
    }

    // Le script d'animation est conservé mais ne cible plus les éléments supprimés.
    // Il peut être utilisé pour animer d'autres parties de votre article si vous le souhaitez.
    document.addEventListener('DOMContentLoaded', function() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                    observer.unobserve(entry.target); // On arrête d'observer une fois l'animation jouée
                }
            });
        }, observerOptions);
        
        // On cible les sections ou les titres de l'article pour une animation à l'apparition
        document.querySelectorAll('article h2, article h3, article p').forEach(el => {
            el.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-700', 'ease-out');
            observer.observe(el);
        });
    });
</script>
@endpush
