<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-blue-600">{{ __('Create Story') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <form action="{{ route('stories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-blue-600 mb-2">{{ __('Caption') }}</label>
                        <input type="text" name="caption" value="{{ old('caption') }}"
                               class="mt-1 block w-full rounded-md border border-gray-300 bg-white text-gray-900 px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-blue-600 mb-2">{{ __('Type') }}</label>
                        <select name="type" class="mt-1 block w-full rounded-md border border-gray-300 bg-white text-gray-900 px-3 py-2" required>
                            <option value="image">{{ __('Image') }}</option>
                            <option value="video">{{ __('Video') }}</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-semibold text-blue-600 mb-2">{{ __('Media') }}</label>
                        <input type="file" name="media"
                               class="mt-1 block w-full text-gray-900 bg-white border border-gray-300 rounded-md px-3 py-2"
                               required />
                    </div>

                    <div class="flex justify-end gap-2">
                        <a href="{{ route('stories.index') }}" class="px-4 py-2 text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200 font-medium">{{ __('Cancel') }}</a>
                        <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 font-medium">{{ __('Save Story') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>