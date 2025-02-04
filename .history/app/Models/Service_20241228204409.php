<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    protected $fillable = ['title', 'description', 'image'];

    public function works()
    {
        return $this->hasMany(Work::class);
    }
}
