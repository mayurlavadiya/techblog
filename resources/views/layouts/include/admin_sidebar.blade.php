<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active':''}}" href="{{url('admin/dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{-- <div class="sb-sidenav-menu-heading">Interface</div> --}}
                <a class="nav-link collapsed {{ Request::is('admin/category') || Request::is('admin/add-category') || Request::is('admin/edit-category/*')  ? 'active':''}}" href="{{ url('admin/category')}}" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('admin/add-category') ? 'active':''}}" href="{{ url('admin/add-category')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>Add Category</a>
                        <a class="nav-link {{ Request::is('admin/category') ? 'active':''}}" href="{{ url('admin/category')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>View Category</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed {{ Request::is('admin/posts') || Request::is('admin/add-post') || Request::is('admin/edit-post/*') ? 'active':''}}" href="{{url('admin/posts')}}" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link {{ Request::is('admin/add-post') ? 'active':''}}" href="{{ url('admin/add-post')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>Add Post</a>
                        <a class="nav-link {{ Request::is('admin/posts') ? 'active':''}}" href="{{ url('admin/posts')}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-eye"></i></div>View Post</a>
                        
                    </nav>
                </div>
                {{-- <div class="sb-sidenav-menu-heading">Addons</div> --}}

                <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/edit/*') ? 'active':''}}" href="{{url('admin/users')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                    Users
                </a>

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Roles
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-unlock-alt"></i></div>
                    Permission
                </a>
                    <a class="nav-link" href="{{ url('admin/settings')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Settings
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
            
        </div>
    </nav>
</div>