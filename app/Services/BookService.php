<?php 

namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function all()
    {
        return $this->bookRepository->all();
    }

    public function store(array $data)
    {
        return $this->bookRepository->store($data);
    }

}