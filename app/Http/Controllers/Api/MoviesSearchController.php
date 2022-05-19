<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchMoviesRequest;
use App\Services\SearchMovieService;

class MoviesSearchController extends Controller
{
    protected $searchService;

    public function __construct()
    {
        $this->searchService = new SearchMovieService();
    }

    public function search(SearchMoviesRequest $request)
    {
        $requestData = $request->validated();
        $movie = $this->searchService->search($requestData);

        return response()->json($movie['data'],$movie['status']);
    }
}
