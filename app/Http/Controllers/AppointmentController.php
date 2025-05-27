<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function display(Request $request)
    {
        $patient = Auth::guard('patient')->user();
        $appointments = Appointment::with('doctor')
            ->where('patient_id', $patient->patient_id)
            ->orderBy('appointment_date', 'desc')
            ->orderBy('appointment_time', 'desc')
            ->get();

        $doctors = Doctor::all();

        return view('partials.appointment', [
            'appointments' => $appointments,
            'doctors' => $doctors,
            'editing' => false,
            'show_form' => $request->has('new'),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateAppointment($request);

        $patient = Auth::guard('patient')->user();
        if (!$patient) {
            return redirect()->back()->with('error', "Patient not authenticated");
        }

        Appointment::create([
            'patient_id' => $patient->patient_id,
            'doctor_id' => $validated['doctor_id'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'status' => 'pending'
        ]);

        return redirect()->route('/patients/appointment')->with('success', 'Appointment booked successfully!');
    }

    public function destroy($appointment)
    {
        $patient = Auth::guard('patient')->user();

        $appointment = Appointment::where('id', $appointment)
            ->where('patient_id', $patient->patient_id)
            ->firstOrFail();

        $appointment->delete();

        return redirect()->route('patients.appointment')
            ->with('success', 'Appointment deleted successfully');
    }

    protected function validateAppointment(Request $request)
    {
        return $request->validate([
            'doctor_id' => 'required|exists:doctors,doctor_id',
            'appointment_date' => [
                'required',
                'date',
                'after_or_equal:today',
                function ($attribute, $value, $fail) {
                    if (date('w', strtotime($value)) == 0) {
                        $fail('Appointments are not available on Sunday');
                    }
                }
            ],
            'appointment_time' => [
                'required',
                function ($attribute, $value, $fail) {
                    $openingTime = '09:00';
                    $closingTime = '17:00';

                    if ($value < $openingTime || $value > $closingTime) {
                        $fail('Appointments must be between 9am to 5pm');
                    }
                }
            ]
        ]);
    }
}
