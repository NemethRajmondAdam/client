@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.list_of', ['models' => __('studios.studios')]) }}</h1>
        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Create Link -->
        
        <a href="{{ route('studios.create') }}" class="btn">{{ __('skeletons.create') }}</a>
        

        <!-- Search Field -->
        @include('layouts.search', ['action' => 'studios.index'])

        <!-- Data Table -->
        <table class="table">
            <thead>
                <tr>
                    <!-- Dynamic Table Headers -->
                    <th>{{ __('studios.name') }}</th>
                    <th>{{ __('skeletons.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studios as $studio)
                    <tr>
                        <!-- Dynamic Table Columns -->
                        <td>{{ $studio['name'] }}</td>
                        <!-- Action Buttons -->
                        <td>
                            
                            <a href="{{ route('studios.edit', $studio['id']) }}" class="btn">{{ __('skeletons.edit') }}</a>
                            <form action="{{ route('studios.destroy', $studio['id']) }}" method="POST" style="display:inline-block;">
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
