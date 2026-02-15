@extends('layouts.home.app')

@section('content')
    <div class="genre-detail-container">

        <!-- Genre Hero -->
        <section class="genre-detail-hero">
            <div class="hero-content">
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
                        <span class="stat-number">{{ $newestAnime['year'] ?? '-' }}</span>
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
                    <a href="{{ route('genre.list') }}" class="back-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="19" y1="12" x2="5" y2="12"></line>
                            <polyline points="12 19 5 12 12 5"></polyline>
                        </svg>
                        Back to Genres
                    </a>
                </div>

                <div class="filter-right">

                    <div class="search-box small">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
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
                                fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </button>

                        <button class="view-btn" data-view="list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2">
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
                    <a href="{{ route('anime.detail', $anime['id']) }}" class="anime-card-grid"
                        data-title="{{ strtolower($anime['title']) }}" data-rating="{{ $anime['rating'] }}"
                        data-year="{{ $anime['year'] }}"
                        data-episodes="{{ preg_replace('/[^0-9]/', '', $anime['episodes'] ?? 0) }}">

                        <div class="card-image">
                            <img src="{{ asset($anime['image']) }}" alt="{{ $anime['title'] }}" loading="lazy">

                            <div class="card-badge badge-{{ $anime['status'] }}">
                                {{ $anime['status'] === 'airing' ? 'Ongoing' : ($anime['status'] === 'completed' ? 'Completed' : 'Upcoming') }}
                            </div>

                            <div class="card-rating">
                                ⭐ {{ $anime['rating'] }}
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

                    </a>
                @endforeach

            </div>


            <div class="no-results" id="noResults" style="display:none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <h3>No anime found</h3>
                <p>Try searching with different keywords</p>
            </div>

        </main>


        <!-- Other Genres -->
        <section class="other-genres-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-gradient">Other Genres You Might Like</span>
                </h2>
            </div>

            <div class="other-genres-grid">
                @foreach ($otherGenres as $genre)
                    <a href="{{ route('genre.detail', $genre['slug']) }}" class="other-genre-item">
                        <span class="genre-name">{{ $genre['name'] }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2">
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

            function filterAnime() {
                const term = searchInput.value.toLowerCase().trim();
                let visible = 0;

                animeCards.forEach(card => {
                    const title = card.dataset.title;

                    if (term === '' || title.includes(term)) {
                        card.style.display = '';
                        visible++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                if (visible === 0) {
                    animeResults.style.display = 'none';
                    noResults.style.display = 'block';
                } else {
                    animeResults.style.display = 'grid';
                    noResults.style.display = 'none';
                }
            }


            function sortAnime() {
                const cards = Array.from(animeCards);
                const type = sortSelect.value;

                cards.sort((a, b) => {
                    const rA = parseFloat(a.dataset.rating);
                    const rB = parseFloat(b.dataset.rating);
                    const tA = a.dataset.title;
                    const tB = b.dataset.title;
                    const yA = parseInt(a.dataset.year);
                    const yB = parseInt(b.dataset.year);
                    const eA = parseInt(a.dataset.episodes) || 0;
                    const eB = parseInt(b.dataset.episodes) || 0;

                    if (type === 'rating') return rB - rA;
                    if (type === 'title') return tA.localeCompare(tB);
                    if (type === 'year') return yB - yA;
                    if (type === 'episodes') return eB - eA;
                    return 0;
                });

                cards.forEach(c => animeResults.appendChild(c));
            }


            function toggleView(view) {
                animeResults.className = `anime-results ${view}-view`;

                viewBtns.forEach(btn => {
                    btn.classList.toggle('active', btn.dataset.view === view);
                });
            }


            if (searchInput) {
                searchInput.addEventListener('input', filterAnime);
            }

            if (sortSelect) {
                sortSelect.addEventListener('change', sortAnime);
            }

            viewBtns.forEach(btn => {
                btn.addEventListener('click', () => toggleView(btn.dataset.view));
            });

        });
    </script>
@endsection
