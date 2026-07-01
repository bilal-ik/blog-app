<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Posts') }}
            </h2>
            <a href="{{ route('posts.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700">
                + New Post
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('status'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('status') }}
                </div>
            @endif

            @forelse ($posts as $post)
                <div class="bg-white shadow-sm rounded-lg mb-6 overflow-hidden">

                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                             class="w-full h-48 object-cover">
                    @endif

                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-800 mb-1">
                            {{ $post->title }}
                        </h2>
                        <p class="text-sm text-gray-500 mb-3">
                            By {{ $post->user->name }} · {{ $post->created_at->diffForHumans() }}
                        </p>
                        <p class="text-gray-600 mb-4">
                            {{ Str::limit($post->body, 150) }}
                        </p>
                        <a href="{{ route('posts.show', $post->id) }}"
                           class="text-indigo-600 hover:underline text-sm font-medium">
                            Read More →
                        </a>
                    </div>

                </div>
            @empty
                <div class="bg-white shadow-sm rounded-lg p-6 text-center text-gray-500">
                    No posts yet. Be the first to create one!
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>