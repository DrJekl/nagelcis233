<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

// $response = Http::get("http://example.com");

class TvMazeAPI {
    static function fetchEpisode($showNumber) {
        $episodesData = Http::get("https://api.tvmaze.com/shows/$showNumber/episodes")->json();
        $episodesCollection = collect($episodesData);
        return $episodesCollection->map(function ($episode) use ($showNumber) {
            return Episode::firstOrCreate([
                "name"=>$episode["name"], 
                "image"=>$episode["image"]["medium"], 
                "season"=>$episode["season"], 
                "episode"=>$episode["number"], 
                "summary"=>strip_tags($episode["summary"]),
                "show_number"=>$showNumber
            ]);
        });
    }
}