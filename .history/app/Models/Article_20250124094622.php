<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'image', 'slug'];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
            
            // Pastikan slug unik
            $originalSlug = $article->slug;
            $count = 1;
            while (self::where('slug', $article->slug)->exists()) {
                $article->slug = $originalSlug . '-' . $count;
                $count++;
            }
        });
    }
}