<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-900">
            Welcome back, {{ Auth::user()->name }} 👋
        </h2>
        <p class="text-sm text-indigo-400 mt-1">Here's what's happening on your blog today.</p>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            {{-- Stats row --}}
            <div class="grid grid-cols-2 gap-4 mb-8">
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <p class="text-sm text-gray-500 mb-1">Your Posts</p>
                    <p class="text-4xl font-bold text-indigo-600">
                        {{ Auth::user()->posts()->count() }}
                    </p>
                </div>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                    <p class="text-sm text-gray-500 mb-1">Total Posts</p>
                    <p class="text-4xl font-bold text-gray-800">
                        {{ \App\Models\Post::count() }}
                    </p>
                </div>
            </div>

            {{-- Quick actions --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Quick Actions</h3>
                <div class="flex items-center gap-3">
                    <a href="{{ route('posts.create') }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-5 py-2.5 rounded-full transition">
                        + Write a Post
                    </a>
                    <a href="{{ route('posts.index') }}"
                       class="border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm font-semibold px-5 py-2.5 rounded-full transition">
                        Browse Posts
                    </a>
                </div>
            </div>

            {{-- Recent posts by this user --}}
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Your Recent Posts</h3>
                @forelse (Auth::user()->posts()->latest()->take(5)->get() as $post)
                    <div class="flex items-center justify-between py-3 border-b border-gray-50 last:border-0">
                        <div>
                            <a href="{{ route('posts.show', $post->id) }}"
                               class="text-sm font-semibold text-gray-800 hover:text-indigo-600">
                                {{ $post->title }}
                            </a>
                            <p class="text-xs text-gray-400 mt-0.5">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ route('posts.edit', $post->id) }}"
                           class="text-xs text-indigo-500 hover:underline">
                            Edit
                        </a>
                    </div>
                @empty
                    <p class="text-sm text-gray-400 text-center py-4">You haven't written anything yet.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
