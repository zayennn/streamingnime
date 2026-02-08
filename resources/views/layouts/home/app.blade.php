<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Streaming Anime | {{ $page }}</title>

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('home/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/styles.css') }}">

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
    <script src="{{ asset('home/app.js') }}"></script>

    {{-- paroller js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/paroller.js@1.4.0/dist/jquery.paroller.min.js"></script>

    {{-- swiper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
