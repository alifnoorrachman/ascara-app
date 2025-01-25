<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Alternatif 1: Menggunakan Storage Facade
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:articles,title',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($validatedData);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article created successfully.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:articles,title,' . $article->id,
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $validatedData['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($validatedData);

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        
        $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('success', 'Article deleted successfully.');
    }
}