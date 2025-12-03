<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'category_id',
        'image',
        'features',
        'structure',
        'description',
        'active',
        'meta',
        'lang'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function gallery(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
    
    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class);
    }
}
