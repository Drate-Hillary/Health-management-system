<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Doctor;
use App\Models\Patient;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'empid' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $email = $request->input('email');
        $empid = $request->input('empid');
        $remember = $request->has('remember');

        if (str_ends_with($email, '@doctors.com')) {
            $doctor = Doctor::where('email', $email)
                          ->where('doctor_id', $empid)
                          ->first();
            
            if ($doctor) {
                Auth::guard('doctor')->login($doctor, $remember);
                return redirect()->route('/doctor-partials/dashboard');
            }
            
            return back()->withErrors(['empid' => 'Invalid Doctor Email or ID!'])->withInput();
        }
        elseif (str_ends_with($email, '@patients.com')) {
            $patient = Patient::where('email', $email)
                            ->where('patient_id', $empid)
                            ->first();
            
            if ($patient) {
                Auth::guard('patient')->login($patient, $remember);
                return redirect()->route('/patients/dashboard');
            }
            
            return back()->withErrors(['empid' => 'Invalid Patient Email or ID!'])->withInput();
        }

        return back()->withErrors(['email' => "Invalid domain provided"])->withInput();
    }

    public function logout(Request $request){

        if(Auth::guard('doctor')->check()){
            Auth::guard('doctor')->logout();
        }elseif (Auth::guard('patient')->check()) {
            Auth::guard('patient')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}