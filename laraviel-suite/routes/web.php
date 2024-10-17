<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('categories.index');
});

Route::view('/accommodation', 'categories.accommodation');
Route::view('/home', 'categories.index');
Route::view('/offers', 'categories.offers');
Route::view('/about', 'categories.about');
Route::view('/book-now', 'categories.book-now');


