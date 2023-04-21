@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="publishing-company" class="form-label">Casa Editrice</label>
                <input class="form-control" name="publishing_company" type="text"  id="publishing_company">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input class="form-control" name="title" type="text"  id="title">
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Autore</label>
                <input class="form-control" name="author" type="text"  id="author">
            </div>

            <div class="mb-3">
                <label for="ISBN" class="form-label">Codice ISBN</label>
                <input class="form-control" name="ISBN" type="text"  id="ISBN">
            </div>

            <div class="mb-3">
                <label for="pages" class="form-label">Numero pagine</label>
                <input class="form-control" name="pages" type="text"  id="pages">
            </div>

            <button type="submit" class="btn btn-success">
                Invia
            </button>
        </form>
    </div>

@endsection