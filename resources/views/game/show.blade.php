<!DOCTYPE html>
<html>
<head>
    <title>{{ $game['title'] }}</title>
</head>
<body>
    <h1>{{ $game['title'] }}</h1>
    <p>{{ $game['summary'] }}</p>
    <p>Release Date: {{ $game['launch_date'] }}</p>
    <p>Genre: </p>
    <p>Platform: </p>
    <p>PEGI: {{ $game['pegi_rate'] }}</p>
    <p>Duration: {{ $game['duration'] }} hours</p>
</body>
</html>
