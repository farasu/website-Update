<!doctype html>
<html lang="en">

<head>
    <title>Admin Pannel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
    <link href="{{ url('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">

    
</head>

<body>

    <div class="wrapper d-flex align-items-stretch" id="app">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#">
                    <img class="img logo mb-5" src="{{ asset('logo.png') }}" alt="logo">
                </a>
                <ul class="list-unstyled components mb-5">
                    <!-- <li class="active">
                        <a href="#homeSubmenu" class="navbar-toggle" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="homeSubmenu">
                            Management <i class="fa fa-angle-down float-end mt-2"></i>
                        </a>
                        <ul class="collapsed list-unstyled" id="homeSubmenu">
                            <li>
                                <a href="#">Departments</a>
                            </li>
                            <li>
                                <a href="#">Users</a>
                            </li>
                            <li>
                                <a href="#">Roles</a>
                            </li>
                            <li>
                                <a href="#">Permissions</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}" href="{{ route('home') }}"">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="{{ (request()->is('dashboard/info*')) ? 'active' : '' }}">
                        <a href="{{ route('info') }}">Infromation</a>
                    </li>
                    <li class="{{ (request()->is('dashboard/herro*')) ? 'active' : '' }}">
                        <a href="{{ route('herro') }}">Herro</a>
                    </li>
                    <li class="{{ (request()->is('dashboard/main-service*')) ? 'active' : '' }}">
                        <a href="{{ route('main-service') }}">Service Message</a>
                    </li>
                    <li class="{{ (request()->is('dashboard/services*')) ? 'active' : '' }}">
                        <a href="{{ route('services') }}">List of Services</a>
                    </li>
                    <li class="{{ (request()->is('dashboard/news*')) ? 'active' : '' }}">
                        <a href="{{ route('news') }}">News</a>
                    </li>
                    <li class="{{ (request()->is('dashboard/gallery*')) ? 'active' : '' }}">
                        <a href="{{ route('gallery') }}">Gallery</a>
                    </li>
                    <li class="{{ (request()->is('dashboard/advertisement*')) ? 'active' : '' }}">
                        <a href="{{ route('advertisement') }}">Advertisement</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="bi bi-arrow-left-right"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-arrows-expand"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p class="text-danger">
                        {{$error}}
                    </p>
                @endforeach
            @endif

            @if(Session::has('success-message'))
                <p class="text-success">
                    {{Session::get('success-message')}}
                </p>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="{{ asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{ asset('admin/js/popper.js')}}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/js/main.js')}}"></script>
</body>

</html>
