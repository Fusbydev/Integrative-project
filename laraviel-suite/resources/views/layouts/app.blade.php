<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/book-now.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
    <link rel="icon" href="{{ asset('./images/logo.png') }}" type="image/x-icon">
    @yield('custom-css')
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar-wrapper"> <!-- Add a wrapper for easier styling -->
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
                                <a class="nav-link" aria-current="page" href="/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/accommodation">Accommodation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/offers">Offers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">About</a>
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

    <!-- JavaScript for hide navbar on scroll -->
    <footer class="container-fluid footer">
    <div class="container">
        <div class="row footerData">
            <div class="col-12 col-md-3">
                <img src="./images/logo.png" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</p>
                <div class="container icons">
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-youtube"></i>
                </div>
            </div>
            <div class="col-12 col-md-3 text-center">
                <h2 class="idk">Contacts</h2>
            </div>
            <div class="col-12 col-md-3 text-center">
                <h2 class="idk">Quick Links</h2>
            </div>
            <div class="col-12 col-md-3 text-center">
                <h2 class="idk">Privacy and Policy</h2>
            </div>
        </div>
    </div>
</footer>



</script>
    <script>
        let lastScrollTop = 0;
        window.addEventListener("scroll", function() {
            let navbar = document.querySelector(".navbar-wrapper");
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scrolling down, hide the navbar
                navbar.classList.add("hide-nav");
            } else {
                // Scrolling up, show the navbar
                navbar.classList.remove("hide-nav");
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Prevent negative scroll

            
        });
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
