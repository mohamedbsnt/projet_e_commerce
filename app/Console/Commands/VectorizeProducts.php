<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use OpenAI\Laravel\Facades\OpenAI;

class VectorizeProducts extends Command
{
    protected $signature = 'app:vectorize-products';
    protected $description = 'Génère et sauvegarde les embeddings pour tous les produits.';

    public function handle()
    {
        $this->info('Démarrage de la vectorisation des produits...');
        $products = Product::all();

        foreach ($products as $product) {
            // 1. Créer le texte à vectoriser
            $textToVectorize = "Titre: {$product->title}. Catégorie: {$product->category}. Description: {$product->description}";

            // 2. Appeler l'API d'OpenAI pour obtenir l'embedding
            $response = OpenAI::embeddings()->create([
                'model' => 'text-embedding-ada-002', // Modèle standard pour les embeddings
                'input' => $textToVectorize,
            ]);

            $embedding = $response->embeddings[0]->embedding;

            // 3. Sauvegarder le vecteur (encodé en JSON)
            $product->embedding = json_encode($embedding);
            $product->save();

            $this->info("Produit '{$product->title}' vectorisé.");
        }

        $this->info('Vectorisation terminée avec succès !');
        return 0;
    }
}
