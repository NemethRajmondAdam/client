@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('Filmek', ['models' => __('movies.movies')]) }}</h1>
        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Create Link -->
        
        
        

        <!-- Search Field -->
        @include('layouts.search', ['action' => 'movies.index'])

        <!-- Data Table -->
        <table class="table">
            <thead>
                <tr>
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
@endsection
