<x-app-layout>
    <x-slot name="header">
        <h2>{{ $shortVideo->title }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-sm text-gray-500">{{ $shortVideo->user->name }} · {{ $shortVideo->created_at->diffForHumans() }}</div>

                <div class="mt-4">
                    <video controls class="w-full rounded-lg">
                        <source src="{{ asset('storage/' . $shortVideo->video) }}" type="video/mp4">
                    </video>
                </div>

                <p class="mt-4 text-gray-700">{{ $shortVideo->description }}</p>

                <div class="mt-4">
                    <a href="{{ route('short-videos.index') }}" class="text-indigo-600">{{ __('Back to Short Videos') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>