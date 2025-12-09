@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.creating', ['model' => strtolower(__('actors.actor'))]) }}</h1>

        <!-- Success Message -->
        @include('layouts.success')

        <!-- Error Message -->
        @include('layouts.errors')

        <!-- Form -->
        <form action="{{ route('actors.store') }}" method="POST">
            @csrf
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
            value="{{ old('name') }}"
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
            value="{{ old('gender') }}"
        >
    </fieldset>

            <!-- Save Button -->
            <button type="submit">{{ __('skeletons.save') }}</button>
            <!-- Cancel Button -->
            <a href="{{ route('actors.index') }}">{{ __('skeletons.cancel') }}</a>
        </form>
    </div>
@endsection
