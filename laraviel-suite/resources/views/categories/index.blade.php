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
        <div class="row h-100">

                <div class="row text-center feedbacks1 mt-3">
                <div class="col-md-4 col-lg-3 col-sm-12 feed">
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

                    <div class="col-md-4 col-lg-3 col-sm-12 feed">
                        <div class="container feed1">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.
                            </p>
                            <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-12 feed">
                        <div class="container feed1">
                            <p>Service is ass asf
                            </p>
                            <div class="stars">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-12 feed">
                        <div class="container feed1">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.
                            </p>
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
</div>


    <!-- Feedbacks container -->
   
</div>


@endsection
