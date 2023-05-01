<?php

namespace Models;

use GuzzleHttp\Client;

class Giphy
{
    private Client $client;
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->client = new Client();
        $this->apiKey = $apiKey;
    }

    public function fetchTrending(int $limit): array
    {
        $response = $this->client->get('https://api.giphy.com/v1/gifs/trending', [
            'query' => [
                'api_key' => $this->apiKey,
                'limit' => $limit,
                'offset' => rand(0, 499)
            ]
        ]);

        $giphyData = json_decode($response->getBody()->getContents());

        $collection = [];
        foreach ($giphyData->data as $gif) {
            $collection[] = [
                'title' => $gif->title,
                'url' => $gif->images->fixed_width->url
            ];
        }

        return $collection;
    }

    public function searchGifs(string $searchWord, int $limit): array
    {
        $response = $this->client->get('https://api.giphy.com/v1/gifs/search', [
            'query' => [
                'api_key' => $this->apiKey,
                'q' => $searchWord,
                'limit' => $limit,
                'offset' => rand(0, 499)
            ]
        ]);

        $giphyData = json_decode($response->getBody()->getContents());

        $foundGifs = [];
        foreach ($giphyData->data as $gif) {
            $foundGifs[] = [
                'title' => $gif->title,
                'url' => $gif->images->fixed_width->url
            ];
        }

        return $foundGifs;
    }
}
