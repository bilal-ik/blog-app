<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with('user')
            ->whereNull('expires_at')
            ->orWhere('expires_at', '>', now())
            ->latest()
            ->get();

        return view('stories.index', compact('stories'));
    }

    public function create()
    {
        return view('stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'caption' => 'nullable|string|max:255',
            'media' => 'required|file|mimetypes:image/jpeg,image/png,video/mp4,video/quicktime|max:102400',
            'type' => 'required|in:image,video',
        ]);

        $validated['media'] = $request->file('media')->store('stories', 'public');
        $validated['user_id'] = Auth::id();
        $validated['expires_at'] = now()->addDay();

        Story::create($validated);

        return redirect()->route('stories.index')->with('status', 'Story created!');
    }

    public function show(Story $story)
    {
        if ($story->expires_at && $story->expires_at->isPast()) {
            abort(404);
        }

        return view('stories.show', compact('story'));
    }

    public function destroy(Story $story)
    {
        if (Auth::id() !== $story->user_id) {
            abort(403);
        }

        if ($story->media) {
            Storage::disk('public')->delete($story->media);
        }

        $story->delete();

        return redirect()->route('stories.index')->with('status', 'Story deleted.');
    }
}