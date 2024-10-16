@extends('layouts.app')

@section('title', 'Items Index')  <!-- Optional: Set the title of the page -->
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet" >
@endsection

@section('content')
    <!-- Your index page content goes here -->
    <div class="container-fluid bg" style="height: 100vh;"> <!-- Full-height container -->
        <div class="d-flex align-items-center justify-content-center h-100 text-center">
            <div class="d-flex flex-column">
            <h1 class="mx-auto elevate">ELEVATE YOUR STAY</h1>
            <p class="hotel-name">Laraveil Suites</p>
            </div>
        </div>
    </div>
    <div class="newSction container-fluid">
        
    </div>
@endsection
