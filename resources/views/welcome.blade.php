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
    </script>
@endsection
