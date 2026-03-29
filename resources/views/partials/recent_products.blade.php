<section class="py-20 bg-white">
    <div class="px-4 mx-auto max-w-7xl">
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-3xl font-bold text-gray-900">Our Products</h2>
            <p class="text-gray-600">Découvrez nos dernières ressources éducatives</p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
            @isset($showcaseProducts)
                @foreach($showcaseProducts as $product)
                    <div class="group bg-[#F4F5F7] relative overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden aspect-square">
                            <img src="{{ $product['image_url'] ?? $product->image_url }}" 
                                 alt="{{ $product['title'] ?? $product->title }}" 
                                 class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                            
                            @if(isset($product['is_new']) && $product['is_new'])
                                <div class="absolute top-5 right-5 w-12 h-12 bg-[#2EC1AC] rounded-full flex items-center justify-center text-white text-sm font-medium">New</div>
                            @endif
                        </div>

                        <!-- Content -->
                        <div class="p-4 bg-white">
                            <h3 class="text-xl font-semibold text-[#3A3A3A] mb-1">{{ $product['title'] ?? $product->title }}</h3>
                            <p class="text-[#898989] text-sm mb-2">{{ $product['category'] ?? $product->category }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-lg font-bold text-[#3A3A3A]">${{ number_format($product['price'] ?? $product->price, 2) }}</span>
                            </div>
                        </div>

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center space-y-4 transition-opacity duration-300 opacity-0 bg-black/40 group-hover:opacity-100">
                            <a href="{{ route('product.show', $product['slug'] ?? $product->slug) }}" 
                               class="px-8 py-3 font-semibold transition-colors bg-white text-brand-primary hover:bg-brand-primary hover:text-white">
                               View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center text-gray-400 col-span-full">Aucun produit à afficher pour le moment.</p>
            @endisset
        </div>
    </div>
</section>
