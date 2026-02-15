@extends('layouts.home.app')

@section('content')
<div class="anime-detail-container">
    <!-- Simple Hero Section -->
    <section class="anime-detail-hero">
        <div class="hero-backdrop" style="background-image: url('{{ asset($anime['image']) }}')"></div>
        <div class="hero-overlay"></div>
        
        <div class="hero-content">
            <nav class="anime-breadcrumb">
                <a href="/">Home</a>
                <span class="separator">/</span>
                <a href="/anime-list">Anime List</a>
                <span class="separator">/</span>
                <span class="current">{{ $anime['title'] }}</span>
            </nav>
            
            <div class="anime-header">
                <div class="anime-poster">
                    <img src="{{ asset($anime['image']) }}" alt="{{ $anime['title'] }}">
                    <div class="poster-badge badge-{{ $anime['status'] }}">
                        {{ $anime['status'] === 'airing' ? 'ONGOING' : ($anime['status'] === 'completed' ? 'COMPLETED' : 'UPCOMING') }}
                    </div>
                </div>
                
                <div class="anime-info">
                    <h1 class="anime-title">{{ $anime['title'] }}</h1>
                    
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
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                <path d="M2 8h20"></path>
                            </svg>
                            {{ $anime['type'] }}
                        </span>
                        <span class="meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polygon points="10 8 16 12 10 16 10 8"></polygon>
                            </svg>
                            {{ $anime['episodes'] }} Episodes
                        </span>
                        <span class="meta-item rating">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                    
                    @if($anime['status'] === 'airing')
                    <div class="airing-info">
                        <span class="airing-badge">
                            <span class="pulse"></span>
                            {{ $anime['airing'] }} • Every {{ $anime['time'] }}
                        </span>
                    </div>
                    @endif
                    
                    <div class="anime-actions">
                        <button class="btn-primary watch-now">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                            </svg>
                            Watch Now
                        </button>
                        <button class="btn-secondary add-to-list">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Add to List
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="anime-detail-main">
        <div class="content-grid">
            <!-- Left Column -->
            <div class="detail-left">
                <!-- Synopsis -->
                <section class="detail-card">
                    <h2 class="card-title">Synopsis</h2>
                    <p class="synopsis">{{ $anime['description'] }}</p>
                </section>

                <!-- Episodes List -->
                <section class="detail-card">
                    <div class="card-header">
                        <h2 class="card-title">Episodes</h2>
                        <span class="episode-count">{{ $anime['episodes'] }} episodes</span>
                    </div>
                    
                    <div class="episodes-grid">
                        @php
                            $totalEpisodes = is_numeric($anime['episodes']) ? (int)$anime['episodes'] : 12;
                            $episodeCount = min($totalEpisodes, 24); // Show max 24 episodes initially
                        @endphp
                        
                        @for($i = 1; $i <= $episodeCount; $i++)
                        <a href="#" class="episode-item" onclick="alert('Episode {{ $i }} coming soon!'); return false;">
                            <div class="episode-number">Episode {{ $i }}</div>
                            <div class="episode-title">
                                @if($i == 1)
                                    {{ $anime['title'] }} - Episode 1
                                @elseif($i <= 12)
                                    Episode {{ $i }}
                                @else
                                    Episode {{ $i }}
                                @endif
                            </div>
                            <div class="episode-duration">{{ $anime['duration'] ?? '24m' }}</div>
                        </a>
                        @endfor
                        
                        @if($totalEpisodes > 24)
                        <button class="load-more-episodes" onclick="alert('Load more episodes coming soon!')">
                            Show More Episodes
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        @endif
                    </div>
                </section>
            </div>

            <!-- Right Column -->
            <div class="detail-right">
                <!-- Information Card -->
                <section class="detail-card">
                    <h2 class="card-title">Information</h2>
                    <div class="info-list">
                        <div class="info-row">
                            <span class="info-label">Studio</span>
                            <span class="info-value">{{ $anime['studio'] ?? 'TBA' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Duration</span>
                            <span class="info-value">{{ $anime['duration'] ?? '24 min per episode' }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Aired</span>
                            <span class="info-value">{{ $anime['aired'] ?? $anime['year'] }}</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Status</span>
                            <span class="info-value status-{{ $anime['status'] }}">
                                {{ $anime['status'] === 'airing' ? 'Airing' : ($anime['status'] === 'completed' ? 'Completed' : 'Upcoming') }}
                            </span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Rating</span>
                            <span class="info-value rating">⭐ {{ $anime['rating'] }}/10</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Rank</span>
                            <span class="info-value">#{{ $anime['rank'] ?? 'N/A' }}</span>
                        </div>
                    </div>
                </section>

                <!-- Related Anime -->
                @if(isset($relatedAnime) && count($relatedAnime) > 0)
                <section class="detail-card">
                    <h2 class="card-title">You May Also Like</h2>
                    <div class="related-list">
                        @foreach($relatedAnime as $related)
                        <a href="/anime/{{ $related['id'] }}" class="related-item">
                            <div class="related-image">
                                <img src="{{ asset($related['image']) }}" alt="{{ $related['title'] }}">
                            </div>
                            <div class="related-content">
                                <h4 class="related-title">{{ $related['title'] }}</h4>
                                <div class="related-meta">
                                    <span>⭐ {{ $related['rating'] }}</span>
                                    <span>{{ $related['year'] }}</span>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </section>
                @endif

                <!-- Share -->
                <section class="detail-card">
                    <h2 class="card-title">Share</h2>
                    <div class="share-buttons">
                        <button class="share-btn" onclick="alert('Share on Facebook')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>
                        </button>
                        <button class="share-btn" onclick="alert('Share on Twitter')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                            </svg>
                        </button>
                        <button class="share-btn" onclick="copyToClipboard()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                            </svg>
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
<script>
function copyToClipboard() {
    navigator.clipboard.writeText(window.location.href);
    alert('Link copied to clipboard!');
}

document.addEventListener('DOMContentLoaded', function() {
    // Watch Now button
    const watchBtn = document.querySelector('.watch-now');
    if (watchBtn) {
        watchBtn.addEventListener('click', function() {
            const firstEpisode = document.querySelector('.episode-item');
            if (firstEpisode) {
                firstEpisode.scrollIntoView({ behavior: 'smooth' });
                firstEpisode.classList.add('highlight');
                setTimeout(() => firstEpisode.classList.remove('highlight'), 2000);
            } else {
                alert('Episodes coming soon!');
            }
        });
    }

    // Add to List button
    const addToListBtn = document.querySelector('.add-to-list');
    if (addToListBtn) {
        addToListBtn.addEventListener('click', function() {
            this.classList.toggle('active');
            const icon = this.querySelector('svg');
            if (this.classList.contains('active')) {
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                    Added to List
                `;
            } else {
                this.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Add to List
                `;
            }
        });
    }

    document.querySelectorAll('.episode-item').forEach(ep => {
        ep.addEventListener('click', function(e) {
            e.preventDefault();
            const episodeNum = this.querySelector('.episode-number').textContent;
            alert(`Playing ${episodeNum} - This is a demo. Video player coming soon!`);
        });
    });
});
</script>
@endsection