@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.details_of', ['model' => 'movie']) }}</h1>

        <!-- Data Display -->
        <ul>
                <li>
        <strong>{{ __('movies.name') }}:</strong>
        {{ $movie->name}}
    </li>    <li>
        <strong>{{ __('movies.categories_id') }}:</strong>
        <td>{{ $movie->category->category ?? '' }}</td>
    </li>    <li>
        <strong>{{ __('movies.description') }}:</strong>
        {{ $movie->description }}
    </li>    <li>
        <strong>{{ __('movies.pic_path') }}:</strong>
        {{ $movie->pic_path }}
    </li>    <li>
        <strong>{{ __('movies.length') }}:</strong>
        {{ $movie->length }}
    </li>    <li>
        <strong>{{ __('movies.release_date') }}:</strong>
        {{ $movie->release_date }}
    </li>
        </ul>
        <!-- Back Button -->
        <a href="{{ route('movies.index') }}">{{ __('skeletons.back') }}</a>
    </div>
@endsection
