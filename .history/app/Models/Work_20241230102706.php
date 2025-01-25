<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
    protected $fillable = ['title', 'description', 'image', 'service_id'];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}