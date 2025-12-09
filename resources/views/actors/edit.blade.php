@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.modifying', ['model' => __('actors.actor')]) }}</h1>

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('actors.update', $actor) }}" method="POST">
            @csrf
            @method('PUT')
                <fieldset>
        <label for="name">
            {{ __('actors.name') }}
        </label>
        <input
            type="text"
            name="name"
            id="name"
            required
            placeholder="{{ __('actors.name') }}"
            value="{{ old('name', $actor->name) }}"
        >
    </fieldset>
    <fieldset>
        <label for="gender">
            {{ __('actors.gender') }}
        </label>
        <input
            type="text"
            name="gender"
            id="gender"
            required
            placeholder="{{ __('actors.gender') }}"
            value="{{ old('gender', $actor->gender) }}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('actors.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
