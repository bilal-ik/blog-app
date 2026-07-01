<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    // Show all posts
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Show form to create a post
    public function create()
    {
        return view('posts.create');
    }

    // Save new post to database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required|string',
            'image' => 'nullable|image|max:10240', // max 10MB
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create(array_merge($validated, ['user_id' => Auth::id()]));

        return redirect()->route('posts.index')->with('status', 'Post created!');
    }

    // Show a single post
    public function show(Post $post)
{
    // prevent 'create' being treated as a post ID
    if (!is_numeric($post->id)) {
        abort(404);
    }
    return view('posts.show', compact('post'));
}

    // Show form to edit a post
// Show form to edit a post
    public function edit(Post $post)
{
    if (Gate::denies('update', $post)) {
        abort(403);
    }
    return view('posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    if (Gate::denies('update', $post)) {
        abort(403);
    }

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body'  => 'required|string',
        'image' => 'nullable|image|max:10240',
    ]);

if ($request->hasFile('image')) {
    // Delete old image if exists
    if ($post->image) {
        Storage::disk('public')->delete($post->image);
    }
    $validated['image'] = $request->file('image')->store('posts', 'public');
}

    $post->update($validated);

    return redirect()->route('posts.index')->with('status', 'Post updated!');
}

public function destroy(Post $post)
{
    if (Gate::denies('delete', $post)) {
        abort(403);
    }
    $post->delete();

    return redirect()->route('posts.index')->with('status', 'Post deleted!');
}
}