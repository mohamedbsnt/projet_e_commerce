<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentationController extends Controller
{
    /**
     * Affiche la page principale de la documentation.
     */
    public function index(): View
    {
        // On simule des données pour la documentation.
        // Plus tard, vous pourrez les récupérer depuis une base de données.
        $categories = [
            'Getting Started' => [
                ['title' => 'Introduction', 'slug' => 'introduction'],
                ['title' => 'Installation', 'slug' => 'installation'],
                ['title' => 'Configuration', 'slug' => 'configuration'],
            ],
            'Core Concepts' => [
                ['title' => 'Product Management', 'slug' => 'product-management'],
                ['title' => 'Order Processing', 'slug' => 'order-processing'],
                ['title' => 'Customer Accounts', 'slug' => 'customer-accounts'],
            ],
            'API Reference' => [
                ['title' => 'Authentication', 'slug' => 'api-authentication'],
                ['title' => 'Products API', 'slug' => 'api-products'],
                ['title' => 'Orders API', 'slug' => 'api-orders'],
            ],
        ];

        // On envoie les données à la vue.
        return view('pages.documentation', [
            'categories' => $categories
        ]);
    }
  
}
