@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 accomodation-bg">
        <h2 class="section-title text-left">STANDARD SUITES</h2>
        <div class="row justify-content-around"> <!-- Adjusted row with justify-content -->
            <div class="col-md-4">
                <div class="suite card">
                    <img src="./images/standard 1.png" class="card-img-top" alt="Standard Room">
                    <div class="card-body">
                        <h3 class="card-title">STANDARD ROOM</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="suite-price">Php 7,899/per night</h4>
                        <button class="btn btn-outline-light">Book now</button>
                        <button class="btn btn-outline-light" data-toggle="modal" data-target="#amenitiesModal">Check amenities</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="suite card">
                    <img src="./images/standard 1.png" class="card-img-top" alt="Standard Room">
                    <div class="card-body">
                        <h3 class="card-title">STANDARD ROOM</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="suite-price">Php 7,899/per night</h4>
                        <button class="btn btn-outline-light">Book now</button>
                        <button class="btn btn-outline-light" data-toggle="modal" data-target="#amenitiesModal">Check amenities</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="suite card">
                    <img src="./images/standard 1.png" class="card-img-top" alt="Standard Room">
                    <div class="card-body">
                        <h3 class="card-title">STANDARD     ROOM</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="suite-price">Php 7,899/per night</h4>
                        <button class="btn btn-outline-light">Book now</button>
                        <button class="btn btn-outline-light" data-toggle="modal" data-target="#amenitiesModal">Check amenities</button>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="section-title text-left">DELUXE SUITES</h2>
        <div class="row justify-content-around"> <!-- Adjusted row with justify-content -->
            <div class="col-md-4">
                <div class="suite card">
                    <img src="./images/standard 1.png" class="card-img-top" alt="Deluxe Room">
                    <div class="card-body">
                        <h3 class="card-title">DELUXE ROOM</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="suite-price">Php 12,899/per night</h4>
                        <button class="btn btn-outline-light">Book now</button>
                        <button class="btn btn-outline-light" data-toggle="modal" data-target="#amenitiesModal">Check amenities</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="suite card">
                    <img src="./images/standard 1.png" class="card-img-top" alt="Deluxe Room">
                    <div class="card-body">
                        <h3 class="card-title">DELUXE ROOM</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="suite-price">Php 12,899/per night</h4>
                        <button class="btn btn-outline-light">Book now</button>
                        <button class="btn btn-outline-light" data-toggle="modal" data-target="#amenitiesModal">Check amenities</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="suite card">
                    <img src="./images/standard 1.png" class="card-img-top" alt="Deluxe Room">
                    <div class="card-body">
                        <h3 class="card-title">DELUXE ROOM</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <h4 class="suite-price">Php 12,899/per night</h4>
                        <button class="btn btn-outline-light">Book now</button>
                        <button class="btn btn-outline-light" data-toggle="modal" data-target="#amenitiesModal">Check amenities</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Amenities -->
    <div class="modal fade" id="amenitiesModal" tabindex="-1" aria-labelledby="amenitiesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="amenitiesModalLabel">Room Amenities</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul>
                        <li>King or Queen-sized Bed with premium bedding</li>
                        <li>Living area with a sofa, armchairs, and coffee table</li>
                        <li>Work desk with a comfortable chair and adequate lighting</li>
                        <li>Wardrobe/Closet with hangers and full-length mirror</li>
                        <li>in-room safe for valuables</li>
                        <li>Climate control (air conditioning/heating)</li>
                        <li>Blackout curtains for privacy and rest</li>
                        <li>Soundproofing for a quiet stay</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection