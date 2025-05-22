<?php


use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Patients routes
Route::middleware(['auth:patient'])->group(function () {

    Route::get('/patients/dashboard', function () {
        return view('partials.dashboard', [
            'user' => auth('patient')->user()
        ]);
    })->name('/patients/dashboard');

    Route::get('/patients/profile', function () {
        return view('partials.profile');
    })->name('/patients/profile');

    Route::get('/patients/Telemedicine', function () {
        return view('partials.telemedicine');
    })->name('/patients/telemedicine');

    Route::get('/patients/appointment', function () {
        return view('partials.appointment');
    })->name('/patients/appointment');

    Route::get('/patients/billing', function () {
        return view('partials.billing');
    })->name('/patients/billing');

    Route::get('/patients/records', function () {
        return view('partials.records');
    })->name('/patients/records');

    Route::get('/patients/prescription', function () {
        return view('partials.prescription');
    })->name('/patients/prescription');
});



// Doctor's routes
Route::middleware(['auth:doctor'])->group(function () {

    Route::get('/doctor-partials/dashboard', function () {
        return view(
            'doctor-partials.dashboard',
            ['user' => auth('doctor')->user()],
        );
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
