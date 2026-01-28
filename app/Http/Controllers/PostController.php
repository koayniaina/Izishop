<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Dashboard Seller
    |--------------------------------------------------------------------------
    */
    public function dashboard()
{
    return Inertia::render('Seller/Dashboard', [
        'posts' => Post::where('user_id', Auth::id())->latest()->get(),
    ]);
}

    /*
    |--------------------------------------------------------------------------
    | Liste des posts du seller
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        return Inertia::render('Seller/Posts/Index', [
            'posts' => Post::where('user_id', Auth::id())
                ->latest()
                ->get(),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Formulaire de création
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return Inertia::render('Seller/Posts/Create');
    }

    /*
    |--------------------------------------------------------------------------
    | Enregistrement
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'image'       => ['nullable', 'image', 'max:10240'],
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('posts', 'public');
        }

        // 🔐 Sécurité : associer le post au seller connecté
        $validated['user_id'] = Auth::id();

        Post::create($validated);

        return redirect()
            ->route('seller.dashboard')
            ->with('success', 'Post créé avec succès !');
    }

    /*
    |--------------------------------------------------------------------------
    | Affichage d’un post
    |--------------------------------------------------------------------------
    */
    public function show(Post $post)
    {
        $this->authorizePost($post);

        return Inertia::render('Seller/Posts/Show', [
            'post' => $post,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Formulaire d’édition
    |--------------------------------------------------------------------------
    */
    public function edit(Post $post)
    {
        $this->authorizePost($post);

        return Inertia::render('Seller/Posts/Edit', [
            'post' => $post,
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Mise à jour
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Post $post)
    {
        $this->authorizePost($post);

        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
            'image'       => ['nullable', 'image', 'max:10240'],
        ]);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()
            ->route('seller.dashboard')
            ->with('success', 'Post mis à jour avec succès');
    }

    /*
    |--------------------------------------------------------------------------
    | Suppression
    |--------------------------------------------------------------------------
    */
    public function destroy(Post $post)
    {
        $this->authorizePost($post);

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()
            ->route('seller.dashboard')
            ->with('success', 'Post supprimé avec succès !');
    }

    /*
    |--------------------------------------------------------------------------
    | Autorisation (sécurité seller)
    |--------------------------------------------------------------------------
    */
    private function authorizePost(Post $post): void
    {
        if ($post->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée');
        }
    }
}
