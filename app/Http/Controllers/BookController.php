<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Catalog;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        $books = Book::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        
        return view('admin.book.index', compact('publishers', 'books', 'authors', 'catalogs'));
    }

    public function api()
    {
        $books = Book::all();
        return response()->json($books); // Menggunakan response()->json() untuk mengembalikan respons JSON
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'isbn' => 'required',
            'title' => 'required',
            'tahun' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        Book::create($request->all());

        return redirect('books')->with('success', 'Book created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();
        return view('admin.book.edit', compact('book'));
        
        // return view('admin.book.edit', compact('book', 'publishers', 'authors', 'catalogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request,[
            'isbn' => 'required',
            'title' => 'required',
            'tahun' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        $book->update($request->all());

        return redirect('books')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect('books')->with('success', 'Book deleted successfully!');
    }
    
}