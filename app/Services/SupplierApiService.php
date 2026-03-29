<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class SupplierApiService
{
    protected $apiKey;
    protected $apiHost;

    public function __construct()
    {
        $this->apiKey = env('RAPID_API_KEY');
        $this->apiHost = env('RAPID_API_HOST');
    }

    public function getProducts(string $supplier, string $query = 'educational toys')
    {
        // On utilise le cache (6 heures) pour éviter de payer trop de crédits API
        return Cache::remember("products_{$supplier}_{$query}", 21600, function () use ($supplier, $query) {
            
            $response = Http::withHeaders([
                'X-RapidAPI-Key' => $this->apiKey,
                'X-RapidAPI-Host' => $this->apiHost,
            ])->get("https://{$this->apiHost}/search", [
                'query' => $query,
                'supplier' => $supplier, // Filtrage par fournisseur
                'page' => 1
            ] );

            if ($response->successful()) {
                return $this->formatData($response->json()['data'] ?? []);
            }

            return collect([]); // Retourne vide en cas d'erreur
        });
    }

    private function formatData(array $items)
    {
        return collect($items)->map(fn($item) => [
            'id' => $item['productId'] ?? rand(1, 1000),
            'slug' => str($item['title'])->slug(),
            'title' => $item['title'],
            'category' => $item['categoryName'] ?? 'General',
            'price' => (float)($item['price']['value'] ?? 0),
            'image_url' => $item['imageUrl'] ?? 'https://via.placeholder.com/500',
            'affiliate_url' => $item['productUrl'] ?? '#'
        ] );
    }
}
