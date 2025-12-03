<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        // 'category_id',
        'image',
        'short_des',
        'des',
        'meta',
        'lang'
    ];
    // public function category(): BelongsTo
    // {
    //     return $this->belongsTo(Category::class);
    // }
}
