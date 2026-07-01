<?php

namespace App\Http\Controllers;

use App\Models\ShortVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShortVideoController extends Controller
{
    public function index()
    {
        $videos = ShortVideo::with('user')->latest()->get();
        return view('short-videos.index', compact('videos'));
    }

    public function create()
    {
        return view('short-videos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'video' => 'required|file|mimetypes:video/mp4,video/quicktime|max:102400',
            'duration' => 'nullable|integer|min:1|max:3600',
        ]);

        $validated['video'] = $request->file('video')->store('short-videos', 'public');
        $validated['user_id'] = Auth::id();

        ShortVideo::create($validated);

        return redirect()->route('short-videos.index')->with('status', 'Short video uploaded!');
    }

    public function show(ShortVideo $shortVideo)
    {
        return view('short-videos.show', compact('shortVideo'));
    }

    public function destroy(ShortVideo $shortVideo)
    {
        if (Auth::id() !== $shortVideo->user_id) {
            abort(403);
        }

        if ($shortVideo->video) {
            Storage::disk('public')->delete($shortVideo->video);
        }

        $shortVideo->delete();

        return redirect()->route('short-videos.index')->with('status', 'Short video deleted.');
    }
}