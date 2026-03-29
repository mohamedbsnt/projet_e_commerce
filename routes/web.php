<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneticAlgorithmController;
use App\Http\Controllers\ProductController; // <-- IMPORTATION AJOUTÉE
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ChatbotController;


Route::post('/chatbot', [ChatbotController::class, 'handle']);

Route::get('/supplier/{slug}', [SupplierController::class, 'show'])->name('supplier.show');

// NOTE : Vous avez deux routes pour '/', vous devriez en garder une seule.
// Je garde celle qui pointe vers le contrôleur.
// --- Routes principales ---
Route::get('/ai-shopify-store', [GeneticAlgorithmController::class, 'show'])->name('ai-shopify-store');
Route::post('/ga/optimize', [GeneticAlgorithmController::class, 'optimize'])->name('ga.optimize');
Route::get('/', [ProductController::class, 'showWelcomePage'])->name('home');

// --- Route pour le catalogue de produits ---
// CETTE LIGNE EST ESSENTIELLE
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// --- Routes statiques ---
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// --- Autres pages statiques ---
Route::get('/why-us', function () {
    return view('pages.why-us');
})->name('why-us');
Route::get('/documentation', [\App\Http\Controllers\DocumentationController::class, 'index'])->name('documentation.index');

Route::get('/help-center', [\App\Http\Controllers\PageController::class, 'showHelpCenter'])->name('help-center.index');
Route::get('/blog', [\App\Http\Controllers\PageController::class, 'showBlog'])->name('blog.index');
// =====================================================
// NOUVELLE ROUTE POUR AFFICHER UN PRODUIT UNIQUE
// =====================================================
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/suppliers/{supplier}', [ProductController::class, 'showSupplierSection'])->name('supplier.index');

// =====================================================
// NOUVELLE ROUTE POUR AFFICHER UN ARTICLE DE BLOG UNIQUE
// =====================================================
Route::get('/blog/{slug}', [\App\Http\Controllers\PageController::class, 'showPost'])->name('blog.show');
Route::get('/integrations', function () {
    return view('pages.integrations');
})->name('integrations');

Route::get('/suppliers', function () {
    return view('pages.suppliers');
})->name('suppliers');

Route::get('/resources', function () {
    return view('pages.resources');
})->name('resources');

Route::get('/pricing', function () {
    return view('pages.pricing');
})->name('pricing');
