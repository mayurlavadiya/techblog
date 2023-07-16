<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ url('/') }}"><img src="{{ asset('assets/images/logo/Techblog (3).svg') }}"
            width="150px" alt="Techblog Logo"></a>

    <!-- Navbar-->

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('navbar_pages/aboutus') }}">About Us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('navbar_pages/blog') }}">Blogs</a>
            </li>

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
    </div>

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @auth
                    <li><a class="dropdown-item" href="#">{{ Auth::user()->name }}</a></li>
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                @endauth
                @guest
                    <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                    <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                @endguest
            </ul>
        </li>
    </ul>

</nav>
