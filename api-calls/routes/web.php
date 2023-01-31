<?php

use Illuminate\Support\Facades\Route;
use App\Models\Episode;
use App\Models\TvMazeAPI;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/load-episodes', function () {
    // Take the show query if one is given, otherwise default to 1
    $showNumber = intval(request()->query("showNumber"));
    $showNumber = $showNumber ?: 1;
    $episodes = TvMazeAPI::fetchEpisode($showNumber);
    return view('episodes/index', ['episodes' => $episodes]);
});

Route::get('/view-episodes', function () {
    // Take the show query if one is given, otherwise default to 1
    $showNumber = intval(request()->query("showNumber"));
    $showNumber = $showNumber ?: 1;
    $episodes = Episode::where("show_number", $showNumber)->get();
    return view('episodes/index', ['episodes' => $episodes]);
});

Route::get('/', function () {
    return view('welcome');
});


