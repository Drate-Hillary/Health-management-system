<?php


use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DocController\PatientRegistrationController;
use App\Http\Controllers\DoctorAppointmentController;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
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

    // Appointment Routes
    Route::get('/patients/appointment', [AppointmentController::class, 'display'])
        ->name('patients.appointment');

    Route::post('/patients/appointment', [AppointmentController::class, 'store'])
        ->name('appointment.store');
    Route::delete('/patients/appointment/{appointment}', [AppointmentController::class, 'destroy'])
        ->name('patients.appointment.destroy')
        ->middleware('auth:patient');


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
        $doctor = Auth::guard('doctor')->user();

        $combinedCount = Appointment::where('doctor_id', $doctor->doctor_id)
            ->where(function ($query) {
                $query->where('status', 'pending')
                    ->orWhereDate('appointment_date', today());
            })
            ->count();

        return view('doctor-partials.dashboard', [
            'user' => $doctor,
            'combinedCount' => $combinedCount,
        ]);
    })->name('/doctor-partials/dashboard');


    //Patient Registration Controller
    Route::get('/doctor-partials/register', function () {
        return view('doctor-partials.register');
    })->name('/doctor-partials/register');
    //Generate patient id
    Route::get(
        '/docctor-partials/register',
        [PatientRegistrationController::class, 'generateID']
    )->name('patient.generateID');
    //Register a patient
    Route::post(
        '/doctor-partials/register',
        [PatientRegistrationController::class, 'register']
    )->name('patients.register');


    Route::get(
        '/doctor-partials/appointment',
        [DoctorAppointmentController::class, 'display']
    )->name('/doctor-partials/appointment');
    Route::post(
        '/doctor-partials/appointment',
        [DoctorAppointmentController::class, 'complete']
    )->name('doctor.appointment.complete');



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
