<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app-D-sv12UV.css') }}"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>{{ $tittle }}</title>
</head>
<div class="container">

    <body>
        <h1>{{ $tittle }}</h1>
        {{ $slot }}
    </body>
</div>

</html>
