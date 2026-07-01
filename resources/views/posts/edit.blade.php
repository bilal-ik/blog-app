<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">

                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                        <input type="text" name="title" value="{{ old('title', $post->title) }}"
                               class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Body</label>
                        <textarea name="body" rows="6"
                                  class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('body', $post->body) }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Image (optional)</label>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}"
                                 class="w-full max-w-xs rounded-md mb-3">
                            <p class="text-sm text-gray-500 mb-2">Upload a new image to replace it:</p>
                        @endif
                        <input type="file" name="image" accept="image/*"
                               class="text-sm text-gray-500">
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                                class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">
                            Update Post
                        </button>
                        <a href="{{ route('posts.index') }}" class="text-gray-500 hover:underline text-sm">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>