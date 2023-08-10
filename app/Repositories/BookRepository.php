<?php

namespace App\Repositories;

use App\Models\Book;
use App\Repositories\Interfaces\BookInterface;

class BookRepository implements BookInterface
{
    public function all()
    {
        return Book::with('author')->whereNull('deleted_at')->paginate(10);
    }

    public function store($data)
    {
        return Book::create($data);
    }

    public function find($id)
    {
        
    }

    public function update($data, $id)
    {

    }

    public function destroy($id)
    {
        $data = Book::find($id)->delete();
    }
}