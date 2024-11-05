<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\AdminRequest;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function adminLogin()
    {
        return view('admin.auth.login');
    }

    public function CheckAdminLogin(AdminRequest $request)
    {

        if (Auth::guard('admin')->attempt(['email' => $request -> email, 'password' => $request -> password])) {
            return redirect()->route('admin.index');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
 
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect()->route('admin.login');
    }
}
