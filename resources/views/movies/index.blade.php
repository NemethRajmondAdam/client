@extends('layouts.app')

@section('content')
<<<<<<< HEAD
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('Filmek', ['models' => __('movies.movies')]) }}</h1>
        <!-- Error Message -->
        @include('layouts.errors')
=======
<div class="container">
>>>>>>> fa9f2024cfd617e4f16cc0cdeb6255802796923c

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
<<<<<<< HEAD
                    <!-- Dynamic Table Headers -->
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
                @foreach ($movies as $movie)

                    <tr>
                        <!-- Dynamic Table Columns -->
                        <td>{{ $movie['name'] }}</td>
                        <td>{{ $movie['category_id'] ?? '' }}</td>
                        <td>{{ $movie['description'] }}</td>
                        <td>{{ $movie['pic_path'] }}</td>
                        <td>{{ $movie['length']}}</td>
                        <td>{{ $movie['release_date'] }}</td>
                        <!-- Action Buttons -->
                        <td>
                            
                            <a href="{{ route('movies.edit', $movie['id']) }}" class="btn">{{ __('skeletons.edit') }}</a>
                            <form action="{{ route('movies.destroy', $movie['id']) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{ __('skeletons.delete') }}</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="pagination">

        </div>
    </div>
=======
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
>>>>>>> fa9f2024cfd617e4f16cc0cdeb6255802796923c
@endsection
