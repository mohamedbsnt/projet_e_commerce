<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // <--- CORRECTION : AJOUTEZ CETTE LIGNE !

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Maintenant, Laravel sait où trouver la classe "Product"
        Product::truncate(); 

        $products = [
            [
                'title' => 'St. Patrick\'s Day Fun Pack',
                'category' => 'Activités Saisonnières',
                'description' => 'Un pack amusant d\'activités pour la St Patrick, incluant des jeux, des puzzles et des labyrinthes. Parfait pour les élèves du primaire.',
                'price' => 0.00,
                'is_new' => true,
                'image_url' => 'https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/St-Patrick-s-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434-1741562387/750f-13114434-1.jpg',
                'product_url' => 'https://www.teacherspayteachers.com/Product/St-Patricks-Day-Fun-Pack-Free-Printable-Activities-Games-Puzzles-Mazes-13114434',
                // 'embedding' sera ajouté plus tard par la commande de vectorisation
            ],
            // ... Ajoutez vos autres produits ici ...
            [
                'title'       => 'Alphabet Tracing Worksheets',
                'category'    => 'Écriture',
                'description' => 'Fiches de traçage de l\'alphabet pour aider les jeunes élèves à maîtriser leurs lettres. Idéal pour la maternelle.',
                'price'       => 4.99,
                'is_new'      => false,
                'image_url'   => 'https://ecdn.teacherspayteachers.com/cdn-cgi/image/format=avif,quality=70,width=525,height=525,onerror=redirect/thumbitem/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283-1752852811/750f-13987283-1.jpg',
                'product_url' => 'https://www.teacherspayteachers.com/Product/Back-to-School-Coloring-Pages-First-Week-Activities-Editable-Name-Grade-S-13987283',
            ],
        ];

        foreach ($products as $productData ) {
            Product::create($productData);
        }
    }
}
