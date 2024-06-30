<?php

namespace App\Models;

use App\Models\Authors;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'publication_year',
        'author_id',
    ];

    public function authors()
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }
}
