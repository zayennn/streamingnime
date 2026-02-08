<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
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
                'image' => 'images/trending/Blue Lock.jpg',
                'episode' => 'S1 E24',
                'rating' => 8.3,
                'badge' => null,
                'genres' => ['Action', 'Comedy', 'Slice of Life'],
                'year' => 2023,
                'type' => 'TV',
            ],
            [
                'title' => 'Spy x Family S2',
                'image' => 'images/trending/Spy x Family S2.jpg',
                'episode' => 'S1 E12',
                'rating' => 8.7,
                'badge' => null,
                'genres' => ['Action', 'Comedy', 'Slice of Life'],
                'year' => 2022,
                'type' => 'TV',
            ],
        ];

        $ongoing = [
            [
                'title' => 'One Piece',
                'image' => 'images/ongoing/one piece.jpg',
                'episode' => 'Episode 1089',
                'airing' => 'Airing Now',
                'time' => 'Sundays',
            ],
            [
                'title' => 'My Hero Academia S7',
                'image' => 'images/ongoing/My Hero Academia S7.jpg',
                'episode' => 'Episode 18',
                'airing' => 'Airing Now',
                'time' => 'Saturdays',
            ],
            [
                'title' => 'Demon Slayer S4',
                'image' => 'images/ongoing/Demon Slayer S4.jpg',
                'episode' => 'Episode 6',
                'airing' => 'Airing Now',
                'time' => 'Sundays',
            ],
            [
                'title' => 'Demon Slayer S4',
                'image' => 'images/ongoing/Demon Slayer S4.jpg',
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

        return view('welcome', compact('trending', 'ongoing', 'topRated'), [
            'page' => 'home'
        ]);
    }
}
