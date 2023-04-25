<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/search.js') }}"></script>

</head>
<body class="bg-secondary">
    @section('header')
        <nav class="navbar bg-dark fixed-top" data-bs-theme="dark">
            <div class="container-fluid position-relative">
            <a class="navbar-brand" href="/">GameDAT - Know your game!</a>
                <div class="position-relative">
                    <form class="d-flex">
                        <input class="form-control me-2" autocomplete="off" id="search_bar_id" placeholder="Search" aria-label="Search" onkeyup="showSuggestions()">
                        <button type="button" id="header-button" class="btn btn-outline-success" onClick="searchGame()">Search</button>
                    </form>
                    <ul class="dropdown-menu dropdown-menu-end" id="suggestions-dropdown" aria-labelledby="dropdownMenuButton"></ul>
                </div>
            </div>
        </nav>
        @php
        $titles = json_encode(\App\Models\Game::getGameTitles());
        echo '
            <script>
                var input = document.getElementById("search_bar_id");
                function searchGame() {
                    var inputValue = document.getElementById("search_bar_id").value;
                    window.location.href = "http://127.0.0.1:8000/games/" + inputValue;
                }
                input.addEventListener("keypress", function(event) {
                    // If the user presses the "Enter" key on the keyboard
                    if (event.key === "Enter") {
                        // Cancel the default action, if needed
                        event.preventDefault();
                        // Trigger the button element with a click
                        document.getElementById("header-button").click();
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

    @endsection
    @section('header_no_search')
        <nav class="navbar bg-dark fixed-top" data-bs-theme="dark">
            <div class="container-fluid position-relative">
            <a class="navbar-brand" href="/">GameDAT - Know your game!</a>
            </div>
        </nav>
    @endsection
    @section('footer')
        <!-- <nav class="navbar bg-dark fixed-bottom" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand fs-6">GameDAT company all rights reserverd ©</a>
                </form>
            </div>
        </nav> -->
    @endsection
</body>
</html>
