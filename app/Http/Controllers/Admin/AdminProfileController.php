<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //
    use ImageTrait;

    function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {

       $admin = Admin::find(auth()->guard('admin')->user()->id);

         return view('admin.profile.profile-settings' , compact('admin'));
    }

    public function update(Request $request) {

        $admin = Admin::find(auth()->guard('admin')->user()->id);

        $filename = $admin->image;

        if($request->hasFile('image')) {
            $filename = $this->saveImage($request->image, 'assets/src/images/user');
        }

        $password = $admin->password;

        if ($request->has('reset_pass')) {
            $currentPass = $request->current_pass;
            $hashedPassword = $admin->password;

            switch (true) {
                case !Hash::check($currentPass, $hashedPassword):
                    return redirect()->back()->with('error', 'Current Password is Incorrect');
                case $request->new_pass !== $request->confirmed_pass:
                    return redirect()->back()->with('error', 'Password and Confirm Password does not match');
                default:
                    $password = Hash::make($request->new_pass);
                    break;
            }
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $password,
            'image' => $filename,
        ]);

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
