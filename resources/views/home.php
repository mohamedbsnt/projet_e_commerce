@extends('layouts.app')

@section('title', 'Accueil')

@push('styles')
<style>
    .hero { background: url('/images/hero-bg.jpg') center/cover no-repeat; }
</style>
@endpush

@section('content')
    <section class="hero h-64 rounded-lg shadow-lg mb-8 flex items-center justify-center text-white">
        <h1 class="text-4xl font-bold">Bienvenue sur MonApp</h1>
    </section>

    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-2">Fonctionnalité 1</h2>
            <p>Description de la fonctionnalité 1.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-2">Fonctionnalité 2</h2>
            <p>Description de la fonctionnalité 2.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-2xl font-semibold mb-2">Fonctionnalité 3</h2>
            <p>Description de la fonctionnalité 3.</p>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    console.log('Page Accueil chargée');
</script>
@endpush
