<?php

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'slug' => 'required'
        ]);

        $data = $request->all();
        // Bersihkan konten dari karakter HTML yang tidak diinginkan
        $data['content'] = strip_tags(str_replace('&nbsp;', ' ', $data['content']));

        // Generate slug
        $slug = Str::slug($validatedData['title']);
        $originalSlug = $slug;
        $count = 1;
        while (Article::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $validatedData['slug'] = $slug;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Simpan ke folder storage/app/public/articles
            $file->storeAs('public/articles', $filename);
            // Simpan path relatif ke database
            $validatedData['image'] = 'articles/' . $filename;
        }

        Article::create($validatedData);
        return redirect()->route('admin.articles.index')
            ->with('success', 'Article created successfully.');
    }
}