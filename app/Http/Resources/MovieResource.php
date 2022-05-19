<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => $this['title'],
            'year' => $this['year'],
            'directors' => array_filter(array_map(function($n) { return $n['name']; }, $this['directorList'])),
            'genres' => array_filter(array_map(function($n) { return $n['value']; }, $this['genreList'])),
            'imdb_rating' => $this['rating']
        ];
    }
}
