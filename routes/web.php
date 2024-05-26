<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Car Showroom',
        'car' => App\Models\Car::first()
    ]);
});
