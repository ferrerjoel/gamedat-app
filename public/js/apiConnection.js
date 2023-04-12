async function getGame(title) {
  const response = await fetch(`http://127.0.0.1:5000/api/games/${title}`, {
    method: 'GET', // specify the HTTP method
    headers: {
      'Content-Type': 'application/json' // specify any necessary headers
    }
  });
  
  const data = await response.json(); // extract the response body as JSON
  
  console.log(data); // log the extracted data to the console
}
