<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $anime = collect(require app_path('Data/animeData.php'));

        // 🔥 Trending Now (punya badge Hot / New)
        $trending = $anime
            ->filter(fn ($a) => isset($a['badge']) && in_array($a['badge'], ['Hot', 'New']))
            ->sortByDesc('rating')
            ->take(5)
            ->values();

        // ⭐ Top Rated (rating tertinggi)
        $topRated = $anime
            ->sortByDesc('rating')
            ->take(3)
            ->values();

        // ⏳ Ongoing Anime
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
        $animeData = [
            // Anime starting with numbers/symbols

        ];

        // Extract unique genres from anime data for filter dropdown
        $allGenres = [];
        foreach ($animeData as $anime) {
            foreach ($anime['genres'] as $genre) {
                if (! in_array($genre, $allGenres)) {
                    $allGenres[] = $genre;
                }
            }
        }
        sort($allGenres);

        $allTypes = array_unique(array_column($animeData, 'type'));
        sort($allTypes);

        $allStatuses = array_unique(array_column($animeData, 'status'));
        sort($allStatuses);

        return view('anime-list', compact(
            'animeData',
            'allGenres',
            'allTypes',
            'allStatuses'
        ), [
            'page' => 'Anime List',
        ]);
    }
}
