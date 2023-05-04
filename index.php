<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GIFFY</title>
</head>
<body>
<div class="container">
    <h1>GIFFY</h1>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search for GIFs">
        <button id="search-button">Search</button>
    </div>
    <div class="options-container">
        <label for="gif-count">Number of GIFs to display:</label>
        <select id="gif-count">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
        </select>
    </div>
    <div id="gif-container" class="gif-container"></div>
</div>
<script src="script.js"></script>
</body>
</html>
