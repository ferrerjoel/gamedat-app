<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDAT - {{ $game['name'] }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    @include('layouts.app')
</head>
<body>
    @yield('header')
    <div class="container">
        <h1 class="my-1">{{ $game['name'] }}</h1>
        @if (isset($game['movies']) && count($game['movies']) > 0)
            <video class="object-fit-fill my-1" alt="..." controls style="object-fit: cover; width: 100%; height: 100%;" autoplay muted>
                <source src="{{ $game['movies'][0]['mp4']['max'] }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
        <div id="carouselExampleAutoplaying my-1" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if (isset($game['screenshots']) && count($game['screenshots']) > 0)
                    @foreach ($game['screenshots'] as $index => $screenshot)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ $screenshot['path_full'] }}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                @endif
            </div>

            <div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <ul class="list-group my-1">
            <li class="list-group-item">{{ $game['short_description'] }}</li>
            <li class="list-group-item">Release Date: {{ $game['release_date']['date'] }}</li>
            <li class="list-group-item">Genre: 
                @if(isset($game['genres']) && count($game['genres']) > 0)
                    @foreach($game['genres'] as $index => $genre)
                        {{ $genre['description'] }}@if(!$loop->last),@endif
                    @endforeach
                @endif
            </li>
            <li class="list-group-item">Platforms: 
                @if(isset($game['platforms']) && count($game['platforms']) > 0)
                    @foreach($game['platforms'] as $platform => $value)
                        @if($value)
                            {{ ucfirst($platform) }}
                            @if(!$loop->last && in_array(true, array_slice($game['platforms'], $loop->iteration)))
                                ,
                            @endif
                        @endif
                    @endforeach
                @endif
            </li>

            <li class="list-group-item">PEGI: {{ $game['required_age'] }}</li>
            @if(isset($game['metacritic']))
                <li class="list-group-item">Metacritic: {{ $game['metacritic']['score'] }}</li>
            @endif
            @if(isset($game['website']))
                <li class="list-group-item">Website: {{ $game['website'] }}</li>
            @endif
        </ul>
    </div>
    @yield('footer')
</body>
</html>
