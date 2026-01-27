<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Afficher tous les posts
    public function index()
    {
        $posts = Post::get();
        return Inertia::render('Posts/Index', [
            'posts' => $posts,
        ]);
    }

    // Afficher le formulaire de création
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    // Stocker un nouveau post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:10240'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Post créé avec succès !');
    }

    // Afficher le formulaire d'édition
    public function edit(Post $post)
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post,
        ]);
    }

    // Mettre à jour un post
public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:10240'
    ]);

    if ($request->hasFile('image')) {

        // Supprimer l’ancienne image
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        // Enregistrer la nouvelle
        $data['image'] = $request->file('image')->store('posts', 'public');

    } else {
        unset($data['image']);
    }

    $post->update($data);

    return redirect()->route('posts.index')
        ->with('success', 'Post mis à jour avec succès');
}

public function show(Post $post)
{
    return Inertia::render('Posts/Show', [
        'post' => $post,
    ]);
}

    // Supprimer un post
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post supprimé avec succès !');
    }
}
