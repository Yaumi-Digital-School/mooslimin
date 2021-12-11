{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('bootstrap/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('bootstrap/assets/css/style.css') }}" rel="stylesheet">

    {{-- Waves Css [tailwind] --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.tailwindcss.com"> </script>
    <script src="{{ asset('js/tailwind.config.js') }}" defer></script>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.html">Muslim Tool</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="{{request()->is('/') ? 'active' : ''}}"><a href="">Home</a></li>
                    <li class="drop-down "><a href="">Layanan</a>
                        <ul>
                            <li class="">
                                <a href="">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <span class="material-icons" style="font-size: 2.5rem; color: #78F294">
                                                event
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">Jadwal Sholat</b>
                                            </div>
                                            <div>Jadwal sholat kota di Indonesia</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <span class="material-icons" style="font-size: 2.5rem; color: #FF8A87">
                                                calculate
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">Kalkulator Zakat</b>
                                            </div>
                                            <div>Zakat penghasilan, maal & fitrah</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <span class="material-icons" style="font-size: 2.5rem; color: #F9CA0E">
                                                fact_check
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">Halal Checker</b>
                                            </div>
                                            <div>Cek Makanan Halal MUI</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <span class="material-icons" style="font-size: 2.5rem; color: #1381F7">
                                                menu_book
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">Qur'an Tafsir</b>
                                            </div>
                                            <div>Qur'an 30 Juz & Tafsirnya</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="drop-down {{request()->is('forum') ? 'active' : (request()->is('/lain') ? 'active' : '')}}"><a href="">Community</a>
                        <ul>
                            <li class="{{request()->is('forum') ? 'active' : ''}}">
                                <a href="{{route('forum.index')}}">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <span class="material-icons" style="font-size: 2.5rem; color: #78F294">
                                                forum
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">Forum Diskusi</b>
                                            </div>
                                            <div>Berbagi cerita dan tanya jawab islami</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <span class="material-icons" style="font-size: 2.5rem; color: #1381F7">
                                                person_search
                                            </span>
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">List Ustadz/zah</b>
                                            </div>
                                            <div>Kenali lebih dekat dengan para ulama</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav><!-- .nav-menu -->

            <a href="/login" class="get-started-btn scrollto">Login</a>

        </div>
    </header><!-- End Header -->
    @yield('content')



    <!-- Vendor JS Files -->
    <script src="{{ asset('bootstrap/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrap/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('bootstrap/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('bootstrap/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('bootstrap/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('bootstrap/assets/vendor/venobox/venobox.min.js') }}"></script>
    <script src="{{ asset('bootstrap/assets/vendor/aos/aos.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('bootstrap/assets/js/main.js') }}"></script>
</body>

</html>
