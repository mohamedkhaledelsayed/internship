<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','name_ar', 'name_en', 'image', 'price','description'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}