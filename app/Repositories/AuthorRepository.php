<?php

namespace App\Repositories;

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
        return Author::create($data);
    }

    public function find($id)
    {
        
    }

    public function update($data, $id)
    {

    }

    public function destroy($id)
    {
        $data = Author::find($id)->delete();
    }
}