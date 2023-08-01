<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    private $book;
    public function __construct(Book $book){
        $this->book = $book;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = $this->book->all();
        $data = ['book' => $book];
        return view('admin.book.index', $data);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book;
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publishing_company_id = $request->publishing_company_id;
        $book->category_id = $request->category_id;
        $book->block_id = $request->block_id;
        $book->summary = $request->summary;
        $book->shelf = $request->shelf;
        $book->publishing_year = $request->publishing_year;
        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::find($id);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::find($id);
        return view('book.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $book->title = $request->title;
        $book->author_id = $request->author_id;
        $book->publishing_company_id = $request->publishing_company_id;
        $book->category_id = $request->category_id;
        $book->block_id = $request->block_id;
        $book->summary = $request->summary;
        $book->shelf = $request->shelf;
        $book->publishing_year = $request->publishing_year;
        $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('book.index');
    }
}
