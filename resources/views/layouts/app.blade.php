<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- APP Title -->
    <title>@isset($metaTitle){{ config('app.name', 'Armazene Aqui') . ' | ' . $metaTitle }}@else{{ config('app.name', 'Armazene Aqui') }}@endisset</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Powegrid and Livewire Styles -->
    @livewireStyles
    @powerGridStyles

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            overflow: auto;
            min-width: 265px;
            min-height: 480px;
        }

        .supbar li:hover {
            background-color: #4a93ff;
        }

        .supbar-selected-link {
            border-bottom: 1px solid #f8f9fa;
            background-color: #4a93ff;
        }

        .sidebar li:hover {
            background-color: #4a93ff;
        }

        .sidebar-selected-link {
            border-left: 5px solid #f8f9fa;
            background-color: #4a93ff;
        }
    </style>
</head>

<body class="bg-light">
    <nav class="navbar shadow sticky-top bg-primary">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-light me-3 d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a class="navbar-brand fw-bold text-light" href="/" title="Página Inicial Armazene Aqui">
                        <i class="fa-solid fa-dolly"></i>
                        Armazene Aqui
                    </a>
                    <div class="d-lg-block d-md-none d-sm-none d-none">
                        @include('layouts.supbar')
                    </div>
                </div>
                <div class="d-lg-block d-md-none d-sm-none d-none align-items-center text-light">
                    Futuramente aqui vai menu de usuário
                </div>
            </div>
            <div class="offcanvas offcanvas-start bg-primary" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header d-flex justify-content-start align-items-center">
                    <button class="btn btn-outline-light me-3" type="button" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a class="navbar-brand fw-bold text-light" href="/" title="Página Inicial Armazene Aqui">
                        <i class="fa-solid fa-dolly"></i>
                        Armazene Aqui
                    </a>
                </div>
                <div class="offcanvas-body m-0 p-0">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
    </nav>

    @if (Session::has('success'))
        <div class="container-fluid w-25 mt-3 float-end">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
            </svg>

            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                    <strong>Success.</strong> {{ Session::get('success') }}
                </div>
            </div>
        </div>
    @endif

    <main class="container-fluid mt-5">
        @yield('content')
    </main>

    <!-- JQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js"
        integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <!-- Powergrid and Livewire Scripts -->
    @livewireScripts
    @powerGridScripts
</body>

</html>
