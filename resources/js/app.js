import './bootstrap';

function searchGame() {
    var input = document.getElementById("textbox_id").value;
    window.location.href = "http://127.0.0.1:8000/games/" + input;
}