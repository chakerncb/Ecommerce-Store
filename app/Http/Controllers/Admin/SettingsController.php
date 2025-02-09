<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Models\Store;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    //
    use ImageTrait;

    function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {

         return view('admin.settings.settings');
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

        return response()->json(['status' => true, 'message' => 'Profile Updated Successfully']);
    }

    public function shop(Request $request) {

        $store = Store::first();

        $filename1 = $store->logo_light;
        $filename2 = $store->logo_dark;


        if($request->hasFile('logo')) {
            $filename1 = $this->saveImage($request->logo_light, 'assets/images/logo');
            $filename2 = $this->saveImage($request->logo_dark, 'assets/images/logo');
        }

        $store->update([
            'name' => $request->S_name,
            'email' => $request->S_email,
            'phone' => $request->S_phone,
            'address' => $request->S_address,
            'logo_light' => $filename1,
            'logo_dark' => $filename2,
        ]);

        return response()->json(['status' => true, 'message' => 'Shop Updated Successfully']);
    }
}
