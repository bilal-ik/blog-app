<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('short-videos.index') }}" class="text-sm text-indigo-600 hover:underline font-medium">
            ← Back to Shorts
        </a>
    </x-slot>

    <div class="py-10">
        <div class="max-w-lg mx-auto px-4 sm:px-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                {{-- Video player --}}
                <video class="w-full" controls
                       src="{{ asset('storage/' . $shortVideo->video) }}">
                </video>

                <div class="p-6">
                    {{-- Author --}}
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                            {{ strtoupper(substr($shortVideo->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $shortVideo->user->name }}</p>
                            <p class="text-xs text-gray-400">
                                {{ $shortVideo->created_at->diffForHumans() }}
                                @if($shortVideo->duration) · {{ $shortVideo->duration }}s @endif
                            </p>
                        </div>
                    </div>

                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $shortVideo->title }}</h2>

                    @if ($shortVideo->description)
                        <p class="text-gray-600 text-sm leading-relaxed">{{ $shortVideo->description }}</p>
                    @endif

                    {{-- Delete --}}
                    @if (Auth::id() == $shortVideo->user_id)
                        <div class="flex items-center gap-3 mt-6 pt-4 border-t border-gray-100">
                            <form action="{{ route('short-videos.destroy', $shortVideo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this video?')"
                                        class="text-sm font-semibold text-red-500 border border-red-200 px-4 py-2 rounded-full hover:bg-red-50 transition">
                                    Delete Video
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>