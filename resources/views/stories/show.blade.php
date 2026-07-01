<x-app-layout>
    <x-slot name="header">
        <h2>{{ $story->caption ?: __('Story') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="text-sm text-gray-500">
                    {{ $story->user->name }} · {{ $story->created_at->diffForHumans() }}
                </div>

                <div class="mt-4">
                    @if ($story->type === 'video')
                        <video controls class="w-full rounded-lg">
                            <source src="{{ asset('storage/' . $story->media) }}" type="video/mp4">
                            {{ __('Your browser does not support the video tag.') }}
                        </video>
                    @else
                        <img src="{{ asset('storage/' . $story->media) }}" class="w-full rounded-lg" alt="{{ __('Story image') }}">
                    @endif
                </div>

                @if ($story->caption)
                    <p class="mt-4 text-gray-700">{{ $story->caption }}</p>
                @endif

                <div class="mt-4">
                    <a href="{{ route('stories.index') }}" class="text-indigo-600 hover:underline">{{ __('Back to Stories') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
