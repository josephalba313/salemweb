<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('admin.user.profile')->with('user', $user);
    }

    public function update(ProfileRequest $request)
    {
        $user = \Auth::user();

        $user->profile->about = $request->about;
        $user->profile->firstname = $request->firstname;
        $user->profile->middlename = $request->middlename;
        $user->profile->lastname = $request->lastname;
        $user->profile->address1 = $request->address1;
        $user->profile->address2 = $request->address2;
        $user->profile->telephone = $request->telephone;
        $user->profile->cellphone = $request->cellphone;
        $user->profile->birthday = $request->birthday;
        $user->profile->gender = $request->gender;

        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = $user->id . '.' . $avatar->extension();
            $avatar->move('upload/avatar', $avatar_new_name );
            $user->profile->avatar = 'upload/avatar/' . $avatar_new_name;
        }
        $user->profile->save();

        $user->name = $request->name;
        $user->email = $request->email;

        if(!empty($request->password))
        {
            $user->password = bcrypt($request->password);
        }
        $user->save();
        \Session::flash('success', 'Account profile saved.');
        return redirect()->back();

    }
}
