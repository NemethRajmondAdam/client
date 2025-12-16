@extends('layouts.app')

@section('content')
<div class="container">

    <h1>{{ __('skeletons.list_of', ['models' => __('movies.movies')]) }}</h1>

    <!-- Hibák -->
    @include('layouts.errors')
    @include('layouts.success')

    <!-- Keresés -->
    <form method="GET" action="{{ route('movies.index') }}" class="mb-3">
        <input type="text" name="needle" value="{{ request('needle') }}" placeholder="Film keresése..." class="form-control" />
        <button type="submit" class="btn btn-primary mt-2">Keresés</button>
    </form>

    <!-- Filmek táblázat -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('movies.name') }}</th>
                <th>{{ __('categories.category') }}</th>
                <th>{{ __('movies.description') }}</th>
                <th>{{ __('movies.pic_path') }}</th>
                <th>{{ __('movies.length') }}</th>
                <th>{{ __('movies.release_date') }}</th>
                <th>{{ __('skeletons.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse($entities['movies'] ?? [] as $movie)
                <tr>
                    <td>{{ $movie['name'] ?? '' }}</td>
                    <td>{{ $movie['category']['name'] ?? '' }}</td>
                    <td>{{ $movie['description'] ?? '' }}</td>
                    <td>
                        @if(!empty($movie['pic_path']))
                            <img src="{{ $movie['pic_path'] }}" alt="{{ $movie['name'] }}" style="width:50px">
                        @endif
                    </td>
                    <td>{{ $movie['length'] ?? '' }}</td>
                    <td>{{ $movie['release_date'] ?? '' }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie['id']) }}" class="btn btn-sm btn-info">Show</a>
                        <a href="{{ route('movies.edit', $movie['id']) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie['id']) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Nincs megjeleníthető film.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
