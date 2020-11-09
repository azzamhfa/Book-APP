<?php

namespace App\Http\Controllers;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function index()
    {
        return Book::all();
    }

    public function indexById($id)
    {
        $books = Book::find($id);
        if (!$books) {
            return response()->json(['message' => 'Book Not Found']);
        }
        return $books;
    }

    //
}
