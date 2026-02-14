@extends('layouts.home.app')

@section('content')
    <div class="anime-detail-container">
        <!-- Hero Section with Backdrop -->
        <section class="anime-detail-hero">
            <div class="hero-backdrop" style="background-image: url('{{ asset($anime['image']) }}')"></div>
            <div class="hero-overlay"></div>
            <div class="hero-bottom-overlay"></div>

            <div class="hero-content-wrapper">
                <div class="hero-left">
                    <div class="anime-poster">
                        <img src="{{ asset($anime['image']) }}" alt="{{ $anime['title'] }}">
                        <div class="poster-badge badge-{{ $anime['status'] }}">
                            {{ $anime['status'] === 'airing' ? 'Ongoing' : ($anime['status'] === 'completed' ? 'Completed' : 'Upcoming') }}
                        </div>
                    </div>
                </div>

                <div class="hero-right">
                    <nav class="anime-breadcrumb">
                        <a href="/">Home</a>
                        <span>/</span>
                        <a href="/anime-list">Anime List</a>
                        <span>/</span>
                        <span class="current">{{ $anime['title'] }}</span>
                    </nav>

                    <h1 class="anime-title">{{ $anime['title'] }}</h1>

                    <div class="anime-meta">
                        <span class="meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            {{ $anime['year'] }}
                        </span>
                        <span class="meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                <path d="M2 8h20"></path>
                            </svg>
                            {{ $anime['type'] }}
                        </span>
                        <span class="meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polygon points="10 8 16 12 10 16 10 8"></polygon>
                            </svg>
                            {{ $anime['episodes'] }} Episodes
                        </span>
                        <span class="meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                            {{ $anime['rating'] }} / 10
                        </span>
                    </div>

                    <div class="anime-genres">
                        @foreach ($anime['genres'] as $genre)
                            <a href="/genre/{{ Str::slug($genre) }}" class="genre-tag">{{ $genre }}</a>
                        @endforeach
                    </div>

                    <div class="anime-action-buttons">
                        <button class="watch-now-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polygon points="5 3 19 12 5 21 5 3"></polygon>
                            </svg>
                            Watch Now
                        </button>
                        <button class="add-to-list-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Add to List
                        </button>
                        <button class="share-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="18" cy="5" r="3"></circle>
                                <circle cx="6" cy="12" r="3"></circle>
                                <circle cx="18" cy="19" r="3"></circle>
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                            </svg>
                        </button>
                    </div>

                    @if ($anime['status'] === 'airing')
                        <div class="airing-info">
                            <span class="airing-badge">
                                <span class="pulse"></span>
                                {{ $anime['airing'] }} - Every {{ $anime['time'] }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="anime-detail-main">
            <div class="content-wrapper">
                <!-- Left Column -->
                <div class="detail-left">
                    <!-- Synopsis Section -->
                    <section class="detail-section">
                        <h2 class="section-title">Synopsis</h2>
                        <p class="anime-description">{{ $anime['description'] }}</p>
                    </section>

                    <!-- Information Section -->
                    <section class="detail-section">
                        <h2 class="section-title">Information</h2>
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Studio</span>
                                <span class="info-value">{{ $anime['studio'] }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Duration</span>
                                <span class="info-value">{{ $anime['duration'] }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Aired</span>
                                <span class="info-value">{{ $anime['aired'] }}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Status</span>
                                <span class="info-value status-{{ $anime['status'] }}">
                                    {{ $anime['status'] === 'airing' ? 'Airing' : ($anime['status'] === 'completed' ? 'Completed' : 'Upcoming') }}
                                </span>
                            </div>
                        </div>
                    </section>

                    <!-- Characters Section (Placeholder) -->
                    <section class="detail-section">
                        <h2 class="section-title">Main Characters</h2>
                        <div class="characters-grid">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="character-card">
                                    <div class="character-image placeholder"></div>
                                    <div class="character-info">
                                        <h4 class="character-name">Character {{ $i }}</h4>
                                        <p class="character-role">Main Role</p>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </section>
                </div>

                <!-- Right Column -->
                <div class="detail-right">
                    <!-- Stats Section -->
                    <section class="detail-section stats-section">
                        <h2 class="section-title">Stats</h2>
                        <div class="stats-grid">
                            <div class="stat-card">
                                <div class="stat-circle">
                                    <svg viewBox="0 0 36 36" class="circular-chart">
                                        <path class="circle-bg" d="M18 2.0845
                                            a 15.9155 15.9155 0 0 1 0 31.831
                                            a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <path class="circle" stroke-dasharray="{{ $anime['rating'] * 10 }}, 100" d="M18 2.0845
                                            a 15.9155 15.9155 0 0 1 0 31.831
                                            a 15.9155 15.9155 0 0 1 0 -31.831" />
                                        <text x="18" y="20.35" class="percentage">{{ $anime['rating'] }}</text>
                                    </svg>
                                </div>
                                <span class="stat-label">Rating</span>
                            </div>

                            <div class="stat-box">
                                <span class="stat-number">{{ $anime['rank'] ?? '-' }}</span>
                                <span class="stat-label">Rank</span>
                            </div>

                            <div class="stat-box">
                                <span class="stat-number">{{ $anime['episodes'] }}</span>
                                <span class="stat-label">Episodes</span>
                            </div>
                        </div>
                    </section>

                    <!-- Related Anime -->
                    <section class="detail-section related-section">
                        <h2 class="section-title">You May Also Like</h2>
                        <div class="related-list">
                            @foreach ($relatedAnime as $related)
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

                    <!-- Tags/Section -->
                    <section class="detail-section">
                        <h2 class="section-title">Share</h2>
                        <div class="share-options">
                            <button class="share-option">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                                Facebook
                            </button>
                            <button class="share-option">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z">
                                    </path>
                                </svg>
                                Twitter
                            </button>
                            <button class="share-option">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="2" y1="12" x2="22" y2="12"></line>
                                    <path
                                        d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                    </path>
                                </svg>
                                Copy Link
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
        document.addEventListener('DOMContentLoaded', function() {
            // Watch Now button
            document.querySelector('.watch-now-btn').addEventListener('click', function() {
                alert('Watch feature coming soon!');
            });

            // Add to List button
            document.querySelector('.add-to-list-btn').addEventListener('click', function() {
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

            // Share button
            document.querySelector('.share-btn').addEventListener('click', function() {
                const shareOptions = document.querySelector('.share-options');
                shareOptions.classList.toggle('show');
            });

            // Copy link
            document.querySelectorAll('.share-option').forEach(btn => {
                btn.addEventListener('click', function() {
                    if (this.textContent.includes('Copy Link')) {
                        navigator.clipboard.writeText(window.location.href);
                        alert('Link copied to clipboard!');
                    }
                });
            });
        });
    </script>
@endsection