<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\Admin;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

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

    public function update(AdminUpdateRequest $request) {

        $admin = Admin::find(auth()->guard('admin')->user()->id);

        $filename = $admin->image;

      if($request -> hasFile('image')) {
            $filename = $this -> saveImage($request->image , 'assets/src/images/user');
      }


        $admin -> update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $admin->password,
            'image' => $filename,
        ]);

        return redirect()->back()->with('success' , 'Profile Updated Successfully');
    }
}
