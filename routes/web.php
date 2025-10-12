<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Routes pour les sections dynamiques (optionnel)
Route::get('/why-us', function () {
    return view('pages.why-us');
})->name('why-us');

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
