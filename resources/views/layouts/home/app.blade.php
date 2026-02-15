<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Dynamic Title --}}
    <title>StreamingNime - {{ $page }} | Nonton Anime Subtitle Indonesia</title>

    {{-- Basic Meta Tags --}}
    <meta name="title" content="StreamingNime - {{ $page ?? 'Home' }} | Nonton Anime Subtitle Indonesia">
    <meta name="description"
        content="StreamingNime adalah tempat terbaik untuk menonton anime online subtitle Indonesia. Tersedia ribuan judul anime dari berbagai genre seperti Action, Comedy, Romance, Fantasy, dan lainnya. Update setiap hari!">
    <meta name="keywords"
        content="nonton anime, streaming anime, anime subtitle indonesia, anime online, anime streaming, download anime, anime terbaru, anime list, genre anime, ongoing anime">
    <meta name="author" content="StreamingNime">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesian">
    <meta name="revisit-after" content="1 days">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">

    {{-- Canonical URL --}}
    {{-- <link rel="canonical" href="https://streamingnime.great-site.net/{{ request()->path() }}"> --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph / Facebook Meta Tags --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="StreamingNime">
    <meta property="og:title" content="StreamingNime - {{ $page ?? 'Home' }} | Nonton Anime Subtitle Indonesia">
    <meta property="og:description"
        content="StreamingNime adalah tempat terbaik untuk menonton anime online subtitle Indonesia. Update setiap hari!">
    <meta property="og:image" content="{{ asset('images/og-image.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    {{-- Twitter Meta Tags --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="StreamingNime - {{ $page ?? 'Home' }} | Nonton Anime Subtitle Indonesia">
    <meta name="twitter:description"
        content="StreamingNime adalah tempat terbaik untuk menonton anime online subtitle Indonesia.">
    <meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}">

    {{-- Theme Color --}}
    <meta name="theme-color" content="#ff006e">
    <meta name="msapplication-TileColor" content="#ff006e">
    <meta name="msapplication-navbutton-color" content="#ff006e">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    {{-- Favicon / Icons --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#ff006e">

    {{-- Verification Meta Tags --}}
    <meta name="google-site-verification" content="YOUR_GOOGLE_VERIFICATION_CODE">
    <meta name="yandex-verification" content="YOUR_YANDEX_VERIFICATION_CODE">
    <meta name="msvalidate.01" content="YOUR_BING_VERIFICATION_CODE">
    <meta name="alexaVerifyID" content="YOUR_ALEXA_VERIFICATION_CODE">

    {{-- Mobile App Meta Tags --}}
    <meta name="application-name" content="StreamingNime">
    <meta name="apple-mobile-web-app-title" content="StreamingNime">

    {{-- Preconnect and DNS Prefetch --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('home/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/anime-list.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/genre-list.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/anime-detail.css') }}">

    {{-- Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Structured Data / JSON-LD --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "StreamingNime",
        "url": "https://streamingnime.great-site.net/",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://streamingnime.great-site.net/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        },
        "description": "StreamingNime adalah tempat terbaik untuk menonton anime online subtitle Indonesia. Tersedia ribuan judul anime dari berbagai genre seperti Action, Comedy, Romance, Fantasy, dan lainnya.",
        "inLanguage": "id-ID",
        "sameAs": [
            "https://www.facebook.com/streamingnime",
            "https://twitter.com/streamingnime",
            "https://www.instagram.com/streamingnime",
            "https://www.youtube.com/streamingnime",
            "https://discord.gg/streamingnime"
        ]
    }
    </script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "StreamingNime",
        "url": "https://streamingnime.great-site.net/",
        "logo": "https://streamingnime.great-site.net/images/logo.png",
        "sameAs": [
            "https://www.facebook.com/streamingnime",
            "https://twitter.com/streamingnime",
            "https://www.instagram.com/streamingnime",
            "https://www.youtube.com/streamingnime",
            "https://discord.gg/streamingnime"
        ],
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-xxx-xxxx-xxxx",
            "contactType": "customer service",
            "areaServed": "ID",
            "availableLanguage": ["Indonesian", "English"]
        }
    }
    </script>
</head>

<body>
    {{-- navbar --}}
    @include('components.home.navbar')

    @yield('content')

    {{-- footer --}}
    @include('components.home.footer')

    {{-- js --}}
    <script src="{{ asset('home/js/app.js') }}"></script>

    @if (request()->is('anime*'))
        <script src="{{ asset('home/js/anime-list.js') }}"></script>
    @endif

    {{-- paroller js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/paroller.js@1.4.0/dist/jquery.paroller.min.js"></script>

    {{-- swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    @yield('scripts')
</body>

</html>
