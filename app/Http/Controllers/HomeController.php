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

        // ======================
        // GENRE CONFIG (INI YANG LU MAU)
        // CUMA ADA ACTION & ROMANCE
        // ======================
        $genresConfig = [
            'Action' => [
                'gradient' => 'linear-gradient(135deg, #ff006e, #ff4d94)',
            ],
            'Romance' => [
                'gradient' => 'linear-gradient(135deg, #8338ec, #ff006e)',
            ],
        ];

        // ======================
        // HITUNG JUMLAH ANIME PER GENRE
        // ======================
        $genreStats = [];

        foreach ($genresConfig as $genreName => $style) {
            $count = 0;

            foreach ($trending as $anime) {
                if (in_array($genreName, $anime['genres'])) {
                    $count++;
                }
            }

            $genreStats[] = [
                'name' => $genreName,
                'slug' => Str::slug($genreName),
                'count' => $count,
                'gradient' => $style['gradient'],
            ];
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