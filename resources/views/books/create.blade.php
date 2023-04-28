@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('books.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="publishing-company" class="form-label">Casa Editrice</label>
                <input class="form-control @error('publishing_company') is-invalid @enderror" name="publishing_company"
                    type="text" id="publishing_company" value="{{ old('publishing_company') }}">
                @error('publishing_company')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input class="form-control @error('title') is-invalid @enderror" name="title" type="text"
                    id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Autore</label>
                <input class="form-control @error('author') is-invalid @enderror" name="author" type="text"
                    id="author" value="{{ old('author') }}">
                @error('author')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ISBN" class="form-label">Codice ISBN</label>
                <input class="form-control @error('ISBN') is-invalid @enderror" name="ISBN" type="text" id="ISBN"
                    value="{{ old('ISBN') }}">
                @error('ISBN')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pages" class="form-label">Numero pagine</label>
                <input class="form-control @error('pages') is-invalid @enderror" name="pages" type="text"
                    id="pages" value="{{ old('pages') }}">
                @error('pages')
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
