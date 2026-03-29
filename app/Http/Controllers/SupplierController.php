<?php

namespace App\Http\Controllers;

use App\Services\SupplierApiService;
use Illuminate\View\View;

class SupplierController extends Controller
{
    protected $apiService;

    public function __construct(SupplierApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function show(string $supplier): View
    {
        $slug = strtolower($supplier);
        
        // 1. Récupération des données réelles via l'API
        // On cherche des produits éducatifs spécifiques au fournisseur
        $products = $this->apiService->getProducts($slug, 'educational resources');

        // 2. Configuration visuelle (On garde votre style Dribbble)
        $configs = [
            'aliexpress' => ['name' => 'AliExpress', 'color' => '#FF4747', 'hero_image' => '...'],
            'walmart' => ['name' => 'Walmart', 'color' => '#0071CE', 'hero_image' => '...'],
            // ... autres configs
        ];

        $config = $configs[$slug] ?? abort(404);

        return view('pages.supplier-section', compact('config', 'products'));
    }
}
