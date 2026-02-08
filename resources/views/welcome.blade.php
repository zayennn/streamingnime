@extends('layouts.home.app')

@section('content')
    <section class="hero">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-bg paroller"
                        style="background-image: url('{{ asset('images/slider hero/black-clover.jpg') }}')"
                        data-paroller-factor="0.5" data-paroller-factor-xs="0.2" data-paroller-type="background"
                        data-paroller-direction="vertical">
                    </div>
                    <div class="overlay"></div>
                    <div class="bottom-overlay"></div>

                    <!-- Hero Content untuk slide 1 -->
                    <div class="hero-content">
                        <h1 class="hero-title">Black Clover</h1>
                        <p class="hero-description">
                            In a world where magic is everything, Asta and Yuno are both found abandoned at a church on the
                            same day. While Yuno is gifted with exceptional magical powers, Asta is the only one in this
                            world without any...
                        </p>
                        <div class="hero-genres">
                            <span class="genre-tag">Action</span>
                            <span class="genre-tag">Adventure</span>
                            <span class="genre-tag">Comedy</span>
                            <span class="genre-tag">Fantasy</span>
                            <span class="genre-tag">Shounen</span>
                        </div>
                        <div class="hero-buttons">
                            <button class="watch-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                                Watch Now
                            </button>
                            <button class="list-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Add to List
                            </button>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="hero-bg paroller"
                        style="background-image: url('{{ asset('images/slider hero/jigokuraku.jpg') }}')"
                        data-paroller-factor="0.5" data-paroller-factor-xs="0.2" data-paroller-type="background"
                        data-paroller-direction="vertical">
                    </div>
                    <div class="overlay"></div>
                    <div class="bottom-overlay"></div>

                    <!-- Hero Content untuk slide 2 -->
                    <div class="hero-content">
                        <h1 class="hero-title">Jigokuraku: Hell's Paradise</h1>
                        <p class="hero-description">
                            Gabimaru the Hollow, a ninja of Iwagakure Village known for being cold and emotionless, is set
                            to be executed. However, he is offered a chance at freedom by the shogunate...
                        </p>
                        <div class="hero-genres">
                            <span class="genre-tag">Action</span>
                            <span class="genre-tag">Adventure</span>
                            <span class="genre-tag">Mystery</span>
                            <span class="genre-tag">Supernatural</span>
                            <span class="genre-tag">Seinen</span>
                        </div>
                        <div class="hero-buttons">
                            <button class="watch-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polygon points="5 3 19 12 5 21 5 3"></polygon>
                                </svg>
                                Watch Now
                            </button>
                            <button class="list-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                Add to List
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="autoplay-progress">
                <svg viewBox="0 0 48 48">
                    <circle cx="24" cy="24" r="20"></circle>
                </svg>
                <span></span>
            </div>
        </div>
    </section>

    <!-- ==================== CONTENT DI BAWAH HERO ==================== -->
    <main class="main-content">

        <!-- Section: Trending Now -->
        <section class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-gradient">Trending Now</span>
                </h2>
                <a href="/trending" class="view-all">View All</a>
            </div>
            <div class="anime-grid">
                @foreach ($trending as $anime)
                    <div class="anime-card">
                        <div class="card-image">
                            <img src="{{ $anime['image'] }}" alt="{{ $anime['title'] }}">

                            <div class="card-overlay">
                                <span class="episode">{{ $anime['episode'] }}</span>
                                <span class="rating">⭐ {{ $anime['rating'] }}</span>
                            </div>

                            @if ($anime['badge'])
                                <div class="card-badge">{{ $anime['badge'] }}</div>
                            @endif
                        </div>

                        <div class="card-content">
                            <h3 class="card-title">{{ $anime['title'] }}</h3>

                            <div class="card-genres">
                                @foreach ($anime['genres'] as $genre)
                                    <span>{{ $genre }}</span>
                                @endforeach
                            </div>

                            <div class="card-info">
                                <span class="year">{{ $anime['year'] }}</span>
                                <span class="type">{{ $anime['type'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Section: Ongoing Anime -->
        <section class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-gradient">Ongoing Anime</span>
                </h2>
                <a href="/ongoing" class="view-all">View All</a>
            </div>
            <div class="ongoing-grid">
                <!-- Ongoing Item 1 -->
                <div class="ongoing-item">
                    <div class="ongoing-image">
                        <img src="https://via.placeholder.com/150x200/ff006e/ffffff?text=OP" alt="One Piece">
                    </div>
                    <div class="ongoing-content">
                        <h3 class="ongoing-title">One Piece</h3>
                        <p class="ongoing-episode">Episode 1089</p>
                        <div class="ongoing-info">
                            <span class="airing">Airing Now</span>
                            <span class="time">Sundays</span>
                        </div>
                    </div>
                </div>

                <!-- Ongoing Item 2 -->
                <div class="ongoing-item">
                    <div class="ongoing-image">
                        <img src="https://via.placeholder.com/150x200/8338ec/ffffff?text=BNH" alt="My Hero Academia">
                    </div>
                    <div class="ongoing-content">
                        <h3 class="ongoing-title">My Hero Academia S7</h3>
                        <p class="ongoing-episode">Episode 18</p>
                        <div class="ongoing-info">
                            <span class="airing">Airing Now</span>
                            <span class="time">Saturdays</span>
                        </div>
                    </div>
                </div>

                <!-- Ongoing Item 3 -->
                <div class="ongoing-item">
                    <div class="ongoing-image">
                        <img src="https://via.placeholder.com/150x200/3a86ff/ffffff?text=DS" alt="Demon Slayer">
                    </div>
                    <div class="ongoing-content">
                        <h3 class="ongoing-title">Demon Slayer S4</h3>
                        <p class="ongoing-episode">Episode 6</p>
                        <div class="ongoing-info">
                            <span class="airing">Airing Now</span>
                            <span class="time">Sundays</span>
                        </div>
                    </div>
                </div>

                <!-- Ongoing Item 4 -->
                <div class="ongoing-item">
                    <div class="ongoing-image">
                        <img src="https://via.placeholder.com/150x200/ff006e/ffffff?text=MK" alt="Mashle">
                    </div>
                    <div class="ongoing-content">
                        <h3 class="ongoing-title">Mashle S2</h3>
                        <p class="ongoing-episode">Episode 9</p>
                        <div class="ongoing-info">
                            <span class="airing">Airing Now</span>
                            <span class="time">Fridays</span>
                        </div>
                    </div>
                </div>

                <!-- Ongoing Item 5 -->
                <div class="ongoing-item">
                    <div class="ongoing-image">
                        <img src="https://via.placeholder.com/150x200/8338ec/ffffff?text=FC" alt="Frieren">
                    </div>
                    <div class="ongoing-content">
                        <h3 class="ongoing-title">Frieren: Beyond Journey's End</h3>
                        <p class="ongoing-episode">Episode 22</p>
                        <div class="ongoing-info">
                            <span class="airing">Airing Now</span>
                            <span class="time">Fridays</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Top Rated -->
        <section class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-gradient">Top Rated Anime</span>
                </h2>
                <a href="/top-rated" class="view-all">View All</a>
            </div>
            <div class="top-rated-list">
                <!-- Top Rated Item 1 -->
                <div class="top-rated-item">
                    <span class="rank">1</span>
                    <div class="top-rated-image">
                        <img src="https://via.placeholder.com/80x110/ff006e/ffffff?text=FMAB" alt="Fullmetal Alchemist">
                    </div>
                    <div class="top-rated-content">
                        <h3 class="top-rated-title">Fullmetal Alchemist: Brotherhood</h3>
                        <div class="top-rated-info">
                            <span class="score">⭐ 9.1</span>
                            <span class="episodes">64 Episodes</span>
                            <span class="year">2009</span>
                        </div>
                        <div class="top-rated-genres">
                            <span>Action</span>
                            <span>Adventure</span>
                            <span>Drama</span>
                            <span>Fantasy</span>
                        </div>
                    </div>
                </div>

                <!-- Top Rated Item 2 -->
                <div class="top-rated-item">
                    <span class="rank">2</span>
                    <div class="top-rated-image">
                        <img src="https://via.placeholder.com/80x110/8338ec/ffffff?text=SG" alt="Steins;Gate">
                    </div>
                    <div class="top-rated-content">
                        <h3 class="top-rated-title">Steins;Gate</h3>
                        <div class="top-rated-info">
                            <span class="score">⭐ 9.0</span>
                            <span class="episodes">24 Episodes</span>
                            <span class="year">2011</span>
                        </div>
                        <div class="top-rated-genres">
                            <span>Sci-Fi</span>
                            <span>Thriller</span>
                            <span>Drama</span>
                        </div>
                    </div>
                </div>

                <!-- Top Rated Item 3 -->
                <div class="top-rated-item">
                    <span class="rank">3</span>
                    <div class="top-rated-image">
                        <img src="https://via.placeholder.com/80x110/3a86ff/ffffff?text=HXH" alt="Hunter x Hunter">
                    </div>
                    <div class="top-rated-content">
                        <h3 class="top-rated-title">Hunter x Hunter (2011)</h3>
                        <div class="top-rated-info">
                            <span class="score">⭐ 9.0</span>
                            <span class="episodes">148 Episodes</span>
                            <span class="year">2011</span>
                        </div>
                        <div class="top-rated-genres">
                            <span>Action</span>
                            <span>Adventure</span>
                            <span>Fantasy</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Popular Genres -->
        <section class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <span class="title-gradient">Popular Genres</span>
                </h2>
            </div>
            <div class="genres-grid">
                <a href="/genre/action" class="genre-card" style="background: linear-gradient(135deg, #ff006e, #ff4d94)">
                    <span class="genre-name">Action</span>
                    <span class="genre-count">1,234 Titles</span>
                </a>
                <a href="/genre/adventure" class="genre-card"
                    style="background: linear-gradient(135deg, #8338ec, #9d5cff)">
                    <span class="genre-name">Adventure</span>
                    <span class="genre-count">987 Titles</span>
                </a>
                <a href="/genre/comedy" class="genre-card" style="background: linear-gradient(135deg, #3a86ff, #5fa8ff)">
                    <span class="genre-name">Comedy</span>
                    <span class="genre-count">1,567 Titles</span>
                </a>
                <a href="/genre/drama" class="genre-card" style="background: linear-gradient(135deg, #ff006e, #8338ec)">
                    <span class="genre-name">Drama</span>
                    <span class="genre-count">876 Titles</span>
                </a>
                <a href="/genre/fantasy" class="genre-card"
                    style="background: linear-gradient(135deg, #8338ec, #3a86ff)">
                    <span class="genre-name">Fantasy</span>
                    <span class="genre-count">1,098 Titles</span>
                </a>
                <a href="/genre/romance" class="genre-card"
                    style="background: linear-gradient(135deg, #ff006e, #ff4d94)">
                    <span class="genre-name">Romance</span>
                    <span class="genre-count">654 Titles</span>
                </a>
                <a href="/genre/sci-fi" class="genre-card" style="background: linear-gradient(135deg, #3a86ff, #8338ec)">
                    <span class="genre-name">Sci-Fi</span>
                    <span class="genre-count">432 Titles</span>
                </a>
                <a href="/genre/slice-of-life" class="genre-card"
                    style="background: linear-gradient(135deg, #8338ec, #ff006e)">
                    <span class="genre-name">Slice of Life</span>
                    <span class="genre-count">543 Titles</span>
                </a>
            </div>
        </section>
    </main>
@endsection

@section('scripts')
    <script>
        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");

        const swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            effect: "fade",
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            on: {
                autoplayTimeLeft(s, time, progress) {
                    progressCircle.style.setProperty("--progress", 1 - progress);
                    progressContent.textContent = `${Math.ceil(time / 1000)}s`;
                },
                slideChangeTransitionEnd() {
                    $('.paroller').paroller('refresh');
                }
            }
        });

        $(function() {
            $('.paroller').paroller();
        });

        document.querySelectorAll('.anime-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
@endsection
