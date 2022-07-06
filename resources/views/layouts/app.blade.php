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
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-warning shadow">
            <div class="container">
                <div class="w-100 d-flex justify-content-between align-items-center">
                    <a class="navbar-brand fw-bold" href="/">Bling Api</a>
                    <a href="https://github.com/galdino01/bling-api">
                        <img class="img-thumbnail" src="https://raw.githubusercontent.com/devicons/devicon/master/icons/github/github-original-wordmark.svg" alt="Github Link" width="45" height="45">
                    </a>
                </div>
            </div>
        </nav>
        <main>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
