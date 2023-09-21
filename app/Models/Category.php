<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'color_combination_id',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function colorCombination()
    {
        return $this->belongsTo(ColorCombination::class);
    }
}
