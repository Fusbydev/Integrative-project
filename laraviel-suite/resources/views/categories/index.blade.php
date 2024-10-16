@extends('layouts.app')

@section('title', 'Items Index')  <!-- Optional: Set the title of the page -->
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet" >
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
    <div class="container checkInOut">
        <div class="row text-align-center"> <!-- Bootstrap row for the grid -->
            <div class="col-md-5"> <!-- Adjust the column size as needed -->
                <label for="checkin" class="form-label checkIn">Check-In</label>
                <input type="date" id="checkin" class="form-control transparent-input">
            </div>
            <div class="col-md-5"> <!-- Adjust the column size as needed -->
                <label for="checkout" class="form-label checkIn">Check-Out</label>
                <input type="date" id="checkout" class="form-control transparent-input">
            </div>
            <div class="col-md-2 d-flex align-items-end"> <!-- Button aligned to the bottom -->
                <button class="checkBtn w-100">Check Availability</button>
            </div>
        </div>
    </div>
</div>

@endsection
