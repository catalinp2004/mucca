<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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

    protected $appends = [
        'folder_name'
    ];

    protected $hidden = ['pivot'];

    public function getFolderNameAttribute($value)
    {
        return Str::slug($this->created_at, '');
    }
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
