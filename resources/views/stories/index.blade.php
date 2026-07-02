<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Stories</h2>
                <p class="text-sm text-gray-500 mt-1">Moments worth remembering</p>
            </div>
            <a href="{{ route('stories.create') }}"
               class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">
                + Create Story
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            @if (session('status'))
                <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 text-sm px-4 py-3 rounded-xl">
                    <span>✓</span> {{ session('status') }}
                </div>
            @endif

            @if ($stories->count())
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($stories as $story)
                        <div class="relative group rounded-2xl overflow-hidden shadow-sm border border-gray-100 bg-white hover:shadow-md transition">

                            @if ($story->media)
                                <img src="{{ asset('storage/' . $story->media) }}"
                                     class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-64 bg-indigo-50 flex items-center justify-center">
                                    <span class="text-4xl">📖</span>
                                </div>
                            @endif

                            {{-- Gradient overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                            {{-- Bottom info --}}
                            <div class="absolute bottom-0 left-0 right-0 p-4">
                                <p class="text-white font-semibold text-sm truncate">{{ $story->caption }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <div class="w-5 h-5 rounded-full bg-indigo-400 flex items-center justify-center text-white text-xs font-bold">
                                        {{ strtoupper(substr($story->user->name, 0, 1)) }}
                                    </div>
                                    <p class="text-white/80 text-xs">{{ $story->user->name }}</p>
                                </div>
                            </div>

                            <a href="{{ route('stories.show', $story->id) }}" class="absolute inset-0"></a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 text-gray-400">
                    <p class="text-5xl mb-4">📸</p>
                    <p class="text-lg font-medium">No stories yet</p>
                    <p class="text-sm mt-1">Be the first to share a moment!</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>