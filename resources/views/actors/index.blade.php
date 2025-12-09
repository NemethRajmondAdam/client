@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.list_of', ['models' => __('actors.actors')]) }}</h1>
        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Create Link -->
        
        <a href="{{ route('actors.create') }}" class="btn">{{ __('skeletons.create') }}</a>
        

        <!-- Search Field -->
        @include('layouts.search', ['route' => 'actors.search'])

        <!-- Data Table -->
        <table class="table">
            <thead>
                <tr>
                    <!-- Dynamic Table Headers -->
                                            <th>{{ __('actors.name') }}</th>
                        <th>{{ __('actors.gender') }}</th>
                    <th>{{ __('skeletons.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($actors as $actor)
                    <tr>
                        <!-- Dynamic Table Columns -->
                                                <td>{{ $actor->name }}</td>
                        <td>{{ $actor->gender }}</td>
                        <!-- Action Buttons -->
                        <td>
                            <a href="{{ route('actors.show', $actor) }}" class="btn">{{ __('skeletons.show') }}</a>
                            
                            <a href="{{ route('actors.edit', $actor) }}" class="btn">{{ __('skeletons.edit') }}</a>
                            <form action="{{ route('actors.destroy', $actor) }}" method="POST" style="display:inline-block;">
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
            {{ $actors->links() }}
        </div>
    </div>
@endsection
