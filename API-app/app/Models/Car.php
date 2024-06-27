<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable=['name','number','category_id','image'];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
