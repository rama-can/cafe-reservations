<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_available',
        'image',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'food_category');
    }
}