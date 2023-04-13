<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game['title'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    @include('layouts.app')
</head>
<body>
    @yield('header')
    <div class="container">
        <h1>{{ $game['title'] }}</h1>
        <ul class="list-group">
            <li class="list-group-item">{{ $game['summary'] }}</li>
            <li class="list-group-item">Release Date: {{ $game['launch_date'] }}</li>
            <li class="list-group-item">Genre: </li>
            <li class="list-group-item">Platform: </li>
            <li class="list-group-item">PEGI: {{ $game['pegi_rate'] }}</li>
            <li class="list-group-item">Duration: {{ $game['duration'] }} hours</li>
        </ul>
    </div>
    @yield('footer')
</body>
</html>
