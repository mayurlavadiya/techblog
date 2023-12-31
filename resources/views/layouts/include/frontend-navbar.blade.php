<div class="sticky-top">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <div class="container">

            @php
                $setting = App\Models\Settings::find(1);
            @endphp
            <!-- Navbar Brand -->
            @if ($setting)
                <a class="navbar-brand ps-3" href="{{ url('/') }}">
                    <img src="{{ asset('upload/settings/' . $setting->logo) }}" width="150px" alt="Techblog Logo">
                </a>
            @endif

            <!-- Navbar Toggler -->
            <button class="navbar-toggler text-end" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Menu -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0"> --}}
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('navbar_pages/aboutus') }}">About Us</a>
                    </li>

                    {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">Blogs</a>
                </li> --}}

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @php
                                $categories = App\Models\Category::where('navbar_status', '1')
                                    ->where('status', '1')
                                    ->get();
                            @endphp
                            @foreach ($categories as $cateitem)
                                <li class="nav-item">
                                    <a class="dropdown-item"
                                        href="{{ url('categories/' . $cateitem->slug) }}">{{ $cateitem->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('navbar_pages/services') }}">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('navbar_pages/contactus') }}">Contact Us</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user fa-fw"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @auth
                                <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></li>
                                <li><a class="dropdown-item" href="#!">Settings</a></li>
                                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            @endauth
                            @guest
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
