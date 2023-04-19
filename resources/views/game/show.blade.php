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
        <h1 class="my-2">{{ $game['name'] }}</h1>
        @if (isset($game['movies']) && count($game['movies']) > 0)
            <video class="object-fit-fill my-1" alt="..." controls style="object-fit: cover; width: 100%; height: 100%;" autoplay muted>
                <source src="{{ $game['movies'][0]['mp4']['max'] }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        @endif
        @if (isset($game['screenshots']) && count($game['screenshots']) > 0)
        <div id="carouselExampleAutoplaying" class="carousel slide my-2" data-bs-ride="carousel">
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
        @endif
        <ul class="list-group my-4">
            @if(isset($game['short_description']))
                <li class="list-group-item">{{ $game['short_description'] }}</li>
            @endif

            @if(isset($game['release_date']))
                <li class="list-group-item"><strong>Release Date: </strong>{{ $game['release_date']['date'] }}</li>
            @endif

            @if(isset($game['genres']) && count($game['genres']) > 0)
                <li class="list-group-item"><strong>Genres: </strong>
                    @foreach($game['genres'] as $index => $genre)
                        {{ $genre['description'] }}@if(!$loop->last),@endif
                    @endforeach
                </li>
            @endif

            @if(isset($game['categories']) && count($game['categories']) > 0)
                <li class="list-group-item"><strong>Categories: </strong>
                    @foreach($game['categories'] as $index => $category)
                        {{ $category['description'] }}@if(!$loop->last),@endif
                    @endforeach
                </li>
            @endif

            @if($game['required_age'] > 0)
                <li class="list-group-item"><strong>PEGI: </strong>{{ $game['required_age'] }}</li>
            @endif

            @if(isset($game['metacritic']))
                <li class="list-group-item"><strong>Metacritic: </strong>{{ $game['metacritic']['score'] }}</li>
            @endif

            @if(isset($game['platforms']) && count($game['platforms']) > 0)
                <li class="list-group-item"><strong>Platforms: </strong>
                    @foreach($game['platforms'] as $platform => $value)
                        @if($value)
                            {{ ucfirst($platform) }}
                            @if(!$loop->last && in_array(true, array_slice($game['platforms'], $loop->iteration)))
                                ,
                            @endif
                        @endif
                    @endforeach
                </li>
            @endif

            @if(isset($game['developers']) && count($game['developers']) > 0)
                <li class="list-group-item"><strong>Developers: </strong>
                    @foreach($game['developers'] as $index => $developer)
                        {{ $developer }}@if(!$loop->last),@endif
                    @endforeach
                </li>
            @endif

            @if(isset($game['publishers']) && count($game['publishers']) > 0)
                <li class="list-group-item"><strong>Publishers: </strong>
                    @foreach($game['publishers'] as $index => $publisher)
                        {{ $publisher }}@if(!$loop->last),@endif
                    @endforeach
                </li>
            @endif

            @if(isset($game['website']))
                <li class="list-group-item"><strong>Website: </strong>{{ $game['website'] }}</li>
            @endif
        </ul>

        <ul class="list-group my-4">
            @if(isset($game['pc_requirements']['minimum']))
                <li class="list-group-item">
                <strong>Windows </strong>{!! $game['pc_requirements']['minimum'] !!}</li>
            @endif
            @if(isset($game['pc_requirements']['recommended']))
                <li class="list-group-item">
                <strong>Windows </strong>{!! $game['pc_requirements']['recommended'] !!}</li>
            @endif
            @if(isset($game['mac_requirements']['minimum']))
                <li class="list-group-item">
                <strong>Mac </strong>{!! $game['mac_requirements']['minimum'] !!}</li>
            @endif
            @if(isset($game['mac_requirements']['recommended']))
                <li class="list-group-item">
                <strong>Mac </strong>{!! $game['mac_requirements']['recommended'] !!}</li>
            @endif
            @if(isset($game['linux_requirements']['minimum']))
                <li class="list-group-item">
                <strong>Linux </strong>{!! $game['linux_requirements']['minimum'] !!}</li>
            @endif
            @if(isset($game['linux_requirements']['recommended']))
                <li class="list-group-item">
                <strong>Linux </strong>{!! $game['linux_requirements']['recommended'] !!}</li>
            @endif
        </ul>

        @if(isset($game['achievements']) && count($game['achievements']['highlighted']) > 0)
            <ul class="list-group my-4">
                <li class="list-group-item"><strong>Highlighted achievements: </strong>
                    @foreach($game['achievements']['highlighted'] as $index => $achievement)
                        <div class="my-2">
                            <img src="{{ $achievement['path'] }}" alt="{{ $achievement['name'] }}" title="{{ $achievement['name'] }}" width="64" height="64">
                            {{ $achievement['name'] }}
                        </div>
                    @endforeach
                </li>
            </ul>
        @endif

    </div>
    @yield('footer')
</body>
</html>
