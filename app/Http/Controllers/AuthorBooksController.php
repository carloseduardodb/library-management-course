<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorBooksController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Responses
     */
    public function index(Request $request, Author $author)
    {
        $search = $request->get('search', '');

        $books = $author
            ->books()
            ->search($search)
            ->latest()
            ->paginate();

        return response()->json([
            "books" => $books
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Author $author, Book $book)
    {
        $author->books()->syncWithoutDetaching([$book->id]);
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Author $author, Book $book)
    {
        $author->books()->detach($book);
        return response()->noContent();
    }
}
