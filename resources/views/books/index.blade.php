@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary mb-2" href="{{ route('books.create') }}">Aggiungi libro</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Casa editrice</th>
                    <th>Titolo</th>
                    <th>Autore</th>
                    <th>Numero pagine</th>
                    <th>Cod. ISBN</th>
                    <th>Genere</th>
                    <th>Disponibile</th>
                    <th>Azioni</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->publishing_company }}</td>
                        <td>
                            <a href="{{ route('books.show', $book->id) }}">
                                {{ $book->title }}
                            </a>
                        </td>
                        <td>
                            @forelse ($book->authors as $author)
                                <span class="badge rounded-pill text-bg-primary">{{ $author->name }}</span>
                            @empty
                                -
                            @endforelse
                        </td>
                        <td>{{ $book->pages }}</td>
                        <td>{{ $book->ISBN }}</td>
                        <td>{{ $book->genre ? $book->genre->name : '-' }}</td>
                        <td>
                            @if ($book->is_available)
                                Si
                            @else
                                No
                            @endif

                        </td>
                        <td class="d-flex gap-2">
                            <a class="btn btn-primary btn-sm" href="{{ route('books.edit', $book->id) }}">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                @csrf

                                @method('DELETE')

                                <input class="btn btn-danger btn-sm" type="submit" value="delete">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
