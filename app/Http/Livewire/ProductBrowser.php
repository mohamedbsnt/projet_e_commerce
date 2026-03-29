<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductBrowser extends Component
{
    use WithPagination;

    // Propriétés pour stocker l'état des filtres et de la recherche
    public $search = '';
    public $category;
    public $classroom;
    public $minPrice;
    public $maxPrice;
    public $sort = 'default';

    // Permet de réinitialiser la pagination à chaque nouvelle recherche/filtre
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Méthodes appelées par wire:click depuis la vue
    public function filterByCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }

    public function filterByClassroom($classroom)
    {
        $this->classroom = $classroom;
        $this->resetPage();
    }

    public function filterByPrice($min, $max)
    {
        $this->minPrice = $min;
        $this->maxPrice = $max;
        $this->resetPage();
    }

    public function sortBy($sort)
    {
        $this->sort = $sort;
    }

    public function resetFilters()
    {
        $this->reset(['search', 'category', 'classroom', 'minPrice', 'maxPrice', 'sort']);
        $this->resetPage();
    }

    // La méthode render est le cœur : elle récupère les données et affiche la vue
    public function render()
    {
        $allProducts = $this->getProductData();

        // --- LOGIQUE DE RECHERCHE ---
        if ($this->search) {
            $searchTerm = strtolower($this->search);
            $allProducts = $allProducts->filter(fn($p) => str_contains(strtolower($p['title']), $searchTerm));
        }

        // --- LOGIQUE DE FILTRAGE ---
        if ($this->category) {
            $allProducts = $allProducts->where('category', $this->category);
        }
        // Ajoutez d'autres filtres ici (classroom, etc.) si nécessaire

        if ($this->minPrice !== null && $this->maxPrice !== null) {
            $allProducts = $allProducts->whereBetween('price_numeric', [$this->minPrice, $this->maxPrice]);
        }

        // --- LOGIQUE DE TRI ---
        switch ($this->sort) {
            case 'price_low':
                $allProducts = $allProducts->sortBy('price_numeric');
                break;
            case 'price_high':
                $allProducts = $allProducts->sortByDesc('price_numeric');
                break;
            case 'newest':
                $allProducts = $allProducts->sortByDesc('is_new');
                break;
        }

        $paginatedProducts = $this->paginateCollection($allProducts, 8); // 8 produits par page pour un meilleur visuel

        // Émettre un événement pour qu'Alpine.js puisse relancer les animations
        $this->dispatchBrowserEvent('products-updated');

        return view('livewire.product-browser', [
            'products' => $paginatedProducts,
        ]);
    }

    /**
     * Pagine manuellement une Collection.
     */
    private function paginateCollection(Collection $items, int $perPage): LengthAwarePaginator
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentPageItems = $items->slice(($currentPage - 1) * $perPage, $perPage)->values();
        return new LengthAwarePaginator($currentPageItems, $items->count(), $perPage, $currentPage, ['path' => LengthAwarePaginator::resolveCurrentPath()]);
    }

    /**
     * Récupération des données produits (copiée depuis votre ProductController).
     */
    private function getProductData(): Collection
    {
        $teacherProducts = [
            // ... (collez ici l'intégralité de votre tableau $teacherProducts) ...
            // J'ajoute une clé 'price_numeric' pour faciliter le tri et le filtrage.
            [
                'title' => 'St. Patrick\'s Day Fun Pack', 'category' => 'Activités Saisonnières', 'price' => 'Gratuit', 'price_numeric' => 0,
                'old_price' => false, 'discount' => false, 'is_new' => true,
                'image_url' => 'https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/St-Patrick-s-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434-1741562387/750f-13114434-1.jpg',
                'product_url' => 'https://www.teacherspayteachers.com/Product/St-Patricks-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434',
            ],
            [
                'title' => 'Alphabet Tracing Worksheets', 'category' => 'Écriture', 'price' => '4.99 €', 'price_numeric' => 4.99,
                'old_price' => '6.99 €', 'discount' => '-28%', 'is_new' => false,
                'image_url' => 'https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283-1752852811/750f-13987283-1.jpg',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
            // ... etc. pour tous vos produits.
        ];
        
        $fullProductList = [];
        while (count($fullProductList ) < 20) {
            $fullProductList = array_merge($fullProductList, $teacherProducts);
        }
        return new Collection(array_slice($fullProductList, 0, 20));
    }
}
