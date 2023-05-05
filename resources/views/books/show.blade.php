@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $book->title }}</h1>
        <h3>{{ $book->publishing_company }}</h3>
        @forelse ($book->authors as $author)
            <h4 class="badge rounded-pill text-bg-primary"> Autori:{{ $author->name }}</h4>
        @empty
            -
        @endforelse
        <h4>Numero di pagine: {{ $book->pages }}</h4>
        <h4>Codice ISBN: {{ $book->ISBN }}</h4>
        <h4>Disponibilità: {{ $book->is_available }}</h4>
    </div>
@endsection
