<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Return signup view
    public function signup()
    {
        return view('admin.signup');
    }


    //Return Login view
    public function login()
    {
        return view('admin.login');
    }


    //Return Dashboard view
    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', [
            'admin' => $admin,
        ]);
    }


    //Return courses view
    public function courses()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.courses', [
            'admin' => $admin,
        ]);
    }


    //Return courses view
    public function timetable()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.timetable', [
            'admin' => $admin,
        ]);
    }


    //Return uploadResult view
    public function uploadResults()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.upload', [
            'admin' => $admin,
        ]);
    }


    //Return settings view
    public function settings()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.settings', [
            'admin' => $admin,
        ]);
    }


    //Authenticate user
    public function checkSignup(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:8|confirmed',
        ]);

        $admin = Admin::create(
            [
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        Auth::guard('admin')->login($admin);

        return redirect(route('admin.dashboard'));
    }


    //Authorize user
    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput(); // Redirect back with errors
    }

    //Log user out
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
