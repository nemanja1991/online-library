<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Services\BookService;
use App\Services\AuthorService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    private $bookService;
    private $authorService;

    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books =  $this->bookService->all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create_edit', [
            'book'      => null,
            'authors'   => $this->authorService->all() 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $validated = $request->validated();
       
        $this->bookService->store($validated);

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.create_edit', [
            'book'      => $this->bookService->find($book), 
            'authors'   => $this->authorService->all() 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request)
    {
        $validated = $request->validated();

        dd($validated);

        $this->bookService->update($validated, $book);

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $id)
    {
        $this->bookService->destroy($id);
        
        return redirect('/');
    }

    
}
