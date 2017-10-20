<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.accountAll',[
          'data' => User::paginate(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('auth.profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('auth.profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //validator
        $request->validate([
          'firstName' => 'required|string|max:255',
          'lastName' => 'required|string|max:255',
          'email' => 'required|string|email|max:255',
          'password' => 'required|string|min:6|confirmed',
          'phone' => 'required|string|min:6',
          'address' => 'required|string',
          'photo' => 'image'
        ]);
        //photo
        if($request->photo){
          $path = $request->photo->store('avatar', 'public');
          if ($user->photo != "avatar/avatar.png") {
            Storage::disk('public')->delete($user->photo);
          }
        }else{
          $path = $user->photo;
        }
        //update data
        User::find($user->id)->update([
          'firstName' => $request->firstName,
          'lastName' => $request->lastName,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'address' => $request->address,
          'phone' => $request->phone,
          'photo' => $path
        ]);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
