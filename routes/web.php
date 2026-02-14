<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/anime-list', [HomeController::class, 'animeList'])->name('animelist');
Route::get('/genre', [HomeController::class, 'genreList'])->name('genre.list');
Route::get('/genre/{slug}', [HomeController::class, 'genreDetail'])->name('genre.detail');
Route::get('/anime/{id}', [HomeController::class, 'animeDetail'])->name('anime.detail');