<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Seth')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Theme CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Laravel UI Bootstrap CSS (for auth pages) -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!-- Theme Header -->
        <header id="header" class="header d-flex align-items-center fixed-top">
            <div class="container position-relative d-flex align-items-center">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto text-decoration-none">
                    <h1 class="sitename">Seth</h1><span>.</span>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ url('/') }}" class="@if(Route::currentRouteName() == 'home') active @endif">Home</a></li>
                        <li class="dropdown"><a href="{{ url('/about') }}"><span>About</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ url('/team') }}">Team</a></li>
                                <li><a href="{{ url('/testimonials') }}">Testimonials</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Dropdown 1</a></li>
                                        <li><a href="#">Deep Dropdown 2</a></li>
                                        <li><a href="#">Deep Dropdown 3</a></li>
                                        <li><a href="#">Deep Dropdown 4</a></li>
                                        <li><a href="#">Deep Dropdown 5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endif
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }} <i class="bi bi-chevron-down toggle-dropdown"></i>
                                </a>
                                <ul>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <div class="header-social-links">
                    <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Theme JS -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
