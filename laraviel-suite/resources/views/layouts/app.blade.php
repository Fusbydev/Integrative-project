<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('custom-css')
</head>
<body>
    <!-- Navigation bar -->
    <nav>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"><img src="./images/logo.png" alt="" class="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page"  href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/accommodation">Accommodation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Offers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                        </ul>
                        <!-- Move the button inside the collapsible navbar -->
                        <div class="d-lg-none mt-2"> <!-- d-lg-none hides the button on larger screens -->
                            <button class="bookBtn">Book Now</button>
                        </div>
                    </div>
                    <div class="text-center p-relative logo-name"> <!-- d-none d-lg-block shows logo only on larger screens -->
                        <p class="laraveil">LARAVEIL</p>
                        <p class="suites">SUITES</p>
                    </div>
                    <div class="d-none d-lg-block"> <!-- d-none d-lg-block hides the button on smaller screens -->
                        <button class="bookBtn">Book Now</button>
                    </div>
                </div>
            </nav>
        </div>
    </nav>

    <!-- Content section -->
    <div>
        @yield('content')  <!-- This will include content from the child view (like index.blade.php) -->
    </div>

    <!-- Footer or scripts can go here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
