@props(['title', 'icon', 'url', 'description'])

<a href="{{ $url }}" target="_blank" class="block bg-white dark:bg-gray-800 overflow-hidden shadow hover:shadow-lg transition rounded-lg">
    <div class="p-6 flex items-center space-x-4">
        <x-heroicon-o-{{ $icon }} class="w-8 h-8 text-red-600" />
        <div>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $title }}</h3>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">{{ $description }}</p>
        </div>
    </div>
</a>
