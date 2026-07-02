<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Create a Story</h2>
            <p class="text-sm text-gray-500 mt-1">Share a moment with everyone</p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-lg mx-auto px-4 sm:px-6">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                @if ($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 text-sm px-4 py-3 rounded-xl">
                        @foreach ($errors->all() as $error)
                            <p>• {{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Caption</label>
                        <input type="text" name="caption" value="{{ old('caption') }}"
                               placeholder="Write a caption..."
                               class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                    </div>

                    <div class="mb-5">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Type</label>
                        <select name="type"
                                class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>

                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Media</label>
                        <div class="border-2 border-dashed border-gray-200 rounded-xl px-4 py-8 text-center">
                            <p class="text-4xl mb-2">📸</p>
                            <p class="text-sm text-gray-400 mb-3">Upload your photo or video</p>
                            <input type="file" name="media" accept="image/*,video/*"
                                   class="text-sm text-indigo-600">
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold px-6 py-2.5 rounded-full transition">
                            Share Story
                        </button>
                        <a href="{{ route('stories.index') }}" class="text-sm text-gray-400 hover:text-gray-600">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>