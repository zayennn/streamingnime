<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Dynamic Title --}}
    <title>@yield('title', 'StreamingNime - Watch Anime Online Free') | StreamingNime</title>

    {{-- Basic Meta Tags --}}
    <meta name="description" content="@yield('meta_description', 'StreamingNime is your ultimate destination to watch and stream anime online for free. Browse thousands of anime series and movies with English subtitles.')">
    <meta name="keywords" content="@yield('meta_keywords', 'anime, watch anime, stream anime, anime online, free anime, anime streaming, sub anime, dub anime, anime list, anime episodes')">
    <meta name="author" content="StreamingNime">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="1 day">
    <meta name="distribution" content="global">
    <meta name="rating" content="general">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Favicon / Icons --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#ff006e">
    <meta name="msapplication-TileColor" content="#02000c">
    <meta name="theme-color" content="#02000c">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="StreamingNime">
    <meta property="og:title" content="@yield('og_title', 'StreamingNime - Watch Anime Online Free')">
    <meta property="og:description" content="@yield('og_description', 'StreamingNime is your ultimate destination to watch and stream anime online for free. Browse thousands of anime series and movies with English subtitles.')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="en_US">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="@yield('twitter_card', 'summary_large_image')">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:site" content="@streamingnime">
    <meta name="twitter:creator" content="@streamingnime">
    <meta name="twitter:title" content="@yield('twitter_title', 'StreamingNime - Watch Anime Online Free')">
    <meta name="twitter:description" content="@yield('twitter_description', 'StreamingNime is your ultimate destination to watch and stream anime online for free. Browse thousands of anime series and movies with English subtitles.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/twitter-image.jpg'))">

    {{-- Additional Meta Tags for SEO --}}
    <meta name="google-site-verification" content="your-google-verification-code">
    <meta name="msvalidate.01" content="your-bing-verification-code">
    <meta name="yandex-verification" content="your-yandex-verification-code">

    {{-- Robots Meta --}}
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">

    {{-- Mobile Specific --}}
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="StreamingNime">

    {{-- RSS Feed --}}
    <link rel="alternate" type="application/rss+xml" title="StreamingNime - Latest Anime Episodes"
        href="{{ route('rss.feed') }}">

    {{-- Preconnect and Preload --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    {{-- JSON-LD Structured Data --}}
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "StreamingNime",
        "url": "{{ url('/') }}",
        "potentialAction": {
            "@type": "SearchAction",
            "target": {
                "@type": "EntryPoint",
                "urlTemplate": "{{ url('/search') }}?q={search_term_string}"
            },
            "query-input": "required name=search_term_string"
        },
        "description": "StreamingNime is your ultimate destination to watch and stream anime online for free. Browse thousands of anime series and movies with English subtitles.",
        "publisher": {
            "@type": "Organization",
            "name": "StreamingNime",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ asset('images/logo.png') }}"
            }
        }
    }
    </script>

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('home/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/anime-list.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/genre-list.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/anime-detail.css') }}">

    {{-- poppins fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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