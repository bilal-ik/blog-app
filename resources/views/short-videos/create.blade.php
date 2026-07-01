<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-600">{{ __('Upload Short Video') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form action="{{ route('short-videos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-blue-600 mb-2">{{ __('Title') }}</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border border-gray-300 bg-white text-gray-900 px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-blue-600 mb-2">{{ __('Description') }}</label>
                        <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border border-gray-300 bg-white text-gray-900 px-3 py-2">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-blue-600 mb-2">{{ __('Video File') }}</label>
                        <input type="file" name="video" class="mt-1 block w-full text-gray-900 bg-white border border-gray-300 rounded-md px-3 py-2" accept="video/mp4,video/quicktime" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-blue-600 mb-2">{{ __('Duration (seconds)') }}</label>
                        <input type="number" name="duration" value="{{ old('duration') }}" class="mt-1 block w-full rounded-md border border-gray-300 bg-white text-gray-900 px-3 py-2" min="1" max="600">
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('short-videos.index') }}" class="px-4 py-2 text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 font-medium">{{ __('Cancel') }}</a>
                        <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 font-medium">{{ __('Upload') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>