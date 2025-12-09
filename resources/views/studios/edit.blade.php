@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.modifying', ['model' => __('studios.studio')]) }}</h1>

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('studios.update', $studio) }}" method="POST">
            @csrf
            @method('PUT')
                <fieldset>
        <label for="name">
            {{ __('studios.name') }}
        </label>
        <input
            type="text"
            name={{ $studio->name }};
            id="studio_id";
            required
            placeholder="{{ __('studios.name') }}"
            value="{{ old('name', $studio->name)}}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('studios.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
