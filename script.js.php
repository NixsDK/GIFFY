
const searchForm = document.querySelector('form');
const searchInput = document.querySelector('#search-input');
const gifContainer = document.querySelector('#gif-container');

searchForm.addEventListener('submit', (event) => {
    event.preventDefault();
    const searchTerm = searchInput.value;
    if (searchTerm) {
        fetch(`/search.php?search=${searchTerm}`)
        .then(response => response.json())
            .then(data => {
            gifContainer.innerHTML = '';
            data.forEach(gif => {
                const img = document.createElement('img');
                img.src = gif.url;
                img.alt = gif.title;
                gifContainer.appendChild(img);
            });
            })
            .catch(error => console.error(error));
    }
});
