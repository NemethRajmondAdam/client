@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.modifying', ['model' => __('categories.category')]) }}</h1>

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
                <fieldset>
        <label for="category">
            {{ __('categories.category') }}
        </label>
        <input
            type="text"
            name="category"
            id="category"
            required
            placeholder="{{ __('categories.category') }}"
            value="{{ old('category', $category->category) }}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('categories.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
