<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $fillable = [
        'title',
        'image',
        'des',
        'meta',
        'lang'
    ];
}
