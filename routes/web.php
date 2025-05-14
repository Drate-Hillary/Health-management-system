<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// patient's routes
Route::middleware('role:patient')->group(function () {

    Route::get('/partials/dashboard', function () {
        return view('partials.dashboard');
    })->name('/partials/dashboard');

    Route::get('/partials/profile', function () {
        return view('partials.profile');
    })->name('/partials/profile');

    Route::get('/partials/Telemedicine', function () {
        return view('partials.telemedicine');
    })->name('/partials/telemedicine');

    Route::get('/partials/appointment', function () {
        return view('partials.appointment');
    })->name('/partials/appointment');

    Route::get('/partials/billing', function () {
        return view('partials.billing');
    })->name('/partials/billing');

    Route::get('/partials/records', function () {
        return view('partials.records');
    })->name('/partials/records');

    Route::get('/partials/prescription', function () {
        return view('partials.prescription');
    })->name('/partials/perscription');
});


// Doctor's routes
Route::middleware('role:doctor')->group(function () {

    Route::get('/doctor-partials/dashboard', function () {
        return view('doctor-partials.dashboard');
    })->name('/doctor-partials/dashboard');

    Route::get('/doctor-partials/appointment', function () {
        return view('doctor-partials.appointment');
    })->name('/doctor-partials/appointment');

    Route::get('/doctor-partials/telemedicine', function () {
        return view('doctor-partials.telemedicine');
    })->name('/doctor-partials/telemedicine');

    Route::get('/doctor-partials/profile', function () {
        return view('doctor-partials.profile');
    })->name('/doctor-partials/profile');

    Route::get('/doctor-partials/patient-records', function () {
        return view('doctor-partials.patient-records');
    })->name('/doctor-partials/patient-records');

    Route::get('/doctor-partials/prescription', function () {
        return view('doctor-partials.prescription');
    })->name('/doctor-partials/prescription');

    Route::get('/doctor-partials/reporting', function () {
        return view('doctor-partials.reporting');
    })->name('/doctor-partials/reporting');
});
