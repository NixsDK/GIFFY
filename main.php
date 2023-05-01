<?php

require_once 'vendor/autoload.php';
require_once 'APIkey/APIkey.php';

use APP\Giffy\GiphyApi;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/APIkey');
$dotenv->load();

$giphyApi = new GiphyApi();

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $gifs = $giphyApi->searchGifs($searchTerm, 25);
}

include 'index.php';
