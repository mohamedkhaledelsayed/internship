<?php

namespace App\Models;

use App\Models\Books;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Authors extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'age'];

    public function books()
    {
        return $this->hasMany(Books::class, 'author_id');
    }
}