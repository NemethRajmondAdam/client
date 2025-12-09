@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.details_of', ['model' => 'studio']) }}</h1>

        <!-- Data Display -->
        <ul>
                <li>
        <strong>{{ __('studios.name') }}:</strong>
        {{ $studio->name }}
    </li>
        </ul>
        <!-- Back Button -->
        <a href="{{ route('studios.index') }}">{{ __('skeletons.back') }}</a>
    </div>
@endsection
