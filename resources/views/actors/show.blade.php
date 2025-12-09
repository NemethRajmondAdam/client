@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.details_of', ['model' => 'actor']) }}</h1>

        <!-- Data Display -->
        <ul>
                <li>
        <strong>{{ __('actors.name',30);') }}:</strong>
        {{ $actor->name',30); }}
    </li>    <li>
        <strong>{{ __('actors.gender') }}:</strong>
        {{ $actor->gender }}
    </li>
        </ul>
        <!-- Back Button -->
        <a href="{{ route('actors.index') }}">{{ __('skeletons.back') }}</a>
    </div>
@endsection
