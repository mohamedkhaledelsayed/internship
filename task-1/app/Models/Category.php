<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;


class Category extends Model implements TranslatableContract
{
    use HasFactory ;
    use Translatable;

    protected $fillable = ['description'];
    public $translatedAttributes = ['name'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
