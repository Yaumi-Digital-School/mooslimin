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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template Main CSS File -->
    <link href="{{ asset('bootstrap/assets/css/style.css') }}" rel="stylesheet">

    {{-- Waves Css [tailwind] --}}
    <link rel="stylesheet" href="{{ asset('css/waves.css') }}">

    @yield('css')

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto">
                <a href="{{route('home')}}"><img src="{{asset('img/umum/mooslim-in.svg')}}" alt="" srcset=""></a>
            </h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="drop-down "><a href="">Layanan</a>
                        <ul>
                            {{-- <li class="">
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
                            </li> --}}
                            {{-- <li>
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
                            </li> --}}
                            <li>
                                <a href="http://hasanah.yaumi.id/" target="_blank">
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
                                <a href="http://qurantafsir.yaumi.id/" target="_blank">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <span class="material-icons" style="font-size: 2.5rem; color: #728363">
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
                            <li>
                                <a href="http://kuislam.yaumi.id/" target="_blank">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <img style="width: 40px; height: 40px" src="{{asset('img/umum/kuislam-logo.png')}}" alt="">
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">Kuislam</b>
                                            </div>
                                            <div>Mini Games Islamic Quiz</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="http://istiqomah.yaumi.id/" target="_blank">
                                    <div class="d-flex align-items-center">
                                        <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                            <img style="width: 40px; height: 17px" src="{{asset('img/umum/istiqomah-logo.png')}}" alt="">
                                        </div>
                                        <div class="">
                                            <div class="">
                                                <b style="font-size: 1.2rem">Istiqomah</b>
                                            </div>
                                            <div>Sahabat hijrahmu</div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li
                        class="drop-down {{ request()->is('forum') ? 'active' : (request()->is('/lain') ? 'active' : '') }}">
                        <a href="">Community</a>
                        <ul>
                            <li class="{{ request()->is('forum') ? 'active' : '' }}">
                                <a href="{{ route('forum.index') }}">
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
                            {{-- <li>
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
                            </li> --}}
                        </ul>
                    </li>

                    @auth
                        <li
                            class="drop-down {{ request()->is('profile') ? 'active' : (request()->is('/lain') ? 'active' : '') }}">
                            {{-- <a href="">Profile</a> --}}
                            <a href="">
                                {{Auth::user()->name}}
                                <span style="">
                                    <img src="{{ Auth::user()->get_img_avatar() }}" class="rounded-circle"
                                            style="margin: 0; width: 30px; height: 30px;" alt="">
                                </span>
                            </a>
                            <ul>
                                <li class="{{ request()->is('profile') ? 'active' : '' }}">
                                    <a href="{{route('profile.index')}}">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ Auth::user()->get_img_avatar() }}" class="p-2 rounded-circle mr-3"
                                            style="width: 50px; height: 50px;" alt="">
                                            <div class="">
                                                <div class="">
                                                    <b style="font-size: 1.2rem">{{Auth::user()->name}}</b>
                                                </div>
                                                <div>Lihat Profil Anda</div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        <div class="d-flex align-items-center">
                                            <div class="p-2 rounded-lg mr-3" style="background-color: #F8F8F8">
                                                <span class="material-icons" style="font-size: 2.5rem; color: #FF3859">
                                                    logout
                                                </span>
                                            </div>
                                            <div class="">
                                                <div class="">
                                                    <b style="font-size: 1.2rem">Keluar</b>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth
                </ul>
            </nav><!-- .nav-menu -->

            @auth
            @else
                <a href="/login" class="get-started-btn scrollto">Login</a>
            @endauth

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
    
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('bootstrap/assets/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
