@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary mb-2" href="{{ route('books.create') }}">Aggiungi libro</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a class="btn btn-link" href="{{ route('books.index', 'sort=publishing_company ') }}">Casa
                            Editrice</a> </th>
                    <th><a class="btn btn-link" href="{{ route('books.index', 'sort=title') }}">Titolo</a> </th>
                    <th><a class="btn btn-link" href="{{ route('books.index', 'sort=author') }}">Autore</a> </th>
                    <th><a class="btn btn-link" href="{{ route('books.index', 'sort=pages ') }}">Pagine</a> </th>
                    <th><a class="btn btn-link" href="{{ route('books.index', 'sort=ISBN') }}">Codice ISBN</a> </th>`
                    <th><a class="btn btn-link" href="{{ route('books.index', 'sort=genre') }}">Genere
                        </a> </th>

                    <th><a class="btn btn-link" href="{{ route('books.index', 'sort=is_available') }}">Disponibile</a> </th>
                    <th>Azioni </th>
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
                            {{-- @if ($book->is_available)
                                Si
                            @else
                                No
                            @endif --}}


                            {{-- metodo per cambiare direttamente dalla index la variabile di is_available --}}
                            <form action="{{ route('books.toggle', $book->id) }}" method="POST">
                                @method('PATCH')
                                @csrf
                                <button type="submit" title="{{ $book->is_available ? 'stock' : 'soldout' }}"
                                    class="btn btn-outline"> <i
                                        class="fa-2x fa-solid fas fa-fw {{ $book->is_available ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                </button>
                            </form>

                        </td>
                        <td class="text-end">
                            <div class="d-flex gap-2">
                                <a class=" btn btn-primary" href="{{ route('books.edit', $book->id) }}">
                                    Edit
                                </a>

                                <form class="d-inline" method="POST" action="{{ route('books.destroy', $book->id) }}">
                                    @csrf

                                    @method('DELETE')

                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>

                            </div>



                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
