<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('stories.index') }}" class="text-sm text-indigo-600 hover:underline font-medium">
            ← Back to Stories
        </a>
    </x-slot>

    <div class="py-10">
        <div class="max-w-lg mx-auto px-4 sm:px-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                @if ($story->media)
                         <img src="{{ asset('storage/' . $story->media) }}"
                         class="w-full object-cover max-h-96">
                @endif

                <div class="p-6">
                    {{-- Author --}}
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                            {{ strtoupper(substr($story->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $story->user->name }}</p>
                            <p class="text-xs text-gray-400">{{ $story->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    {{-- Caption --}}
                    <p class="text-gray-700 text-base leading-relaxed">{{ $story->caption }}</p>

                    {{-- Delete (no edit since no edit route) --}}
                    @if (Auth::id() == $story->user_id)
                        <div class="flex items-center gap-3 mt-6 pt-4 border-t border-gray-100">
                            <form action="{{ route('stories.destroy', $story->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this story?')"
                                        class="text-sm font-semibold text-red-500 border border-red-200 px-4 py-2 rounded-full hover:bg-red-50 transition">
                                    Delete Story
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
