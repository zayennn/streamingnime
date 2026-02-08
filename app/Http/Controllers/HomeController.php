<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $anime = collect(require app_path('Data/animeData.php'));

        $trending = $anime
            ->filter(fn ($a) => isset($a['badge']) && in_array($a['badge'], ['Hot', 'New']))
            ->sortByDesc('rating')
            ->take(5)
            ->values();

        $topRated = $anime
            ->sortByDesc('rating')
            ->take(3)
            ->values();

        $ongoing = $anime
            ->where('status', 'airing')
            ->sortByDesc('rating')
            ->take(4)
            ->values();

        return view('welcome', compact(
            'trending',
            'topRated',
            'ongoing'
        ), [
            'page' => 'home',
        ]);
    }

    public function animeList()
    {
        $animeData = collect(require app_path('Data/animeData.php'));

        $allGenres = $animeData
            ->pluck('genres')
            ->flatten()
            ->unique()
            ->sort()
            ->values();

        $allTypes = $animeData
            ->pluck('type')
            ->unique()
            ->sort()
            ->values();

        $allStatuses = $animeData
            ->pluck('status')
            ->unique()
            ->sort()
            ->values();

        return view('anime-list', [
            'animeData' => $animeData,
            'allGenres' => $allGenres,
            'allTypes' => $allTypes,
            'allStatuses' => $allStatuses,
            'page' => 'Anime List',
        ]);
    }
}
