<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</head>
<body class="bg-secondary">
    @section('header')
        <nav class="navbar bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand">GameDAT - Know your game!</a>
                <form class="d-flex">
                    <input class="form-control me-2" id="textbox_header_id" placeholder="Search" aria-label="Search">
                    <button type="button" id="headder-button" class="btn btn-outline-success" onClick="searchGame()">Search</button>
                </form>
            </div>
        </nav>

        <script>
            var input = document.getElementById("textbox_header_id");
            function searchGame() {
                var inputValue = document.getElementById("textbox_header_id").value;
                window.location.href = "http://127.0.0.1:8000/games/" + inputValue;
            }
            input.addEventListener("keypress", function(event) {
                // If the user presses the "Enter" key on the keyboard
                if (event.key === "Enter") {
                    // Cancel the default action, if needed
                    event.preventDefault();
                    // Trigger the button element with a click
                    document.getElementById("headder-button").click();
                }
            });
        </script>
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
