<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'parent_id',
        'image',
        'icon',
        'des',
        'cat',
        'lang'
    ];

    protected $casts = [
        'cat' => 'boolean',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function getFullNameAttribute()
    {
        $prefix = $this->parent ? $this->parent->full_name . ' > ' : '';
        return $prefix . $this->name;
    }
    public function getParentsAttribute()
    {
        $parents = collect([]);

        $parent = $this->parent;

        while (!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }
    public function parentRecursive(): BelongsTo
    {
        return $this->parent()->with('parentRecursive');
    }
    public function parentRecursiveFlatten()
    {
        $result = collect();
        $item = $this->parentRecursive;
        if ($item instanceof Category) {
            $result->push($item);
            $result = $result->merge($item->parentRecursiveFlatten());
        }
        return $result;
    }
    public function getAllParents()
    {
        $parents = collect([]);
        $parent = $this->parent;

        while(!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }
    public function childArray($model = null)
    {
        $model = $model ?? $this;

        $result = [];

        if ($model !== $this) {
            array_push($result, $model->id);
        }

        $childs = $model->children;
        if ($childs->isNotEmpty()) {
            foreach ($childs as $value) {
                $result = array_merge($result, $this->childArray($value));
            }
        }

        return $result;
    }
    public function childrenRecursive(): HasMany
    {
        return $this->children()->with('childrenRecursive');
    }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    } 
    public function service(): HasMany
    {
        return $this->hasMany(service::class);
    }
    public function blog(): HasMany
    {
        return $this->hasMany(Blog::class);
    }
}
