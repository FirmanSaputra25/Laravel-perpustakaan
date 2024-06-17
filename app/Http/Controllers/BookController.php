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
    public function index(Request $request)
    {
        $publishers = Publisher::all();
        $authors = Author::all();
        $catalogs = Catalog::all();

        // Menambahkan parameter pencarian
        $query = Book::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%$search%")
                  ->orWhere('isbn', 'like', "%$search%")
                  ->orWhere('year', 'like', "%$search%"); // Ganti 'year' dengan nama kolom yang benar
        }

        $books = $query->get();

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
        $this->validate($request, [
            'isbn' => 'required',
            'title' => 'required',
            'year' => 'required', // Ganti 'year' dengan nama kolom yang benar
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
        return view('admin.book.index', compact('book', 'publishers', 'authors', 'catalogs'));
        
        // return view('admin.book.edit', compact('book', 'publishers', 'authors', 'catalogs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'isbn' => 'required',
            'title' => 'required',
            'year' => 'required', // Ganti 'year' dengan nama kolom yang benar
            'publisher_id' => 'required',
            'author_id' => 'required',
            'catalog_id' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);
        // dd($request->all());
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