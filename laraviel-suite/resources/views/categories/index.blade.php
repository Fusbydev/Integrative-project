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
                    <img src="https://images.unsplash.com/photo-1541845157-a6d2d100c931?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1350&amp;q=80" alt="" />
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1588282322673-c31965a75c3e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1351&amp;q=80" alt="" />
                </div>
                <div class="tall">
                    <img src="https://images.unsplash.com/photo-1588117472013-59bb13edafec?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=500&amp;q=60" alt="">
                </div>
                <div class="wide">
                    <img src="https://images.unsplash.com/photo-1587588354456-ae376af71a25?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" />
                </div>
                <div>
                    <img src=" https://images.unsplash.com/photo-1558980663-3685c1d673c4?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1000&amp;q=60" alt="" />
                </div>
                <div class="tall">
                    <img src="https://images.unsplash.com/photo-1588499756884-d72584d84df5?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2134&amp;q=80" alt="" />
                </div>
                <div class="wide">
                <img src="https://images.unsplash.com/photo-1587588354456-ae376af71a25?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" />
                </div>
                <div>
                    <img src="https://images.unsplash.com/photo-1588247866001-68fa8c438dd7?ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=564&amp;q=80" alt="" />
                </div>
            </div>
        </div> <!-- Closing images section -->
    </div> <!-- Closing newSction -->
@endsection
