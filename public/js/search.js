function showSuggestions() {
    var input = document.getElementById("search_bar_id");
    var inputValue = input.value.toString();
    var dropdown = document.getElementById("suggestions-dropdown");
    dropdown.innerHTML = "";
    if (inputValue.length >= 4) {
        dropdown.classList.add("show");
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