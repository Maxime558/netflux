const search = document.getElementById("search");
const results = document.getElementById("results");

search.addEventListener("input", () => {
  const inputValue = search.value;

  if (inputValue === "") {
    results.innerHTML = "<h2>Commence à faire une recherche !</h2>";
    return;
  }

  fetch("../search.php?searchTerm=" + encodeURIComponent(inputValue))
    .then((response) => response.json())
    .then((data) => {
      let resultsDiv = document.getElementById("results");
      resultsDiv.innerHTML = "";

      data.forEach((item) => {
        let li = document.createElement("li");

        let img = document.createElement("img");

        img.src = `../assets/posters/${item.id_movie}.jpg`; 

        let span = document.createElement("span");
        span.textContent = `${item.title} - ${item.cast}`;

        li.appendChild(img);
        li.appendChild(span);

        resultsDiv.appendChild(li);
      });
    })
    .catch((error) => console.error("Error:", error));
});
