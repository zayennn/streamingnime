<div class="navbar__container">
    <a href="/" class="brand">StreamingNime</a>

    <!-- Search Box Desktop -->
    <div class="search-box-desktop">
        <form action="/anime-list" method="GET" id="searchForm">
            <div class="search-input-group">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input 
                    type="text" 
                    name="search" 
                    id="searchInput" 
                    placeholder="Search anime..." 
                    autocomplete="off"
                    value="{{ request('search') }}"
                >
                <button type="button" class="search-clear" id="clearSearch" style="display: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
        </form>

        <!-- Search Results Dropdown -->
        <div class="search-results" id="searchResults">
            <div class="search-results-header">
                <span>Search Results</span>
                <button class="close-results" id="closeResults">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="search-results-content" id="searchResultsContent">
                <!-- Results will be loaded here -->
            </div>
            <div class="search-results-footer">
                <a href="/anime-list" class="view-all-results">View All Results →</a>
            </div>
        </div>
    </div>

    <nav class="nav__menu">
        <a href="/" class="nav__link" data-route="/">Home</a>
        <a href="/anime-list" class="nav__link" data-route="/anime-list">Anime List</a>
        <a href="/genre" class="nav__link" data-route="/genre">Genre List</a>
        <a href="/login" class="nav__link login">Sign In</a>

        <!-- Search Icon for Mobile -->
        <button class="mobile-search-toggle" id="mobileSearchToggle">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
        </button>

        <div class="line__tracking"></div>
    </nav>

    <!-- Mobile Search Overlay -->
    <div class="mobile-search-overlay" id="mobileSearchOverlay">
        <div class="mobile-search-container">
            <div class="mobile-search-header">
                <h3>Search Anime</h3>
                <button class="close-mobile-search" id="closeMobileSearch">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="mobile-search-input-group">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
                <input 
                    type="text" 
                    id="mobileSearchInput" 
                    placeholder="Search anime..." 
                    autocomplete="off"
                >
            </div>
            <div class="mobile-search-results" id="mobileSearchResults">
                <!-- Mobile results will be loaded here -->
            </div>
        </div>
    </div>

    <label class="hamburger">
        <input type="checkbox" id="hamburger-toggle">
        <svg viewBox="0 0 32 32">
            <path class="line line-top-bottom"
                d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
            </path>
            <path class="line" d="M7 16 27 16"></path>
        </svg>
    </label>

    {{-- overlay --}}
    <div class="nav__overlay"></div>
</div>