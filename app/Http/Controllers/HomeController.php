<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $anime = collect(require app_path('Data/animeData.php'));

        $trending = $anime
            ->filter(fn ($a) => isset($a['badge']) && in_array($a['badge'], ['Hot', 'New']))
            ->sortByDesc('rating')
            ->take(5)
            ->values()
            ->map(function ($item) {
                return [
                    'title' => $item['title'],
                    'image' => $item['image'],
                    'episode' => $item['episode'],
                    'rating' => $item['rating'],
                    'badge' => $item['badge'],
                    'genres' => $item['genres'],
                    'year' => $item['year'],
                    'type' => $item['type'],
                ];
            });

        $topRated = $anime
            ->where('rank', '>', 0)
            ->sortBy('rank')
            ->values()
            ->map(function ($item, $index) {
                return [
                    'rank' => $item['rank'],
                    'title' => $item['title'],
                    'image' => $item['image'],
                    'score' => $item['score'],
                    'episodes' => $item['episodes'],
                    'year' => $item['year'],
                    'genres' => $item['genres'],
                ];
            });

        $ongoing = $anime
            ->where('status', 'airing')
            ->whereNotNull('airing')
            ->sortByDesc('rating')
            ->take(5)
            ->values()
            ->map(function ($item) {
                return [
                    'title' => $item['title'],
                    'image' => $item['image'],
                    'episode' => $item['episode'],
                    'airing' => $item['airing'],
                    'time' => $item['time'],
                ];
            });

        // Generate genre stats from all anime
        $allAnimeWithGenres = $anime->whereNotNull('genres');
        $genreCounter = [];

        foreach ($allAnimeWithGenres as $animeItem) {
            foreach ($animeItem['genres'] as $genre) {
                if (! isset($genreCounter[$genre])) {
                    $genreCounter[$genre] = 0;
                }
                $genreCounter[$genre]++;
            }
        }

        $gradients = [
            'linear-gradient(135deg, #ff006e, #ff4d94)',
            'linear-gradient(135deg, #8338ec, #9d5cff)',
            'linear-gradient(135deg, #3a86ff, #5fa8ff)',
            'linear-gradient(135deg, #ff006e, #8338ec)',
            'linear-gradient(135deg, #8338ec, #3a86ff)',
            'linear-gradient(135deg, #3a86ff, #ff006e)',
        ];

        $genreStats = [];
        $i = 0;

        foreach ($genreCounter as $genreName => $count) {
            $genreStats[] = [
                'name' => $genreName,
                'slug' => Str::slug($genreName),
                'count' => $count,
                'gradient' => $gradients[$i % count($gradients)],
            ];
            $i++;
        }

        return view('welcome', compact(
            'trending',
            'ongoing',
            'topRated',
            'genreStats'
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
            ->values()
            ->toArray();

        $allTypes = $animeData
            ->pluck('type')
            ->unique()
            ->sort()
            ->values()
            ->toArray();

        $allStatuses = $animeData
            ->pluck('status')
            ->unique()
            ->sort()
            ->values()
            ->toArray();

        return view('anime-list', [
            'animeData' => $animeData->values()->toArray(),
            'allGenres' => $allGenres,
            'allTypes' => $allTypes,
            'allStatuses' => $allStatuses,
            'page' => 'Anime List',
        ]);
    }
}