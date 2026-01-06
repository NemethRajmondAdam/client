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
        @include('layouts.search', ['action' => 'directors.index'])

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
                        <td>{{ $director['name'] }}</td>
                        <!-- Action Buttons -->
                        <td>
                            
                            <a href="{{ route('directors.edit', $director['id']) }}" class="btn">{{ __('skeletons.edit') }}</a>
                            <form action="{{ route('directors.destroy', $director['id']) }}" method="POST" style="display:inline-block;">
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
