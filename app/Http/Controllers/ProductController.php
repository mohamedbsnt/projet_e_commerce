<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Nombre de produits à afficher par page dans le catalogue.
     */
    const PRODUCTS_PER_PAGE = 20;

    /**
     * Affiche le catalogue complet des produits avec une pagination STANDARD.
     * Cette méthode utilise vos données simulées.
     */
    public function index(Request $request): View
    {
        $allProducts = $this->getProductData();

        // --- LOGIQUE DE RECHERCHE ---
        if ($request->has('search') && $request->search != '') {
            $searchTerm = strtolower($request->search);
            $allProducts = $allProducts->filter(function($product) use ($searchTerm) {
                return str_contains(strtolower($product['title'] ?? ''), $searchTerm) || 
                       str_contains(strtolower($product['category'] ?? ''), $searchTerm);
            });
        }

        // --- LOGIQUE DE TRI (SORTING) ---
        $sort = $request->get('sort', 'default');
        switch ($sort) {
            case 'price_low':
                $allProducts = $allProducts->sortBy(function($p) {
                    return (float) filter_var($p['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                });
                break;
            case 'price_high':
                $allProducts = $allProducts->sortByDesc(function($p) {
                    return (float) filter_var($p['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                });
                break;
            case 'newest':
                $allProducts = $allProducts->sortByDesc('is_new');
                break;
            default:
                // Tri par défaut (ordre original)
                break;
        }

        $paginatedProducts = $this->paginateCollection($allProducts, self::PRODUCTS_PER_PAGE);
        
        $paginatedProducts->appends($request->all());

        return view('products', ['products' => $paginatedProducts]);
    }

    /**
     * Affiche la page d'accueil avec ses différentes sections.
     * CORRECTION : La méthode est maintenant correctement structurée.
     */
    public function showWelcomePage(): View
    {
        // On appelle directement votre méthode qui contient la liste des produits.
        $allProducts = $this->getProductData();
        
        // On prend les 8 premiers produits et on leur ajoute des badges, comme vous l'aviez fait.
        // CORRECTION : La syntaxe de la fonction map a été corrigée.
        $showcaseProducts = $allProducts->take(8)->map(function($product, $index) {
            if ($index === 0) { $product['discount'] = '-30%'; $product['old_price'] = '10.00 €'; }
            if ($index === 1) { $product['is_new'] = true; }
            if ($index === 2) { $product['discount'] = '-50%'; $product['old_price'] = '5.00 €'; }
            return $product;
        });

        // On définit les catégories pour la vue.
        $categories = collect([
            ['name' => 'Activities', 'image_url' => 'https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?q=80&w=2070'],
            ['name' => 'Coloring', 'image_url' => 'https://images.unsplash.com/photo-1513364776144-60967b0f800f?q=80&w=2071'],
            ['name' => 'Seasonal', 'image_url' => 'https://images.unsplash.com/photo-1509191432712-384833102bad?q=80&w=2069'],
        ] );

        return view('welcome', [
            'showcaseProducts' => $showcaseProducts,
            'categories'       => $categories,
        ]);
    }

    /**
     * Simule la récupération de données. C'est la source de données pour tout le contrôleur.
     * Cette méthode est conservée INTACТЕ, comme vous l'avez demandé.
     */
    private function getProductData(): Collection
    {
        $teacherProducts = [
            [
                'id'          => 1, // Ajout d'un ID pour les liens
                'slug' => 'st-patricks-day-fun-pack',
                'title'       => 'St. Patrick\'s Day Fun Pack',
                'category'    => 'Activités Saisonnières',
                'price'       => 'Gratuit',
                'old_price'   => false,
                'discount'    => false,
                'is_new'      => true,
                'image_url'   => 'https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/St-Patrick-s-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434-1741562387/750f-13114434-1.jpg',
                'product_url' => 'https://www.teacherspayteachers.com/Product/St-Patricks-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434',
            ],
            [
                'id'          => 2,

                'slug' => 'alphabet-tracing-worksheets',
                'title'       => 'Alphabet Tracing Worksheets',
                'category'    => 'Écriture',
                'price'       => '4.99 €',
                'old_price'   => '6.99 €',
                'discount'    => '-28%',
                'is_new'      => false,
                'image_url'   => 'https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283-1752852811/750f-13987283-1.jpg',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            [
                'id'          => 3,
                'slug' => 'groovy-capybara-valentines-day',
                'title' => 'Groovy Capybara Valentines Day',
                'category'    => 'St Valentin',
                'price'       => '3.50 €',
                'old_price'   => false,
                'discount'    => false,
                'is_new'      => true,
                'image_url'   => 'https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/Groovy-Capybara-Valentine-s-Day-Cute-Animal-Valentine-for-Classroom-Crafts-15377933-1769403427/750f-15377933-1.jpg',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Groovy-Capybara-Valentines-Day-Cute-Animal-Valentine-for-Classroom-Crafts-15377933',
            ],
            [
                'id' => 4,
                'slug' => 'math-addition-worksheets',
                'title' => 'Math Addition Worksheets',
                'category' => 'Mathématiques',
                'price' => '5.00 €',
                'old_price' => '8.00 €',
                'discount' => '-37%',
                'is_new' => false,
                'image_url' => 'https://images.unsplash.com/photo-1509228468518-180dd4864904?q=80&w=800',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            [
                'id' => 5,
                'slug' => 'multiplication-practice-pack',
                'title' => 'Multiplication Practice Pack',
                'category' => 'Mathématiques',
                'price' => '6.99 €',
                'old_price' => false,
                'discount' => false,
                'is_new' => true,
                'image_url' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=800',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            [
                'id' => 6,
                'slug' => 'reading-romprehension-stories',

                'title' => 'Reading Comprehension Stories',
                'category' => 'Lecture',
                'price' => '7.99 €',
                'old_price' => '9.99 €',
                'discount' => '-20%',
                'is_new' => false,
                'image_url' => 'https://images.unsplash.com/photo-1512820790803-83ca734da794?q=80&w=800',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            [
                'id' => 7,
                'slug' => 'phonics-flashcards',

                'title' => 'Phonics Flashcards',
                'category' => 'Phonics',
                'price' => '3.99 €',
                'old_price' => false,
                'discount' => false,
                'is_new' => true,
                'image_url' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?q=80&w=800',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            [
                'id' => 8,
                'slug' => 'science-experiment-kit',

                'title' => 'Science Experiment Kit',
                'category' => 'Science',
                'price' => '12.99 €',
                'old_price' => '15.99 €',
                'discount' => '-19%',
                'is_new' => false,
                'image_url' => 'https://images.unsplash.com/photo-1581091870627-3e7e1b9c0c16?q=80&w=800',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            [
                'id' => 9,
                'slug' => 'geography-map-activities',
                'title' => 'Geography Map Activities',
                'category' => 'Géographie',
                'price' => '4.50 €',
                'old_price' => false,
                'discount' => false,
                'is_new' => false,
                'image_url' => 'https://images.unsplash.com/photo-1502920917128-1aa500764b8a?q=80&w=800',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            [
                'id' => 10,
                'slug' => 'history-timeline-posters',
                'title' => 'History Timeline Posters',
                'category' => 'Histoire',
                'price' => '9.99 €',
                'old_price' => '12.99 €',
                'discount' => '-23%',
                'is_new' => false,
                'image_url' => 'https://images.unsplash.com/photo-1461360228754-6e81c478b882?q=80&w=800',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],

        ];

        $fullProductList = [];
        while (count($fullProductList) < 20) {
            $fullProductList = array_merge($fullProductList, $teacherProducts);
        }
        $fullProductList = array_slice($fullProductList, 0, 20);

        return new Collection($fullProductList);
    }

    /**
     * Pagine manuellement une Collection Laravel.
     * Cette méthode est conservée car votre méthode index() l'utilise.
     */
    private function paginateCollection(Collection $items, int $perPage): LengthAwarePaginator
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $items->slice(($currentPage - 1) * $perPage, $perPage);
        return new LengthAwarePaginator(
            $currentPageItems,
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    /**
     * BLOG (Correction de l'erreur "Lire →")
     */
    public function showBlog(): View
    {
        $posts = collect([
            [
                'title' => '6 Exemples Business E-Commerce',
                'excerpt' => 'Découvrez comment lancer votre activité en ligne avec succès.',
                'date' => '22 Fév 2026',
                'image' => 'https://images.unsplash.com/photo-1556742044-3c52d6e88c62?q=80&w=2070'
            ],
            [
                'title' => 'Les tendances éducatives 2026',
                'excerpt' => 'Quelles ressources pour les salles de classe modernes ?',
                'date' => '15 Fév 2026',
                'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2022'
            ]
        ] );

        return view('pages.blog', compact('posts'));
    }

    /**
     * CENTRE D'AIDE (Correction de l'erreur "Accéder →")
     */
    public function showHelpCenter(): View
    {
        $faqs = collect([
            ['question' => 'Comment commander ?', 'answer' => 'Sélectionnez vos produits et passez à la caisse.'],
            ['question' => 'Quels sont les délais ?', 'answer' => 'La livraison prend entre 3 et 7 jours ouvrés.']
        ]);

        return view('pages.help-center', compact('faqs'));
    }

    /**
     * DÉTAIL PRODUIT
     */
    public function show(string $slug): View
{
    // Récupère le produit correspondant
    $product = Arr::first($this->getProductData()->toArray(), fn($p) => $p['slug'] === $slug);

    abort_if(!$product, 404, 'Produit non trouvé');

    // Produits liés : les 4 premiers autres produits
    $relatedProducts = $this->getProductData()
                            ->where('slug', '!=', $slug)
                            ->take(4);

    return view('pages.product-single', [
        'product' => $product,               // reste un tableau
        'relatedProducts' => $relatedProducts->toArray(), // collection → tableau
    ]);
}
}
