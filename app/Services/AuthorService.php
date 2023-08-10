<?php 

namespace App\Services;

use App\Repositories\AuthorRepository;

class AuthorService
{
    protected $authorRepository;

    public function __construct(AuthorRepository $authorRepository)
    {
        $this->authorRepository = $authorRepository;
    }

    public function all()
    {
        return $this->authorRepository->all();
    }

    public function store(array $data)
    {
        return $this->authorRepository->store($data);
    }

    public function destroy($id)
    {
        return $this->authorRepository->destroy($id);
    }
}