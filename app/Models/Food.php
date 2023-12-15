<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function getCurenccyRupiahAttribute()
    {
        return 'Rp' . number_format($this->price, 0, ',', '.') . ',00';
    }

    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        } else {
            return 'https://tailwindcss.com/favicons/apple-touch-icon.png';
        }
    }
}