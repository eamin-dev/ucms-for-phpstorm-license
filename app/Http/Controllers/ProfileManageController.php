<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileManageRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileManageController extends Controller
{

    public function viewProfile()
    {

        $authData = User::where('id', Auth::user()->id)->first();

        return view('setting.index', compact('authData'));

    }

    public function updateProfile(ProfileManageRequest $request)
    {

        try {
            $user = User::findorfail(Auth::user()->id);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = 'upload/user_image/';
                $save_url = 'upload/user_image/' . $name_gen;
                $image->move($path, $name_gen);
                $user->image = $save_url;

            }
            $user->email = $request->email;
            $user->name = $request->name;
            $user->update();

            $notification = array(
                'message' => 'Profile Updated Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function userPassword()
    {

        return view('setting.password-view');
    }

    public function passwordUpdate(Request $request)
    {

        // return $request->toArray();

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {

            $user = User::findorfail(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->update();

            $notification = array(
                'message' => 'Password Changed Successfully',
                'alert-type' => 'success',
            );

            return redirect()->back()->with($notification);

        } else {

            $notification = array(
                'message' => 'Current Password does not match',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);

        }

    }
}
