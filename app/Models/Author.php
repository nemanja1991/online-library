<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory, SoftDeletes;
  
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'surname',
        'image',
    ];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function getFullNameAttribute()
    {
       return ucfirst($this->name) . ' ' . ucfirst($this->surname);
    }
}
