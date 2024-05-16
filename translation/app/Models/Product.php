<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
   protected $fillable = ['name', 'description', 'category_id'];
    use HasTranslations;

    public $translatable = ['name','description'];
    public function category()
    {

        return $this->belongsTo(Category::class);
    }
    use HasFactory;
}






