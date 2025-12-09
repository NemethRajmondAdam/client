@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.creating', ['model' => strtolower(__('directors.director'))]) }}</h1>

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('directors.store') }}" method="POST">
            @csrf
                <fieldset>
        <label for="name">
            {{ __('directors.name') }}
        </label>
        <input
            type="text"
            name="name"
            id="name"
            required
            placeholder="{{ __('directors.name') }}"
            value="{{ old('name') }}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('directors.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
