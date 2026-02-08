<div class="navbar__container">
    <a href="/" class="brand">StreamingNime</a>

    <nav class="nav__menu">
        <a href="/" class="nav__link" data-route="/">Home</a>
        <a href="/anime-list" class="nav__link" data-route="/anime">Anime List</a>
        <a href="/genre" class="nav__link" data-route="/genre">Genre List</a>
        <a href="/ongoing" class="nav__link" data-route="/ongoing">On-Going</a>
        <a href="/login" class="nav__link login">Sign In</a>

        <div class="line__tracking"></div>
    </nav>

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