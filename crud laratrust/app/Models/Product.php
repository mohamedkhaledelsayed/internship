<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name_ar','name_en','description_ar','description_en','image','price','category_id'];

    public function category(){
       return $this->belongsTo(Category::class);
    }
}
