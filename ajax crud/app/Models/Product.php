<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Product extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = ['image', 'price', 'category_id'];

    public $translatedAttributes = ['name', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
