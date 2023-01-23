<?php

namespace app\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

// $response = Http::get("http://example.com");

class TvMazeAPI {
    static function fetchEpisode($number) {
        $episodesData = Http::get("https://api.tvmaze.com/shows/$number/episodes")->json();
        $episodesCollection = collect($episodesData);
        return $episodesCollection->map(function ($episode) {
            return new Episode(["name, image, season, episode, summary"]);
        });
    }
}