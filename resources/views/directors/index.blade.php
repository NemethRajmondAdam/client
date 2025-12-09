@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.list_of', ['models' => __('directors.directors')]) }}</h1>
        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Create Link -->
        
        <a href="{{ route('directors.create') }}" class="btn">{{ __('skeletons.create') }}</a>
        

        <!-- Search Field -->
        @include('layouts.search', ['route' => 'directors.search'])

        <!-- Data Table -->
        <table class="table">
            <thead>
                <tr>
                    <!-- Dynamic Table Headers -->
                                            <th>{{ __('directors.name') }}</th>
                    <th>{{ __('skeletons.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($directors as $director)
                    <tr>
                        <!-- Dynamic Table Columns -->
                                                <td>{{ $director->name }}</td>
                        <!-- Action Buttons -->
                        <td>
                            <a href="{{ route('directors.show', $director) }}" class="btn">{{ __('skeletons.show') }}</a>
                            
                            <a href="{{ route('directors.edit', $director) }}" class="btn">{{ __('skeletons.edit') }}</a>
                            <form action="{{ route('directors.destroy', $director) }}" method="POST" style="display:inline-block;">
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
            {{ $directors->links() }}
        </div>
    </div>
@endsection
