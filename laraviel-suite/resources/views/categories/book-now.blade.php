@extends('layouts.app')

@section('title', 'Laraveil Suite')
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid book-container pt-5">
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
                    <div class="col-12">
                        <table id="currentMonthCalendar" class="table table-borderless table-custom"></table>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 col-sm-12 rounded">
                    <h2 id="nextMonthTitle"></h2>
                    <table id="nextMonthCalendar" class="table table-borderless table-custom"></table>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid select-accomodation d-none" id="select-accommodation">
    <div class="container accomodation-page">
        <div class="row">
            <div class="col-12 col-md-9 text-center"> <!-- Adjusted column size for cards -->
                <div class="row justify-content-center"> <!-- Center the row -->
                    <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-4"> <!-- Responsive column sizes -->
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">ETO PALITAN NYO ROOM INFO...</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-4">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-4">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center mb-4">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3"> <!-- Adjusted column size for receipt -->
                <div class="container-fluid resibo text-center p-4">
                    <p>Booking Receipt</p>
                    <div class="container-fluid reciept-container">
                        <p><strong>Date</strong> : October 9 - October 10, 2024</p>
                    </div>
                    <div class="container-fluid text-start mt-2">
                        <p>Booked Room(s)</p>
                        <div class="container-fluid reciept-container text-center">
                            <p><strong>Standard Room</strong> : Php 7,890.00</p>
                        </div>
                    </div>
                    <div class="container-fluid text-start mt-2">
                        <p>Other Charges</p>
                        <div class="container-fluid reciept-container text-center mb-3">
                            <p><strong>Service Charge & Tax</strong> : Php 1,500.00</p>
                        </div>
                        <div class="container-fluid reciept-container text-center">
                            <p><strong>Total Bill</strong> : Php 9,399.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="container-fluid guest-info d-none" id="guest-info">
    <div class="container accomodation-page">
        <div class="row">
            <div class="col-12 col-md-9 text-center"> <!-- Adjusted column size for cards -->
                <h1>IRAH EDIT MO TO CUSTOMER INFORMATION SA LOOB NG DIV NA TO TNX TAS YUNG CARD SA SELECT ACCOMODATION PABAGO NG LAMAN, KAHIT YUNG ISANG CARD LANG LAGYAN MO NG ROOM INFORMATION, KASI LALAGYAN YAN NG JS...</h1>
            </div>
            <div class="col-12 col-md-3"> <!-- Adjusted column size for receipt -->
                <div class="container-fluid resibo text-center p-4">
                    <p>Booking Receipt</p>
                    <div class="container-fluid reciept-container">
                        <p><strong>Date</strong> : October 9 - October 10, 2024</p>
                    </div>
                    <div class="container-fluid text-start mt-2">
                        <p>Booked Room(s)</p>
                        <div class="container-fluid reciept-container text-center">
                            <p><strong>Standard Room</strong> : Php 7,890.00</p>
                        </div>
                    </div>
                    <div class="container-fluid text-start mt-2">
                        <p>Other Charges</p>
                        <div class="container-fluid reciept-container text-center mb-3">
                            <p><strong>Service Charge & Tax</strong> : Php 1,500.00</p>
                        </div>
                        <div class="container-fluid reciept-container text-center">
                            <p><strong>Total Bill</strong> : Php 9,399.00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
