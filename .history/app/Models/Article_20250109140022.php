<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'image'];

//     protected function setContentAttribute($value)
// {
//     $this->attributes['content'] = preg_replace('/&nbsp;|<\/?[^>]+(>|$)/', ' ', $value);
// }

// protected function getContentAttribute($value)
// {
//     return preg_replace('/&nbsp;|<\/?[^>]+(>|$)/', ' ', $value);
// }
}

