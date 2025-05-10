<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('partials.dashboard');
})->name('/partials/dashboard');

Route::get('/login', function () {
    return view('login');
})->name('/login');

Route::get('/partials/profile', function (){
    return view('partials.profile');
})->name('/partials/profile');

Route::get('/partials/Telemedicine', function () {
    return view('partials.telemedicine');
})->name('/partials/telemedicine');

Route::get('/partials/appointment', function () {
    return view('partials.appointment');
})->name('/partials/appointment');

Route::get('/partials/billing', function(){
    return view('partials.billing');
})->name('/partials/billing');

Route::get('/partials/records', function(){
    return view('partials.records');
})->name('/partials/records');

