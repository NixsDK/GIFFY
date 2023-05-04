const gifContainer = document.getElementById("gif-container");
const gifCount = document.getElementById("gif-count");
const searchButton = document.getElementById("search-button");
const searchInput = document.getElementById("search-input");

const displayGifs = (gifs) => {
    gifContainer.innerHTML = "";
    gifs.forEach((gif) => {
        const gifElement = document.createElement("img");
        gifElement.src = gif.images.fixed_height.url;
        gifElement.alt = gif.title;
        gifContainer.appendChild(gifElement);
    });
};

const fetchGifs = async (searchTerm) => {
    const response = await fetch(`https://api.giphy.com/v1/gifs/search?q=${searchTerm}&api_key=YOUR_API_KEY&limit=${gifCount.value}`);
    const data = await response.json();
    displayGifs(data.data);
};

const fetchTrendingGifs = async () => {
    const response = await fetch(`https://api.giphy.com/v1/gifs/trending?api_key=YOUR_API_KEY&limit=${gifCount.value}`);
    const data = await response.json();
    displayGifs(data.data);
};

const searchGifs = () => {
    const searchTerm = searchInput.value.trim();
    if (searchTerm) {
        fetchGifs(searchTerm);
    }
};

searchButton.addEventListener("click", searchGifs);

searchInput.addEventListener("keyup", (event) => {
    if (event.key === "Enter") {
        searchGifs();
    }
});

document.addEventListener("DOMContentLoaded", fetchTrendingGifs);
