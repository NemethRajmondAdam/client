@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.list_of', ['models' => __('categories.categories')]) }}</h1>
        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Create Link -->
        
        <a href="{{ route('categories.create') }}" class="btn">{{ __('skeletons.create') }}</a>
        

        <!-- Search Field -->
        @include('layouts.search', ['action' => 'categories.index'])

        <!-- Data Table -->
        <table class="table">
            <thead>
                <tr>
                    <!-- Dynamic Table Headers -->
                    <th>{{ __('categories.category') }}</th>
                    <th>{{ __('skeletons.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <!-- Dynamic Table Columns -->
                        <td>{{ $category['category'] }}</td>
                        <!-- Action Buttons -->
                        <td>
                            
                            <a href="{{ route('categories.edit', $category['id']) }}" class="btn">{{ __('skeletons.edit') }}</a>
                            <form action="{{ route('categories.destroy', $category['id']) }}" method="POST" style="display:inline-block;">
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
