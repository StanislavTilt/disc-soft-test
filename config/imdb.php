<?php

return [
    'urls' => [
        'search' => 'https://imdb-api.com/en/API/SearchTitle/',
        'by_id' => 'https://imdb-api.com/en/API/Title/',
        'rating' => 'https://imdb-api.com/en/API/Ratings/',
    ],
    'api_key' => env("IMDB_API_KEY", ''),
];
