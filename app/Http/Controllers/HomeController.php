<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $trending = [
            [
                'title' => 'Attack on Titan Final',
                'image' => 'https://via.placeholder.com/300x400/ff006e/ffffff?text=Attack+on+Titan',
                'episode' => 'S4 E28',
                'rating' => 9.0,
                'badge' => 'Hot',
                'genres' => ['Action', 'Drama', 'Fantasy'],
                'year' => 2023,
                'type' => 'TV',
            ],
            [
                'title' => 'Jujutsu Kaisen S2',
                'image' => 'https://via.placeholder.com/300x400/8338ec/ffffff?text=Jujutsu+Kaisen',
                'episode' => 'S2 E23',
                'rating' => 8.8,
                'badge' => 'New',
                'genres' => ['Action', 'Supernatural', 'School'],
                'year' => 2023,
                'type' => 'TV',
            ],
            [
                'title' => 'Chainsaw Man',
                'image' => 'https://via.placeholder.com/300x400/3a86ff/ffffff?text=Chainsaw+Man',
                'episode' => 'S1 E12',
                'rating' => 8.5,
                'badge' => null,
                'genres' => ['Action', 'Comedy', 'Horror'],
                'year' => 2022,
                'type' => 'TV',
            ],
        ];

        $ongoing = [
            [
                'title' => 'One Piece',
                'image' => 'https://via.placeholder.com/150x200/ff006e/ffffff?text=OP',
                'episode' => 'Episode 1089',
                'airing' => 'Airing Now',
                'time' => 'Sundays',
            ],
            [
                'title' => 'My Hero Academia S7',
                'image' => 'https://via.placeholder.com/150x200/8338ec/ffffff?text=BNH',
                'episode' => 'Episode 18',
                'airing' => 'Airing Now',
                'time' => 'Saturdays',
            ],
            [
                'title' => 'Demon Slayer S4',
                'image' => 'https://via.placeholder.com/150x200/3a86ff/ffffff?text=DS',
                'episode' => 'Episode 6',
                'airing' => 'Airing Now',
                'time' => 'Sundays',
            ],
        ];

        $topRated = [
            [
                'rank' => 1,
                'title' => 'Fullmetal Alchemist: Brotherhood',
                'image' => 'https://via.placeholder.com/80x110/ff006e/ffffff?text=FMAB',
                'score' => 9.1,
                'episodes' => 64,
                'year' => 2009,
                'genres' => ['Action', 'Adventure', 'Drama', 'Fantasy'],
            ],
            [
                'rank' => 2,
                'title' => 'Steins;Gate',
                'image' => 'https://via.placeholder.com/80x110/8338ec/ffffff?text=SG',
                'score' => 9.0,
                'episodes' => 24,
                'year' => 2011,
                'genres' => ['Sci-Fi', 'Thriller', 'Drama'],
            ],
        ];

        return view('home.index', compact(
            'trending',
            'ongoing',
            'topRated'
        ));
    }
}
