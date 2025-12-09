@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.creating', ['model' => strtolower(__('categories.category'))]) }}</h1>

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
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
            value="{{ old('category') }}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('categories.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
