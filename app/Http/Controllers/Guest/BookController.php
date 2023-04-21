<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {

        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function show(Book $book) {

        return view('books.show', compact('book'));
    }

    public function create() {

        return view('books.create');
    }

    public function store(Request $request) {

        $data = $request->all();

        $new_book = new Book();

        $new_book->title = $data['title'];
        $new_book->publishing_company = $data['publishing_company'];
        $new_book->author = $data['author'];
        $new_book->pages = $data['pages'];
        $new_book->ISBN = $data['ISBN'];

        $new_book->save();


        return to_route('books.show', $new_book);
    }

    public function edit(Book $book) {

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book) {

        $data = $request->all();

        $book->title = $data['title'];
        $book->publishing_company = $data['publishing_company'];
        $book->author = $data['author'];
        $book->pages = $data['pages'];
        $book->ISBN = $data['ISBN'];

        $book->save();

        return to_route('books.show', $book);
    }

    public function destroy(Book $book) {

        $book->delete();

        return to_route('books.index');
    }
}
