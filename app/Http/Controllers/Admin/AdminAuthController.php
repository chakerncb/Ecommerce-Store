<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminAuthController extends Controller
{
    
    public function index()
    {
        return view('admin.dashboard');
    }

    public function adminLogin()
    {
        return view('admin.auth.login');
    }

    public function CheckAdminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request -> email, 'password' => $request -> password])) {
            return redirect()->route('admin.index');
        } else {
            return back()->with('error', 'Invalid credentials');
        }


    }




}
