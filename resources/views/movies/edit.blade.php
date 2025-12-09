@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.modifying', ['model' => __('movies.movie')]) }}</h1>

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('movies.update', $movie) }}" method="POST">
            @csrf
            @method('PUT')
                <fieldset>
        <label for="name">
            {{ __('movies.name') }}
        </label>
        <input
            type="text"
            name="name"
            id="name"
            required
            placeholder="{{ __('movies.name')}}"
            value="{{ old('name',$movie->name )}}"
        >
    </fieldset>
    <fieldset>
        <label for="categories_id">
            {{ __('movies.categories_id') }}
        </label>
        <select name="categories_id" id="categories_id" required>
            <option value="">{{ __('skeletons.select') }}</option>
            @foreach($categories as $category)
                {{ $selected = '' }}
                @if($category->id == $movie->categories_id)
                    {{ $selected = 'selected' }}
                @endif
                <option value="{{ $category->id }}" {{ $selected }}>{{ $category->category }}</option>
            @endforeach
        </select>
    </fieldset>
    <fieldset>
        <label for="description">
            {{ __('movies.description') }}
        </label>
        <input
            type="text"
            name="description"
            id="description"
            required
            placeholder="{{ __('movies.description') }}"
            value="{{ old('description', $movie->description) }}"
        >
    </fieldset>
    <fieldset>
        <label for="pic_path">
            {{ __('movies.pic_path') }}
        </label>
        <input
            type="text"
            name="pic_path"
            id="pic_path"
            required
            placeholder="{{ __('movies.pic_path') }}"
            value="{{ old('pic_path', $movie->pic_path) }}"
        >
    </fieldset>
    <fieldset>
        <label for="length">
            {{ __('movies.length') }}
        </label>
        <input
            type="text"
            name="length"
            id="length"
            required
            placeholder="{{ __('movies.length') }}"
            value="{{ old('length', $movie->length) }}"
        >
    </fieldset>
    <fieldset>
        <label for="release_date">
            {{ __('movies.release_date') }}
        </label>
        <input
            type="text"
            name="release_date"
            id="release_date"
            required
            placeholder="{{ __('movies.release_date') }}"
            value="{{ old('release_date', $movie->release_date) }}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('movies.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
