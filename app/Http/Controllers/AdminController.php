<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  */
    // public function index()
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function signup()
    {
        return view('admin.signup');
    }

   /**
     * Store a newly created resource in storage.
     */
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


     /**
     * Show the form for accessing into a resource.
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Check login resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', [
            'admin' => $admin,
        ]);
    }


    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Admin $admin)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Admin $admin)
    // {
    //     //
    // }
}
