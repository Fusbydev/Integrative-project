<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('categories.index');
});

Route::view('/accommodation', 'categories.accommodation');
Route::view('/home', 'categories.index');


