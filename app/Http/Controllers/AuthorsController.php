<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Services\AuthorService;
use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;

class AuthorsController extends Controller
{
    public function __construct(protected AuthorService $authorService)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors =  $this->authorService->all();

        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorsRequest $request)
    {
        $validated = $request->validated();
       
        $this->authorService->store($validated);

        return redirect('authors')->with('success', __('Author successuly added.'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', ['author' => $this->authorService->find($author->id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorsRequest $request)
    {
        $validated = $request->validated();

        $this->authorService->update($validated, $request->id);

        return redirect('authors')->with('success', __('Author successuly updated.'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $this->authorService->destroy($author->id);
        
        return redirect('authors')->with('success', __('Author successuly removed.'));
    }
}
