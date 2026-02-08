@extends('layouts.home.app')

@section('content')
<div class="anime-list-container">
    <!-- Hero Section Anime List -->
    <section class="anime-list-hero">
        <div class="hero-content">
            <h1 class="hero-title">Anime Library</h1>
            <p class="hero-subtitle">Browse through our complete collection of anime titles</p>
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">{{ count($animeData) }}+</span>
                    <span class="stat-label">Anime Titles</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">{{ count($allGenres) }}+</span>
                    <span class="stat-label">Genres</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Streaming</span>
                </div>
            </div>
        </div>
        <div class="hero-overlay"></div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="filter-container">
            <!-- Alphabet Filter -->
            <div class="filter-group">
                <h3 class="filter-title">Alphabet</h3>
                <div class="alphabet-filter">
                    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="#">#</button>
                    @foreach(range('A', 'Z') as $letter)
                        <button class="filter-btn" data-filter="{{ $letter }}">{{ $letter }}</button>
                    @endforeach
                </div>
            </div>

            <!-- Category Quick Filters -->
            <div class="filter-group">
                <h3 class="filter-title">Quick Filters</h3>
                <div class="quick-filters">
                    <button class="quick-filter-btn" data-category="trending">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                        Trending
                    </button>
                    <button class="quick-filter-btn" data-category="new">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        New Releases
                    </button>
                    <button class="quick-filter-btn" data-category="top">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        Top Rated
                    </button>
                    <button class="quick-filter-btn" data-category="ongoing">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path>
                        </svg>
                        Ongoing
                    </button>
                </div>
            </div>

            <!-- Search Bar -->
            <div class="search-container">
                <div class="search-input-group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="search-icon">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" class="search-input" placeholder="Search anime by title..." id="animeSearch">
                    <button class="search-clear" id="clearSearch">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="search-filters">
                    <select class="filter-select" id="genreFilter">
                        <option value="">All Genres</option>
                        @foreach($allGenres as $genre)
                            <option value="{{ strtolower($genre) }}">{{ $genre }}</option>
                        @endforeach
                    </select>
                    <select class="filter-select" id="typeFilter">
                        <option value="">All Types</option>
                        @foreach($allTypes as $type)
                            <option value="{{ strtolower($type) }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    <select class="filter-select" id="statusFilter">
                        <option value="">All Status</option>
                        @foreach($allStatuses as $status)
                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                    <select class="filter-select" id="sortFilter">
                        <option value="title">Sort by: Title A-Z</option>
                        <option value="title-desc">Sort by: Title Z-A</option>
                        <option value="rating">Sort by: Highest Rating</option>
                        <option value="newest">Sort by: Newest</option>
                        <option value="popular">Sort by: Most Popular</option>
                    </select>
                </div>
            </div>
        </div>
    </section>

    <!-- Anime List Content -->
    <main class="anime-list-main">
        <div class="list-header">
            <h2 class="list-title" id="activeFilter">All Anime Titles</h2>
            <div class="list-stats">
                <span id="animeCount">{{ count($animeData) }} Anime Found</span>
                <span class="view-toggle">
                    <button class="view-btn active" data-view="grid" title="Grid View">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                    </button>
                    <button class="view-btn" data-view="list" title="List View">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="8" y1="6" x2="21" y2="6"></line>
                            <line x1="8" y1="12" x2="21" y2="12"></line>
                            <line x1="8" y1="18" x2="21" y2="18"></line>
                            <line x1="3" y1="6" x2="3.01" y2="6"></line>
                            <line x1="3" y1="12" x2="3.01" y2="12"></line>
                            <line x1="3" y1="18" x2="3.01" y2="18"></line>
                        </svg>
                    </button>
                </span>
            </div>
        </div>

        <!-- Anime Grid/List -->
        <div class="anime-results grid-view" id="animeResults">
            <!-- Anime items will be loaded here via JavaScript -->
            <div class="loading-spinner" id="loadingSpinner">
                <div class="spinner"></div>
                <p>Loading anime...</p>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination" id="pagination">
            <!-- Pagination will be generated by JavaScript -->
        </div>

        <!-- No Results Message -->
        <div class="no-results" id="noResults" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="15" y1="9" x2="9" y2="15"></line>
                <line x1="9" y1="9" x2="15" y2="15"></line>
            </svg>
            <h3>No anime found</h3>
            <p>Try adjusting your filters or search term</p>
            <button class="reset-filters-btn" id="resetFilters">Reset All Filters</button>
        </div>
    </main>
</div>
@endsection