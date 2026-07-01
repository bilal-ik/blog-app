<x-app-layout>
    <x-slot name="header">
        <h2>{{ __('Short Videos') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <a href="{{ route('short-videos.create') }}" class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    {{ __('Upload Short Video') }}
                </a>
            </div>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($videos as $video)
                    <div class="rounded-lg border p-4">
                        <div class="text-sm text-gray-500">{{ $video->user->name }} · {{ $video->created_at->diffForHumans() }}</div>
                        <div class="mt-3">
                            <video controls class="w-full rounded-lg">
                                <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                            </video>
                        </div>
                        <h3 class="mt-3 font-semibold">{{ $video->title }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($video->description, 120) }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <a href="{{ route('short-videos.show', $video->id) }}" class="text-indigo-600">
                                {{ __('View') }}
                            </a>
                            @if (Auth::id() === $video->user_id)
                                <form action="{{ route('short-videos.destroy', $video->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @empty
                    <div>{{ __('No short videos yet.') }}</div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>