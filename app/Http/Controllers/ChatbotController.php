<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Product;
use OpenAI\Laravel\Facades\OpenAI;

class ChatbotController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        $validated = $request->validate(['question' => 'required|string|max:500']);
        $userQuestion = $validated['question'];

        // ÉTAPE 1 : VECTORISER LA QUESTION DE L'UTILISATEUR
        $questionEmbedding = $this->getEmbedding($userQuestion);

        // ÉTAPE 2 : TROUVER LES PRODUITS PERTINENTS (Recherche Sémantique)
        $relevantProducts = $this->findRelevantProducts($questionEmbedding);

        // ÉTAPE 3 : CONSTRUIRE LE CONTEXTE POUR L'IA
        $context = "Contexte des produits pertinents trouvés sur la boutique :\n";
        if ($relevantProducts->isEmpty()) {
            $context .= "Aucun produit spécifique trouvé. Réponds en utilisant tes connaissances générales sur la boutique.\n";
        } else {
            foreach ($relevantProducts as $product) {
                $context .= "- Titre: {$product->title}, Description: {$product->description}, Prix: {$product->price}€, URL: {$product->product_url}\n";
            }
        }

        // ÉTAPE 4 : CRÉER LE PROMPT FINAL ET INTERROGER L'IA
        $systemPrompt = $this->getSystemPrompt();
        
        try {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-4-turbo', // Un modèle plus puissant est recommandé pour le RAG
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => "En te basant STRICTEMENT sur le contexte suivant, réponds à ma question.\n\nContexte:\n$context\n\nQuestion:\n$userQuestion"],
                ],
            ]);

            return response()->json(['reply' => $response->choices[0]->message->content]);
        } catch (\Exception $e) {
            // ... (gestion des erreurs) ...
        }
    }

    // Fonction pour obtenir l'embedding d'un texte
    private function getEmbedding(string $text): array
    {
        $response = OpenAI::embeddings()->create([
            'model' => 'text-embedding-ada-002',
            'input' => $text,
        ]);
        return $response->embeddings[0]->embedding;
    }

    // Fonction pour trouver les produits pertinents
    private function findRelevantProducts(array $questionEmbedding, int $limit = 3)
    {
        $allProducts = Product::whereNotNull('embedding')->get();
        
        $allProducts->each(function ($product) use ($questionEmbedding) {
            $productEmbedding = json_decode($product->embedding, true);
            $product->similarity = $this->cosineSimilarity($questionEmbedding, $productEmbedding);
        });

        return $allProducts->sortByDesc('similarity')->take($limit);
    }

    // Fonction mathématique pour calculer la similarité entre deux vecteurs
    private function cosineSimilarity(array $vecA, array $vecB): float
    {
        $dotProduct = 0.0;
        $normA = 0.0;
        $normB = 0.0;
        for ($i = 0; $i < count($vecA); $i++) {
            $dotProduct += $vecA[$i] * $vecB[$i];
            $normA += $vecA[$i] * $vecA[$i];
            $normB += $vecB[$i] * $vecB[$i];
        }
        $normA = sqrt($normA);
        $normB = sqrt($normB);
        if ($normA == 0 || $normB == 0) {
            return 0.0;
        }
        return $dotProduct / ($normA * $normB);
    }

    // Le prompt système de base
    private function getSystemPrompt(): string
    {
        return "Tu es 'FurniBot', un assistant IA expert pour le site e-commerce 'Furniro'. Réponds de manière amicale et concise en te basant uniquement sur le contexte fourni. Ne mentionne pas 'basé sur le contexte'. Agis comme si tu connaissais l'information directement. Si le contexte ne te permet pas de répondre, dis-le poliment.";
    }
}
