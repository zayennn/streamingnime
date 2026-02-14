@extends('layouts.home.app')

@section('content')
    <div class="genre-detail-container">
        <!-- Genre Hero -->
        <section class="genre-detail-hero">
            <div class="hero-content-wrapper">
                <h1 class="hero-title">{{ $genreName }}</h1>
                <p class="hero-subtitle">Discover the best {{ $genreName }} anime series and movies</p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">{{ $totalAnime }}</span>
                        <span class="stat-label">Titles</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">⭐ {{ $avgRating }}</span>
                        <span class="stat-label">Avg Rating</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $newestAnime['year'] }}</span>
                        <span class="stat-label">Newest</span>
                    </div>
                </div>
            </div>
            <div class="hero-overlay"></div>
        </section>

        <!-- Filter Bar -->
        <section class="detail-filter-section">
            <div class="filter-container">
                <div class="filter-left">
                    <a href="/genre" class="back-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        Back to Genres
                    </a>
                </div>
                <div class="filter-right">
                    <div class="search-box small">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" id="animeSearch" placeholder="Search in {{ $genreName }}...">
                    </div>
                    <select id="sortAnime" class="sort-select small">
                        <option value="rating">Sort by: Rating</option>
                        <option value="title">Sort by: Title A-Z</option>
                        <option value="year">Sort by: Newest</option>
                        <option value="episodes">Sort by: Episodes</option>
                    </select>
                    <div class="view-toggle">
                        <button class="view-btn active" data-view="grid">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </button>
                        <button class="view-btn" data-view="list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="8" y1="6" x2="21" y2="6"></line>
                                <line x1="8" y1="12" x2="21" y2="12"></line>
                                <line x1="8" y1="18" x2="21" y2="18"></line>
                                <line x1="3" y1="6" x2="3.01" y2="6"></line>
                                <line x1="3" y1="12" x2="3.01" y2="12"></line>
                                <line x1="3" y1="18" x2="3.01" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Anime List -->
        <main class="genre-anime-main">
            <div class="list-header">
                <h2 class="list-title">
                    All {{ $genreName }} Anime
                    <span class="title-count">({{ $totalAnime }} titles)</span>
                </h2>
            </div>

            <div class="anime-results grid-view" id="animeResults">
                @foreach ($genreAnime as $anime)
                    <div class="anime-card-grid" data-title="{{ strtolower($anime['title']) }}"
                        data-rating="{{ $anime['rating'] }}" data-year="{{ $anime['year'] }}"
                        data-episodes="{{ $anime['episodes'] }}">
                        <div class="card-image">
                            {{-- <img src="{{ $anime['image'] }}" alt="{{ $anime['title'] }}" loading="lazy"> --}}
                            <img src="{{ asset($anime['image']) }}" alt="{{ $anime['title'] }}" loading="lazy">
                            <div class="card-badge badge-{{ $anime['status'] }}">
                                {{ $anime['status'] === 'airing' ? 'Ongoing' : ($anime['status'] === 'completed' ? 'Completed' : 'Upcoming') }}
                            </div>
                            <div class="card-rating">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                    viewBox="0 0 24 24" fill="#ffd700" stroke="#ffd700" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polygon
                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                    </polygon>
                                </svg>
                                {{ $anime['rating'] }}
                            </div>
                        </div>
                        <div class="card-content">
                            <h3 class="card-title">{{ $anime['title'] }}</h3>
                            <div class="card-info">
                                <span>{{ $anime['year'] }}</span>
                                <span>{{ $anime['type'] }}</span>
                                <span>{{ $anime['episodes'] }} eps</span>
                            </div>
                            <div class="card-genres">
                                @foreach (array_slice($anime['genres'], 0, 2) as $genre)
                                    <span>{{ $genre }}</span>
                                @endforeach
                                @if (count($anime['genres']) > 2)
                                    <span>+{{ count($anime['genres']) - 2 }} more</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- No Results Message -->
            <div class="no-results" id="noResults" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <h3>No anime found</h3>
                <p>Try searching with different keywords</p>
            </div>
        </main>

        <!-- Other Genres Section -->
        <section class="other-genres-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-gradient">Other Genres You Might Like</span>
                </h2>
            </div>
            <div class="other-genres-grid">
                @foreach ($otherGenres as $genre)
                    <a href="/genre/{{ $genre['slug'] }}" class="other-genre-item">
                        <span class="genre-name">{{ $genre['name'] }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const animeCards = document.querySelectorAll('.anime-card-grid');
            const searchInput = document.getElementById('animeSearch');
            const sortSelect = document.getElementById('sortAnime');
            const viewBtns = document.querySelectorAll('.view-btn');
            const animeResults = document.getElementById('animeResults');
            const noResults = document.getElementById('noResults');

            let currentView = 'grid';

            function filterAnime() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                animeCards.forEach(card => {
                    const title = card.dataset.title;
                    if (searchTerm === '' || title.includes(searchTerm)) {
                        card.style.display = '';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (visibleCount === 0) {
                    noResults.style.display = 'block';
                    animeResults.style.display = 'none';
                } else {
                    noResults.style.display = 'none';
                    animeResults.style.display = 'grid';
                }
            }

            function sortAnime() {
                const cardsArray = Array.from(animeCards);
                const sortBy = sortSelect.value;

                cardsArray.sort((a, b) => {
                    const ratingA = parseFloat(a.dataset.rating);
                    const ratingB = parseFloat(b.dataset.rating);
                    const titleA = a.dataset.title;
                    const titleB = b.dataset.title;
                    const yearA = parseInt(a.dataset.year);
                    const yearB = parseInt(b.dataset.year);
                    const episodesA = parseInt(a.dataset.episodes) || 0;
                    const episodesB = parseInt(b.dataset.episodes) || 0;

                    switch (sortBy) {
                        case 'rating':
                            return ratingB - ratingA;
                        case 'title':
                            return titleA.localeCompare(titleB);
                        case 'year':
                            return yearB - yearA;
                        case 'episodes':
                            return episodesB - episodesA;
                        default:
                            return 0;
                    }
                });

                cardsArray.forEach(card => {
                    animeResults.appendChild(card);
                });
            }

            function toggleView(view) {
                currentView = view;
                animeResults.className = `anime-results ${view}-view`;

                viewBtns.forEach(btn => {
                    if (btn.dataset.view === view) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterAnime);
            }

            if (sortSelect) {
                sortSelect.addEventListener('change', sortAnime);
            }

            viewBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    toggleView(this.dataset.view);
                });
            });

            animeCards.forEach(card => {
                card.addEventListener('click', function() {
                    const title = this.querySelector('.card-title').textContent;
                    alert(`Loading ${title}...`);
                });
            });
        });
    </script>
@endsection
