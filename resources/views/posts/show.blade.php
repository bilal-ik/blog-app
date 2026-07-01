<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg overflow-hidden">

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                         class="w-full h-64 object-cover">
                @endif

                <div class="p-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">
                        {{ $post->title }}
                    </h1>
                    <p class="text-sm text-gray-500 mb-4">
                        By {{ $post->user->name }} · {{ $post->created_at->diffForHumans() }}
                    </p>
                    <hr class="mb-4">
                    <p class="text-gray-700 leading-relaxed mb-6">
                        {{ $post->body }}
                    </p>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('posts.index') }}"
                           class="text-gray-500 hover:underline text-sm">
                            ← Back to Posts
                        </a>

                        @if (Auth::id() == $post->user_id)
                            <a href="{{ route('posts.edit', $post->id) }}"
                               class="bg-indigo-600 text-white px-4 py-2 rounded-md text-sm hover:bg-indigo-700">
                                Edit
                            </a>

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Delete this post?')"
                                        class="bg-red-500 text-white px-4 py-2 rounded-md text-sm hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>