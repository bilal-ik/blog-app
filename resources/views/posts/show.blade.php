<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('posts.index') }}" class="text-sm text-indigo-600 hover:underline font-medium">
            ← Back to Posts
        </a>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            <article class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         class="w-full h-64 object-cover">
                @endif

                <div class="p-8">
                    {{-- Title --}}
                    <h1 class="text-3xl font-bold text-gray-900 leading-tight mb-4">
                        {{ $post->title }}
                    </h1>

                    {{-- Author row --}}
                    <div class="flex items-center gap-3 mb-6 pb-6 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold">
                            {{ strtoupper(substr($post->user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $post->user->name }}</p>
                            <p class="text-xs text-gray-400">{{ $post->created_at->format('M d, Y') }} · {{ $post->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    {{-- Body --}}
                    <div class="text-gray-700 leading-relaxed text-base whitespace-pre-line">
                        {{ $post->body }}
                    </div>

                    {{-- Actions --}}
                    @if (Auth::id() == $post->user_id)
                        <div class="flex items-center gap-3 mt-8 pt-6 border-t border-gray-100">
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="text-sm font-semibold text-indigo-600 border border-indigo-200 px-4 py-2 rounded-full hover:bg-indigo-50 transition">
                                Edit Post
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this post?')"
                                        class="text-sm font-semibold text-red-500 border border-red-200 px-4 py-2 rounded-full hover:bg-red-50 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

            </article>
        </div>
    </div>
</x-app-layout>