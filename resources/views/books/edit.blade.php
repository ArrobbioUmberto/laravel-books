@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('books.update', $book) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="publishing-company" class="form-label">Casa Editrice</label>
                <input class="form-control @error('publishing_company') is-invalid @enderror" name="publishing_company"
                    type="text" id="publishing_company" value="{{ old('publishing_company', $book->publishing_company) }}">
                @error('publishing_company')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input class="form-control @error('title') is-invalid @enderror" name="title" type="text"
                    id="title" value="{{ old('title', $book->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Autore</label>
                <input class="form-control @error('author') is-invalid @enderror" name="author" type="text"
                    id="author" value="{{ old('author', $book->author) }}">
                @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ISBN" class="form-label">Codice ISBN</label>
                <input class="form-control @error('ISBN') is-invalid @enderror" name="ISBN" type="text" id="ISBN"
                    value="{{ old('ISBN', $book->ISBN) }}">
                @error('ISBN')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pages" class="form-label">Numero pagine</label>
                <input class="form-control @error('pages') is-invalid @enderror" name="pages" type="text"
                    id="pages" value="{{ old('pages', $book->pages) }}">
                @error('pages')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="is_available" class="form-label">Disponibile</label>
                <select name="is_available" id="is_available"
                    class="form-select @error('is_available') is-invalid @enderror"
                    value="{{ old('is_available', $book->is_available) }}" aria-label="Default select example">
                    <option selected>Dimmi se disponibile</option>
                    <option @selected(old('is_available', $book->is_available) == 1) value="1">SI</option>
                    <option @selected(old('is_available', $book->is_available) == 0) value="0">NO</option>
                </select>
                @error('is_available')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <button type="submit" class="btn btn-success">
                Invia
            </button>
        </form>
    </div>
@endsection
