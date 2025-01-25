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
            $slug = Str::slug($article->title);
            $count = static::whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$'")->count();
            $article->slug = $count > 0 ? "{$slug}-{$count}" : $slug;
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}