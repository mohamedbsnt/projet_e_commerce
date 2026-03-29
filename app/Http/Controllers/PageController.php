<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Arr;

class PageController extends Controller
{
    /**
     * Affiche la page Help Center.
     */
    public function showHelpCenter(): View
    {
        return view('pages.help-center');
    }

    /**
     * Affiche la page du Blog (liste des articles).
     */
    public function showBlog(): View
    {
        $blogPosts = $this->getBlogData();

        return view('pages.blog', compact('blogPosts'));
    }

    /**
     * Affiche un article spécifique via son slug.
     */
    public function showPost(string $slug): View
    {
        $posts = $this->getBlogData();

        $post = Arr::first($posts, fn($post) => $post['slug'] === $slug);

        if (!$post) {
            abort(404);
        }

        return view('pages.blog-post', compact('post'));
    }

    /**
     * Simule les données du blog.
     */
    private function getBlogData(): array
    {
        return [
            [
                'slug' => '5-astuces-pour-organiser-votre-classe-numerique',
                'image_url' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=2070',
                'category' => 'Productivité',
                'date' => '15 Fév, 2026',
                'title' => '5 astuces pour organiser votre classe numérique',
                'excerpt' => "Découvrez comment optimiser votre environnement d'enseignement en ligne pour un maximum d'efficacité...",
                'author_name' => 'Jane Doe',
                'author_avatar' => 'https://randomuser.me/api/portraits/women/75.jpg',
                'content' => '
                    <h2>Introduction à l\'organisation numérique</h2>
                    <p>L\'organisation est la clé du succès dans une classe numérique moderne.</p>
                    <h3>Astuce 1 : Utilisez un gestionnaire de fichiers Cloud</h3>
                    <p>Des services comme Google Drive ou Dropbox sont essentiels pour centraliser vos ressources.</p>
                    <h3>Astuce 2 : Automatisez les tâches répétitives</h3>
                    <p>Utilisez des outils IA pour corriger, analyser et générer du contenu pédagogique.</p>
                ',
            ],
            [
                'slug' => 'l-apprentissage-par-le-jeu',
                'image_url' => 'https://images.unsplash.com/photo-1516321497487-e288fb19713f?q=80&w=2070',
                'category' => 'Pédagogie',
                'date' => '10 Fév, 2026',
                'title' => "L'apprentissage par le jeu : pourquoi ça marche ?",
                'excerpt' => 'Plongez dans la science derrière la gamification et découvrez des techniques simples...',
                'author_name' => 'John Smith',
                'author_avatar' => 'https://randomuser.me/api/portraits/men/75.jpg',
                'content' => '
                    <h2>Les fondements psychologiques du jeu</h2>
                    <p>Le jeu active les circuits de la récompense dans le cerveau.</p>
                    <h3>Motivation intrinsèque</h3>
                    <p>Les élèves apprennent mieux lorsqu\'ils sont engagés émotionnellement.</p>
                ',
            ],
            [
                'slug' => 'les-meilleurs-outils-ia-pour-enseignants',
                'image_url' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=2071',
                'category' => 'Technologie',
                'date' => '05 Fév, 2026',
                'title' => 'Les meilleurs outils IA pour les enseignants en 2026',
                'excerpt' => "L'intelligence artificielle n'est plus de la science-fiction. Voici une sélection d'outils...",
                'author_name' => 'Emily White',
                'author_avatar' => 'https://randomuser.me/api/portraits/women/76.jpg',
                'content' => '
                    <h2>L\'IA au service de l\'éducation</h2>
                    <p>Loin de remplacer les enseignants, l\'IA est un assistant pédagogique puissant.</p>
                    <h3>Correction automatisée</h3>
                    <p>Des outils modernes permettent de corriger rapidement des centaines de copies.</p>
                ',
            ],
        ];
    }
}