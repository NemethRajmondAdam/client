@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.details_of', ['model' => 'director']) }}</h1>

        <!-- Data Display -->
        <ul>
                <li>
        <strong>{{ __('directors.name') }}:</strong>
        {{ $director->name}}
    </li>
        </ul>
        <!-- Back Button -->
        <a href="{{ route('directors.index') }}">{{ __('skeletons.back') }}</a>
    </div>
@endsection
