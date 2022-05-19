<?php

namespace App\Services;


use App\Http\Resources\MovieResource;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

/**
 * Class SearchMovieService
 * @package App\Services
 */
class SearchMovieService extends BasicService
{
    /**
     * @var \Illuminate\Config\Repository|mixed
     */
    protected $api_key;

    /**
     * SearchMovieService constructor.
     */
    public function __construct()
    {
        $this->api_key = config('imdb.api_key');
    }

    /**
     * @param array $searchData
     * @return array
     */
    public function search(array $searchData)
    {
        $searchData['title'] = str_replace(' ', "%20", $searchData['title']);
        $result = Http::get(config('imdb.urls.search') . $this->api_key . '/' . $searchData['title'])->json()['results'];

        if (count($result) == 0) {
            return $this->errorResponse();
        }

        if (count($result) == 1) {
            $id = current($result)['id'];
            $movie = $this->getMovieById($id);
            $movie['rating'] = $this->getRatings($id)['imDb'];
            return $this->successResponse(200, MovieResource::make($movie));
        }

        foreach ($result as $key => $value)
        {
            $result[$key]['movieData'] = $this->getMovieById($value['id']);
        }

        if(!isset($searchData['year']))
        {
            return $this->errorResponse();
        }
        $year = $searchData['year'];
        $movies = array_filter(array_map(function ($n) use($year) {
            if($n['movieData']['year'] == $year)
            {
                return $n['movieData'];
            }
        }, $result));

        if(count($movies) != 1)
        {
            return $this->errorResponse();
        }

        $movie = current($movies);
        $movie['rating'] = $this->getRatings($movie['id'])['imDb'];

        return $this->successResponse(200, MovieResource::make($movie));
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getMovieById(string $id)
    {
        return Http::get(config('imdb.urls.by_id') . $this->api_key . '/' . $id)->json();
    }

    /**
     * @param string $id
     * @return mixed
     */
    public function getRatings(string $id)
    {
        return Http::get(config('imdb.urls.rating') . $this->api_key . '/' . $id)->json();
    }
}
