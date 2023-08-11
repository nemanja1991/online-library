<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;
  
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'title',
        'description',
        'book_number',
        'author_id',
        'user_type',
        'who_created_it'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
