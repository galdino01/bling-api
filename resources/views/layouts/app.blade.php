<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- APP Title -->
    <title>{{ config('app.name', 'Bling Api') }}</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .sidebar {
            height: calc(100vh - 4rem);
            background-color: #0d6efd;
        }

        .supbar {
            background-color: #0745a3;
        }

        .supbar section {
            width: calc(100vw - 8rem);
        }

        .selected-link {
            border-left: 5px solid #f8f9fa;
            background-color: #4a93ff;
        }

        .custom-nav div a {
            font-weight: 600;
        }

        .custom-nav div:hover {
            background-color: #4a93ff;
        }
    </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg shadow supbar">
            <section class="container-fluid d-flex justify-content-between align-items-center">
                <div class="w-50 d-flex align-items-center">
                    <a class="navbar-brand fw-bold text-light" href="/">Bling Api</a>
                </div>
                <a href="https://github.com/galdino01/bling-api">
                    <img class="img-thumbnail" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/github/github-original-wordmark.svg" alt="Github Link" width="45" height="45">
                </a>
            </section>
        </nav>
        <main>
            <section class="row m-0 p-0">
                <div class="col-md-3 sidebar m-0 p-0">
                    <nav class="nav flex-column custom-nav">
                        <a class="nav-link text-light ps-5 @if (Route::getCurrentRoute()->getName() == 'products.index') selected-link @endif" href="{{ route('products.index') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="ps-3">Produtos</span>
                        </a>
                        <a class="nav-link text-light ps-5 @if (Route::getCurrentRoute()->getName() == 'orders.index') selected-link @endif" href="{{ route('orders.index') }}">
                            <i class="fa-solid fa-boxes-packing"></i>
                            <span class="ps-3">Pedidos</span>
                        </a>
                    </nav>
                </div>
                <div class="col-md-9 bg-light ps-4 pe-4">
                    @yield('content')
                </div>
            </section>
        </main>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
