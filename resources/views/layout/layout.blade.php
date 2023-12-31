<html>

<head>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    <title>@yield('title')</title>
    @yield('header')

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        /* Show it is fixed to the top */
        body {
            min-height: 75rem;
            padding-top: 5.5rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Persuratan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{url('/dashboard')}}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/dashboard/manage-user')}}">Manajemen User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/dashboard/surat')}}">Manajemen Persuratan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/dashboard/jenissurat')}}">Manajemen Jenis Surat</a>
                    </li>
                </ul>
                <a href="" class="btn btn-danger" role="button">Logout</a>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        {{-- @include('layout.flash-message') --}}
        @yield('content')
    </div>
</body>
<footer>
    @yield('footer')
</footer>
<html>