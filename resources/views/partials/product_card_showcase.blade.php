<div class="overflow-hidden transition-all duration-500 bg-white border border-gray-100 product-card group rounded-2xl hover:shadow-2xl">
    <div class="relative overflow-hidden h-80">
        <img src="{{ $product->image_url ?? asset('images/placeholder.png') }}" alt="{{ $product->title ?? 'Titre du produit' }}" class="object-cover w-full h-full transition-transform duration-1000 group-hover:scale-110">
        
        @if($product->is_new ?? false)
            <div class="absolute px-3 py-1 text-sm font-bold text-white bg-green-500 rounded-full shadow-md top-4 right-4">New</div>
        @endif
        @if($product->discount ?? false)
            <div class="absolute px-3 py-1 text-sm font-bold text-white bg-red-500 rounded-full shadow-md top-4 left-4">{{ $product->discount }}</div>
        @endif

        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center backdrop-blur-[3px] p-4">
            <a href="{{ route('product.show', $product->slug ?? '') }}" class="px-8 py-3 font-bold text-white transition-all duration-500 transform translate-y-4 rounded-full bg-brand-primary magnetic-btn group-hover:translate-y-0" title="{{ $product->title ?? '' }}">View Details</a>
        </div>
    </div>

    <div class="p-6 text-left">
        <h3 class="mb-2 text-xl font-bold text-gray-900 truncate">{{ $product->title ?? 'Titre non disponible' }}</h3>
        <p class="mb-3 font-medium text-gray-500">{{ $product->category ?? 'Catégorie' }}</p>
        <div class="text-2xl font-black text-gray-900">{{ $product->price ?? 'Gratuit' }}</div>
    </div>
</div>