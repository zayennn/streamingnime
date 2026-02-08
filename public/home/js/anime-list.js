// Convert PHP data to JavaScript - Will be passed from Blade
let animeData = [];

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
function initAnimeList(data) {
    animeData = data;
    initializeFilters();
    renderAnimeList();
    // Hide loading spinner after initial render
    document.getElementById('loadingSpinner').style.display = 'none';
}

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

    document.querySelectorAll('.quick-filter-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const category = this.dataset.category;
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

    document.getElementById('clearSearch').addEventListener('click', function () {
        searchInput.value = '';
        currentState.search = '';
        currentState.currentPage = 1;
        renderAnimeList();
    });

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

    document.getElementById('resetFilters').addEventListener('click', resetFilters);
}

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

function filterAnime() {
    return animeData.filter(anime => {
        if (currentState.filter !== 'all') {
            if (currentState.filter === '#') {
                const firstChar = anime.title.charAt(0);
                if (!isNaN(firstChar) || ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '[', ']', '{', '}', '|', ';', ':', '"', ',', '.', '<', '>', '?', '/'].includes(firstChar)) {
                } else {
                    return false;
                }
            } else if (anime.letter !== currentState.filter) {
                return false;
            }
        }

        if (currentState.search && !anime.title.toLowerCase().includes(currentState.search)) {
            return false;
        }

        if (currentState.genre && !anime.genres.some(g => g.toLowerCase().includes(currentState.genre))) {
            return false;
        }

        if (currentState.type && anime.type.toLowerCase() !== currentState.type) {
            return false;
        }

        if (currentState.status && anime.status !== currentState.status) {
            return false;
        }

        return true;
    }).sort((a, b) => {
        switch (currentState.sort) {
            case 'title-desc':
                return b.title.localeCompare(a.title);
            case 'rating':
                return b.rating - a.rating;
            case 'newest':
                return b.year - a.year;
            case 'popular':
                return b.rating - a.rating; 
            default:
                return a.title.localeCompare(b.title);
        }
    });
}

function renderAnimeList() {
    const filteredAnime = filterAnime();
    const resultsContainer = document.getElementById('animeResults');
    const paginationContainer = document.getElementById('pagination');
    const noResultsContainer = document.getElementById('noResults');
    const animeCountElement = document.getElementById('animeCount');

    animeCountElement.textContent = `${filteredAnime.length} Anime Found`;

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

    const totalPages = Math.ceil(filteredAnime.length / currentState.itemsPerPage);
    const startIndex = (currentState.currentPage - 1) * currentState.itemsPerPage;
    const endIndex = startIndex + currentState.itemsPerPage;
    const currentPageAnime = filteredAnime.slice(startIndex, endIndex);

    resultsContainer.innerHTML = '';

    if (currentState.view === 'grid') {
        currentPageAnime.forEach(anime => {
            resultsContainer.appendChild(createAnimeCard(anime));
        });
    } else {
        currentPageAnime.forEach(anime => {
            resultsContainer.appendChild(createAnimeListItem(anime));
        });
    }

    renderPagination(totalPages);
}

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
        alert(`Loading ${anime.title}...`);
    });

    return card;
}

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

function renderPagination(totalPages) {
    const paginationContainer = document.getElementById('pagination');
    paginationContainer.innerHTML = '';

    if (totalPages <= 1) return;

    const prevButton = document.createElement('button');
    prevButton.className = 'pagination-btn';
    prevButton.textContent = '←';
    prevButton.disabled = currentState.currentPage === 1;
    prevButton.addEventListener('click', () => {
        if (currentState.currentPage > 1) {
            currentState.currentPage--;
            renderAnimeList();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
    paginationContainer.appendChild(prevButton);

    const maxVisiblePages = 5;
    let startPage = Math.max(1, currentState.currentPage - Math.floor(maxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);

    if (endPage - startPage + 1 < maxVisiblePages) {
        startPage = Math.max(1, endPage - maxVisiblePages + 1);
    }

    if (startPage > 1) {
        const firstButton = document.createElement('button');
        firstButton.className = 'pagination-btn';
        firstButton.textContent = '1';
        firstButton.addEventListener('click', () => {
            currentState.currentPage = 1;
            renderAnimeList();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        paginationContainer.appendChild(firstButton);

        if (startPage > 2) {
            const dots = document.createElement('span');
            dots.className = 'pagination-dots';
            dots.textContent = '...';
            paginationContainer.appendChild(dots);
        }
    }

    for (let i = startPage; i <= endPage; i++) {
        const pageButton = document.createElement('button');
        pageButton.className = `pagination-btn ${i === currentState.currentPage ? 'active' : ''}`;
        pageButton.textContent = i;
        pageButton.addEventListener('click', () => {
            currentState.currentPage = i;
            renderAnimeList();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        paginationContainer.appendChild(pageButton);
    }

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
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        paginationContainer.appendChild(lastButton);
    }

    const nextButton = document.createElement('button');
    nextButton.className = 'pagination-btn';
    nextButton.textContent = '→';
    nextButton.disabled = currentState.currentPage === totalPages;
    nextButton.addEventListener('click', () => {
        if (currentState.currentPage < totalPages) {
            currentState.currentPage++;
            renderAnimeList();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
    paginationContainer.appendChild(nextButton);
}

function resetFilters() {
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

    renderAnimeList();
    updateActiveFilterText();
}

window.AnimeList = {
    init: initAnimeList,
    resetFilters: resetFilters,
    renderAnimeList: renderAnimeList
};