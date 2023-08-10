<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'book_number',
        'author_id',
        'user_type'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
