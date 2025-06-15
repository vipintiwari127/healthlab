<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $admin = Admin::where('email', $request->email)->first();

    if ($admin && Hash::check($request->password, $admin->password)) {
        Session::put('admin_id', $admin->id);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Login successful']);
        }

        return redirect('/admin/dashboard');
    }

    if ($request->ajax()) {
        return response()->json(['success' => false, 'message' => 'Invalid credentials']);
    }

    return back()->with('error', 'Invalid credentials');
}

    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect('/admin/login');
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::forget('admin_id');
        return redirect('/admin/login');
    }

    public function showRegisterForm()
    {
        return view('admin.register');
    }



    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Session::put('admin_id', $admin->id);

        // Check if it's an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Registration successful!',
                'redirect' => url('/admin/login')
            ]);
        }

        // Fallback for normal form
        return redirect('/admin/dashboard')->with('success', 'Registration successful!');
    }
}
