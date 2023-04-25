<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameDAT - Know your game!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/search.js') }}"></script>
    @include('layouts.app')
</head>
<body>
    @yield('header_no_search')
    <div class="container my-5">
        <h1 class="text-center my-5">Search data for more than 4300+ games!</h1>
        <div class="position-relative">
            <form class="input-group mb-3">
                <input type="text" id="search_bar_id" autocomplete="off" class="form-control" placeholder="Epic game" aria-label="Recipient's username" aria-describedby="button-addon2" onkeyup="showSuggestions()">
                <button onClick="searchGame()" class="btn btn-outline-success" type="button" id="search-button">SEARCH THE GAME!</button>
            </form>
            <ul class="dropdown-menu dropdown-menu-end" id="suggestions-dropdown" aria-labelledby="dropdownMenuButton"></ul>
        </div>
    </div>
    @php
        $titles = json_encode(\App\Models\Game::getGameTitles());
        echo '
            <script>
                var input = document.getElementById("search_bar_id");
                function searchGame() {
                    window.location.href = "http://127.0.0.1:8000/games/" + input.value;
                }
                input.addEventListener("keypress", function(event) {
                    // If the user presses the "Enter" key on the keyboard
                    if (event.key === "Enter") {
                        // Cancel the default action, if needed
                        event.preventDefault();
                        // Trigger the button element with a click
                        document.getElementById("search-button").click();
                    }
                });
                var titles = ' . $titles . '; // This is used by search.js showSuggestions function
                document.getElementById("search_bar_id").addEventListener("keyup", showSuggestions);

                document.addEventListener("click", function(e) {
                    const input = document.getElementById("search_bar_id");
                    const dropdown = document.getElementById("suggestions-dropdown");
                    if (!input.contains(e.target) && !dropdown.contains(e.target)) {
                        dropdown.classList.remove("show");
                    }
                });
            </script>
            ';
    @endphp

</body>
</html>
