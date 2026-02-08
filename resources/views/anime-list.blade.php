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
                <div class="filter-group">
                    <h3 class="filter-title">Alphabet</h3>
                    <div class="alphabet-filter">
                        <button class="filter-btn active" data-filter="all">All</button>
                        <button class="filter-btn" data-filter="#">#</button>
                        @foreach (range('A', 'Z') as $letter)
                            <button class="filter-btn" data-filter="{{ $letter }}">{{ $letter }}</button>
                        @endforeach
                    </div>
                </div>

                <!-- Category Quick Filters -->
                <div class="filter-group">
                    <h3 class="filter-title">Quick Filters</h3>
                    <div class="quick-filters">
                        <button class="quick-filter-btn" data-category="trending">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            Trending
                        </button>
                        <button class="quick-filter-btn" data-category="new">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            New Releases
                        </button>
                        <button class="quick-filter-btn" data-category="top">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            Top Rated
                        </button>
                        <button class="quick-filter-btn" data-category="ongoing">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83">
                                </path>
                            </svg>
                            Ongoing
                        </button>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="search-container">
                    <div class="search-input-group">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="search-icon">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                        <input type="text" class="search-input" placeholder="Search anime by title..."
                            id="animeSearch">
                        <button class="search-clear" id="clearSearch">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="search-filters">
                        <select class="filter-select" id="genreFilter">
                            <option value="">All Genres</option>
                            @foreach ($allGenres as $genre)
                                <option value="{{ strtolower($genre) }}">{{ $genre }}</option>
                            @endforeach
                        </select>
                        <select class="filter-select" id="typeFilter">
                            <option value="">All Types</option>
                            @foreach ($allTypes as $type)
                                <option value="{{ strtolower($type) }}">{{ $type }}</option>
                            @endforeach
                        </select>
                        <select class="filter-select" id="statusFilter">
                            <option value="">All Status</option>
                            @foreach ($allStatuses as $status)
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg>
                        </button>
                        <button class="view-btn" data-view="list" title="List View">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
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
                    </span>
                </div>
            </div>

            <!-- Anime Grid/List -->
            <div class="anime-results grid-view" id="animeResults">
                <div class="loading-spinner" id="loadingSpinner">
                    <div class="spinner"></div>
                    <p>Loading anime...</p>
                </div>
            </div>

            <!-- Pagination -->
            <div class="pagination" id="pagination">
            </div>

            <div class="no-results" id="noResults" style="display: none;">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round">
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

@section('scripts')
    <script>
        // Convert PHP data to JavaScript
        const animeData = @json($animeData);

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
        document.addEventListener('DOMContentLoaded', function() {
            initializeFilters();
            renderAnimeList();
            // Hide loading spinner after initial render
            document.getElementById('loadingSpinner').style.display = 'none';
        });

        // Initialize filter event listeners
        function initializeFilters() {
            // Alphabet filter buttons
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.addEventListener('click', function() {
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
                btn.addEventListener('click', function() {
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
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    currentState.search = this.value.trim().toLowerCase();
                    currentState.currentPage = 1;
                    renderAnimeList();
                }, 300);
            });

            // Clear search button
            document.getElementById('clearSearch').addEventListener('click', function() {
                searchInput.value = '';
                currentState.search = '';
                currentState.currentPage = 1;
                renderAnimeList();
            });

            // Filter selects
            document.getElementById('genreFilter').addEventListener('change', function() {
                currentState.genre = this.value;
                currentState.currentPage = 1;
                renderAnimeList();
            });

            document.getElementById('typeFilter').addEventListener('change', function() {
                currentState.type = this.value;
                currentState.currentPage = 1;
                renderAnimeList();
            });

            document.getElementById('statusFilter').addEventListener('change', function() {
                currentState.status = this.value;
                currentState.currentPage = 1;
                renderAnimeList();
            });

            document.getElementById('sortFilter').addEventListener('change', function() {
                currentState.sort = this.value;
                currentState.currentPage = 1;
                renderAnimeList();
            });

            // View toggle buttons
            document.querySelectorAll('.view-btn').forEach(btn => {
                btn.addEventListener('click', function() {
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

            card.addEventListener('click', function() {
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

            item.addEventListener('click', function() {
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
    </script>
