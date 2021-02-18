<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'product_code',
        'name',
        'description',
        'sort',
    ];
    protected $with = [
        'subcategories',
        'colors',
        'images',
    ];

    protected $hidden = ['pivot'];

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
