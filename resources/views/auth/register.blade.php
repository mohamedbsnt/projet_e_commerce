@extends('layouts.app')

@section('title', 'Créer un Compte - Furniro')
@section('description', 'Rejoignez Furniro et découvrez un monde de meubles design et de haute qualité.')

@section('content')
<div class="flex items-center justify-center min-h-screen px-4 py-12 bg-gray-50 sm:px-6 lg:px-8">
    <div class="w-full max-w-md p-8 space-y-8 bg-white shadow-lg rounded-2xl">
        
        {{-- En-tête du formulaire --}}
        <div>
            <a href="{{ route('home') }}" class="flex justify-center">
                <h2 class="text-3xl font-bold text-brand-primary">Furniro</h2>
            </a>
            <h2 class="mt-6 text-3xl font-extrabold text-center text-brand-gray-1">
                Créez votre compte
            </h2>
            <p class="mt-2 text-center text-gray-600">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}" class="font-medium text-brand-primary hover:text-amber-600">
                    Connectez-vous ici
                </a>
            </p>
        </div>

        {{-- Formulaire d'inscription --}}
        <form class="mt-8 space-y-6" action="#" method="POST">
            @csrf
            
            <div class="space-y-4 rounded-md shadow-sm">
                <div>
                    <label for="name" class="sr-only">Nom complet</label>
                    <input id="name" name="name" type="text" autocomplete="name" required 
                           class="relative block w-full px-3 py-3 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-brand-primary focus:border-brand-primary focus:z-10 sm:text-sm" 
                           placeholder="Nom complet">
                </div>
                <div>
                    <label for="email-address" class="sr-only">Adresse e-mail</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required 
                           class="relative block w-full px-3 py-3 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-brand-primary focus:border-brand-primary focus:z-10 sm:text-sm" 
                           placeholder="Adresse e-mail">
                </div>
                <div>
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required 
                           class="relative block w-full px-3 py-3 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-brand-primary focus:border-brand-primary focus:z-10 sm:text-sm" 
                           placeholder="Mot de passe">
                </div>
                 <div>
                    <label for="password-confirmation" class="sr-only">Confirmez le mot de passe</label>
                    <input id="password-confirmation" name="password_confirmation" type="password" autocomplete="new-password" required 
                           class="relative block w-full px-3 py-3 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md appearance-none focus:outline-none focus:ring-brand-primary focus:border-brand-primary focus:z-10 sm:text-sm" 
                           placeholder="Confirmez le mot de passe">
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="relative flex justify-center w-full px-4 py-3 text-sm font-medium text-white border border-transparent rounded-md group bg-brand-primary hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                    Créer mon compte
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
