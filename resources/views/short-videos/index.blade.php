<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Short Videos</h2>
                <p class="text-sm text-gray-500 mt-1">Watch and share short clips</p>
            </div>
            <a href="{{ route('short-videos.create') }}"
               class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">
                + Upload Video
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

            @if ($videos->count())
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($videos as $video)
                        <div class="relative group rounded-2xl overflow-hidden shadow-sm border border-gray-100 bg-black hover:shadow-md transition">

                            <video class="w-full h-64 object-cover"
                                   src="{{ asset('storage/' . $video->video) }}"
                                   muted playsinline
                                   onmouseover="this.play()"
                                   onmouseout="this.pause(); this.currentTime=0;">
                            </video>

                            {{-- Overlay --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent pointer-events-none"></div>

                            {{-- Play icon --}}
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center group-hover:bg-white/10 transition">
                                    <span class="text-white text-xl">▶</span>
                                </div>
                            </div>

                            {{-- Duration badge --}}
                            @if ($video->duration)
                                <div class="absolute top-3 right-3 bg-black/50 text-white text-xs px-2 py-1 rounded-full pointer-events-none">
                                    {{ $video->duration }}s
                                </div>
                            @endif

                            {{-- Bottom info --}}
                            <div class="absolute bottom-0 left-0 right-0 p-3 pointer-events-none">
                                <p class="text-white font-semibold text-sm truncate">{{ $video->title }}</p>
                                <div class="flex items-center gap-2 mt-1">
                                    <div class="w-5 h-5 rounded-full bg-indigo-400 flex items-center justify-center text-white text-xs font-bold">
                                        {{ strtoupper(substr($video->user->name, 0, 1)) }}
                                    </div>
                                    <p class="text-white/70 text-xs">{{ $video->user->name }}</p>
                                </div>
                            </div>

                            <a href="{{ route('short-videos.show', $video->id) }}" class="absolute inset-0"></a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 text-gray-400">
                    <p class="text-5xl mb-4">🎬</p>
                    <p class="text-lg font-medium">No videos yet</p>
                    <p class="text-sm mt-1">Upload the first short video!</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>