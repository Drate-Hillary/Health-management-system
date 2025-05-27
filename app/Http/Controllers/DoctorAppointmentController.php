<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAppointmentController extends Controller
{
    public function display(Request $request)
    {
        $doctor = Auth::guard('doctor')->user();

        $appointments = Appointment::with('patient')
            ->where('doctor_id', $doctor->doctor_id)
            ->when($request->status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($request->search, function ($query, $search) {
                return $query->whereHas('patient', function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderBy('appointment_date')
            ->orderBy('appointment_time')
            ->get();

        return view('doctor-partials.appointment', compact('appointments'));
    }

    public function complete(Appointment $appointment)
    {
        $appointment->update(['status' => 'completed']);
        return back()->with('success', 'Appointment has completed?');
    }

    public function pending(Appointment $appointment)
    {
        $appointment->update(['status' => 'pending']);
    }

    public function cancel(Appointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'Appointment has been Canceled');
    }
}
