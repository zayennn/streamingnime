// Sample Anime Data
const animeData = [
    // Anime starting with numbers/symbols
    {
        id: 1,
        title: "86 Eighty-Six",
        letter: "#",
        year: 2021,
        rating: 8.3,
        episodes: "23",
        type: "TV",
        status: "completed",
        genres: ["Action", "Drama", "Sci-Fi"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=86"
    },
    {
        id: 2,
        title: "2.43: Seiin High School Boys Volleyball Team",
        letter: "#",
        year: 2021,
        rating: 6.8,
        episodes: "12",
        type: "TV",
        status: "completed",
        genres: ["Sports", "Drama"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=2.43"
    },
    {
        id: 3,
        title: "91 Days",
        letter: "#",
        year: 2016,
        rating: 8.0,
        episodes: "12",
        type: "TV",
        status: "completed",
        genres: ["Action", "Drama", "Historical"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=91+Days"
    },

    // A
    {
        id: 4,
        title: "Attack on Titan",
        letter: "A",
        year: 2013,
        rating: 9.1,
        episodes: "75+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Drama", "Fantasy"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=AOT"
    },
    {
        id: 5,
        title: "Another",
        letter: "A",
        year: 2012,
        rating: 7.5,
        episodes: "12",
        type: "TV",
        status: "completed",
        genres: ["Horror", "Mystery", "Supernatural"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Another"
    },
    {
        id: 6,
        title: "Assassination Classroom",
        letter: "A",
        year: 2015,
        rating: 8.1,
        episodes: "47",
        type: "TV",
        status: "completed",
        genres: ["Action", "Comedy", "School"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=AssClass"
    },
    {
        id: 7,
        title: "Akame ga Kill!",
        letter: "A",
        year: 2014,
        rating: 7.6,
        episodes: "24",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Akame"
    },
    {
        id: 8,
        title: "Angel Beats!",
        letter: "A",
        year: 2010,
        rating: 7.9,
        episodes: "13",
        type: "TV",
        status: "completed",
        genres: ["Action", "Comedy", "Drama"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Angel+Beats"
    },

    // B
    {
        id: 9,
        title: "Bleach",
        letter: "B",
        year: 2004,
        rating: 8.2,
        episodes: "366",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Supernatural"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Bleach"
    },
    {
        id: 10,
        title: "Black Clover",
        letter: "B",
        year: 2017,
        rating: 7.8,
        episodes: "170",
        type: "TV",
        status: "completed",
        genres: ["Action", "Comedy", "Fantasy"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Black+Clover"
    },
    {
        id: 11,
        title: "Blue Lock",
        letter: "B",
        year: 2022,
        rating: 8.3,
        episodes: "24",
        type: "TV",
        status: "completed",
        genres: ["Sports", "Psychological"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Blue+Lock"
    },

    // C
    {
        id: 12,
        title: "Chainsaw Man",
        letter: "C",
        year: 2022,
        rating: 8.5,
        episodes: "12",
        type: "TV",
        status: "completed",
        genres: ["Action", "Comedy", "Horror"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Chainsaw+Man"
    },
    {
        id: 13,
        title: "Code Geass",
        letter: "C",
        year: 2006,
        rating: 8.7,
        episodes: "50",
        type: "TV",
        status: "completed",
        genres: ["Action", "Drama", "Mecha"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Code+Geass"
    },
    {
        id: 14,
        title: "Cowboy Bebop",
        letter: "C",
        year: 1998,
        rating: 8.9,
        episodes: "26",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Sci-Fi"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Cowboy+Bebop"
    },

    // D
    {
        id: 15,
        title: "Death Note",
        letter: "D",
        year: 2006,
        rating: 8.6,
        episodes: "37",
        type: "TV",
        status: "completed",
        genres: ["Mystery", "Psychological", "Supernatural"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Death+Note"
    },
    {
        id: 16,
        title: "Demon Slayer",
        letter: "D",
        year: 2019,
        rating: 8.7,
        episodes: "55+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Demon+Slayer"
    },
    {
        id: 17,
        title: "Dr. Stone",
        letter: "D",
        year: 2019,
        rating: 8.2,
        episodes: "47+",
        type: "TV",
        status: "airing",
        genres: ["Adventure", "Comedy", "Sci-Fi"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Dr.+Stone"
    },

    // E
    {
        id: 18,
        title: "Erased",
        letter: "E",
        year: 2016,
        rating: 8.3,
        episodes: "12",
        type: "TV",
        status: "completed",
        genres: ["Mystery", "Psychological", "Supernatural"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Erased"
    },
    {
        id: 19,
        title: "Eighty Six",
        letter: "E",
        year: 2021,
        rating: 8.3,
        episodes: "23",
        type: "TV",
        status: "completed",
        genres: ["Action", "Drama", "Sci-Fi"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=86"
    },
    {
        id: 20,
        title: "Eureka Seven",
        letter: "E",
        year: 2005,
        rating: 8.0,
        episodes: "50",
        type: "TV",
        status: "completed",
        genres: ["Adventure", "Drama", "Mecha"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Eureka+7"
    },

    // F
    {
        id: 21,
        title: "Fullmetal Alchemist: Brotherhood",
        letter: "F",
        year: 2009,
        rating: 9.1,
        episodes: "64",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Drama"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=FMAB"
    },
    {
        id: 22,
        title: "Fate/Zero",
        letter: "F",
        year: 2011,
        rating: 8.3,
        episodes: "25",
        type: "TV",
        status: "completed",
        genres: ["Action", "Fantasy", "Supernatural"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Fate+Zero"
    },
    {
        id: 23,
        title: "Fruits Basket",
        letter: "F",
        year: 2019,
        rating: 8.3,
        episodes: "63",
        type: "TV",
        status: "completed",
        genres: ["Comedy", "Drama", "Romance"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Fruits+Basket"
    },

    // G
    {
        id: 24,
        title: "Gintama",
        letter: "G",
        year: 2006,
        rating: 9.0,
        episodes: "367",
        type: "TV",
        status: "completed",
        genres: ["Action", "Comedy", "Sci-Fi"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Gintama"
    },
    {
        id: 25,
        title: "Gurren Lagann",
        letter: "G",
        year: 2007,
        rating: 8.3,
        episodes: "27",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Mecha"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Gurren+Lagann"
    },

    // H
    {
        id: 26,
        title: "Hunter x Hunter (2011)",
        letter: "H",
        year: 2011,
        rating: 9.0,
        episodes: "148",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=HxH"
    },
    {
        id: 27,
        title: "Haikyu!!",
        letter: "H",
        year: 2014,
        rating: 8.4,
        episodes: "85",
        type: "TV",
        status: "completed",
        genres: ["Comedy", "Sports", "Drama"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Haikyu"
    },

    // I
    {
        id: 28,
        title: "Inuyasha",
        letter: "I",
        year: 2000,
        rating: 7.9,
        episodes: "167",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Inuyasha"
    },
    {
        id: 29,
        title: "Is It Wrong to Try to Pick Up Girls in a Dungeon?",
        letter: "I",
        year: 2015,
        rating: 7.5,
        episodes: "37+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=DanMachi"
    },

    // J
    {
        id: 30,
        title: "Jujutsu Kaisen",
        letter: "J",
        year: 2020,
        rating: 8.6,
        episodes: "47+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Supernatural", "School"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=JJK"
    },
    {
        id: 31,
        title: "JoJo's Bizarre Adventure",
        letter: "J",
        year: 2012,
        rating: 8.4,
        episodes: "190+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Supernatural"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=JoJo"
    },

    // K
    {
        id: 32,
        title: "Kaguya-sama: Love is War",
        letter: "K",
        year: 2019,
        rating: 8.5,
        episodes: "37",
        type: "TV",
        status: "completed",
        genres: ["Comedy", "Romance", "School"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Kaguya-sama"
    },
    {
        id: 33,
        title: "Kimi no Na wa",
        letter: "K",
        year: 2016,
        rating: 8.4,
        episodes: "1",
        type: "Movie",
        status: "completed",
        genres: ["Drama", "Romance", "Supernatural"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Your+Name"
    },

    // L
    {
        id: 34,
        title: "Love Live! School Idol Project",
        letter: "L",
        year: 2013,
        rating: 7.4,
        episodes: "26",
        type: "TV",
        status: "completed",
        genres: ["Music", "Slice of Life", "School"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Love+Live"
    },

    // M
    {
        id: 35,
        title: "My Hero Academia",
        letter: "M",
        year: 2016,
        rating: 8.4,
        episodes: "138+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Comedy", "School"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=MHA"
    },
    {
        id: 36,
        title: "Mob Psycho 100",
        letter: "M",
        year: 2016,
        rating: 8.5,
        episodes: "37",
        type: "TV",
        status: "completed",
        genres: ["Action", "Comedy", "Supernatural"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Mob+Psycho"
    },

    // N
    {
        id: 37,
        title: "Naruto",
        letter: "N",
        year: 2002,
        rating: 8.3,
        episodes: "220",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Naruto"
    },
    {
        id: 38,
        title: "Naruto Shippuden",
        letter: "N",
        year: 2007,
        rating: 8.6,
        episodes: "500",
        type: "TV",
        status: "completed",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Shippuden"
    },

    // O
    {
        id: 39,
        title: "One Piece",
        letter: "O",
        year: 1999,
        rating: 8.7,
        episodes: "1089+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Comedy"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=One+Piece"
    },
    {
        id: 40,
        title: "One Punch Man",
        letter: "O",
        year: 2015,
        rating: 8.7,
        episodes: "24",
        type: "TV",
        status: "completed",
        genres: ["Action", "Comedy", "Superhero"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=OPM"
    },

    // P
    {
        id: 41,
        title: "Pokémon",
        letter: "P",
        year: 1997,
        rating: 7.4,
        episodes: "1200+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Comedy"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Pokemon"
    },

    // Q
    {
        id: 42,
        title: "Q Transformers: Mystery of Convoy Returns",
        letter: "Q",
        year: 2015,
        rating: 5.8,
        episodes: "1",
        type: "Movie",
        status: "completed",
        genres: ["Action", "Sci-Fi"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Q+Transformers"
    },

    // R
    {
        id: 43,
        title: "Re:Zero",
        letter: "R",
        year: 2016,
        rating: 8.2,
        episodes: "50",
        type: "TV",
        status: "completed",
        genres: ["Drama", "Fantasy", "Psychological"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=ReZero"
    },

    // S
    {
        id: 44,
        title: "Steins;Gate",
        letter: "S",
        year: 2011,
        rating: 9.1,
        episodes: "24",
        type: "TV",
        status: "completed",
        genres: ["Sci-Fi", "Thriller", "Drama"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=SteinsGate"
    },
    {
        id: 45,
        title: "Sword Art Online",
        letter: "S",
        year: 2012,
        rating: 7.2,
        episodes: "97+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Fantasy"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=SAO"
    },
    {
        id: 46,
        title: "Spy x Family",
        letter: "S",
        year: 2022,
        rating: 8.7,
        episodes: "25+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Comedy", "Slice of Life"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Spy+x+Family"
    },

    // T
    {
        id: 47,
        title: "Tokyo Ghoul",
        letter: "T",
        year: 2014,
        rating: 7.8,
        episodes: "48",
        type: "TV",
        status: "completed",
        genres: ["Action", "Drama", "Horror"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Tokyo+Ghoul"
    },
    {
        id: 48,
        title: "The Promised Neverland",
        letter: "T",
        year: 2019,
        rating: 8.3,
        episodes: "23",
        type: "TV",
        status: "completed",
        genres: ["Mystery", "Psychological", "Thriller"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Neverland"
    },

    // U
    {
        id: 49,
        title: "Uzaki-chan Wants to Hang Out!",
        letter: "U",
        year: 2020,
        rating: 6.9,
        episodes: "24",
        type: "TV",
        status: "completed",
        genres: ["Comedy", "Romance", "Slice of Life"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=Uzaki-chan"
    },

    // V
    {
        id: 50,
        title: "Vinland Saga",
        letter: "V",
        year: 2019,
        rating: 8.8,
        episodes: "48+",
        type: "TV",
        status: "airing",
        genres: ["Action", "Adventure", "Drama"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Vinland+Saga"
    },

    // W
    {
        id: 51,
        title: "Welcome to Demon School! Iruma-kun",
        letter: "W",
        year: 2019,
        rating: 7.9,
        episodes: "65+",
        type: "TV",
        status: "airing",
        genres: ["Comedy", "Fantasy", "School"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Iruma-kun"
    },

    // X
    {
        id: 52,
        title: "xxxHOLiC",
        letter: "X",
        year: 2006,
        rating: 7.7,
        episodes: "24",
        type: "TV",
        status: "completed",
        genres: ["Comedy", "Mystery", "Supernatural"],
        image: "https://via.placeholder.com/300x400/ff006e/ffffff?text=xxxHOLiC"
    },

    // Y
    {
        id: 53,
        title: "Yuri!!! on Ice",
        letter: "Y",
        year: 2016,
        rating: 8.1,
        episodes: "12",
        type: "TV",
        status: "completed",
        genres: ["Comedy", "Sports", "Drama"],
        image: "https://via.placeholder.com/300x400/8338ec/ffffff?text=Yuri+on+Ice"
    },

    // Z
    {
        id: 54,
        title: "Zombie Land Saga",
        letter: "Z",
        year: 2018,
        rating: 7.8,
        episodes: "24",
        type: "TV",
        status: "completed",
        genres: ["Comedy", "Music", "Supernatural"],
        image: "https://via.placeholder.com/300x400/3a86ff/ffffff?text=Zombie+Land"
    }
];

// Application State
let currentState = {
    filter: 'all',
    search: '',
    genre: '',
    type: '',
    status: '',
    sort: 'title',
    view: 'grid',
    currentPage: 1,
    itemsPerPage: 24
};

// Initialize
document.addEventListener('DOMContentLoaded', function () {
    initializeFilters();
    renderAnimeList();
});

// Initialize filter event listeners
function initializeFilters() {
    // Alphabet filter buttons
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            currentState.filter = this.dataset.filter;
            currentState.currentPage = 1;
            renderAnimeList();
            updateActiveFilterText();
        });
    });

    // Quick filter buttons
    document.querySelectorAll('.quick-filter-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const category = this.dataset.category;
            // Reset other filters
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            document.querySelector('.filter-btn[data-filter="all"]').classList.add('active');

            currentState.filter = 'all';
            currentState.sort = category === 'trending' ? 'popular' :
                category === 'new' ? 'newest' :
                    category === 'top' ? 'rating' : 'title';

            document.getElementById('sortFilter').value = currentState.sort;
            currentState.currentPage = 1;
            renderAnimeList();
            updateActiveFilterText();
        });
    });

    // Search input
    const searchInput = document.getElementById('animeSearch');
    let searchTimeout;
    searchInput.addEventListener('input', function () {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            currentState.search = this.value.trim().toLowerCase();
            currentState.currentPage = 1;
            renderAnimeList();
        }, 300);
    });

    // Clear search button
    document.getElementById('clearSearch').addEventListener('click', function () {
        searchInput.value = '';
        currentState.search = '';
        currentState.currentPage = 1;
        renderAnimeList();
    });

    // Filter selects
    document.getElementById('genreFilter').addEventListener('change', function () {
        currentState.genre = this.value;
        currentState.currentPage = 1;
        renderAnimeList();
    });

    document.getElementById('typeFilter').addEventListener('change', function () {
        currentState.type = this.value;
        currentState.currentPage = 1;
        renderAnimeList();
    });

    document.getElementById('statusFilter').addEventListener('change', function () {
        currentState.status = this.value;
        currentState.currentPage = 1;
        renderAnimeList();
    });

    document.getElementById('sortFilter').addEventListener('change', function () {
        currentState.sort = this.value;
        currentState.currentPage = 1;
        renderAnimeList();
    });

    // View toggle buttons
    document.querySelectorAll('.view-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            if (this.classList.contains('active')) return;

            document.querySelectorAll('.view-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            currentState.view = this.dataset.view;
            const resultsContainer = document.getElementById('animeResults');
            resultsContainer.className = `anime-results ${currentState.view}-view`;
            renderAnimeList();
        });
    });

    // Reset filters button
    document.getElementById('resetFilters').addEventListener('click', resetFilters);
}

// Update active filter text
function updateActiveFilterText() {
    const titleElement = document.getElementById('activeFilter');
    let title = '';

    if (currentState.filter === 'all') {
        title = 'All Anime Titles';
    } else if (currentState.filter === '#') {
        title = 'Anime Starting with Numbers/Symbols';
    } else {
        title = `Anime Starting with "${currentState.filter}"`;
    }

    if (currentState.search) {
        title = `Search Results for "${currentState.search}"`;
    }

    if (currentState.genre) {
        title = `${currentState.genre.charAt(0).toUpperCase() + currentState.genre.slice(1)} Anime`;
    }

    titleElement.textContent = title;
}

// Filter anime based on current state
function filterAnime() {
    return animeData.filter(anime => {
        // Filter by alphabet
        if (currentState.filter !== 'all') {
            if (currentState.filter === '#') {
                // Check if starts with number or symbol
                const firstChar = anime.title.charAt(0);
                if (!isNaN(firstChar) || ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+',
                    '=', '[', ']', '{', '}', '|', ';', ':', '"', ',', '.', '<', '>', '?', '/'
                ].includes(firstChar)) {
                    // Do nothing, matches
                } else {
                    return false;
                }
            } else if (anime.letter !== currentState.filter) {
                return false;
            }
        }

        // Filter by search
        if (currentState.search && !anime.title.toLowerCase().includes(currentState.search)) {
            return false;
        }

        // Filter by genre
        if (currentState.genre && !anime.genres.some(g => g.toLowerCase().includes(currentState.genre))) {
            return false;
        }

        // Filter by type
        if (currentState.type && anime.type.toLowerCase() !== currentState.type) {
            return false;
        }

        // Filter by status
        if (currentState.status && anime.status !== currentState.status) {
            return false;
        }

        return true;
    }).sort((a, b) => {
        // Sort by selected option
        switch (currentState.sort) {
            case 'title-desc':
                return b.title.localeCompare(a.title);
            case 'rating':
                return b.rating - a.rating;
            case 'newest':
                return b.year - a.year;
            case 'popular':
                return b.rating - a.rating; // Using rating as popularity for demo
            default: // 'title'
                return a.title.localeCompare(b.title);
        }
    });
}

// Render anime list
function renderAnimeList() {
    const filteredAnime = filterAnime();
    const resultsContainer = document.getElementById('animeResults');
    const paginationContainer = document.getElementById('pagination');
    const noResultsContainer = document.getElementById('noResults');
    const animeCountElement = document.getElementById('animeCount');

    // Update count
    animeCountElement.textContent = `${filteredAnime.length} Anime Found`;

    // Show/hide no results message
    if (filteredAnime.length === 0) {
        resultsContainer.style.display = 'none';
        paginationContainer.style.display = 'none';
        noResultsContainer.style.display = 'block';
        return;
    } else {
        resultsContainer.style.display = '';
        paginationContainer.style.display = 'flex';
        noResultsContainer.style.display = 'none';
    }

    // Calculate pagination
    const totalPages = Math.ceil(filteredAnime.length / currentState.itemsPerPage);
    const startIndex = (currentState.currentPage - 1) * currentState.itemsPerPage;
    const endIndex = startIndex + currentState.itemsPerPage;
    const currentPageAnime = filteredAnime.slice(startIndex, endIndex);

    // Clear previous results
    resultsContainer.innerHTML = '';

    // Add anime items
    if (currentState.view === 'grid') {
        currentPageAnime.forEach(anime => {
            resultsContainer.appendChild(createAnimeCard(anime));
        });
    } else {
        currentPageAnime.forEach(anime => {
            resultsContainer.appendChild(createAnimeListItem(anime));
        });
    }

    // Render pagination
    renderPagination(totalPages);
}

// Create anime card for grid view
function createAnimeCard(anime) {
    const card = document.createElement('div');
    card.className = 'anime-card-grid';
    card.innerHTML = `
        <div class="card-image">
            <img src="${anime.image}" alt="${anime.title}" loading="lazy">
            <div class="card-badge badge-${anime.status}">
                ${anime.status === 'airing' ? 'Ongoing' : anime.status === 'completed' ? 'Completed' : 'Upcoming'}
            </div>
            <div class="card-rating">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="#ffd700" stroke="#ffd700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                ${anime.rating}
            </div>
        </div>
        <div class="card-content">
            <h3 class="card-title">${anime.title}</h3>
            <div class="card-info">
                <span>${anime.year}</span>
                <span>${anime.type}</span>
                <span>${anime.episodes} eps</span>
            </div>
            <div class="card-genres">
                ${anime.genres.slice(0, 2).map(genre => `<span>${genre}</span>`).join('')}
                ${anime.genres.length > 2 ? '<span>+more</span>' : ''}
            </div>
        </div>
    `;

    card.addEventListener('click', function () {
        // Navigate to anime detail page (placeholder)
        alert(`Loading ${anime.title}...`);
    });

    return card;
}

// Create anime item for list view
function createAnimeListItem(anime) {
    const item = document.createElement('div');
    item.className = 'anime-item-list';
    item.innerHTML = `
        <div class="item-image">
            <img src="${anime.image}" alt="${anime.title}" loading="lazy">
        </div>
        <div class="item-content">
            <div class="item-header">
                <h3 class="item-title">${anime.title}</h3>
                <div class="item-rating">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="#ffd700" stroke="#ffd700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                    ${anime.rating}
                </div>
            </div>
            <div class="item-meta">
                <span>${anime.year}</span>
                <span>${anime.type}</span>
                <span>${anime.episodes} episodes</span>
                <span class="badge-${anime.status}">${anime.status === 'airing' ? 'Ongoing' : anime.status === 'completed' ? 'Completed' : 'Upcoming'}</span>
            </div>
            <p class="item-description">
                This is a placeholder description for ${anime.title}. 
                ${anime.genres.join(', ')} anime that has received positive reviews.
            </p>
            <div class="item-genres">
                ${anime.genres.map(genre => `<span>${genre}</span>`).join('')}
            </div>
        </div>
    `;

    item.addEventListener('click', function () {
        alert(`Loading ${anime.title}...`);
    });

    return item;
}

// Render pagination
function renderPagination(totalPages) {
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = '';

    if (totalPages <= 1) return;

    // Previous button
    const prevButton = document.createElement('button');
    prevButton.className = 'pagination-btn';
    prevButton.textContent = '←';
    prevButton.disabled = currentState.currentPage === 1;
    prevButton.addEventListener('click', () => {
        if (currentState.currentPage > 1) {
            currentState.currentPage--;
            renderAnimeList();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    });
    paginationContainer.appendChild(prevButton);

    // Page buttons
    const maxVisiblePages = 5;
    let startPage = Math.max(1, currentState.currentPage - Math.floor(maxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

    if (endPage - startPage + 1 < maxVisiblePages) {
        startPage = Math.max(1, endPage - maxVisiblePages + 1);
    }

    // First page
    if (startPage > 1) {
        const firstButton = document.createElement('button');
        firstButton.className = 'pagination-btn';
        firstButton.textContent = '1';
        firstButton.addEventListener('click', () => {
            currentState.currentPage = 1;
            renderAnimeList();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        paginationContainer.appendChild(firstButton);

        if (startPage > 2) {
            const dots = document.createElement('span');
            dots.className = 'pagination-dots';
            dots.textContent = '...';
            paginationContainer.appendChild(dots);
        }
    }

    // Numbered pages
    for (let i = startPage; i <= endPage; i++) {
        const pageButton = document.createElement('button');
        pageButton.className = `pagination-btn ${i === currentState.currentPage ? 'active' : ''}`;
        pageButton.textContent = i;
        pageButton.addEventListener('click', () => {
            currentState.currentPage = i;
            renderAnimeList();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        paginationContainer.appendChild(pageButton);
    }

    // Last page
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            const dots = document.createElement('span');
            dots.className = 'pagination-dots';
            dots.textContent = '...';
            paginationContainer.appendChild(dots);
        }

        const lastButton = document.createElement('button');
        lastButton.className = 'pagination-btn';
        lastButton.textContent = totalPages;
        lastButton.addEventListener('click', () => {
            currentState.currentPage = totalPages;
            renderAnimeList();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        paginationContainer.appendChild(lastButton);
    }

    // Next button
    const nextButton = document.createElement('button');
    nextButton.className = 'pagination-btn';
    nextButton.textContent = '→';
    nextButton.disabled = currentState.currentPage === totalPages;
    nextButton.addEventListener('click', () => {
        if (currentState.currentPage < totalPages) {
            currentState.currentPage++;
            renderAnimeList();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    });
    paginationContainer.appendChild(nextButton);
}

// Reset all filters
function resetFilters() {
    // Reset state
    currentState = {
        filter: 'all',
        search: '',
        genre: '',
        type: '',
        status: '',
        sort: 'title',
        view: 'grid',
        currentPage: 1,
        itemsPerPage: 24
    };

    // Reset UI
    document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelector('.filter-btn[data-filter="all"]').classList.add('active');

    document.getElementById('animeSearch').value = '';
    document.getElementById('genreFilter').value = '';
    document.getElementById('typeFilter').value = '';
    document.getElementById('statusFilter').value = '';
    document.getElementById('sortFilter').value = 'title';

    document.querySelectorAll('.view-btn').forEach(btn => btn.classList.remove('active'));
    document.querySelector('.view-btn[data-view="grid"]').classList.add('active');

    document.getElementById('animeResults').className = 'anime-results grid-view';

    // Re-render
    renderAnimeList();
    updateActiveFilterText();
}

// Debounce function for search
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}