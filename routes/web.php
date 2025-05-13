<?php

use Illuminate\Support\Facades\Route;

// patient's routes
// Route::get('/', function () {
//     return view('partials.dashboard');
// })->name('/partials/dashboard');

// Route::get('/login', function () {
//     return view('login');
// })->name('/login');

// Route::get('/partials/profile', function (){
//     return view('partials.profile');
// })->name('/partials/profile');

// Route::get('/partials/Telemedicine', function () {
//     return view('partials.telemedicine');
// })->name('/partials/telemedicine');

// Route::get('/partials/appointment', function () {
//     return view('partials.appointment');
// })->name('/partials/appointment');

// Route::get('/partials/billing', function(){
//     return view('partials.billing');
// })->name('/partials/billing');

// Route::get('/partials/records', function(){
//     return view('partials.records');
// })->name('/partials/records');

// Route::get('/partials/prescription', function(){
//     return view('partials.prescription');
// })->name('/partials/perscription');



// Doctor's routes
Route::get('/', function(){
    return view('doctor-partials.dashboard');
})->name('/doctor-partials/dashboard');

Route::get('/doctor-partials/appointment', function(){
    return view('doctor-partials.appointment');
})->name('/doctor-partials/appointment');

Route::get('/doctor-partials/telemedicine', function(){
    return view('doctor-partials.telemedicine');
})->name('/doctor-partials/telemedicine');

Route::get('/doctor-partials/profile', function(){
    return view('doctor-partials.profile');
})->name('/doctor-partials/profile');

Route::get('/doctor-partials/patient-records', function(){
    return view('doctor-partials.patient-records');
})->name('/doctor-partials/patient-records');