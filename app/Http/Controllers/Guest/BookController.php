<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use Illuminate\Validation\Rule;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function show(Book $book)
    {

        return view('books.show', compact('book'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $array_publishing_company = ['Mondadori', 'Rizzoli', 'Einaudi', 'Giunti', 'Feltrinelli'];

        $data = $request->validate([
            'title' => 'required|max:255|min:3|string',
            'publishing_company' => [
                'required',
                Rule::in($array_publishing_company)
            ],
            'pages' => 'required|integer|min:0',
            'ISBN' => 'required|unique:books|size:13',
            'genre_id' => 'exists:genres,id',
            'authors' => 'exists:authors,id'

        ]);


        $new_book = new Book();

        $new_book->title = $data['title'];
        $new_book->publishing_company = $data['publishing_company'];
        $new_book->pages = $data['pages'];
        $new_book->ISBN = $data['ISBN'];

        $new_book->save();

        if (isset($data['authors'])) {
            $new_book->authors()->attach($data['authors']);
        }


        return to_route('books.show', $new_book);
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {


        $array_publishing_company = ['Mondadori', 'Rizzoli', 'Einaudi', 'Giunti', 'Feltrinelli'];

        $data = $request->validate([
            'title' => 'required|max:255|min:3|string',
            'publishing_company' => [
                'required',
                Rule::in($array_publishing_company)
            ],
            'pages' => 'required|integer|min:0',
            'ISBN' => [
                'required',
                Rule::unique('books', 'ISBN')->ignore($book->id)
            ],
            'is_available' => 'required|boolean',
            'authors' => 'exists:authors,id'
        ]);
        $book->title = $data['title'];
        $book->publishing_company = $data['publishing_company'];
        $book->pages = $data['pages'];
        $book->ISBN = $data['ISBN'];
        $book->is_available = $data['is_available'];

        $book->save();

        if (isset($data['authors'])) {
            $book->authors()->sync($data['authors']);
        }



        return to_route('books.show', $book);
    }

    public function destroy(Book $book)
    {

        $book->delete();

        return to_route('books.index');
    }
}
