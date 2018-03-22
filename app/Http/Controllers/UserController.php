<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.user.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        $user->password = bcrypt($request->password);
        $user->save();

        $profile = new Profile;
        $profile->user_id = $user->id;
        $profile->avatar = 'upload/avatar/t.png';
        $profile->save();
        \Session::flash('success', "You have successfully added user {$user->user}");

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin = $request->admin;
        if (!empty($request->password))
        {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        \Session::flash('success', "You have successfully updated user {$user->user}");

        return redirect()->route('user.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->profile->delete();
        $user->delete();
        \Session::flash('success', "You have successfully deleted User {$user->user}");

        return redirect()->route('user.index');
    }


}
