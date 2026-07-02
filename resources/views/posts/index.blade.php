<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Latest Posts</h2>
                <p class="text-sm text-gray-500 mt-1">Thoughts, stories and ideas</p>
            </div>
            <a href="{{ route('posts.create') }}"
               class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">
                + New Post
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            @if (session('status'))
                <div class="mb-6 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 text-sm px-4 py-3 rounded-xl">
                    <span>✓</span> {{ session('status') }}
                </div>
            @endif

            @forelse ($posts as $post)
                <article class="bg-white rounded-2xl shadow-sm border border-gray-100 mb-6 overflow-hidden hover:shadow-md transition">

                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}"
                             class="w-full h-52 object-cover">
                    @endif

                    <div class="p-6">
                        {{-- Author row --}}
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm">
                                {{ strtoupper(substr($post->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-gray-800">{{ $post->user->name }}</p>
                                <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>

                        {{-- Title --}}
                        <h2 class="text-xl font-bold text-gray-900 mb-2 leading-snug">
                            {{ $post->title }}
                        </h2>

                        {{-- Body preview --}}
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">
                            {{ Str::limit($post->body, 120) }}
                        </p>

                        {{-- Read more --}}
                        <a href="{{ route('posts.show', $post->id) }}"
                           class="inline-block text-indigo-600 text-sm font-semibold hover:underline">
                            Read more →
                        </a>
                    </div>

                </article>
            @empty
                <div class="text-center py-20 text-gray-400">
                    <p class="text-5xl mb-4">✍️</p>
                    <p class="text-lg font-medium">No posts yet</p>
                    <p class="text-sm mt-1">Be the first to share something!</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>