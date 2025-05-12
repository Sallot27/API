<x-layout>
    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-gray-800 dark:to-gray-900 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-6xl font-bold text-white dark:text-gray-100">Portfolio</h1>
            </div>
        </div>
    </section>

    {{-- Image Gallery Section --}}
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-8">Image Gallery</h2>

            @php
                $response = \Illuminate\Support\Facades\Http::get('/api/data');
                $images = json_decode($response->body(), true);
            @endphp

            @if (count($images))
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @foreach ($images as $image)
                        <div class="relative overflow-hidden rounded-lg shadow-lg">
                            <img src="{{ $image }}"
                                 alt="Image"
                                 class="w-full h-auto object-cover rounded-md border dark:border-gray-700">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                                <p class="text-white text-sm">{{ basename($image) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-500 dark:text-gray-300 mt-8">No images found in the uploads folder.</p>
            @endif
        </div>
    </section>
</x-layout>

