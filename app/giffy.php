<?php

namespace APP\Giffy;

use APP\giphy\giphy;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GiphyApi
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function fetchTrending(int $limit): array
    {
        $response = $this->client->get('https://api.giphy.com/v1/gifs/trending', [
            'query' => [
                'api_key' => $_ENV['API_KEY'],
                'limit' => $limit,
                'offset' => rand(0, 499)
            ]
        ]);

        $giphyData = json_decode($response->getBody()->getContents());

        $collection = [];
        foreach ($giphyData->data as $gif) {
            $collection[] = new Giphy(
                $gif->title,
                $gif->images->fixed_width->url
            );
        }

        return $collection;
    }

    public function searchGifs(string $searchWord, int $limit): array
    {
        $response = $this->client->get('https://api.giphy.com/v1/gifs/search', [
            'query' => [
                'api_key' => $_ENV['API_KEY'],
                'q' => $searchWord,
                'limit' => $limit,
                'offset' => rand(0, 499)
            ]
        ]);

        $giphyData = json_decode($response->getBody()->getContents());

        $foundGifs = [];
        foreach ($giphyData->data as $gif) {
            $foundGifs[] = new Giphy(
                $gif->title,
                $gif->images->fixed_width->url
            );
        }

        return $foundGifs;
    }
}
