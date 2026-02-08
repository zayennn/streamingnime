<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        // ======================
        // TRENDING
        // ======================
        $trending = [
            [
                'title' => 'Attack on Titan Final',
                'image' => 'images/trending/Attack_on_Titan.jpg',
                'episode' => 'S4 E28',
                'rating' => 9.0,
                'badge' => 'Hot',
                'genres' => ['Action', 'Drama', 'Fantasy'],
                'year' => 2023,
                'type' => 'TV',
            ],
            [
                'title' => 'Jujutsu Kaisen S2',
                'image' => 'images/trending/jjk.jpg',
                'episode' => 'S2 E23',
                'rating' => 8.8,
                'badge' => 'New',
                'genres' => ['Action', 'Supernatural', 'School'],
                'year' => 2023,
                'type' => 'TV',
            ],
            [
                'title' => 'Chainsaw Man',
                'image' => 'images/trending/chainsawman.jpg',
                'episode' => 'S1 E12',
                'rating' => 8.5,
                'badge' => null,
                'genres' => ['Action', 'Comedy', 'Horror'],
                'year' => 2022,
                'type' => 'TV',
            ],
            [
                'title' => 'Blue Lock',
                'image' => 'images/trending/blue-lock.jpg',
                'episode' => 'S1 E24',
                'rating' => 8.3,
                'badge' => null,
                'genres' => ['Action', 'Sports'],
                'year' => 2022,
                'type' => 'TV',
            ],
            [
                'title' => 'Spy x Family S2',
                'image' => 'images/trending/spy-family.jpg',
                'episode' => 'S2 E10',
                'rating' => 8.7,
                'badge' => null,
                'genres' => ['Action', 'Comedy', 'Romance'],
                'year' => 2023,
                'type' => 'TV',
            ],
        ];

        // ======================
        // ONGOING
        // ======================
        $ongoing = [
            [
                'title' => 'One Piece',
                'image' => 'images/ongoing/one-piece.jpg',
                'episode' => 'Episode 1089',
                'airing' => 'Airing Now',
                'time' => 'Sundays',
            ],
            [
                'title' => 'Mashle S2',
                'image' => 'images/ongoing/mashle.jpg',
                'episode' => 'Episode 9',
                'airing' => 'Airing Now',
                'time' => 'Fridays',
            ],
        ];

        // ======================
        // TOP RATED
        // ======================
        $topRated = [
            [
                'rank' => 1,
                'title' => 'Fullmetal Alchemist: Brotherhood',
                'image' => 'images/top-rated/fmab.jpg',
                'score' => 9.1,
                'episodes' => 64,
                'year' => 2009,
                'genres' => ['Action', 'Adventure', 'Drama', 'Fantasy'],
            ],
            [
                'rank' => 2,
                'title' => 'Steins;Gate',
                'image' => 'images/top-rated/steins-gate.jpg',
                'score' => 9.0,
                'episodes' => 24,
                'year' => 2011,
                'genres' => ['Sci-Fi', 'Drama'],
            ],
        ];

        $allAnimeWithGenres = array_merge($trending, $topRated);

        $genreCounter = [];

        foreach ($allAnimeWithGenres as $anime) {
            foreach ($anime['genres'] as $genre) {
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
}
