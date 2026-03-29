<footer class="pt-20 pb-12 bg-white border-t border-gray-100">
    <div class="container px-4 mx-auto sm:px-6 lg:px-8">
        
        {{-- Grille principale --}}
        <div class="grid grid-cols-1 gap-12 mb-20 md:grid-cols-2 lg:grid-cols-4">
            
            {{-- Colonne 1 : Marque et Contact --}}
            <div class="flex flex-col">
                <h2 class="mb-8 text-2xl font-bold text-black">Furniro.</h2>
                <div class="mb-8 space-y-1 text-sm leading-relaxed text-gray-400">
                    <p>400 University Drive Suite 200</p>
                    <p>Coral Gables, FL 33134 USA</p>
                </div>
                {{-- Icônes Sociales --}}
                <div class="flex space-x-4">
                    <a href="#" class="flex items-center justify-center text-black transition-all duration-300 bg-white border border-gray-200 rounded-full shadow-sm w-9 h-9 hover:bg-brand-primary hover:text-white hover:border-brand-primary">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="flex items-center justify-center text-black transition-all duration-300 bg-white border border-gray-200 rounded-full shadow-sm w-9 h-9 hover:bg-brand-primary hover:text-white hover:border-brand-primary">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Colonne 2 : Navigation (Links) --}}
            <div class="flex flex-col">
                <h3 class="text-gray-400 font-medium uppercase tracking-[0.2em] text-xs mb-8">Links</h3>
                <ul class="space-y-6">
                    <li><a href="{{ route('home') }}" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Shop</a></li>
                    <li><a href="{{ route('why-us') }}" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Why Us?</a></li>
                    <li><a href="{{ route('pricing') }}" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Pricing</a></li>
                </ul>
            </div>

            {{-- Colonne 3 : Support & Ressources --}}
            <div class="flex flex-col">
                <h3 class="text-gray-400 font-medium uppercase tracking-[0.2em] text-xs mb-8">Support</h3>
                <ul class="space-y-6">
                    <li><a href="{{ route('integrations') }}" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Integrations</a></li>
                    <li><a href="{{ route('suppliers') }}" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Suppliers</a></li>
                    <li><a href="{{ route('resources') }}" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Resources</a></li>
                    <li><a href="#" class="text-sm font-bold text-black transition-colors hover:text-brand-primary">Privacy Policy</a></li>
                </ul>
            </div>

            {{-- Colonne 4 : Newsletter --}}
            <div class="flex flex-col">
                <h3 class="text-gray-400 font-medium uppercase tracking-[0.2em] text-xs mb-8">Newsletter</h3>
                <div class="space-y-6">
                    <p class="text-sm leading-relaxed text-gray-400">Stay updated with our latest collections and news.</p>
                    <form class="flex items-end space-x-4">
                        <div class="flex-grow pb-2 border-b border-black">
                            <input type="email" placeholder="Enter Your Email Address" class="w-full text-sm bg-transparent border-none outline-none placeholder:text-gray-300">
                        </div>
                        <button type="submit" class="pb-2 text-sm font-bold tracking-widest text-black uppercase transition-all border-b border-black hover:text-brand-primary hover:border-brand-primary">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Barre de Copyright et Paiements --}}
        <div class="flex flex-col items-center justify-between gap-6 pt-10 border-t border-gray-100 md:flex-row">
            <p class="text-sm font-medium text-black">
                &copy; {{ date('Y') }} Furniro. All rights reserved.
            </p>
            <div class="flex items-center space-x-8 transition-all duration-500 opacity-40 grayscale hover:grayscale-0">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="h-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-6">
                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal" class="h-4">
            </div>
        </div>
    </div>
</footer>
