@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.modifying', ['model' => __('directors.director')]) }}</h1>

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('directors.update', $director) }}" method="POST">
            @csrf
            @method('PUT')
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
            value="{{ old('name', $director->name) }}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('directors.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
