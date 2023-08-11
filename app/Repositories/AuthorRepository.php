<?php

namespace App\Repositories;

use App\Models\Book;
use App\Models\Author;
use App\Repositories\Interfaces\AuthorInterface;

class AuthorRepository implements AuthorInterface
{
    public function all()
    {
        return Author::whereNull('deleted_at')->paginate(10);
    }

    public function store($data)
    {
        return Author::create(
            [
                'name'              => $data['name'],
                'surname'           => $data['surname'],
                'who_created_it'    => auth()->user()->id
            ]
        );
    }

    public function find($id)
    {
        return Author::find($id);
    }

    public function update($data, $id)
    {
        return Author::where('id', $id)->update($data);
    }

    public function destroy($id)
    {
        Book::where('author_id', $id)->delete();
        
        return $data = Author::find($id)->delete(); 
    }
}