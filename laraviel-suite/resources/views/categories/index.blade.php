@extends('layouts.app')

@section('title', 'Laraveil Suite')  <!-- Optional: Set the title of the page -->
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Full-height container with background -->
    <div class="container-fluid bg overlay"> 
        <div class="d-flex align-items-center justify-content-center h-100 text-center">
            <div class="d-flex flex-column">
                <h1 class="mx-auto elevate">ELEVATE YOUR STAY</h1>
                <p class="hotel-name">Laraveil Suites</p>
            </div>
        </div>
    </div>

    <div class="newSction container-fluid">
        <div class="container checkInOut"> <!-- Opening container -->
            <div class="row text-align-center"> <!-- Opening row -->

            </div> <!-- Closing row -->

            <div class="text-center p-relative logo-name mt-4"> <!-- Gallery title section -->
                <h1 class="gallery">GALLERY</h1>
                <p class="gallery">KNOW US BY PICTURES</p>
            </div> <!-- Closing logo-name -->
        </div> <!-- Closing container -->

        <div class="images container"> <!-- Opening images section -->
            <div class="grid-wrapper mt-3 pt-5">
                <div>
                    <img src="./images/balcony.png" alt="" />
                </div>
                <div>
                    <img src="./images/balcony.png" alt="" />
                </div>
                <div class="tall">
                    <img src="./images/balcony.png" alt="">
                </div>
                <div class="wide">
                    <img src="./images/balcony.png" alt="" />
                </div>
                <div>
                    <img src="./images/balcony.png" alt="" />
                </div>
                <div class="tall">
                    <img src="./images/balcony.png" alt="" />
                </div>
                <div class="wide">
                <img src="./images/balcony.png" alt="" />
                </div>
                <div>
                    <img src="./images/balcony.png" alt="" />
                </div>
            </div>
        </div> <!-- Closing images section -->
    </div> <!-- Closing newSction -->
    <div class="container-fluid aboutUs overlay1">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-4 text">
                <h1>About us</h1>
                <p>Welcome to Laraveil Suites, where comfort meets sophistication. Nestled in the heart of the city, Laraveil Suites offers a seamless blend of modern elegance and personalized service. Whether you're traveling for business or leisure, our hotel is designed to provide a memorable and stress-free experience.At Laraveil Suites, we pride ourselves on offering more than just a place to stay. Our state-of-the-art amenities, luxurious rooms, and dedicated staff ensure that every guest enjoys the highest level of comfort and convenience. From our intuitive online reservation system to our warm in-person service, we prioritize your satisfaction at every step.We believe in creating a home away from home, a place where you can relax, recharge, and explore. <br><br> Welcome to Laraveil Suites—your perfect getaway awaits.</p>
                <a href="" class="connect mt-3">Connect With Us</a>
            </div>
        </div>
    </div>
    <div class="container-fluid feedbacks text-center">
    <h1 class="feed-text">Client Feedbacks</h1>
    <div class="row justify-content-center">

    <div id="feedbackCarousel" class="carousel slide" data-bs-ride="true">
    <!-- Carousel Inner -->
    <div class="carousel-inner p-2">
        <div class="carousel-item active">
            <div class="row justify-content-center">
                <!-- Feedback 1 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 2 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 3 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Service is ass asf</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 4 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Carousel Item -->
        <div class="carousel-item">
            <div class="row justify-content-center">
                <!-- Feedback 5 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 6 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 7 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 8 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="carousel-item">
            <div class="row justify-content-center">
                <!-- Feedback 5 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 6 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 7 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 8 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="carousel-item">
            <div class="row justify-content-center">
                <!-- Feedback 5 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 6 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 7 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                <!-- Feedback 8 -->
                <div class="col-md-6 col-lg-3 col-sm-12 feed d-flex align-items-center">
                    <div class="container feed1">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.</p>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Carousel Indicators -->
    <div class="carousel-indicators position-relative">
        <button type="button" data-bs-target="#feedbackCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#feedbackCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#feedbackCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#feedbackCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
</div>

    </div>
</div>

</div>


    <!-- Feedbacks container -->
   
</div>


@endsection
