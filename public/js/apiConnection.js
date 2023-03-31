async function getGame(title) {
  fetch(`http://127.0.0.1:5000/api/games/${title}`, {
    mode: 'no-cors'
  })
  .then(response => {
    console.log(response);
  })
  .catch(error => {
    console.error(error);
  });
}
