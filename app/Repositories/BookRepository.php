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
        return Book::create(
            [
                'title'             => $data['title'],
                'description'       => $data['description'],
                'book_number'       => $data['book_number'],
                'author_id'         => $data['author_id'],
                'who_created_it'    => auth()->user()->id
            ]
        );
    }

    public function find($id)
    {
        return Book::find($id);
    }

    public function update($data, $id)
    {
        return Book::where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        return $data = Book::find($id)->delete();
    }
}