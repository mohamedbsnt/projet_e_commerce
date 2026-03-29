<?php

// Fichier : app/Services/AliExpressService.php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http; // Le client HTTP de Laravel

class AliExpressService
{
    protected string $apiKey;
    protected string $apiEndpoint;

    public function __construct()
    {
        // IMPORTANT : Stockez toujours vos clés API dans votre fichier .env !
        // Dans .env, vous ajouteriez : ALIEXPRESS_API_KEY=votre_cle_secrete
        $this->apiKey = config('services.aliexpress.key');
        $this->apiEndpoint = 'https://api.aliexpress.com/v2/products'; // URL d'exemple
    }

    /**
     * Récupère une liste de produits depuis l'API d'AliExpress.
     *
     * @param int $limit Le nombre de produits à récupérer.
     * @return Collection Une collection de produits formatés.
     */
    public function getProducts(int $limit = 20 ): Collection
    {
        // --- SIMULATION D'APPEL API ---
        // Un vrai appel ressemblerait à ceci :
        /*
        $response = Http::withHeaders(['X-Api-Key' => $this->apiKey])
                        ->get($this->apiEndpoint, ['limit' => $limit, 'sort' => 'newest']);

        if ($response->failed()) {
            // Gérer l'erreur (log, exception, etc.)
            return new Collection();
        }

        // On transformerait la réponse JSON en collection
        $productsFromApi = $response->json()['data'];
        return $this->formatProducts($productsFromApi);
        */

        // Pour notre exemple, nous allons retourner des données simulées.
        // Ces données imitent la structure que l'API pourrait renvoyer.
        return $this->getMockedProducts($limit);
    }

    /**
     * Formate les données brutes de l'API en un format standardisé pour notre application.
     */
    private function formatProducts(array $apiProducts): Collection
    {
        return collect($apiProducts)->map(function ($product) {
            return [
                'title'       => $product['product_title'],
                'category'    => $product['category_name'],
                'price'       => $product['sale_price'] . ' €',
                'old_price'   => $product['original_price'] . ' €',
                'discount'    => null, // L'API ne le fournit peut-être pas
                'is_new'      => true,
                'image_url'   => $product['main_image_url'],
                'product_url' => $product['product_detail_url'],
            ];
        });
    }

    /**
     * Retourne des données de test pour simuler une réponse de l'API.
     */
    private function getMockedProducts(int $limit): Collection
    {
        $allProducts = new Collection([
            ['title' => 'Lampe LED Moderne', 'category' => 'Éclairage', 'price' => '19.99 €', 'old_price' => '29.99 €', 'is_new' => true, 'image_url' => 'https://i.imgur.com/GEXT6Gv.png', 'product_url' => '#'],
            ['title' => 'Tasse en Céramique', 'category' => 'Cuisine', 'price' => '8.50 €', 'old_price' => false, 'is_new' => true, 'image_url' => 'https://i.imgur.com/K5a4zfu.png', 'product_url' => '#'],
            ['title' => 'Ventilateur de Plafond', 'category' => 'Maison', 'price' => '120.00 €', 'old_price' => false, 'is_new' => false, 'image_url' => 'https://i.imgur.com/NfT1u2o.png', 'product_url' => '#'],
            // Ajoutez autant de produits simulés que vous voulez
        ] );

        return $allProducts->take($limit);
    }
}
