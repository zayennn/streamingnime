@extends('layouts.home.app')

@section('content')
    <div class="genre-list-container">
        <!-- Hero Section -->
        <section class="genre-hero">
            <div class="hero-content-wrapper">
                <h1 class="hero-title">Genre List</h1>
                <p class="hero-subtitle">Browse anime by genre and find your next favorite series</p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number">{{ $totalGenres }}+</span>
                        <span class="stat-label">Genres</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $totalAnime }}+</span>
                        <span class="stat-label">Anime Titles</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ ucfirst($mostPopularGenre) }}</span>
                        <span class="stat-label">Most Popular</span>
                    </div>
                </div>
            </div>
            <div class="hero-overlay"></div>
        </section>

        <!-- Search/Filter Section -->
        <section class="genre-filter-section">
            <div class="filter-container">
                <div class="search-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="search-icon">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" class="search-input" id="genreSearch" placeholder="Search genres...">
                    <button class="search-clear" id="clearSearch">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="view-options">
                    <span class="view-label">View:</span>
                    <button class="view-btn active" data-view="grid">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        Grid
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
                        List
                    </button>
                </div>
            </div>
        </section>

        <!-- Genre Grid -->
        <main class="genre-list-main">
            <div class="list-header">
                <h2 class="list-title">All Genres <span class="title-count">({{ $totalGenres }})</span></h2>
                <div class="list-stats">
                    <span id="genreCount">{{ $totalGenres }} Genres</span>
                    <select class="sort-select" id="sortGenres">
                        <option value="name">Sort by: Name A-Z</option>
                        <option value="name-desc">Sort by: Name Z-A</option>
                        <option value="popular">Sort by: Most Popular</option>
                        <option value="count">Sort by: Most Anime</option>
                    </select>
                </div>
            </div>

            <!-- Genre Results -->
            <div class="genre-results grid-view" id="genreResults">
                @foreach ($genres as $genre)
                    <div class="genre-card-wrapper" data-genre-name="{{ strtolower($genre['name']) }}"
                        data-genre-count="{{ $genre['count'] }}">
                        <a href="/genre/{{ $genre['slug'] }}" class="genre-card-large"
                            style="background: {{ $genre['gradient'] }}">
                            <div class="genre-card-content">
                                <h3 class="genre-name">{{ $genre['name'] }}</h3>
                                <span class="genre-count">{{ $genre['count'] }} Titles</span>
                                <p class="genre-description">{{ $genre['description'] }}</p>

                                <div class="genre-preview">
                                    <div class="preview-images">
                                        @foreach ($genre['topAnime'] as $index => $anime)
                                            <div class="preview-image"
                                                style="background-image: url('{{ $anime['image'] }}');">
                                                <span class="preview-rating">⭐ {{ $anime['rating'] }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                    <span class="preview-text">Top rated in this genre</span>
                                </div>

                                <div class="genre-card-footer">
                                    <span class="explore-link">
                                        Explore Genre
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                            <polyline points="12 5 19 12 12 19"></polyline>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
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
                <h3>No genres found</h3>
                <p>Try searching with different keywords</p>
                <button class="reset-btn" id="resetSearch">Clear Search</button>
            </div>
        </main>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Genre list script loaded'); // Debug
            
            const genreCards = document.querySelectorAll('.genre-card-wrapper');
            const searchInput = document.getElementById('genreSearch');
            const clearButton = document.getElementById('clearSearch');
            const noResults = document.getElementById('noResults');
            const genreResults = document.getElementById('genreResults');
            const genreCountSpan = document.getElementById('genreCount');
            const sortSelect = document.getElementById('sortGenres');
            const viewBtns = document.querySelectorAll('.view-btn');
            const resetSearchBtn = document.getElementById('resetSearch');

            console.log('Elements found:', {
                genreCards: genreCards.length,
                searchInput: !!searchInput,
                clearButton: !!clearButton,
                sortSelect: !!sortSelect,
                viewBtns: viewBtns.length
            });

            let currentView = 'grid';
            let currentSort = 'name';

            // Filter genres by search
            function filterGenres() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;

                genreCards.forEach(card => {
                    const genreName = card.dataset.genreName;
                    if (searchTerm === '' || genreName.includes(searchTerm)) {
                        card.style.display = '';
                        visibleCount++;
                    } else {
                        card.style.display = 'none';
                    }
                });

                genreCountSpan.textContent = `${visibleCount} Genres`;

                if (visibleCount === 0) {
                    noResults.style.display = 'block';
                    genreResults.style.display = 'none';
                } else {
                    noResults.style.display = 'none';
                    genreResults.style.display = 'grid';
                }
            }

            // Sort genres
            function sortGenres() {
                const cardsArray = Array.from(genreCards);

                cardsArray.sort((a, b) => {
                    const nameA = a.dataset.genreName;
                    const nameB = b.dataset.genreName;
                    const countA = parseInt(a.dataset.genreCount);
                    const countB = parseInt(b.dataset.genreCount);

                    switch (currentSort) {
                        case 'name':
                            return nameA.localeCompare(nameB);
                        case 'name-desc':
                            return nameB.localeCompare(nameA);
                        case 'popular':
                        case 'count':
                            return countB - countA;
                        default:
                            return 0;
                    }
                });

                // Reorder DOM elements
                cardsArray.forEach(card => {
                    genreResults.appendChild(card);
                });
                
                filterGenres();
            }

            function toggleView(view) {
                currentView = view;
                genreResults.className = `genre-results ${view}-view`;

                viewBtns.forEach(btn => {
                    if (btn.dataset.view === view) {
                        btn.classList.add('active');
                    } else {
                        btn.classList.remove('active');
                    }
                });
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterGenres);
            }

            if (clearButton) {
                clearButton.addEventListener('click', function() {
                    searchInput.value = '';
                    filterGenres();
                });
            }

            if (sortSelect) {
                sortSelect.addEventListener('change', function() {
                    currentSort = this.value;
                    sortGenres();
                });
            }

            if (viewBtns.length > 0) {
                viewBtns.forEach(btn => {
                    btn.addEventListener('click', function() {
                        toggleView(this.dataset.view);
                    });
                });
            }

            if (resetSearchBtn) {
                resetSearchBtn.addEventListener('click', function() {
                    if (searchInput) {
                        searchInput.value = '';
                    }
                    if (clearButton) {
                        clearButton.click();
                    }
                    filterGenres();
                });
            }

            sortGenres();
        });
    </script>
@endsection