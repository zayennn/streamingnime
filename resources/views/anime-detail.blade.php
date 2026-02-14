@extends('layouts.home.app')

@section('content')
<div class="anime-detail-container">
    <!-- Hero Section -->
    <section class="anime-detail-hero" style="background-image: url('{{ $anime['image'] }}');">
        <div class="hero-overlay"></div>
        <div class="hero-content-wrapper">
            <div class="anime-poster">
                <img src="{{ $anime['image'] }}" alt="{{ $anime['title'] }}">
            </div>
            <div class="anime-info">
                <div class="info-header">
                    <h1 class="anime-title">{{ $anime['title'] }}</h1>
                    <div class="anime-badge">
                        <span class="badge-{{ $anime['status'] }}">
                            {{ $anime['status'] === 'airing' ? 'Ongoing' : ($anime['status'] === 'completed' ? 'Completed' : 'Upcoming') }}
                        </span>
                    </div>
                </div>
                
                <div class="anime-meta">
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        {{ $anime['year'] }}
                    </span>
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                            <path d="M8 10h8"></path>
                        </svg>
                        {{ $anime['type'] }}
                    </span>
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M2 12h20"></path>
                            <path d="M12 2v20"></path>
                            <circle cx="12" cy="12" r="10"></circle>
                        </svg>
                        {{ $anime['episodes'] }} Episodes
                    </span>
                    <span class="meta-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                        {{ $anime['duration'] ?? '24 min' }}
                    </span>
                    <span class="meta-item rating">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#ffd700" stroke="#ffd700" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        {{ $anime['rating'] }}
                    </span>
                </div>

                <div class="anime-genres">
                    @foreach($anime['genres'] as $genre)
                        <a href="/genre/{{ Str::slug($genre) }}" class="genre-tag">{{ $genre }}</a>
                    @endforeach
                </div>

                <div class="anime-actions">
                    <button class="watch-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="5 3 19 12 5 21 5 3"></polygon>
                        </svg>
                        Watch Now
                    </button>
                    <button class="list-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Add to List
                    </button>
                    <button class="share-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="18" cy="5" r="3"></circle>
                            <circle cx="6" cy="12" r="3"></circle>
                            <circle cx="18" cy="19" r="3"></circle>
                            <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                            <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                        </svg>
                        Share
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="anime-detail-main">
        <div class="content-wrapper">
            <!-- Left Column -->
            <div class="content-left">
                <!-- Synopsis Section -->
                <section class="synopsis-section">
                    <h2 class="section-title">Synopsis</h2>
                    <p class="synopsis-text">{{ $anime['description'] ?? 'No description available.' }}</p>
                </section>

                <!-- Information Section -->
                <section class="information-section">
                    <h2 class="section-title">Information</h2>
                    <div class="info-grid">
                        <div class="info-row">
                            <span class="info-label">Studio:</span>
                            <span class="info-value">{{ $anime['studio'] ?? 'Unknown' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Aired:</span>
                            <span class="info-value">{{ $anime['aired'] ?? 'Unknown' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Duration:</span>
                            <span class="info-value">{{ $anime['duration'] ?? '24 min per episode' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Status:</span>
                            <span class="info-value status-{{ $anime['status'] }}">{{ $anime['status'] === 'airing' ? 'Currently Airing' : ucfirst($anime['status']) }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Rating:</span>
                            <span class="info-value">⭐ {{ $anime['rating'] }} / 10</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Rank:</span>
                            <span class="info-value">#{{ $anime['rank'] ?? 'N/A' }}</span>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Right Column - Episodes Section -->
            <div class="content-right">
                <section class="episodes-section">
                    <div class="episodes-header">
                        <h2 class="section-title">Episodes</h2>
                        <div class="episodes-controls">
                            <div class="episodes-search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                                <input type="text" id="episodeSearch" placeholder="Search episodes...">
                            </div>
                            <select id="episodeSort" class="episodes-sort">
                                <option value="asc">Episode 1 → Latest</option>
                                <option value="desc">Latest → Episode 1</option>
                            </select>
                        </div>
                    </div>

                    <div class="episodes-list" id="episodesList">
                        <!-- Episodes will be loaded via JavaScript -->
                    </div>

                    <div class="load-more-container" id="loadMoreContainer">
                        <button class="load-more-btn" id="loadMoreBtn">Load More Episodes</button>
                    </div>

                    <div class="no-episodes" id="noEpisodes" style="display: none;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <p>No episodes found</p>
                    </div>
                </section>
            </div>
        </div>

        <!-- Related Anime Section -->
        @if(count($relatedAnime) > 0)
        <section class="related-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-gradient">You Might Also Like</span>
                </h2>
                <a href="/anime-list" class="view-all">View All</a>
            </div>

            <div class="related-grid">
                @foreach($relatedAnime as $related)
                <a href="/anime/{{ $related['id'] }}" class="related-card">
                    <div class="related-image">
                        <img src="{{ $related['image'] }}" alt="{{ $related['title'] }}">
                        <div class="related-rating">⭐ {{ $related['rating'] }}</div>
                    </div>
                    <div class="related-content">
                        <h3 class="related-title">{{ $related['title'] }}</h3>
                        <div class="related-info">
                            <span>{{ $related['year'] }}</span>
                            <span>{{ $related['type'] }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </section>
        @endif
    </main>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Generate episodes
    const totalEpisodes = parseInt('{{ $anime['episodes'] }}'.replace('+', '')) || 24;
    const episodesPerLoad = 12;
    let currentLoadedEpisodes = episodesPerLoad;
    let currentSort = 'asc';
    let currentSearch = '';

    // Generate episode data
    function generateEpisodes() {
        const episodes = [];
        for (let i = 1; i <= totalEpisodes; i++) {
            episodes.push({
                number: i,
                title: `Episode ${i}`,
                thumbnail: `{{ $anime['image'] }}`,
                duration: '{{ $anime['duration'] ?? '24 min' }}',
                aired: '{{ $anime['aired'] ?? '2024' }}',
                description: `Watch Episode ${i} of {{ $anime['title'] }}.`
            });
        }
        return episodes;
    }

    const allEpisodes = generateEpisodes();

    // Filter episodes by search
    function filterEpisodes(episodes, searchTerm) {
        if (!searchTerm) return episodes;
        return episodes.filter(ep => 
            ep.title.toLowerCase().includes(searchTerm.toLowerCase()) ||
            `Episode ${ep.number}`.toLowerCase().includes(searchTerm.toLowerCase())
        );
    }

    // Sort episodes
    function sortEpisodes(episodes, sortOrder) {
        return [...episodes].sort((a, b) => {
            return sortOrder === 'asc' ? a.number - b.number : b.number - a.number;
        });
    }

    // Render episodes
    function renderEpisodes(reset = true) {
        const episodesList = document.getElementById('episodesList');
        const loadMoreBtn = document.getElementById('loadMoreBtn');
        const loadMoreContainer = document.getElementById('loadMoreContainer');
        const noEpisodes = document.getElementById('noEpisodes');

        // Filter and sort episodes
        let filteredEpisodes = filterEpisodes(allEpisodes, currentSearch);
        filteredEpisodes = sortEpisodes(filteredEpisodes, currentSort);

        if (reset) {
            currentLoadedEpisodes = episodesPerLoad;
        }

        const episodesToShow = filteredEpisodes.slice(0, currentLoadedEpisodes);

        if (reset) {
            episodesList.innerHTML = '';
        }

        if (episodesToShow.length === 0) {
            episodesList.style.display = 'none';
            loadMoreContainer.style.display = 'none';
            noEpisodes.style.display = 'block';
            return;
        }

        episodesList.style.display = 'block';
        noEpisodes.style.display = 'none';

        // Show/hide load more button
        if (currentLoadedEpisodes >= filteredEpisodes.length) {
            loadMoreContainer.style.display = 'none';
        } else {
            loadMoreContainer.style.display = 'block';
        }

        // Render episodes
        episodesToShow.slice(reset ? 0 : currentLoadedEpisodes - episodesPerLoad).forEach(episode => {
            const episodeElement = createEpisodeElement(episode);
            episodesList.appendChild(episodeElement);
        });
    }

    // Create episode element
    function createEpisodeElement(episode) {
        const div = document.createElement('div');
        div.className = 'episode-item';
        div.innerHTML = `
            <div class="episode-number">${episode.number}</div>
            <div class="episode-thumbnail">
                <img src="${episode.thumbnail}" alt="Episode ${episode.number}">
                <span class="episode-duration">${episode.duration}</span>
            </div>
            <div class="episode-details">
                <h3 class="episode-title">${episode.title}</h3>
                <p class="episode-description">${episode.description}</p>
                <div class="episode-meta">
                    <span class="episode-airdate">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        ${episode.aired}
                    </span>
                </div>
            </div>
            <button class="watch-episode-btn" onclick="alert('Playing Episode ${episode.number}')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                </svg>
                Watch
            </button>
        `;

        div.addEventListener('click', function(e) {
            if (!e.target.closest('.watch-episode-btn')) {
                alert(`Playing Episode ${episode.number}`);
            }
        });

        return div;
    }

    // Event Listeners
    document.getElementById('episodeSearch').addEventListener('input', function(e) {
        currentSearch = e.target.value;
        renderEpisodes(true);
    });

    document.getElementById('episodeSort').addEventListener('change', function(e) {
        currentSort = e.target.value;
        renderEpisodes(true);
    });

    document.getElementById('loadMoreBtn').addEventListener('click', function() {
        currentLoadedEpisodes += episodesPerLoad;
        renderEpisodes(false);
    });

    // Initial render
    renderEpisodes(true);

    // Action buttons
    document.querySelectorAll('.watch-btn, .list-btn, .share-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.classList.contains('watch-btn')) {
                alert('Starting to watch...');
            } else if (this.classList.contains('list-btn')) {
                alert('Added to your list!');
            } else if (this.classList.contains('share-btn')) {
                alert('Share feature coming soon!');
            }
        });
    });

    // Related cards hover effect
    document.querySelectorAll('.related-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>
@endsection