<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatile" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scales=1.0">
        <title>Filmek</title>
        <link rel="stylesheet" href="{{asset('style.css')}}">
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="{{route('movies.index')}}">Filmek</a></li>
                    <li><a href="{{route('categories.index')}}">Kategóriák</a></li>
                    <li><a href="{{route('actors.index')}}">Színészek</a></li>
                    <li><a href="{{route('directors.index')}}">Rendezők</a></li>
                    <li><a href="{{route('studios.index')}}">Stúdiók</a></li>
                </ul>
            </nav>
        </header>
    </body>
</html>
