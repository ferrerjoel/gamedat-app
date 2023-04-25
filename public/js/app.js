import './bootstrap';

function searchGame(input_id) {
    var input = document.getElementById(input_id).value;
    window.location.href = "http://127.0.0.1:8000/games/" + input;
}

function showSuggestions(titles) {
    var input = document.getElementById("textbox_header_id");
    var inputValue = input.value.toString();
    dropdown.innerHTML = "";
    if (inputValue.length >= 4) {
        document.getElementById("suggestions-dropdown").classList.add("show");
        for (var i = 0; i < titles.length; i++) {
            var title = titles[i]["name"].toString();
            if (title.toLowerCase().includes(inputValue.toLowerCase())) {
                var item = document.createElement("li");
                item.innerHTML = `<a class="dropdown-item" href="/games/${title}" onclick="window.location.href="/games/${title}"" href="#">${title}</a>`;
                dropdown.append(item);
            }
        }
        // Add message if there are no results
        if (dropdown.innerHTML === "") {
            var item = document.createElement("li");
            item.innerHTML = "No games found";
            dropdown.append(item);
        }
    } else {
        // Remove show class from dropdown
        dropdown.classList.remove("show");
    }
}