<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoginController extends Controller
{
    use ValidatesRequests;

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:8'
        ]);

        $credentials = $request->only('email', 'password');
        $password = $request->input('password');

        $role = null;
        if (stripos($password, 'DR') === 0 || stripos($password, 'dr') === 0) {
            $role = 'doctor';
        } elseif (stripos($password, 'P') === 0 || stripos($password, 'p') === 0) {
            $role = 'patient';
        } else {
            return redirect()->back()->withErrors(['password' => 'Invalid Password!']);
        }

        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($password, $user->password)) {

            if ($user->role === $role) {
                Auth::login($user, $request->has('remember'));

                if ($user->role === 'patient') {
                    return redirect()->route('/partials/dashboard');
                }elseif ($user->role === 'doctor') {
                    return redirect()->route('/doctor-partials/dashboard');
                }

            } else {
                return redirect()->back()->withErrors(['password' => 'Invalid Password!']);
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Email!']);
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
