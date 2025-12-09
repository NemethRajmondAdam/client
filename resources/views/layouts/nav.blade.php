<nav>
    <a href="{{ url('/') }}">{{ __('skeletons.home') }}</a>
    <ul>
        <!-- Add dynamic links to models or pages here -->
                            <li><a href="{{ route('movies.index') }}">{{ __('movies.movies') }}</a></li>
                        <li><a href="{{ route('categories.index') }}">{{ __('categories.categories') }}</a></li>
                        <li><a href="{{ route('actors.index') }}">{{ __('actors.actors') }}</a></li>
                        <li><a href="{{ route('studios.index') }}">{{ __('studios.studios') }}</a></li>
                        <li><a href="{{ route('directors.index') }}">{{ __('directors.directors') }}</a></li>
</ul>
</nav>
