@extends('layouts.app')

@section('title', 'Laraveil Suite')  <!-- Optional: Set the title of the page -->
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- Full-height container with background -->
    <div class="container-fluid bg"> 
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
                <div class="col-md-5"> <!-- Check-In column -->
                    <label for="checkin" class="form-label checkIn">Check-In</label>
                    <input type="date" id="checkin" class="form-control transparent-input">
                </div> <!-- Closing col-md-5 -->

                <div class="col-md-5"> <!-- Check-Out column -->
                    <label for="checkout" class="form-label checkIn">Check-Out</label>
                    <input type="date" id="checkout" class="form-control transparent-input">
                </div> <!-- Closing col-md-5 -->

                <div class="col-md-2 d-flex align-items-end"> <!-- Button aligned to the bottom -->
                <a href="/book-now" class="checkBtn w-100">Check Availability</a>
                </div> <!-- Closing col-md-2 -->
            </div> <!-- Closing row -->

            <div class="text-center p-relative logo-name mt-4"> <!-- Gallery title section -->
                <h1 class="gallery">GALLERY</h1>
                <p class="gallery">KNOW US BY PICTURES</p>
            </div> <!-- Closing logo-name -->
        </div> <!-- Closing container -->

        <div class="images container"> <!-- Opening images section -->
            <div class="grid-wrapper mt-5 pt-5">
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
    <div class="container-fluid aboutUs">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-4 text">
                <h1>About us</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia vitae beatae numquam aperiam, illo odio obcaecati voluptatum nam eligendi cumque molestiae harum quo esse asperiores amet voluptates non ducimus reprehenderit.
                Corrupti eaque magni minima voluptates beatae vero aut similique repudiandae, accusamus id voluptatem nam laboriosam eligendi sequi dignissimos! Laboriosam exercitationem sunt minus tenetur culpa. Repellat officiis deserunt distinctio eveniet fuga?
                Blanditiis porro natus ullam minus, distinctio quibusdam nisi nobis aliquid suscipit eius quia eveniet dolor possimus pariatur optio voluptatem reprehenderit adipisci itaque dignissimos eligendi ea iure unde quos quidem. Eaque.
                In, cupiditate. Nemo nostrum velit sed odio error quasi ipsum maiores nam mollitia ipsa eos, id, quibusdam itaque asperiores accusantium a voluptas illo commodi repellat veritatis! Aliquam omnis quis odit!</p>
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
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.
                            </p>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-12 feed">
                        <div class="container feed1">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.
                            </p>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i><i class="bi bi-star"></i><i class="bi bi-star"></i>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-12 feed">
                        <div class="container feed1">
                            <p>Service is ass asf
                            </p>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-sm-12 feed">
                        <div class="container feed1">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis culpa quod quia dicta esse, labore recusandae iusto sit placeat consectetur quis aliquam et reiciendis deleniti dolore soluta quo quasi ducimus.
                            </p>
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star"></i>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


    <!-- Feedbacks container -->
   
</div>

@endsection
