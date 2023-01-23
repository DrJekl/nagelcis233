<?php

use Illuminate\Support\Facades\Route;
use app\Models\TvMazeAPI;

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

Route::get('/episodes', function () {
    // $number = intval(request()->query("number"));
    // $number = $number ?: 1;
    // $episodes = TvMazeAPI::fetchEpisode($number);
    return view('episodes/index');
});

Route::get('/', function () {
    return view('welcome');
});


