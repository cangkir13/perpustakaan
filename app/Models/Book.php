<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'description',
        'id_category',
        'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'id_category', 'id');
    }
}
