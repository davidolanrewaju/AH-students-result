<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function signup()
    {
        return view('student.signup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkSignup(Request $request)
    {

        $request->validate([
            'matric_no' => 'required|unique:students',
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:8|confirmed',
            'level_option' => 'required|integer|between:100,400',
        ]);

        $student = Student::create(
            [
                'matric_no' => $request->matric_no,
                'first_name' => $request->first_name,
                'middle_name' => $request->middle_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level_option,
            ]
        );

        Auth::guard('student')->login($student);

        return redirect(route('student.show', ['student' => $student]));
    }

    /**
     * Show the form for accessing into a resource.
     */
    public function login()
    {
        return view('student.login');
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

        if (Auth::guard('student')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect(route('student.show'));
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput(); // Redirect back with errors
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        $student = Auth::guard('student')->user();
        return view('student.dashboard', [
            'student' => $student,
        ]);
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Student $student)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Student $student)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Student $student)
    // {
    //     //
    // }
}
