@extends('layouts.app')

@section('title', 'Laraveil Suite')
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid book-container pt-5 ">
    <div class="container">
        <div class="row text-center pt-4">
        <div class="col-12 d-flex justify-content-center align-items-center">
            <div class="step">
            <div class="circle light">
                <h1>1</h1>
            </div>
            <p class="step-label">Check-in and Check-out</p>
            </div>
            <div class="line"></div>
            <div class="step">
            <div class="circle">
                <h1>2</h1>
            </div>
            <p class="step-label">Select Accommodations</p>
            </div>
            <div class="line"></div>
            <div class="step">
            <div class="circle">
                <h1>3</h1>
            </div>
            <p class="step-label">Guest Information</p>
            </div>
            <div class="line"></div>
            <div class="step">
            <div class="circle">
                <h1>4</h1>
            </div>
            <p class="step-label">Booking Confirmation</p>
            </div>
        </div>
        </div>
    </div>
    <div class="container deets-container">
        <div class="row text-center">
        <div class="col-4">
            <p>Check-in</p>
            <p class="check-in">Select a date</p>
        </div>
        <div class="col-4">
            <p>Check-out</p>
            <p class="check-out">Select a date</p>
        </div>
        <div class="col-4">
            <p>Number of Nights</p>
            <p class="nights">N/A</p>
        </div>
        </div>
    </div>
    <div class="container-fluid booking-contents d-flex">
    <div class="container-fluid date-picker" id="date-picker">
        <div class="row p-2 gap-3 justify-content-center text-center">
            <div class="col-md-5 col-lg-5 col-sm-12 rounded">
            <h2 id="currentMonthTitle"></h2>
            <table
                id="currentMonthCalendar"
                class="table table-borderless table-custom"
            ></table>
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12 rounded">
            <h2 id="nextMonthTitle"></h2>
            <table
                id="nextMonthCalendar"
                class="table table-borderless table-custom"
            ></table>
            </div>
        </div>
        </div>
    </div>
    <div class="container-fluid select-accomodation d-none" id="select-accommodation">
        <h1>Select Accomodation</h1>
    </div>
    <div class="container-fluid guest-info d-none" id="guest-info">
        <h1>Guest info</h1>
    </div>
    <div class="container-fluid booking-confirmation d-none" id="booking-confirmation">
        <h1>Booking Confirmation</h1>
    </div>
    <div class="container-fluid text-end">
        <button class="nextBtn">
        Continue <i class="bi bi-arrow-right"></i>
        </button>
    </div>
    </div>
@endsection
