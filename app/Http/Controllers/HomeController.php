<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

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

        $allAnimeWithGenres = $anime->whereNotNull('genres');
        $genreCounter = [];

        foreach ($allAnimeWithGenres as $animeItem) {
            foreach ($animeItem['genres'] as $genre) {
                if (!isset($genreCounter[$genre])) {
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

    public function genreList()
    {
        $animeData = collect(require app_path('Data/animeData.php'));

        $genreCounts = [];
        foreach ($animeData as $anime) {
            foreach ($anime['genres'] as $genre) {
                if (!isset($genreCounts[$genre])) {
                    $genreCounts[$genre] = [
                        'count' => 0,
                        'anime' => []
                    ];
                }
                $genreCounts[$genre]['count']++;
                $genreCounts[$genre]['anime'][] = $anime;
            }
        }

        $genres = [];
        $gradients = [
            'linear-gradient(135deg, #ff006e, #ff4d94)',
            'linear-gradient(135deg, #8338ec, #9d5cff)',
            'linear-gradient(135deg, #3a86ff, #5fa8ff)',
            'linear-gradient(135deg, #ff006e, #8338ec)',
            'linear-gradient(135deg, #8338ec, #3a86ff)',
            'linear-gradient(135deg, #3a86ff, #ff006e)',
            'linear-gradient(135deg, #ff006e, #3a86ff)',
            'linear-gradient(135deg, #8338ec, #ff006e)',
        ];

        $i = 0;
        foreach ($genreCounts as $genreName => $data) {
            $topAnime = collect($data['anime'])
                ->sortByDesc('rating')
                ->take(3)
                ->values()
                ->map(function ($item) {
                    return [
                        'id' => $item['id'],
                        'title' => $item['title'],
                        'image' => $item['image'],
                        'rating' => $item['rating'],
                        'year' => $item['year'],
                    ];
                });

            $genres[] = [
                'id' => $i + 1,
                'name' => $genreName,
                'slug' => Str::slug($genreName),
                'count' => $data['count'],
                'gradient' => $gradients[$i % count($gradients)],
                'description' => "Explore the best {$genreName} anime series and movies. From classics to the latest releases.",
                'topAnime' => $topAnime,
            ];
            $i++;
        }

        usort($genres, function($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        $totalGenres = count($genres);
        $totalAnime = $animeData->count();
        $mostPopularGenre = collect($genreCounts)->sortByDesc('count')->keys()->first();

        return view('genre-list', compact(
            'genres',
            'totalGenres',
            'totalAnime',
            'mostPopularGenre'
        ), [
            'page' => 'Genre List',
        ]);
    }

    public function genreDetail($slug)
    {
        $animeData = collect(require app_path('Data/animeData.php'));
        
        $genreName = null;
        $genreAnime = [];
        
        foreach ($animeData as $anime) {
            foreach ($anime['genres'] as $genre) {
                if (Str::slug($genre) === $slug) {
                    $genreName = $genre;
                    $genreAnime[] = $anime;
                    break;
                }
            }
        }

        if (!$genreName) {
            abort(404);
        }

        $genreAnime = collect($genreAnime)->sortByDesc('rating')->values();

        $totalAnime = $genreAnime->count();
        $avgRating = round($genreAnime->avg('rating'), 1);
        $newestAnime = $genreAnime->sortByDesc('year')->first();
        $highestRated = $genreAnime->sortByDesc('rating')->first();

        // Ambil genre lain untuk rekomendasi
        $otherGenres = collect(require app_path('Data/animeData.php'))
            ->pluck('genres')
            ->flatten()
            ->unique()
            ->filter(fn($g) => Str::slug($g) !== $slug)
            ->take(8)
            ->map(function($g) {
                return [
                    'name' => $g,
                    'slug' => Str::slug($g),
                ];
            });

        return view('genre-detail', compact(
            'genreName',
            'genreAnime',
            'totalAnime',
            'avgRating',
            'newestAnime',
            'highestRated',
            'otherGenres',
            'slug'
        ), [
            'page' => $genreName . ' Anime',
        ]);
    }
}