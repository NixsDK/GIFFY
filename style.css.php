body {
    background: linear-gradient(135deg, #84f, #53c8e5);
    font-family: 'Roboto', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}

.container {
    text-align: center;
    max-width: 900px;
}

.search-container {
    display: flex;
    justify-content: center;
    margin-bottom: 10px;
}

.options-container {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

#search-input {
    padding: 5px 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 10px;
}

#search-button {
    padding: 5px 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
    background-color: #53c8e5;
    color: white;
}

#gif-count {
    margin-left: 10px;
}

.gif-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 4px;
}
