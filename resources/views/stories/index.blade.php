<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Stories') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('stories.create') }}" class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    {{ __('Create Story') }}
                </a>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($stories as $story)
                    <div class="rounded-lg border p-4">
                        <div class="text-sm text-gray-500">{{ $story->user->name }} · {{ $story->created_at->diffForHumans() }}</div>
                        <div class="mt-3">
                            @if ($story->type === 'video')
                                <video controls class="w-full rounded-lg">
                                    <source src="{{ asset('storage/' . $story->media) }}" type="video/mp4">
                                </video>
                            @else
                                <img src="{{ asset('storage/' . $story->media) }}" class="w-full rounded-lg" alt="Story">
                            @endif
                        </div>
                        <p class="mt-3 text-sm">{{ $story->caption }}</p>
                        <a href="{{ route('stories.show', $story->id) }}" class="text-indigo-600">{{ __('View') }}</a>
                    </div>
                @empty
                    <div>{{ __('No stories yet.') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>