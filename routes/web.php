<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/anime-list', [HomeController::class, 'animeList'])->name('animelist');
Route::get('/genre', [App\Http\Controllers\HomeController::class, 'genreList'])->name('genre.list');
Route::get('/genre/{slug}', [App\Http\Controllers\HomeController::class, 'genreDetail'])->name('genre.detail');