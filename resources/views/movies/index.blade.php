@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Page Title -->
    <h1>{{ __('Filmek', ['models' => __('movies.movies')]) }}</h1>

    <!-- Error / Success -->
    @include('layouts.errors')
    @include('layouts.success')

    <!-- New Movie Button -->
    <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">{{ __('Új film hozzáadása') }}</a>

    <!-- Keresés -->
    <form method="GET" action="{{ route('movies.index') }}" class="mb-3">
        <input type="text" name="needle" value="{{ request('needle') }}"
               placeholder="Film keresése..." class="form-control" />
        <button type="submit" class="btn btn-primary mt-2">Keresés</button>
    </form>

    

    <!-- Filmek táblázat -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Cim') }}</th>
                <th>{{ __('Kategoria') }}</th>
                <th>{{ __('Leiras') }}</th>
                <th>{{ __('Boritokepe') }}</th>
                <th>{{ __('Hossza') }}</th>
                <th>{{ __('Megjelenesi') }}</th>
                <th>{{ __('skeletons.actions') }}</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $movie['name'] }}</td>
                    <td>{{ $movie['category_id'] ?? '' }}</td>
                    <td>{{ $movie['description'] }}</td>
                    <td>{{ $movie['pic_path'] }}</td>
                    <td>{{ $movie['length'] }}</td>
                    <td>{{ $movie['release_date'] }}</td>
                    <td>
                        <a href="{{ route('movies.edit', $movie['id']) }}" class="btn">
                            {{ __('skeletons.edit') }}
                        </a>

                        <form action="{{ route('movies.destroy', $movie['id']) }}"
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                {{ __('skeletons.delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Nincs találat</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination">
        
    </div>

</div>
@endsection
