@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ __('Film szerkesztése') }}</h1>

    @include('layouts.success')
    @include('layouts.errors')

    <form action="{{ route('movies.update', $entity['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Name Field -->
        <fieldset class="mb-3">
            <label for="name" class="form-label">{{ __('Cím') }}</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $entity['name']) }}">
        </fieldset>

        <!-- Category Field -->
        <fieldset class="mb-3">
            <label for="categories_id" class="form-label">{{ __('Kategória') }}</label>
            <select name="categories_id" id="categories_id" class="form-select" required>
                <option value="">{{ __('Válasszon kategóriát') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}" {{ old('categories_id', $entity['categories_id']) == $category['id'] ? 'selected' : '' }}>
                        {{ $category['category'] }}
                    </option>
                @endforeach
            </select>
        </fieldset>

        <!-- Director Field -->
        <fieldset class="mb-3">
            <label for="director_id" class="form-label">{{ __('Rendező') }}</label>
            <select name="director_id" id="director_id" class="form-select" required>
                <option value="">{{ __('Válasszon rendezőt') }}</option>
                @foreach ($directors as $director)
                    <option value="{{ $director['id'] }}" {{ old('director_id', $entity['director_id']) == $director['id'] ? 'selected' : '' }}>
                        {{ $director['name'] }}
                    </option>
                @endforeach
            </select>
        </fieldset>

        <!-- Description Field -->
        <fieldset class="mb-3">
            <label for="description" class="form-label">{{ __('Leírás') }}</label>
            <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $entity['description']) }}</textarea>
        </fieldset>

        <!-- Picture Path Field -->
        <fieldset class="mb-3">
            <label for="pic_path" class="form-label">{{ __('Borítókép') }}</label>
            <input type="file" name="pic_path" id="pic_path" class="form-control" accept="image/*">
            <small class="form-text text-muted">{{ __('Jelenlegi kép: ') }}{{ $entity['pic_path'] ?: 'KEP' }}</small>
        </fieldset>

        <!-- Length Field -->
        <fieldset class="mb-3">
            <label for="length" class="form-label">{{ __('Hossza (óra-perc, pl. 2-30)') }}</label>
            <input type="text" name="length" id="length" class="form-control" required placeholder="2-30" value="{{ old('length', $entity['length']) }}">
        </fieldset>

        <!-- Release Date Field -->
        <fieldset class="mb-3">
            <label for="release_date" class="form-label">{{ __('Megjelenés éve') }}</label>
            <input type="number" name="release_date" id="release_date" class="form-control" min="1900" max="2100" required value="{{ old('release_date', $entity['release_date']) }}">
        </fieldset>

        <!-- Submit and Cancel Buttons -->
        <button type="submit" class="btn btn-success">{{ __('Frissítés') }}</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">{{ __('Mégse') }}</a>
    </form>
</div>
@endsection