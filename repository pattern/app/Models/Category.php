<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements TranslatableContract
{
    use HasFactory;  use Translatable;

    protected $fillable = ['description'];
    public $translatedAttributes = ['name'];

    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
