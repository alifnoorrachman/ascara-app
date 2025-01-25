<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model
{
    protected $fillable = ['title','brand','description', 'image', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}