@extends('layouts.app')

@section('title', 'Laraveil Suite')  <!-- Optional: Set the title of the page -->
@section('custom-css')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
        
@section('content')
    <div class="container about">
    <div class="d-flex align-items-center justify-content-center h-100 text-center">
            <div class="d-flex flex-column">
                <h1 class="mx-auto elevate">About (Still Working On It)</h1>
            </div>
        </div> 
    </div> 
@endsection