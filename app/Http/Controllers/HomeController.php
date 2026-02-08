<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

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
                'genres' => ['Action', 'Sports'],
                'year' => 2022,
                'type' => 'TV',
            ],
            [
                'title' => 'Spy x Family S2',
                'image' => 'images/trending/Spy x Family S2.jpg',
                'episode' => 'S2 E10',
                'rating' => 8.7,
                'badge' => null,
                'genres' => ['Action', 'Comedy', 'Romance'],
                'year' => 2023,
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
                'title' => 'Mashle S2',
                'image' => 'images/ongoing/Mashle S2.jpg',
                'episode' => 'Episode 9',
                'airing' => 'Airing Now',
                'time' => 'Fridays',
            ],
        ];

        $topRated = [
            [
                'rank' => 1,
                'title' => 'Fullmetal Alchemist: Brotherhood',
                'image' => 'images/top rated/Fullmetal Alchemist Brotherhood.jpg',
                'score' => 9.1,
                'episodes' => 64,
                'year' => 2009,
                'genres' => ['Action', 'Adventure', 'Drama', 'Fantasy'],
            ],
            [
                'rank' => 2,
                'title' => 'Steins;Gate',
                'image' => 'images/top rated/Steins;Gate.jpg',
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

    public function animeList()
    {
        $animeData = [
            // Anime starting with numbers/symbols
            [
                'id' => 1,
                'title' => "86 Eighty-Six",
                'letter' => "#",
                'year' => 2021,
                'rating' => 8.3,
                'episodes' => "23",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Drama", "Sci-Fi"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=86"
            ],
            [
                'id' => 2,
                'title' => "2.43: Seiin High School Boys Volleyball Team",
                'letter' => "#",
                'year' => 2021,
                'rating' => 6.8,
                'episodes' => "12",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Sports", "Drama"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=2.43"
            ],
            [
                'id' => 3,
                'title' => "91 Days",
                'letter' => "#",
                'year' => 2016,
                'rating' => 8.0,
                'episodes' => "12",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Drama", "Historical"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=91+Days"
            ],

            // A
            [
                'id' => 4,
                'title' => "Attack on Titan",
                'letter' => "A",
                'year' => 2013,
                'rating' => 9.1,
                'episodes' => "75+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Drama", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=AOT"
            ],
            [
                'id' => 5,
                'title' => "Another",
                'letter' => "A",
                'year' => 2012,
                'rating' => 7.5,
                'episodes' => "12",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Horror", "Mystery", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Another"
            ],
            [
                'id' => 6,
                'title' => "Assassination Classroom",
                'letter' => "A",
                'year' => 2015,
                'rating' => 8.1,
                'episodes' => "47",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Comedy", "School"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=AssClass"
            ],
            [
                'id' => 7,
                'title' => "Akame ga Kill!",
                'letter' => "A",
                'year' => 2014,
                'rating' => 7.6,
                'episodes' => "24",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Akame"
            ],
            [
                'id' => 8,
                'title' => "Angel Beats!",
                'letter' => "A",
                'year' => 2010,
                'rating' => 7.9,
                'episodes' => "13",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Comedy", "Drama"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Angel+Beats"
            ],

            // B
            [
                'id' => 9,
                'title' => "Bleach",
                'letter' => "B",
                'year' => 2004,
                'rating' => 8.2,
                'episodes' => "366",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Bleach"
            ],
            [
                'id' => 10,
                'title' => "Black Clover",
                'letter' => "B",
                'year' => 2017,
                'rating' => 7.8,
                'episodes' => "170",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Comedy", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Black+Clover"
            ],
            [
                'id' => 11,
                'title' => "Blue Lock",
                'letter' => "B",
                'year' => 2022,
                'rating' => 8.3,
                'episodes' => "24",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Sports", "Psychological"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Blue+Lock"
            ],

            // C
            [
                'id' => 12,
                'title' => "Chainsaw Man",
                'letter' => "C",
                'year' => 2022,
                'rating' => 8.5,
                'episodes' => "12",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Comedy", "Horror"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Chainsaw+Man"
            ],
            [
                'id' => 13,
                'title' => "Code Geass",
                'letter' => "C",
                'year' => 2006,
                'rating' => 8.7,
                'episodes' => "50",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Drama", "Mecha"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Code+Geass"
            ],
            [
                'id' => 14,
                'title' => "Cowboy Bebop",
                'letter' => "C",
                'year' => 1998,
                'rating' => 8.9,
                'episodes' => "26",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Sci-Fi"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Cowboy+Bebop"
            ],

            // D
            [
                'id' => 15,
                'title' => "Death Note",
                'letter' => "D",
                'year' => 2006,
                'rating' => 8.6,
                'episodes' => "37",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Mystery", "Psychological", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Death+Note"
            ],
            [
                'id' => 16,
                'title' => "Demon Slayer",
                'letter' => "D",
                'year' => 2019,
                'rating' => 8.7,
                'episodes' => "55+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Demon+Slayer"
            ],
            [
                'id' => 17,
                'title' => "Dr. Stone",
                'letter' => "D",
                'year' => 2019,
                'rating' => 8.2,
                'episodes' => "47+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Adventure", "Comedy", "Sci-Fi"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Dr.+Stone"
            ],

            // E
            [
                'id' => 18,
                'title' => "Erased",
                'letter' => "E",
                'year' => 2016,
                'rating' => 8.3,
                'episodes' => "12",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Mystery", "Psychological", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Erased"
            ],
            [
                'id' => 19,
                'title' => "Eighty Six",
                'letter' => "E",
                'year' => 2021,
                'rating' => 8.3,
                'episodes' => "23",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Drama", "Sci-Fi"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=86"
            ],
            [
                'id' => 20,
                'title' => "Eureka Seven",
                'letter' => "E",
                'year' => 2005,
                'rating' => 8.0,
                'episodes' => "50",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Adventure", "Drama", "Mecha"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Eureka+7"
            ],

            // F
            [
                'id' => 21,
                'title' => "Fullmetal Alchemist: Brotherhood",
                'letter' => "F",
                'year' => 2009,
                'rating' => 9.1,
                'episodes' => "64",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Drama"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=FMAB"
            ],
            [
                'id' => 22,
                'title' => "Fate/Zero",
                'letter' => "F",
                'year' => 2011,
                'rating' => 8.3,
                'episodes' => "25",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Fantasy", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Fate+Zero"
            ],
            [
                'id' => 23,
                'title' => "Fruits Basket",
                'letter' => "F",
                'year' => 2019,
                'rating' => 8.3,
                'episodes' => "63",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Comedy", "Drama", "Romance"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Fruits+Basket"
            ],

            // G
            [
                'id' => 24,
                'title' => "Gintama",
                'letter' => "G",
                'year' => 2006,
                'rating' => 9.0,
                'episodes' => "367",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Comedy", "Sci-Fi"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Gintama"
            ],
            [
                'id' => 25,
                'title' => "Gurren Lagann",
                'letter' => "G",
                'year' => 2007,
                'rating' => 8.3,
                'episodes' => "27",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Mecha"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Gurren+Lagann"
            ],

            // H
            [
                'id' => 26,
                'title' => "Hunter x Hunter (2011)",
                'letter' => "H",
                'year' => 2011,
                'rating' => 9.0,
                'episodes' => "148",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=HxH"
            ],
            [
                'id' => 27,
                'title' => "Haikyu!!",
                'letter' => "H",
                'year' => 2014,
                'rating' => 8.4,
                'episodes' => "85",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Comedy", "Sports", "Drama"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Haikyu"
            ],

            // I
            [
                'id' => 28,
                'title' => "Inuyasha",
                'letter' => "I",
                'year' => 2000,
                'rating' => 7.9,
                'episodes' => "167",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Inuyasha"
            ],
            [
                'id' => 29,
                'title' => "Is It Wrong to Try to Pick Up Girls in a Dungeon?",
                'letter' => "I",
                'year' => 2015,
                'rating' => 7.5,
                'episodes' => "37+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=DanMachi"
            ],

            // J
            [
                'id' => 30,
                'title' => "Jujutsu Kaisen",
                'letter' => "J",
                'year' => 2020,
                'rating' => 8.6,
                'episodes' => "47+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Supernatural", "School"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=JJK"
            ],
            [
                'id' => 31,
                'title' => "JoJo's Bizarre Adventure",
                'letter' => "J",
                'year' => 2012,
                'rating' => 8.4,
                'episodes' => "190+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=JoJo"
            ],

            // K
            [
                'id' => 32,
                'title' => "Kaguya-sama: Love is War",
                'letter' => "K",
                'year' => 2019,
                'rating' => 8.5,
                'episodes' => "37",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Comedy", "Romance", "School"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Kaguya-sama"
            ],
            [
                'id' => 33,
                'title' => "Kimi no Na wa",
                'letter' => "K",
                'year' => 2016,
                'rating' => 8.4,
                'episodes' => "1",
                'type' => "Movie",
                'status' => "completed",
                'genres' => ["Drama", "Romance", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Your+Name"
            ],

            // L
            [
                'id' => 34,
                'title' => "Love Live! School Idol Project",
                'letter' => "L",
                'year' => 2013,
                'rating' => 7.4,
                'episodes' => "26",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Music", "Slice of Life", "School"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Love+Live"
            ],

            // M
            [
                'id' => 35,
                'title' => "My Hero Academia",
                'letter' => "M",
                'year' => 2016,
                'rating' => 8.4,
                'episodes' => "138+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Comedy", "School"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=MHA"
            ],
            [
                'id' => 36,
                'title' => "Mob Psycho 100",
                'letter' => "M",
                'year' => 2016,
                'rating' => 8.5,
                'episodes' => "37",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Comedy", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Mob+Psycho"
            ],

            // N
            [
                'id' => 37,
                'title' => "Naruto",
                'letter' => "N",
                'year' => 2002,
                'rating' => 8.3,
                'episodes' => "220",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Naruto"
            ],
            [
                'id' => 38,
                'title' => "Naruto Shippuden",
                'letter' => "N",
                'year' => 2007,
                'rating' => 8.6,
                'episodes' => "500",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Shippuden"
            ],

            // O
            [
                'id' => 39,
                'title' => "One Piece",
                'letter' => "O",
                'year' => 1999,
                'rating' => 8.7,
                'episodes' => "1089+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Comedy"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=One+Piece"
            ],
            [
                'id' => 40,
                'title' => "One Punch Man",
                'letter' => "O",
                'year' => 2015,
                'rating' => 8.7,
                'episodes' => "24",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Comedy", "Superhero"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=OPM"
            ],

            // P
            [
                'id' => 41,
                'title' => "Pokémon",
                'letter' => "P",
                'year' => 1997,
                'rating' => 7.4,
                'episodes' => "1200+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Comedy"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Pokemon"
            ],

            // Q
            [
                'id' => 42,
                'title' => "Q Transformers: Mystery of Convoy Returns",
                'letter' => "Q",
                'year' => 2015,
                'rating' => 5.8,
                'episodes' => "1",
                'type' => "Movie",
                'status' => "completed",
                'genres' => ["Action", "Sci-Fi"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Q+Transformers"
            ],

            // R
            [
                'id' => 43,
                'title' => "Re:Zero",
                'letter' => "R",
                'year' => 2016,
                'rating' => 8.2,
                'episodes' => "50",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Drama", "Fantasy", "Psychological"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=ReZero"
            ],

            // S
            [
                'id' => 44,
                'title' => "Steins;Gate",
                'letter' => "S",
                'year' => 2011,
                'rating' => 9.1,
                'episodes' => "24",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Sci-Fi", "Thriller", "Drama"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=SteinsGate"
            ],
            [
                'id' => 45,
                'title' => "Sword Art Online",
                'letter' => "S",
                'year' => 2012,
                'rating' => 7.2,
                'episodes' => "97+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Fantasy"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=SAO"
            ],
            [
                'id' => 46,
                'title' => "Spy x Family",
                'letter' => "S",
                'year' => 2022,
                'rating' => 8.7,
                'episodes' => "25+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Comedy", "Slice of Life"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Spy+x+Family"
            ],

            // T
            [
                'id' => 47,
                'title' => "Tokyo Ghoul",
                'letter' => "T",
                'year' => 2014,
                'rating' => 7.8,
                'episodes' => "48",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Action", "Drama", "Horror"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Tokyo+Ghoul"
            ],
            [
                'id' => 48,
                'title' => "The Promised Neverland",
                'letter' => "T",
                'year' => 2019,
                'rating' => 8.3,
                'episodes' => "23",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Mystery", "Psychological", "Thriller"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Neverland"
            ],

            // U
            [
                'id' => 49,
                'title' => "Uzaki-chan Wants to Hang Out!",
                'letter' => "U",
                'year' => 2020,
                'rating' => 6.9,
                'episodes' => "24",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Comedy", "Romance", "Slice of Life"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=Uzaki-chan"
            ],

            // V
            [
                'id' => 50,
                'title' => "Vinland Saga",
                'letter' => "V",
                'year' => 2019,
                'rating' => 8.8,
                'episodes' => "48+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Action", "Adventure", "Drama"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Vinland+Saga"
            ],

            // W
            [
                'id' => 51,
                'title' => "Welcome to Demon School! Iruma-kun",
                'letter' => "W",
                'year' => 2019,
                'rating' => 7.9,
                'episodes' => "65+",
                'type' => "TV",
                'status' => "airing",
                'genres' => ["Comedy", "Fantasy", "School"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Iruma-kun"
            ],

            // X
            [
                'id' => 52,
                'title' => "xxxHOLiC",
                'letter' => "X",
                'year' => 2006,
                'rating' => 7.7,
                'episodes' => "24",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Comedy", "Mystery", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/ff006e/ffffff?text=xxxHOLiC"
            ],

            // Y
            [
                'id' => 53,
                'title' => "Yuri!!! on Ice",
                'letter' => "Y",
                'year' => 2016,
                'rating' => 8.1,
                'episodes' => "12",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Comedy", "Sports", "Drama"],
                'image' => "https://via.placeholder.com/300x400/8338ec/ffffff?text=Yuri+on+Ice"
            ],

            // Z
            [
                'id' => 54,
                'title' => "Zombie Land Saga",
                'letter' => "Z",
                'year' => 2018,
                'rating' => 7.8,
                'episodes' => "24",
                'type' => "TV",
                'status' => "completed",
                'genres' => ["Comedy", "Music", "Supernatural"],
                'image' => "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Zombie+Land"
            ]
        ];

        // Extract unique genres from anime data for filter dropdown
        $allGenres = [];
        foreach ($animeData as $anime) {
            foreach ($anime['genres'] as $genre) {
                if (!in_array($genre, $allGenres)) {
                    $allGenres[] = $genre;
                }
            }
        }
        sort($allGenres);

        // Extract unique types for filter dropdown
        $allTypes = array_unique(array_column($animeData, 'type'));
        sort($allTypes);

        // Extract unique statuses for filter dropdown
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