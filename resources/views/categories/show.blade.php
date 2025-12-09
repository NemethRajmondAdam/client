@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Page Title -->
        <h1>{{ __('skeletons.details_of', ['model' => 'category']) }}</h1>

        <!-- Data Display -->
        <ul>
                <li>
        <strong>{{ __('categories.category',30);') }}:</strong>
        {{ $category->category',30); }}
    </li>
        </ul>
        <!-- Back Button -->
        <a href="{{ route('categories.index') }}">{{ __('skeletons.back') }}</a>
    </div>
@endsection
