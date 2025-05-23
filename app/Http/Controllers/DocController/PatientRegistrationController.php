<?php

namespace App\Http\Controllers\DocController;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PatientRegistrationController extends Controller
{

    public function showRegisterForm(){
        return view('doctor-partials.register', [
            'generated_patient_id' => session('generated_patient_id')
        ]);
    }

    public function register(Request $request)
    {

        $validated = $request->validate([
            'patient_id' => 'required|string|unique:patients,patient_id',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string|in:Male,Female',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'required|string|max:15'
        ]);

        try {

            Patient::create($validated);

            return redirect()->back()->with('success', 'Patient Registration Successfully!');
        } catch (\Exception $e) {

            Log::error('Patient Registration Unsuccessfully!' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to register Patient. Please try again.');
        }
    }

    public function generateID()
    {
        try {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $maxAttempts = 3;
            $attempt = 0;
            $exists = true;

            while ($exists && $attempt < $maxAttempts) {
                $randomString = 'PT/';
                for ($i = 0; $i < 5; $i++) {
                    $randomString .= $characters[rand(0, strlen($characters) - 1)];
                }
                $exists = Patient::where('patient_id', $randomString)->exists();
                $attempt++;
            }

            if ($exists) {
                throw new \Exception("Failed to generate unique patient ID after $maxAttempts attempts");
            }

            return redirect()->route('patients.register')
                ->with('generated_patient_id', $randomString)
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Patient ID generation failed: ' . $e->getMessage());
            return redirect()->route('patients.register')
                ->with('error', 'Failed to generate patient ID. Please try again.')
                ->withInput();
        }
    }
}
