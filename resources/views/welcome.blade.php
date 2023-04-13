<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDAT - Know your game!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    @include('layouts.app')
    @vite('resources/js/app.js')
</head>
<body>
    @yield('header')
    <div class="container">
        <div class="input-group mb-3">
            <input type="text" id="textbox_id" class="form-control" placeholder="Epic game" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button onClick="searchGame()" class="btn btn-outline-primary" type="button" id="button-addon2">SEARCH THE GAME!</button>
        </div>
    </div>
    <script>
        function searchGame() {
            var input = document.getElementById("textbox_id").value;
            window.location.href = "http://127.0.0.1:8000/games/" + input;
        }
    </script>

</body>
</html>
